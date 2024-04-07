@php
    $title = 'Transaksi';
@endphp
@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Transaksi</h4>
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('transaksi/add/' . $tipe) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-lg"></i>
                            Tambah Transaksi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="alternatif" class="display min-w850 mb-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pembeli</th>
                                    <th>No WhatsApp</th>
                                    <th>Kode Tiket</th>
                                    <th>Status e-Tiket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($transaksi as $get)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $get->nama_pembeli }}</td>
                                        <td>{{ $get->nowa_pembeli }}</td>
                                        <td>{{ $get->kode_tiket }}</td>
                                        <td>
                                            @if ($get->status == 1)
                                                <div class="text-success">
                                                    <i class="bi bi-check-lg text-success"></i>
                                                    Terkirim
                                                </div>
                                            @else
                                                <a href="{{ url('transaksi/' . $get->token_tiket . '/repeat') }}">
                                                    <i class="bi bi-arrow-clockwise"></i> Kirim Ulang
                                                </a>
                                            @endif
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#alternatif').DataTable();
        })
    </script>
@endsection
