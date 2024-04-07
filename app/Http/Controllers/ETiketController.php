<?php

namespace App\Http\Controllers;

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
}
