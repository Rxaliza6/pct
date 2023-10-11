<!-- Header -->
@include('admin2.includes.header')
<!-- End Header -->

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <div class="main-header">

            <!-- Logo Header -->
            @include('admin2.includes.logoheader')
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            @include('admin2.includes.navbar')
            <!-- End Navbar -->

        </div>

        <!-- Sidebar -->
        @include('admin2.includes.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Administrator</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
							<li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                    <div class="container" style="height: 600px;">
                        <div class="row mt--2">
                            <div class="col-md-12">
                                <div class="card full-height">
                                    <div class="card-body">
                                        <div class="card-title fw-semibold">Status Pesanan</div>
                                        <div class="card-category">Informasi Status Pesanan Perhari Ini</div>
                                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                            <div class="px-2 pb-2 pb-md-0 text-center">
                                                <div id="dipesan"></div>
                                                <h6 class="fw-bold mt-3 mb-0">Dipesan</h6>
                                            </div>
                                            <div class="px-2 pb-2 pb-md-0 text-center">
                                                <div id="diproses"></div>
                                                <h6 class="fw-bold mt-3 mb-0">Diproses</h6>
                                            </div>
                                            <div class="px-2 pb-2 pb-md-0 text-center">
                                                <div id="selesai"></div>
                                                <h6 class="fw-bold mt-3 mb-0">Selesai</h6>
                                            </div>
                                            <div class="px-2 pb-2 pb-md-0 text-center">
                                                <div id="dibatalkan"></div>
                                                <h6 class="fw-bold mt-3 mb-0">Dibatalkan</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('admin2.includes.footer')
            <!-- End Footer -->

        </div>
    </div>

    <!--   Core JS Files   -->
    @include('admin2.includes.script')
    <!-- End JS Files -->

    <script src="/assets/js/plugin/chart-circle/circles.min.js"></script>
    <script>
        Circles.create({
            id: 'dipesan',
            radius: 50,
            value: parseInt({{ $dipesan }}),
            maxValue: parseInt({{ $max_data }}),
            width: 5,
            text: "{{ $dipesan }}",
            colors: ['#f1f1f1', '#FF5B00'],
            duration: 600,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'diproses',
            radius: 50,
            value: parseInt({{ $diproses }}),
            maxValue: parseInt({{ $max_data }}),
            width: 5,
            text: "{{ $diproses }}",
            colors: ['#f1f1f1', '#176B87'],
            duration: 600,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'selesai',
            radius: 50,
            value: parseInt({{ $selesai }}),
            maxValue: parseInt({{ $max_data }}),
            width: 5,
            text: "{{ $selesai }}",
            colors: ['#f1f1f1', '#367E18'],
            duration: 600,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'dibatalkan',
            radius: 50,
            value: parseInt({{ $dibatalkan }}),
            maxValue: parseInt({{ $max_data }}),
            width: 5,
            text: "{{ $dibatalkan }}",
            colors: ['#f1f1f1', '#DF2E38'],
            duration: 600,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
    </script>

</body>

</html>
