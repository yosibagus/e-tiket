@php
    $title = 'Akses Akun';
@endphp
@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Akses Sistem</h4>
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('akses/create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-lg"></i>
                            Tambah Akses
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="alternatif" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th><i class="bi bi-lock-fill"></i> Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($akun as $get)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $get->name }}</td>
                                        <td>{{ $get->username }}</td>
                                        <td>{{ $get->role }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <button class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#alternatif').DataTable({
                "paging": false
            });
        })
    </script>
@endsection
