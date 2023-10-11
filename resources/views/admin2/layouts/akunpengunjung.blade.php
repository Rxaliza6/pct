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
                                <a href="#">Akun</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Akun Pengunjung</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Akun Pengunjung</h4>
                                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                            data-target="#tambah">
                                            <i class="fa-solid fa-circle-plus" style="color: #ffffff;"></i>
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th style="width: 1%">No</th>
                                                    <th style="width: 1%">ID</th>
                                                    <th style="width: 10%">Nama</th>
                                                    <th style="width: 10%">Role</th>
                                                    <th style="width: 3%">No Hp</th>
                                                    <th style="width: 9%">Kecamatan</th>
                                                    <th style="width: 15%">Alamat</th>
                                                    <th style="width: 5%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($akunpengunjung as $data)
                                                    <tr class="text-center">
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ !is_null($data->nama) ? $data->nama : '-' }}</td>
                                                        <td>{{ $data->role }}</td>
                                                        <td>{{ !is_null($data->no_hp) ? $data->no_hp : '-' }}</td>
                                                        <td>{{ !is_null($data->kecamatan_id) ? $data->relasikecamatan->kecamatan : '-' }}
                                                        </td>
                                                        <td>{{ !is_null($data->alamat) ? $data->alamat : '-' }}</td>
                                                        <td>
                                                            <!-- Tombol -->
                                                            <div class="form-button-action">
                                                                <!-- Tombol Edit -->
                                                                <button type="button" class="btn btn-link btn-lg"
                                                                    data-toggle="modal"
                                                                    data-target="#edit{{ $data->id }}">
                                                                    <i class="fa-solid fa-pencil"
                                                                        style="color: #094dc3;"></i>
                                                                </button>
                                                                <!-- Tombol Detail -->
                                                                <button type="button" data-toggle="modal"
                                                                    data-target="#detail{{ $data->id }}"
                                                                    class="btn btn-link btn-danger">
                                                                    <i class="fa-solid fa-calendar-week"
                                                                        style="color: #068827;"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Moda Edit Akun Pengunjung -->
                                                    <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">Edit Akun
                                                                            Pengunjung</span>
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="/data-akun-pengunjung/{{ $data->id }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <!-- Form edit -->
                                                                        <div class="form-edit">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-floating mb-3">
                                                                                        <input class="form-control"
                                                                                            type="text"
                                                                                            name="nama"
                                                                                            placeholder="nama"
                                                                                            value="{{ $data->nama }}"
                                                                                            required>
                                                                                        <label for="floatingInput"
                                                                                            name="nama">Nama</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 pr-0">
                                                                                    <div class="form-floating mb-3">
                                                                                        <input class="form-control"
                                                                                            type="text"
                                                                                            name="no_hp"
                                                                                            placeholder="No HP"
                                                                                            value="{{ $data->no_hp }}"
                                                                                            required>
                                                                                        <label for="floatingInput"
                                                                                            name="no_hp">No HP</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <select class="form-select"
                                                                                        aria-label="Default select example"
                                                                                        name="kecamatan_id">
                                                                                        <option value="">Pilih
                                                                                            Kecamatan</option>
                                                                                        @foreach ($kecamatans as $kecamatanss)
                                                                                            <option
                                                                                                value="{{ $kecamatanss->id }}"
                                                                                                {{ $kecamatanss->id == $data->kecamatan_id ? 'selected' : '' }}>
                                                                                                {{ $kecamatanss->kecamatan }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-floating mb-3">
                                                                                        <input class="form-control"
                                                                                            type="text"
                                                                                            name="alamat"
                                                                                            placeholder="Alamat"
                                                                                            value="{{ $data->alamat }}"
                                                                                            required>
                                                                                        <label for="floatingInput"
                                                                                            name="alamat">Alamat</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 pr-0">
                                                                                    <div class="form-floating mb-3">
                                                                                        <input class="form-control"
                                                                                            type="text"
                                                                                            name="email"
                                                                                            placeholder="Email"
                                                                                            value="{{ $data->email }}"
                                                                                            required>
                                                                                        <label for="floatingInput"
                                                                                            name="email">Email</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-floating mb-3">
                                                                                        <input class="form-control"
                                                                                            type="text"
                                                                                            name="password"
                                                                                            placeholder="Password"
                                                                                            value="" required>
                                                                                        <label for="floatingInput"
                                                                                            name="password">Password</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="modal-footer d-flex justify-content-center">
                                                                        <input type="submit" value="Ubah"
                                                                            class="btn btn-primary">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal Edit Akun Pengunjung -->

                                                    <!-- Modal Detail Akun Pengunjung-->
                                                    <div class="modal fade" id="detail{{ $data->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">Detail Akun
                                                                            Pengunjung</span>
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div
                                                                        class="row mb-3 d-flex justify-content-center">
                                                                        <div class="col-4">
                                                                            <p>ID Akun</p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p>: {{ $data->id }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row mb-3 d-flex justify-content-center">
                                                                        <div class="col-4">
                                                                            <p>Nama</p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p>: {{ !is_null($data->nama) ? $data->nama : '-' }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row mb-3 d-flex justify-content-center">
                                                                        <div class="col-4">
                                                                            <p>No HP</p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p>: {{ !is_null($data->no_hp) ? $data->no_hp : '-' }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row mb-3 d-flex justify-content-center">
                                                                        <div class="col-4">
                                                                            <p>Provinsi</p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p>: {{ $data->provinsi }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row mb-3 d-flex justify-content-center">
                                                                        <div class="col-4">
                                                                            <p>Kota</p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p>: {{ $data->kota }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row mb-3 d-flex justify-content-center">
                                                                        <div class="col-4">
                                                                            <p>Kecamatan</p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p>: {{ !is_null($data->kecamatan_id) ? $data->relasikecamatan->kecamatan : '-' }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row mb-3 d-flex justify-content-center">
                                                                        <div class="col-4">
                                                                            <p>Alamat</p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p>: {{ !is_null($data->alamat) ? $data->alamat : '-' }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row mb-3 d-flex justify-content-center">
                                                                        <div class="col-4">
                                                                            <p>Email</p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p>: {{ $data->email }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="modal-footer d-flex justify-content-center">
                                                                        <form
                                                                            action="/data-akun-pengunjung/{{ $data->id }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <input type="submit"
                                                                                class="btn btn-primary"
                                                                                value="Hapus">
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Modal Detail Akun Pengunjung -->
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



    <!-- Modal Tambah Akun Pengunjung-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">Tambah Akun Pengunjung</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/data-akun-pengunjung/tambah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-tambah">
                            <!-- Form Tambah -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="nama" placeholder="nama"
                                            required>
                                        <label for="floatingInput" name="nama">Nama</label>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="no_hp"
                                            placeholder="No HP" required>
                                        <label for="floatingInput" name="no_hp">No HP</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example"
                                        name="kecamatan_id">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($kecamatan as $kecamatan)
                                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="alamat"
                                            placeholder="Alamat" required>
                                        <label for="floatingInput" name="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="email"
                                            placeholder="Email" required>
                                        <label for="floatingInput" name="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="password"
                                            placeholder="Password" required>
                                        <label for="floatingInput" name="password">Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" value="Tambah" class="btn btn-primary">
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- End Modal Tambah -->

    <!--   Core JS Files   -->
    @include('admin2.includes.script')
    <!-- End JS Files -->


    <!-- <script>
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    </script> -->

    @if ($errors->has('email'))
        <script>
            swal({
                icon: 'error',
                title: 'Gagal',
                text: "{{ $errors->first('email') }}"
            });
        </script>
    @endif

    @if ($errors->has('password'))
        <script>
            swal({
                icon: 'error',
                title: 'Gagal',
                text: "{{ $errors->first('password') }}"
            });
        </script>
    @endif
    @if ($errors->has('nama'))
        <script>
            swal({
                icon: 'error',
                title: 'Gagal',
                text: "{{ $errors->first('nama') }}"
            });
        </script>
    @endif
    @if ($errors->has('no_hp'))
        <script>
            swal({
                icon: 'error',
                title: 'Gagal',
                text: "{{ $errors->first('no_hp') }}"
            });
        </script>
    @endif
    @if ($errors->has('alamat'))
        <script>
            swal({
                icon: 'error',
                title: 'Gagal',
                text: "{{ $errors->first('alamat') }}"
            });
        </script>
    @endif
    @if ($errors->has('kecamatan_id'))
        <script>
            swal({
                icon: 'error',
                title: 'Gagal',
                text: "{{ $errors->first('kecamatan_id') }}"
            });
        </script>
    @endif

</body>

</html>
