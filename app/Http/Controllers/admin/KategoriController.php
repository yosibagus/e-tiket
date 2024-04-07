<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriModel::all();
        return view('admin.kategori.kategori_view', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.kategori_create');
    }

    public function store(Request $request)
    {
        $data = [
            'nama_kategori' => $request->nama_kategori,
            'harga_kategori' => $request->harga_kategori
        ];

        KategoriModel::create($data);
        return redirect('setting')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $detail = KategoriModel::where('id_kategori', $id)->first();
        return view('admin.kategori.kategori_edit', compact('detail'));
    }

    public function update($id, Request $request)
    {
        $data = [
            'nama_kategori' => $request->nama_kategori,
            'harga_kategori' => $request->harga_kategori
        ];

        KategoriModel::where('id_kategori', $id)->update($data);
        return redirect('setting')->with('success', 'Data Berhasil di Perbaharui');
    }
}
