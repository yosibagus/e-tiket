@php
    $title = 'Tambah Kategori Tiket';
@endphp
@extends('layout.template')

@section('content')
    <form method="POST" action="" class="row form-valide-with-icon needs-validation" novalidate>
        @csrf
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama_kategori">Nama Kategori <small class="text-danger">*</small></label>
                            <input required type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                maxlength="200" autocomplete="off" placeholder="Kategori Tiket">
                            <div class="invalid-feedback">
                                Kategori tiket tidak boleh dikosongi.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Harga Tiket <small class="text-danger">*</small></label>
                            <input required type="text" class="form-control" id="harga_kategori" name="harga_kategori"
                                maxlength="200" autocomplete="off" placeholder="ex : 10000">
                            <div class="invalid-feedback">
                                Harga tiket tidak boleh dikosongi.
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary btn-sm"><i class="bi bi-check-lg"></i> Simpan Data</button>
                        <a href="{{ url('setting') }}" class="btn btn-danger btn-sm">
                            Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
