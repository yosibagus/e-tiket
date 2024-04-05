<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = "tb_tiket";
    protected $guarded = [];

    public static function getAllTransaksi($tipe, $userid)
    {
        $query = DB::table('tb_tiket')
            ->where([
                ['tipe', '=', $tipe],
                ['user_id', '=', $userid]
            ]);
        return $query;
    }

    public static function getTransaksi($id = null)
    {
        $query = DB::table('tb_tiket')
            ->join('users', 'users.id', '=', 'tb_tiket.user_id');

        if (!empty($id)) {
            $query->where('user_id', $id);
        }

        return $query;
    }

    public static function getPenghasilan($id = null)
    {
        $query = DB::table('tb_tiket');

        if (!empty($id)) {
            $query->where('user_id', $id);
        }

        return $query->sum('tagihan');
    }

    public static function getTransaksiTipe($tipe, $userid = null)
    {
        $query = DB::table('tb_tiket');
        if (!empty($userid)) {
            $query->where([
                ['tipe', '=', $tipe],
                ['user_id', '=', $userid]
            ]);
        } else {
            $query->where('tipe', $tipe);
        }

        return $query;
    }
}
