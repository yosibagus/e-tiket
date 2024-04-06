@php
    $title = 'Transaksi Mahasiswa';
@endphp
@extends('layout.template')

@section('content')
    <form method="GET" action="" class="row form-valide-with-icon needs-validation" novalidate>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <input required type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa"
                                autocomplete="off" placeholder="Masukkan NIM Mahasiswa" value=""
                                style="color: black; font-size:20px;">
                            <div class="invalid-feedback">
                                NIM Tidak boleh di kosongi
                            </div>
                        </div>
                        <div class="col-md-5">
                            @if (isset($_GET['nim_mahasiswa']))
                                <a href="{{ url('transaksi/add/mhs') }}" class="btn btn-danger" style="width: 45%"><i
                                        class="bi bi-arrow-clockwise"></i>
                                    Reset</a>
                            @else
                                <button class="btn btn-primary" style="width: 45%">Proses</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if (isset($_GET['nim_mahasiswa']))
        <form method="POST" action="" class="row form-valide-with-icon needs-validation" novalidate>
            @csrf
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex py-3">
                        <h4 class="card-title">Transaksi</h4>
                        <div class="d-flex justify-content-end">
                            @if ($cek == 'ok')
                                <button class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i>
                                    Selesaikan Transaksi</button>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($cek == 'ada')
                            NIM sudah membeli tiket
                        @elseif ($cek == '404')
                            NIM Tidak terdaftar / Tidak ditemukan!
                        @elseif ($cek == 'ok')
                            <div class="mb-2 text-black">
                                <b> Tagihan Tiket : Rp{{ number_format($kategori->harga_kategori, 0, 2, '.') }}</b>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nama_pembeli">Atas Nama <small class="text-danger">*</small></label>
                                    <input required type="text" class="form-control" id="nama_pembeli"
                                        name="nama_pembeli" autocomplete="off" placeholder="Masukkan nama pembeli tiket"
                                        value="{{ $mahasiswa->nama_mahasiswa }}" readonly>
                                    <div class="invalid-feedback">
                                        Harga tiket tidak boleh dikosongi.
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email_pembeli">Email <small class="text-danger">*</small></label>
                                    <input required type="email" class="form-control" id="email_pembeli" name="email_pembeli"
                                        autocomplete="off" placeholder="ex : 0818070xxxx" autofocus value="">
                                    <div class="invalid-feedback">
                                        Email tidak boleh dikosongi.
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="nowa">No WhatsApp <small class="text-danger">*</small></label>
                                    <input required type="text" class="form-control" id="nowa" name="nowa"
                                        autocomplete="off" placeholder="ex : 0818070xxxx" autofocus value="">
                                    <div class="invalid-feedback">
                                        Nomor WhatsApp tidak boleh dikosongi.
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
