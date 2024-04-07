<?php

namespace App\Http\Controllers;

use App\Models\ScanModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class ETiketController extends Controller
{
    public function index($id)
    {
        if (TransaksiModel::where('token_tiket', $id)->count() > 0) {
            $detail = TransaksiModel::where('token_tiket', $id)->first();
            return view('etiket', compact('detail'));
        } else {
            echo "Mohon Maaf E-Tiket tidak ditemukan";
        }
    }

    public function scan()
    {
        return view('scan.scan');
    }

    public function scan_action($id)
    {
        $data = [
            'token_tiket' => $id,
            'user_id' => 1,
            'tgl_scan' => date('Y-m-d H:i:s'),
        ];
        ScanModel::create($data);
    }
}
