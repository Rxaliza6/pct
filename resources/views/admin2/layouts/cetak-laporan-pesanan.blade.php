<!-- Header -->
@include('admin2.includes.header')
<!-- End Header -->

<body>
    <div class="container mt-5">
        <h3 class="text-center mb-5">Laporan Keuangan Pesanan Alamat Sendiri</h3>
        <table id="" class="table">
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
                <?php 
                $i = 1; 
                $totalharga = 0;
                ?>
                @foreach($cetakpesanan as $data)
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
                <?php
                $totalharga += $data->harga;
                ?>
                @endforeach
                <tr class="text-center">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="fw-bold">TOTAL</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ rupiah($totalharga) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--   Core JS Files   -->
    @include('admin2.includes.script')
    <!-- End JS Files -->

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>