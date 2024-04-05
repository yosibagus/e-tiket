@php
    $title = 'Rekapitulasi';
@endphp
@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Transaksi</h4>
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
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($rekapitulasi as $get)
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
                                                <a href=""><i class="bi bi-arrow-clockwise"></i> Kirim Ulang</a>
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($get->tagihan, 0,2,'.') }}</td>
                                        <td>{{ $get->name }}</td>
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
