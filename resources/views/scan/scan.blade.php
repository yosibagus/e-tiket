<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        #video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #qr-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border: 2px solid #FFF;
            box-shadow: 0 0 0 2000px rgba(0, 0, 0, 0.5);
            pointer-events: none;
        }

        #logo {
            position: absolute;
            top: 20px;
            /* Menempatkan gambar di atas bagian atas */
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: auto;
            z-index: 1;
        }

        #scan-text {
            color: #FFF;
            font-size: 24px;
            margin-top: 10px;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div id="video-container">
        <img id="logo" src="https://turbo-main.my.id/logo/ufest.png" alt="Logo">
        <video id="video"></video>
        <div id="qr-box"></div>
        <div id="scan-text" class="text-center">
            <small>{{ Auth::user()->name }}</small>
            <p style="font-size: 10px;">Validator Elektronik Tiket</p>
        </div>
    </div>

    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        const scanner = new Instascan.Scanner({
            video: document.getElementById('video'),
            mirror: false,
            scanPeriod : 2
        });
        scanner.addListener('scan', function(content) {
            $.ajax({
                type: "POST",
                url: "{{ url('scan') }}/" + content,
                dataType: 'json',
                success: function(data) {
                    if (data.pesan == 404) {
                        alert('qr tidak sah / tidak ditemukan');
                    } else if (data.pesan == 500) {
                        alert('e-tiket sudah digunakan');
                    } else if (data.pesan == 200) {
                        alert('QR Code Result: ' + content);
                    }
                }
            })
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('Kamera tidak di izinkan');
            }
        }).catch(function(e) {
            console.error(e);
        });

        function adjustQrBoxSize() {
            const video = document.getElementById('video');
            const videoRatio = video.videoWidth / video.videoHeight;
            const qrBox = document.getElementById('qr-box');
            const qrBoxWidth = video.offsetWidth * 0.6;
            qrBox.style.width = qrBoxWidth + 'px';
            qrBox.style.height = (qrBoxWidth / videoRatio) + 'px';
        }

        document.getElementById('video').addEventListener('loadedmetadata', adjustQrBoxSize);
        window.addEventListener('resize', adjustQrBoxSize);
    </script>
</body>

</html>
