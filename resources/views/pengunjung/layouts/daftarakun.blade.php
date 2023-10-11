<!-- ======= Header ======= -->
@include('pengunjung.includes.header')
<!-- End Header -->

<body>
    @include('sweetalert::alert')

    <!-- ======= Login ======= -->
    <section class="Login p-0 mt-3 mb-3">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 24rem;">
                <!-- Gambar -->
                <img src="assets/img/bg.jpg" class="card-img-top" alt="..." style="height: 150px;">
                <div class="card-body">
                    <!-- Tulisan Daftar -->
                    <h4 class="card-title text-center mb-4 mt-2">DAFTAR AKUN</h4>
                    <!-- Form Daftar -->
                    <form action="/daftar-akun/tambah" method="POST">
                        @csrf
                        <div class="form-login">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama" class="form-control" id="floatingInput"
                                    placeholder="text" style="border-radius: 20px;">
                                <label for="floatingInput">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="no_hp" class="form-control" id="floatingInput"
                                    placeholder="text" style="border-radius: 20px;">
                                <label for="floatingInput">No Hp</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" name="kecamatan_id"
                                    style="border-radius: 20px;">
                                    <option value="" selected disabled>Pilih Kecamatan atau yang terdekat</option>
                                    @foreach ($kecamatan as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea type="text" class="form-control rounded-4" id="floatingInput" name="alamat" style="height: 100px;"
                                    placeholder="name@example.com"></textarea>
                                <label for="floatingInput">Detail Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput"
                                    placeholder="text" style="border-radius: 20px;">
                                <label for="floatingPassword">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="passwordInput"
                                    placeholder="Password" style="border-radius: 20px;">
                                <input type="checkbox" onclick="togglePasswordVisibility()" class=""> Tampilkan
                                Sandi
                                <label for="floatingPassword">Password</label>
                            </div>
                        </div>
                        <!-- Tombol Login -->
                        <div class="tombol-login mt-5">
                            <div class="row text-center">
                                <div class="col-6">
                                    <a href="/login" class="btn btn-secondary"
                                        style="width: 140px; height: 40px; border-radius: 20px;">Batal</a>
                                </div>
                                <div class="col-6">
                                    <input type="submit" value="Daftar" class="btn btn-primary"
                                        style="width: 140px; height: 40px; border-radius: 20px;">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Masuk Dengan -->
                    <div class="masuk-dengan">
                        <div class="row d-flex justify-content-center mt-3 m-0">
                            <div class="col-4">
                                <p class="bg-secondary mt-1" style="width: 80px; height: 1px;"></p>
                            </div>
                            <div class="col-4">
                                <h6 class="text-secondary" style="font-size:12px;">Masuk Dengan</h6>
                            </div>
                            <div class="col-4">
                                <p class="bg-secondary mt-1" style="width: 80px; height: 1px;"></p>
                            </div>
                        </div>
                    </div>
                    <!-- Google -->
                    <div class="google-facebook">
                        <div class="row d-flex justify-content-center mt-2">
                            <div class="col-3 p-0">
                                <a class="d-flex justify-content-center p-2" href="{{ route('auth.google') }}">
                                    <img src="assets/img/login/google.png" alt=""
                                        style="width: 50px; height: 25px;">
                                </a>
                            </div>
                        </div>
                    </div><!-- Daftar Akun -->
                    <div class="daftar-akun">
                        <p class="bg-secondary mt-5" style="width: 100%; height: 1px;"></p>
                        <div class="daftar d-flex justify-content-center">
                            <h6>Sudah punya akun? <a href="/login">Login</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login -->

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

    <!-- Tampil Password -->
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("passwordInput");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>

</body>

</html>
