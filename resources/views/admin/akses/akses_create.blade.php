@php
    $title = 'Tambah Akses Aplikasi';
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
                            <label for="name">Nama<small class="text-danger">*</small></label>
                            <input required type="text" class="form-control" id="name" name="name"
                                maxlength="200" autocomplete="off" placeholder="Masukkan nama...">
                            <div class="invalid-feedback">
                                Nama tidak boleh dikosongi.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Role <small class="text-danger">*</small></label>
                            <select name="role" id="role" required class="form-control">
                                <option value="">Select</option>
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                                <option value="Mitra">Mitra</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="username">Username<small class="text-danger">*</small></label>
                            <input required type="text" class="form-control" id="username" name="username"
                                maxlength="10" autocomplete="off" placeholder="Masukkan username...">
                            <div class="invalid-feedback">
                                Username tidak boleh dikosongi.
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="password">Password<small class="text-danger">*</small></label>
                            <input required type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Masukkan password...">
                            <div class="invalid-feedback">
                                Password tidak boleh dikosongi.
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary btn-sm"><i class="bi bi-check-lg"></i> Simpan Akses</button>
                        <a href="{{ url('akses') }}" class="btn btn-danger btn-sm">
                            Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
