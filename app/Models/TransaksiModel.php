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

    public static function getAllTransaksi($tipe)
    {
        $query = DB::table('tb_tiket')
            ->join('users', 'users.id', '=', 'tb_tiket.user_id')
            ->where('tipe', $tipe);
        return $query;
    }
}
