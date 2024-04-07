<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> e-Tiket {{ $detail->nama_pembeli }} &raquo; UNIBA MADURA FESTIVAL 2024 </title>
    <meta name="Author" content="Yosi Bagus Sadar Rasuli">
    <meta name="Description" content="Akar Rumput dan Darah Daging Informatika">
    <meta name="keywords" content="Turbo.main, UNIBA Madura, Informatika Uniba Madura, Yosi Bagus">
    <meta name="image"content="{{ asset('konse.jpg') }}">
    <meta property="og:image" content="{{ asset('konse.jpg') }}">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('tiket.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
    <style>
        .botao {
            width: 125px;
            height: 45px;
            border-radius: 20px;
            border: none;
            box-shadow: 1px 1px rgba(107, 221, 215, 0.37);
            padding: 5px 10px;
            background: rgb(47, 93, 197);
            background: linear-gradient(160deg, rgba(47, 93, 197, 1) 0%, rgba(46, 86, 194, 1) 5%, rgba(47, 93, 197, 1) 11%, rgba(59, 190, 230, 1) 57%, rgba(0, 212, 255, 1) 71%);
            color: #fff;
            font-family: Roboto, sans-serif;
            font-weight: 505;
            font-size: 16px;
            line-height: 1;
            cursor: pointer;
            filter: drop-shadow(0 0 10px rgba(59, 190, 230, 0.568));
            transition: .5s linear;
        }

        .botao .mysvg {
            display: none;
        }

        .botao:hover {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            transition: .5s linear;
        }

        .botao:hover .texto {
            display: none;
        }

        .botao:hover .mysvg {
            display: inline;
        }

        .botao:hover::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            width: 100%;
            height: 100%;
            border: 3.5px solid transparent;
            border-top: 3.5px solid #fff;
            border-right: 3.5px solid #fff;
            border-radius: 50%;
            animation: animateC 2s linear infinite;
        }

        @keyframes animateC {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div style="text-align: center;width:100%; margin-top:20px; margin-bottom:10px;">
        <button class="botao" id="download">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="mysvg">
                <g id="SVGRepo_bgCarrier" stroke-width="0">
                </g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g id="Interface / Download">
                        <path id="Vector" d="M6 21H18M12 3V17M12 17L17 12M12 17L7 12" stroke="#f1f1f1"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </g>
                </g>
            </svg>
            <span class="texto">Download</span>
        </button>
    </div>

    <div class="m-ticket" id="photo">

        <p class="m">E-Tiket</p>

        <div class="movie-details">
            <img src="{{ asset('konse.jpg') }}" class="poster">

            <div class="movie">
                <h4><img src="{{ asset('logo.png') }}" width="120" alt=""></h4>
                <p>2ND UNIBA FESTIVAL 2024</p>
                <p>24 Mei | 16:45 PM</p>
                <p>Lap. Basket UNIBA Madura</p>
            </div>

        </div>

        <div class="info">
            Jaga kerahasiaan e-tiket, karena e-tiket hanya bisa digunakan 1 kali
        </div>

        <div class="ticket-details">
            {!! QrCode::size(150)->generate($detail->token_tiket) !!}

            <div class="ticket">
                <p style="margin-top: 15px;">Tiket Masuk</p>

                <b>
                    {{ $detail->tipe == 'mhs' ? 'Mahasiswa' : 'Reguler' }}
                </b>

                <p>{{ $detail->nama_pembeli }}</p>

                <h6>BOOKING ID: {{ $detail->kode_tiket }}</h6>

            </div>

        </div>

        <div class="info-cancel">
            SUPPORTED BY
        </div>

        <div class="total-amount" style="text-align: center">
            <p>
                <img src="{{ asset('sponsor/xten.jpg') }}" width="30" alt="">
                <img src="{{ asset('sponsor/pojur.jpg') }}" width="80" alt="">
                <img src="{{ asset('sponsor/kabarmadura.png') }}" width="55" alt=""> &nbsp;
                {{-- <img src="{{ asset('sponsor/turbo.png') }}" width="30" alt=""> --}}
            </p>
        </div>

    </div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery("#download").click(function() {
                screenshot();
            });
        });

        var nama_file = "{{ $detail->nama_pembeli }}" + " - Elektronik Tiket.png";

        function screenshot() {
            html2canvas(document.querySelector(
                "#photo"), { 
                scale: 2, 
                backgroundColor: null,
                useCORS: true 
            }).then(function(canvas) {
                var ctx = canvas.getContext("2d");
                ctx.shadowOffsetX = 5; 
                ctx.shadowOffsetY = 5;
                ctx.shadowBlur = 10; 
                ctx.shadowColor = "rgba(0, 0, 0, 0.3)"; 
                downloadImage(canvas.toDataURL(), nama_file); 
            });
        }

        function downloadImage(uri, filename) {
            var link = document.createElement('a');
            if (typeof link.download !== 'string') {
                window.open(uri);
            } else {
                link.href = uri;
                link.download = filename;
                accountForFirefox(clickLink, link);
            }
        }

        function clickLink(link) {
            link.click();
        }

        function accountForFirefox(click) {
            var link = arguments[1];
            document.body.appendChild(link);
            click(link);
            document.body.removeChild(link);
        }
    </script>
</body>

</html>
