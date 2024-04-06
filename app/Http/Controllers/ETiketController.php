<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class ETiketController extends Controller
{
    public function index($id)
    {
        $detail = TransaksiModel::where('token_tiket', $id)->first();
        return view('etiket', compact('detail'));
    }
}
