<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = $this->getHome();
        return view('admin.home', $data);
    }

    private function getHome()
    {
        $role = Auth::user()->role;
        $userid = Auth::user()->id;
        if ($role == 'Admin') {
            $terjual = TransaksiModel::where('kategori_id', '!=', 3)->count();
            $penghasilan = TransaksiModel::getPenghasilan();
            $mhs = TransaksiModel::getTransaksiTipe('mhs')->count();
            $non = TransaksiModel::getTransaksiTipe('non')->count();
        } else {
            $terjual = TransaksiModel::where('user_id', $userid)->count();
            $penghasilan = TransaksiModel::getPenghasilan($userid);
            $mhs = TransaksiModel::getTransaksiTipe('mhs', $userid)->count();
            $non = TransaksiModel::getTransaksiTipe('non', $userid)->count();
        }

        $data = [
            'terjual' => $terjual,
            'penghasilan' => $penghasilan,
            'mhs' => $mhs,
            'non' => $non
        ];

        return $data;
    }
}
