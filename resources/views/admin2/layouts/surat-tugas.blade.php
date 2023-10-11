<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Surat Tugas</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/PCT.png" type="image/png" />

    <!-- Fonts and icons -->
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['../../assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/fa23b267c2.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/atlantis.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/admin2.css" rel="stylesheet">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../../assets/css/demo.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;1,300;1,900&family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        /* @page {
            size: 8.3in 11.7in;
        } */
        
        .judul-surat {
            text-align: center;
            text-decoration: underline;
            font-size: 30px;
        }

        .halaman-surat {
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid black;
            padding: 30px;
            width: 275mm;
            height: 415mm;
            margin: 30px;
        }

        .halaman-surat .ttd {
            width: 20%;
        }

        .halaman-surat .container {
            width: 300px;
            height: 200px;
        }

        .halaman-surat p {
            margin-bottom: 0px;
        }
        .isi{
            font-size: 24px;
        }
        
    </style>
</head>

<body class="surat d-flex justify-content-center">
    <div class="halaman-surat">
        <!-- Header Surat -->
        <h3 class="text-center fw-bold">CV PERMATA CAHAYA TANISGA</h3>
        <h6 class="text-center fw-semibold">Jl. Tabrani Ahmad Komp. Palem Indah No. C28, Kota Pontianak</h6>
        <hr class="border-2">

        <!-- Judul Surat -->
        <br>
        <h5 class="judul-surat text-center mt-5 fw-bold">SURAT TUGAS</h5>

        <!-- Data Teknisi -->
        <div class="data-teknisi mx-5 mt-5">
            <h6 class="isi mt-5">Kepada:</h6>
            <div class="row d-flex justify-content-center">
                <div class="col-3">
                    <p class="isi">Nama</p>
                </div>
                <div class="col-1 d-flex justify-content-end">
                    <p class="isi">:</p>
                </div>
                <div class="col-7">
                    <p class="isi">{{ $pesanan->relasiteknisi->nama_teknisi }}</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-3">
                    <p class="isi">Jabatan</p>
                </div>
                <div class="col-1 d-flex justify-content-end">
                    <p class="isi">:</p>
                </div>
                <div class="col-7">
                    <p class="isi">Teknisi</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-3">
                    <p class="isi">No Hp</p>
                </div>
                <div class="col-1 d-flex justify-content-end">
                    <p class="isi">:</p>
                </div>
                <div class="col-7">
                    <p class="isi">{{ $pesanan->relasiteknisi->no_hp }}</p>
                </div>
            </div>

            <!-- Data Pesanan -->
            <div class="data-pesanan">
                <h6 class="isi mt-4">Untuk melaksanakan tugas pada alamat:</h6>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">Nama</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->nama }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">No. HP</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->no_hp }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">Kecamatan</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->relasikecamatan->kecamatan }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">Alamat</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->alamat }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">Teknisi</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->relasiteknisi->nama_teknisi }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">Tanggal Datang</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->tanggal_datang }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">Waktu Datang</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->relasiwaktu->waktu_datang }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">Keterangan</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->keterangan }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <p class="isi">Jumlah AC</p>
                    </div>
                    <div class="col-1 d-flex justify-content-end">
                        <p class="isi">:</p>
                    </div>
                    <div class="col-7">
                        <p class="isi">{{ $pesanan->jumlah_ac }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Penutup Surat -->
        <div class="penutup-surat mx-5">
            <h6 class="isi mt-5 mb-5">Demikian surat ini diberikan agar dapat dilaksanakan dengan penuh tanggung jawab serta memberikan laporan setelah selesai tugas. Terima Kasih.</h6>
        </div>

        <!-- TTD Surat -->
        <div class="ttd-surat mx-5">
            <br>
            <div class="container ml-5">
                <div class="form-ttd mr-5">
                    <h6 class="isi">Pontianak, 20 Desember 2023</h6>
                    <h6 class="isi">Pimpinan,</h6>
                    <div class="isi">
                        <img src="/assets/img/admin/ttd.png" alt="" class="ttd">
                    </div>
                    <h6 class="isi">Donny David Irwansyah</h6>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>