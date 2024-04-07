<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AksesController extends Controller
{
    public function index()
    {
        $akun = User::all();
        return view('admin.akses.akses_view', compact('akun'));
    }

    public function create()
    {
        return view('admin.akses.akses_create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'hint' => $request->password,
            'role' => $request->role
        ];
        User::create($data);
        return redirect('/akses')->with('Data Akses Berhasil Disimpan');
    }

    public function edit($id)
    {
        $detail = User::where('id', $id)->first();
        return view('admin.akses.akses_edit', compact('detail'));
    }

    public function update($id, Request $request)
    {
        if (!empty($request->password)) {
            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'hint' => $request->password,
                'role' => $request->role
            ];
        } else {
            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'role' => $request->role
            ];
        }

        User::where('id', $id)->update($data);
        return redirect('akses')->with('success', 'Akses Berhasil di Perbaharui');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('akses')->with('success', 'Akses Berhasil di Hapus');
    }
}
