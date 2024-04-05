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
}
