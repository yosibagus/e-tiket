<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ScanModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function index()
    {
        return view('scan.scan');
    }

    public function scan_action($id)
    {
        $cek = TransaksiModel::where('token_tiket', $id)->count();
        if ($cek > 0) {
            $cek_scan = ScanModel::where('token_tiket', $id)->count();
            if ($cek_scan > 0) {
                //sudah melakukan scan
                $pesan = 500;
            } else {
                $data = [
                    'token_tiket' => $id,
                    'user_id' => 1,
                    'tgl_scan' => date('Y-m-d H:i:s'),
                ];
                ScanModel::create($data);
                $pesan = 200;
            }
        } else {
            //jika tiket tidak ditemukan
            $pesan = 404;
        }

        return response()->json(['pesan' => $pesan]);
    }
}
