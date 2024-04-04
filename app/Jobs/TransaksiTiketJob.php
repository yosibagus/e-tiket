<?php

namespace App\Jobs;

use App\Http\Controllers\OtpController;
use App\Models\TransaksiModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TransaksiTiketJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nowa;
    protected $nama_pembeli;
    protected $kode;

    /**
     * Create a new job instance.
     */
    public function __construct($nama_pembeli, $nowa, $kode)
    {
        $this->nama_pembeli = $nama_pembeli;
        $this->nowa = $nowa;
        $this->kode = $kode;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $otp = new OtpController();
        $pesan = "*Terimakasih $this->nama_pembeli*\nAnda berhasil aktivasi Elektronik Tiket *UNIBA FESTIVAL 2024*\n\nSilahkan klik link berikut untuk mendownload e-tiket : https://yosibgsdr.site\n\n*jagalah kerahasiaan e-tiket anda, karena e-tiket hanya bisa digunakan satu kali.";
        $status = $otp->index($pesan, $this->nowa);
        TransaksiModel::where('kode_tiket', $this->kode)->update(['status' => $status]);
    }
}
