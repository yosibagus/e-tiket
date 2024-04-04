<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = "master_mahasiswa";
    protected $guarded = [];

    public static function cekMhs($nim)
    {
        return DB::table('master_mahasiswa')->where('nim_mahasiswa', $nim);
    }
}
