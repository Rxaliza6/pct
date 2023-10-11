<!-- ======= Header ======= -->
@include("pengunjung.includes.header")
<!-- End Header -->

<body>
    @include('sweetalert::alert')

    <!-- ======= Login ======= -->
    <section class="Login p-0 mt-3 mb-3">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="card" style="width: 24rem;">
                <!-- Gambar -->
                <img src="assets/img/bg.jpg" class="card-img-top" alt="..." style="height: 150px;">
                <div class="card-body">
                    <!-- Tulisan Login -->
                    <h4 class="card-title text-center mb-4 mt-2">LOGIN</h4>
                    <!-- Form Login -->
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-login">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" style="border-radius: 20px;" required>
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-1">
                                <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password" style="border-radius: 20px;" required>
                                <input type="checkbox" onclick="togglePasswordVisibility()" class=""> Tampilkan Sandi
                                <label for="floatingPassword">Password</label>
                            </div>
                        </div>
                        <!-- Tombol Login -->
                        <div class="tombol-login">
                            <div class="row text-center">
                                <div class="col-6">
                                    <a href="/" class="btn btn-secondary" style="width: 140px; height: 40px; border-radius: 20px;">Batal</a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary" style="width: 140px; height: 40px; border-radius: 20px;">Masuk</button>
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
                                    <img src="assets/img/login/google.png" alt="" style="width: 50px; height: 25px;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Daftar Akun -->
                    <div class="daftar-akun">
                        <p class="bg-secondary mt-5" style="width: 100%; height: 1px;"></p>
                        <div class="daftar d-flex justify-content-center">
                            <h6>Belum punya akun? <a href="/daftar-akun">Daftar</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login -->

    <!-- ======= Script ======= -->
    @include("pengunjung.includes.script")
    <!-- End Script -->

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