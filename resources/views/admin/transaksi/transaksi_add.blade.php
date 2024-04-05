@php
    $title = 'Transaksi Tiket';
@endphp
@extends('layout.template')

@section('content')
    <form method="POST" action="" class="row form-valide-with-icon needs-validation" novalidate>
        @csrf
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex py-3">
                    <h4 class="card-title">Transaksi</h4>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i>
                            Selesaikan Transaksi</button>
                        &nbsp; <a href="{{ url('transaksi/' . $tipe) }}" class="btn btn-danger btn-sm">
                            Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2 text-black">
                        <b> Tagihan Tiket : Rp{{ number_format($kategori->harga_kategori, 0, 2, '.') }}</b>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama_pembeli">Atas Nama <small class="text-danger">*</small></label>
                            <input required type="text" autofocus class="form-control" id="nama_pembeli" name="nama_pembeli"
                                autocomplete="off" placeholder="Masukkan nama pembeli tiket" value="">
                            <div class="invalid-feedback">
                                Harga tiket tidak boleh dikosongi.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nowa">No WhatsApp <small class="text-danger">*</small></label>
                            <input required type="text" class="form-control" id="nowa" name="nowa"
                                autocomplete="off" placeholder="ex : 0818070xxxx" value="">
                            <div class="invalid-feedback">
                                Harga tiket tidak boleh dikosongi.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('#nim_mahasiswa').select2({
                placeholder: 'Pilih Mahasiswa',
                allowClear: true
            });
        });
    </script>
@endsection
