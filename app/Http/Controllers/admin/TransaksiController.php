<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\TransaksiTiketJob;
use App\Models\MahasiswaModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;

class TransaksiController extends Controller
{
    public function index($tipe)
    {
        $transaksi = TransaksiModel::getAllTransaksi($tipe)->get();
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
            return view('admin.transaksi.transaksi_add_mhs', $data);
        } else {
            return view('admin.transaksi.transaksi_add', $data);
        }
    }
    
    public function store($tipe, Request $request)
    {
        $nowa = $request->nowa;
        $userid = 1;
        $token = uniqid();
        $kode = date('dmy') . '-' . uniqid();
        $tgl_pembelian = date('Y-m-d H:i:s');
        $nama_pembeli = $request->nama_pembeli;

        if ($tipe == 'mhs') {
            $nim = $request->nim_mahasiswa;
            $kat = 1;
        } else {
            $nim = 'non-mahasiswa';
            $kat = 2;
        }

        $data = [
            'kode_tiket' => $kode,
            'nim_mahasiswa' => $nim,
            'nama_pembeli' => $nama_pembeli,
            'nowa_pembeli' => $nowa,
            'token_tiket' => $token,
            'tgl_pembelian' => $tgl_pembelian,
            'tipe' => $tipe,
            'user_id' => $userid,
            'kategori_id' => $kat
        ];

        TransaksiModel::create($data);

        $job = new TransaksiTiketJob($nama_pembeli, $nowa, $kode);
        Queue::push($job);

        return redirect('transaksi/add/' . $tipe)->with('success', 'Berhasil Disimpan');
    }

    public function rekapitulasi()
    {
        return view('admin.transaksi.transaksi_rekap');
    }
}
