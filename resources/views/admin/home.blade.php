@php
    $title = 'Home';
@endphp
@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-xl-6 col-xxl-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-success me-md-4 me-3">
                                    <i class="bi bi-ticket-detailed-fill text-success" style="font-size: 35px;"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Tiket Terjual</p>
                                    <span class="title text-black font-w600">{{ $terjual }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-success" style="width: 100%; height:5px;"
                                    aria-label="Progess-success" role="progressbar">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-success"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-secondary  me-md-4 me-3">
                                    <i class="bi bi-currency-exchange text-secondary" style="font-size:40px"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Penghasilan</p>
                                    @if ($terjual > 0)
                                        <span class="text-black font-w600"
                                            style="font-size: 25px">{{ number_format($penghasilan, 0, 2, '.') }}</span>
                                    @else
                                        <span class="text-black font-w600" style="font-size: 25px">Rp0</span>
                                    @endif
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-secondary" style="width: 100%; height:5px;"
                                    aria-label="Progess-secondary" role="progressbar">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-secondary"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-danger me-md-4 me-3">
                                    <i class="bi bi-person-fill-check text-danger" style="font-size: 40px"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Mahasiswa</p>
                                    <span class="title text-black font-w600">{{ $mhs }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-danger" style="width: 100%; height:5px;"
                                    aria-label="Progess-danger" role="progressbar">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-danger"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-warning  me-md-4 me-3">
                                    <i class="bi bi-person-fill text-warning" style="font-size: 40px;"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Non Mahasiswa</p>
                                    <span class="title text-black font-w600">{{ $non }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-warning" style="width: 100%; height:5px;" role="progressbar">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-warning"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-gra"
                        style=" box-shadow: 0 1px 8px rgb(153 153 153 / 20%), 0 3px 4px rgb(255 255 255 / 14%), 0 3px 3px -2px rgb(255 255 255 / 12%);">
                        <div class="card-body">
                            <div class="row d-flex">
                                <div class="col-md-8">
                                    <img src="{{ asset('logo.png') }}" width="150" alt="">
                                    <p class="mb-5 mt-1">{{ date('F') }} {{ date('d') }},
                                        {{ date('Y') }}</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('bg/student.png') }}" width="100%" alt="">
                                </div>
                            </div>

                            <div class="mt-5">
                                <h5 class="mb-0" style="color: #008eff">Selamat Datang, {{ Auth::user()->name }}!</h5>
                                <span>Anda login sebagai {{ Auth::user()->role }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
