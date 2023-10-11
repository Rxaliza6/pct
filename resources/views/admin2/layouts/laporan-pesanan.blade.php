<!-- Header -->
@include('admin2.includes.header')
<!-- End Header -->

<body>
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
                                <a href="#">Laporan Pesanan</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Alamat Sendiri</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Pilih Tanggal</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/cetak-laporan-data-pesanan" target="_blank">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <input type="date" name="tglAwal" id="tglawal" class="form-control" required>
                                            </div>
                                            <div class="col-lg-1">
                                                <h6 class="mt-2">Sampai Tanggal</h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="date" name="tglAkhir" id="tglakhir" class="form-control" required>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn" style="background: #5A859B; color: white;">Cetak</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Laporan Pesanan Alamat Sendiri</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th style="width: 1%">No</th>
                                                    <th style="width: 1%">ID Pesanan</th>
                                                    <th style="width: 1%">ID Akun</th>
                                                    <th style="width: 15%">Nama</th>
                                                    <th style="width: 8%">Keterangan</th>
                                                    <th style="width: 10%">Teknisi</th>
                                                    <th style="width: 10%">Tanggal Datang</th>
                                                    <th style="width: 5%">Status</th>
                                                    <th style="width: 10%">Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($pesanan as $data)
                                                <tr class="text-center">
                                                    <td>{{$i++}}</td>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->akun_id }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->keterangan }}</td>
                                                    <td>{{ $data->relasiteknisi->nama_teknisi }}</td>
                                                    <td>{{ $data->tanggal_datang }}</td>
                                                    <td>{{ $data->status }}</td>
                                                    <td>{{ rupiah($data->harga) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

</body>

</html>