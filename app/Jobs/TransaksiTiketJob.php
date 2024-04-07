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
    protected $email;

    /**
     * Create a new job instance.
     */
    public function __construct($nama_pembeli, $nowa, $kode, $email)
    {
        $this->nama_pembeli = $nama_pembeli;
        $this->nowa = $nowa;
        $this->kode = $kode;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $otp = new OtpController();
        $row = TransaksiModel::where('kode_tiket', $this->kode)->first();

        // $url = 'http://127.0.0.1:8000/u-fest2024/' . $row->token_tiket;
        $url = url('u-fest2024/') . $row->token_tiket;

        $pesan = "*Terimakasih $this->nama_pembeli*\nAnda berhasil aktivasi Elektronik Tiket *UNIBA FESTIVAL 2024*\n\nSilahkan klik link berikut untuk mendownload e-tiket : $url\n\n_Ket:jagalah kerahasiaan e-tiket anda, karena e-tiket hanya bisa digunakan satu kali._";

        $status = $otp->index($pesan, $this->nowa);
        $otp->sendemail($this->email, $this->nama_pembeli, $this->kode, $row->tgl_pembelian, $row->tipe, $url);
        TransaksiModel::where('kode_tiket', $this->kode)->update(['status' => $status]);
    }
}
