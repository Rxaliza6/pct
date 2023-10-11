<!-- ======= Header ======= -->
@include('pengunjung.includes.header')
<!-- End Header -->

<body>
    @include('sweetalert::alert')
    <!-- ======= Navbar ======= -->
    @include('pengunjung.includes.navbar')
    <!-- End Navbar -->


    <!-- ======= Profi ======= -->
    <section class="profil mb-5" id="profil">
        <div class="log-out d-flex justify-content-end mt-5">
            <a href="/logout">
                <button>
                    Log Out
                </button>
            </a>
        </div>
        <div class="title d-flex justify-content-center">
            <p>PROFIL</p>
        </div>
        <!-- Card -->
        <div class="profil-card mt-2 p-0 d-flex justify-content-center">
            <div class="card" style="width: 90%;">
                <div class="card-body">
                    <div class="card-title">
                        <!-- Nav & Tabs -->
                        <div class="button-group d-flex justify-content-center">
                            <ul class="nav nav-tabs">
                                <li class="nav-item" role=presentation>
                                    <button class="nav-link text-dark {{ Session::has('gagal') ? '' : 'active' }}"
                                        data-bs-toggle="tab" id="akun-tab" type="button" data-bs-target="#akun"
                                        role="tab" aria-controls="akun" aria-selected="true">Profil</button>
                                </li>
                                <li class="nav-item" role=presentation>
                                    <button class="nav-link text-dark {{ Session::has('gagal') ? 'active' : '' }}"
                                        data-bs-toggle="tab" id="ubah-tab" type="button" data-bs-target="#ubah"
                                        role="tab" aria-controls="ubah" aria-selected="true">Ubah Profil</button>
                                </li>
                                <li class="nav-item" role=presentation>
                                    <button class="nav-link text-dark" data-bs-toggle="tab" id="riwayat-tab"
                                        type="button" data-bs-target="#riwayat" role="tab" aria-controls="riwayat"
                                        aria-selected="true">Riwayat</button>
                                </li>
                            </ul>
                        </div>
                        <!-- Isi Tabs -->
                        <div class="tab-content mt-4" id="myTabControl">
                            <!-- Profil -->
                            <div class="tab-pane fade show {{ Session::has('gagal') ? '' : 'active' }}" role="tabpanel"
                                id="akun" aria-labelledby="akun-tab" style="font-size: 12px;">
                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-4">
                                        <p>Nama</p>
                                    </div>
                                    <div class="col-7">
                                        <p>
                                            {{ Auth::user()->nama ? (Auth::user()->nama ?: '(Nama tidak tersedia)') : '(Harap diisi)' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-4">
                                        <p>No. HP</p>
                                    </div>
                                    <div class="col-7">
                                        <p>
                                            {{ Auth::user()->no_hp ? (Auth::user()->no_hp ?: '(No HP tidak tersedia)') : '(Harap diisi)' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-4">
                                        <p>Provinsi</p>
                                    </div>
                                    <div class="col-7">
                                        <p>{{ Auth::user()->provinsi }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-4">
                                        <p>Kota</p>
                                    </div>
                                    <div class="col-7">
                                        <p>{{ Auth::user()->kota }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-4">
                                        <p>Kecamatan</p>
                                    </div>
                                    <div class="col-7">
                                        <p>
                                            {{ Auth::user()->kecamatan_id ? (Auth::user()->relasikecamatan ? Auth::user()->relasikecamatan->kecamatan : '(Kecamatan tidak tersedia)') : '(Harap diisi)' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-4">
                                        <p>Alamat</p>
                                    </div>
                                    <div class="col-7">
                                        <p>
                                            {{ Auth::user()->alamat ? (Auth::user()->alamat ?: '(Alamat tidak tersedia)') : '(Harap diisi)' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-4">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-7">
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Ubah Akun -->
                            <div class="tab-pane fade show {{ Session::has('gagal') ? 'active' : '' }}" role="tabpanel"
                                id="ubah" aria-labelledby="ubah-tab">
                                <!-- Form Ubah Profil -->
                                <form action="/profil/{{ auth()->user()->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-ubah" style="font-size: 12px;">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" name="nama"
                                                value="{{ Auth::user()->nama }}" placeholder="Nama"
                                                style="border-radius: 20px; font-size:14px;" required>
                                            <label for="floatingInput">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" name="no_hp"
                                                value="{{ Auth::user()->no_hp }}" placeholder="name@example.com"
                                                style="border-radius: 20px; font-size:14px;" required>
                                            <label for="floatingInput">No HP</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example"
                                                name="kecamatan_id" style="border-radius: 20px; font-size:14px;"
                                                required>
                                                <option value="" disabled selected>Pilih Kecamatan</option>
                                                @foreach ($kecamatans as $kecamatanss)
                                                    <option value="{{ $kecamatanss->id }}"
                                                        {{ $kecamatanss->id == Auth::user()->kecamatan_id ? 'selected' : '' }}>
                                                        {{ $kecamatanss->kecamatan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea type="text" class="form-control" id="floatingInput" name="alamat" value="" placeholder="text"
                                                style="border-radius: 20px; font-size:14px; height: 100px;" required>{{ Auth::user()->alamat }}</textarea>
                                            <label for="floatingPassword">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput"
                                                name="email" value="{{ Auth::user()->email }}"
                                                placeholder="name@example.com"
                                                style="border-radius: 20px; font-size:14px;" required>
                                            <label for="floatingInput">Email</label>
                                        </div>
                                        <p class="text-danger">*masukkan password lama jika tidak merubah
                                            password/masukkan pasword baru jika merubah password</p>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingPassword"
                                                name="password" value="" placeholder="Password"
                                                style="border-radius: 20px; font-size:14px;" required>
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                        <!-- Tombol -->
                                        <div class="tombol-ubah d-flex justify-content-center">
                                            <div class="row mt-3 mb-3">
                                                <div class="batal col-6">
                                                    <a href="/profil/{{ auth()->user()->id }}">
                                                        <button>
                                                            Batal
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="ubah col-6">
                                                    <button type="submit">
                                                        Ubah
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <!-- Riwayat Pesanan -->
                        <div class="tab-pane fade show" role="tabpanel" id="riwayat" aria-labelledby="riwayat-tab"
                            style="font-size: 13px;">
                            <div class="row mb-3 d-flex justify-content-center"
                                style="max-height: 600px; overflow: auto;">
                                <div class="tabel-riwayat">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php $i = 1; ?>
                                            @foreach ($pesanan as $data)
                                                <tr class="text-center">
                                                    <th class="align-middle" style="width: 1%;" scope="row">
                                                        {{ $i++ }}</th>
                                                    <td class="align-middle" style="width: 50%;">
                                                        {{ $data->tanggal_datang }}</td>
                                                    <td class="align-middle" style="width: 49%;">
                                                        <button class="tombol-info my-1" data-bs-toggle="modal"
                                                            data-bs-target="#infoModal{{ $data->id }}">Info</button>
                                                        <button type="button" class="btn btn-primary my-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $data->id }}"
                                                            {{ !is_null($data->ulasan) || $data->ulasan != '' ? 'disabled' : '' }}>Ulasan</button>
                                                    </td>
                                                </tr>
                                                <!-- Modal Info-->
                                                <div class="modal fade" id="infoModal{{ $data->id }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="modal-title fs-5" id="exampleModalLabel">
                                                                    Detail Lengkap</p>
                                                                <a type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Nama</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->nama }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>No. HP</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->no_hp }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Alamat</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->alamat }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Teknisi</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->relasiteknisi->nama_teknisi }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Tanggal</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->tanggal_datang }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Waktu Datang</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->relasiwaktu->waktu_datang }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Jumlah AC</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->jumlah_ac }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Harga</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ rupiah($data->harga) }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Status</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->status }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 d-flex justify-content-center">
                                                                    <div class="col-4">
                                                                        <p>Ulasan</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>{{ $data->ulasan ? ($data->ulasan ?: '(Ulasan belum diberikan)') : '(Harap isi ulasan)' }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-center">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
        </div>
    </section><!-- End Profil -->

    <!-- Modal Testimoni -->
    @foreach ($pesanan as $data)
        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="/ulasan/{{ $data->id }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ulasan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Berikan Ulasan</label>
                                <textarea class="form-control" id="message-text" style="height: 200px;" name="ulasan" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer mx-auto">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach

    <!-- ======= Footer ======= -->
    @include('pengunjung.includes.footer')
    <!-- End Footer -->


    <!-- ======= Script ======= -->
    @include('pengunjung.includes.script')
    <!-- End Script -->

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
