<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\TransaksiTiketJob;
use App\Models\KategoriModel;
use App\Models\MahasiswaModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index($tipe)
    {
        $transaksi = TransaksiModel::getAllTransaksi($tipe, Auth::user()->id)->get();
        return view('admin.transaksi.transaksi_view', compact('tipe', 'transaksi'));
    }

    public function create($tipe)
    {
        $data['tipe'] = $tipe;
        if ($tipe == 'mhs') {
            if (isset($_GET['nim_mahasiswa'])) {
                $mhs_cek = MahasiswaModel::cekMhs($_GET['nim_mahasiswa'])->count();
                if ($mhs_cek > 0) {
                    $cek = TransaksiModel::where('nim_mahasiswa', $_GET['nim_mahasiswa'])->count();
                    if ($cek > 0) {
                        $data['cek'] = 'ada';
                    } else {
                        $data['cek'] = 'ok';
                        $data['mahasiswa'] = MahasiswaModel::cekMhs($_GET['nim_mahasiswa'])->first();
                    }
                } else {
                    $data['cek'] = '404';
                }
            }
            $data['kategori'] = KategoriModel::where('id_kategori', 1)->first();
            return view('admin.transaksi.transaksi_add_mhs', $data);
        } else {
            $data['kategori'] = KategoriModel::where('id_kategori', 2)->first();
            return view('admin.transaksi.transaksi_add', $data);
        }
    }

    public function store($tipe, Request $request)
    {
        $nowa = $request->nowa;
        $userid = Auth::user()->id;
        $token = uniqid();
        $kode = strtoupper(Str::random(7));
        $tgl_pembelian = date('Y-m-d H:i:s');
        $nama_pembeli = $request->nama_pembeli;
        $email_pembeli = $request->email_pembeli;

        if ($tipe == 'mhs') {
            $nim = $request->nim_mahasiswa;
            $kat = 1;
        } else if($tipe == 'non'){
            $nim = 'non-mahasiswa';
            $kat = 2;
        } else {
            $nim = 'non-mahasiswa';
            $kat = 3;
        }

        $harga =  KategoriModel::where('id_kategori', $kat)->first();

        $data = [
            'kode_tiket' => $kode,
            'nim_mahasiswa' => $nim,
            'nama_pembeli' => $nama_pembeli,
            'nowa_pembeli' => $nowa,
            'token_tiket' => $token,
            'tgl_pembelian' => $tgl_pembelian,
            'tipe' => $tipe,
            'user_id' => $userid,
            'kategori_id' => $kat,
            'tagihan' => $harga->harga_kategori,
            'email_pembeli' => $email_pembeli
        ];

        TransaksiModel::create($data);

        $job = new TransaksiTiketJob($nama_pembeli, $nowa, $kode, $email_pembeli);
        Queue::push($job);

        return redirect('transaksi/add/' . $tipe)->with('success', 'Transaksi Berhasil');
    }

    public function rekapitulasi()
    {
        if (Auth::user()->role == 'Admin') {
            $rekapitulasi = TransaksiModel::getTransaksi()->get();
        } else {
            $rekapitulasi = TransaksiModel::getTransaksi(Auth::user()->id)->get();
        }
        return view('admin.transaksi.transaksi_rekap', compact('rekapitulasi'));
    }

    public function kirim_ulang($token)
    {
        $data = TransaksiModel::where('token_tiket', $token)->first();
        $job = new TransaksiTiketJob($data->nama_pembeli, $data->nowa_pembeli, $data->kode_tiket, $data->email_pembeli);
        Queue::push($job);
        return redirect('transaksi/' . $data->tipe)->with('success', 'e-tiket berhasil dikirim ulang');
    }
}
