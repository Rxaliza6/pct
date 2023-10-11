<!-- ======= Header ======= -->
@include('pengunjung.includes.header')
<!-- End Header -->

<body>
    @include('sweetalert::alert')
    <!-- ======= Navbar ======= -->
    @include('pengunjung.includes.navbar')
    <!-- End Navbar -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>CV Permata Cahaya
                            Tanisga</span></h2>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Butuh Jasa Service AC?</h2>
                    <!-- <p class="animate__animated animate__fadeInUp">Kami melayani Service AC disekitaran Kota Pontianak</p> -->
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Butuh Jasa Pencucian AC?</h2>
                    <!-- <p class="animate__animated animate__fadeInUp">Kami melayani Pencucian AC disekitaran Kota Pontianak</p> -->
                </div>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Tentang Section ======= -->
        <section class="services" id="tentang">
            <div class="container">
                <div class="section-title">
                    <h2>Tentang <img src="assets/img/logo3.png" style="width:180px;"></h2>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="d-flex align-items-stretch justify-content-center" data-aos="fade-up">
                        <div class="icon-box">
                            <!-- <div class="icon"></div> -->
                            <h4 class="title"><a href="">CV Permata Cahaya Tanisga</a></h4>
                            <p class="description">CV Permata Cahaya Tanisga adalah badan usaha yang bergerak di bidang
                                jasa service dan pencucian AC. Badan usaha ini berlokasi di Jl. Tabrani Ahmad, Komplek
                                Palem Indah No. C28, Kecamatan Pontianak Barat, Kota Pontianak, Kalimantan Barat. CV
                                Permata Cahaya Tanisga telah berpengalaman dalam menyediakan layanan service dan
                                pencucian AC.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
                            <h4 class="title"><a href="">Aksi</a></h4>
                            <p class="description">Kami selalu berusaha menghadirkan pelayanan secepat mungkin kerumah
                                anda. Teknisi kami adalah profesional di bidangnya masing-masing.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
                            <h4 class="title"><a href="">Pelayanan</a></h4>
                            <p class="description">Kami selalu memberikan pelayanan yang terbaik untuk anda dan kepuasan
                                anda adalah prioritas kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Tentang Section -->

        <!-- ======= Layanan Section ======= -->
        <section class="features" id="layanan">
            <div class="container">

                <div class="section-title">
                    <h2>Layanan Kami</h2>
                    <p>CV Permata Cahaya Tanisga Memberikan Layanan Untuk Memudahkan Anda Mendapatkan Layanan Terbaik
                        Yang Dapat Melayani Anda Dengan Baik.</p>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="assets/img/service.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-4">
                        <h3>Service AC</h3>
                        <p class="fst-italic">
                            "Kesejukan Menyapa, Layanan AC dari Permata Cahaya Tanisga."
                        </p>
                        <p>
                            Dalam suasana panas yang menggigit, layanan AC dari CV Permata Cahaya Tanisga hadir sebagai
                            penyelamat. Seperti sinar permata yang bersinar terang, kami memastikan udara di ruangan
                            Anda tetap sejuk dan nyaman. Dengan tim teknisi yang berpengalaman dan penuh dedikasi,
                            setiap permasalahan AC Anda akan kami tangani dengan teliti, sehingga Anda dapat menikmati
                            udara segar seolah berada di tengah hutan yang rimbun.
                        </p>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="assets/img/cuci.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1">
                        <h3>Pencucian AC</h3>
                        <p class="fst-italic">
                            "Kebersihan yang Berkilau, Layanan Pencucian AC dari CV Permata Cahaya Tanisga"
                        </p>
                        <p>
                            Dalam semilir udara yang jernih, layanan pencucian AC dari CV Permata Cahaya Tanisga hadir
                            untuk memberikan sentuhan kebersihan yang mendalam. Seperti aksen kilau permata yang
                            memikat, tim kami merawat setiap detil AC Anda dengan teliti, menghilangkan jejak debu dan
                            kotoran yang dapat mengganggu kualitas udara di sekitar Anda. Dengan penuh dedikasi, kami
                            memastikan bahwa AC tidak hanya berfungsi lebih efisien, tetapi juga menghembuskan udara
                            segar yang menginspirasi kehidupan yang lebih sehat.
                        </p>
                    </div>
                </div>
                <section class="services" id="tentang">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon-box">
                                    <h4 class="title"><a href="">Tambah Freon</a></h4>
                                    <p class="description">Mulai dari Rp 150.000 - Rp 250.000</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <h4 class="title"><a href="">Isi Ulang Freon</a></h4>
                                    <p class="description">Mulai dari Rp 250.000 - Rp 450.000</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <h4 class="title"><a href="">Bongkar Pasang AC</a></h4>
                                    <p class="description">Mulai dari Rp 100.000 - Rp 425.000</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <h4 class="title"><a href="">Cuci AC</a></h4>
                                    <p class="description">Mulai dari Rp 60.000 - Rp 75.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section><!-- End Layanan Section -->

        <!-- ======= Teknisi Section ======= -->
        <section class="services" id="teknisi">
            <div class="container">
                <div class="section-title">
                    <h2>Teknisi</h2>
                </div>
                <div class="row">
                    @foreach ($teknisi as $data)
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch d-flex justify-content-center" data-aos="fade-up"
                            data-aos-delay="100">
                            <div class="icon-box p-0">
                                <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
                                <h4 class="title"><img src="{{ asset('fototeknisi/' . $data->foto) }}" alt="Foto Teknisi"
                                        style="width: 100%;"></h4>
                                <p class="fw-bold mb-2"> {{ $data->nama_teknisi }} </p>
                                <p class="mb-0"> {{ $data->bidang }} </p>
                                <p> {{ $data->relasikecamatan->kecamatan }} </p>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Teknisi Section -->

        <!-- ======= Hubungi Section ======= -->
        <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500"
            id="hubungi">
            <div class="container">
                <div class="section-title">
                    <h2>Hubungi Kami</h2>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="fa-solid fa-map-pin fa-fade"></i>
                                    <h3>Alamat Kami</h3>
                                    <p>Jl. Tabrani Ahmad, Komp. Palem Indah No. C28, Kota Pontianak, Kalimantan Barat
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="fa-solid fa-envelope fa-fade"></i>
                                    <h3>Email Kami</h3>
                                    <p>info@example.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="fa-solid fa-phone-volume fa-fade"></i>
                                    <h3>Hubungi Kami</h3>
                                    <p>+62 821-5102-5551</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="fa-solid fa-cart-shopping fa-fade"></i>
                                    <h3>Pesan Sekarang</h3>
                                    <a href="/form-pesanan">Klik disini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Hubungi Section -->

        <!-- ======= Map Section ======= -->
        <section class="map mt-2">
            <div class="container-fluid p-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8179253938033!2d109.29442101524045!3d-0.0254936355584944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d58c570d15e03%3A0x36395e4623120506!2sJl.%20Komp.%20Palem%20Indah%2C%20Pal%20Lima%2C%20Kec.%20Pontianak%20Bar.%2C%20Kota%20Pontianak%2C%20Kalimantan%20Barat%2078244!5e0!3m2!1sid!2sid!4v1679610307984!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section><!-- End Map Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('pengunjung.includes.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- ======= Script ======= -->
    @include('pengunjung.includes.script')
    <!-- End Script -->

    @if (auth()->check())
        <!-- Push Notification -->
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
        <script>
            const firebaseConfig = {
                apiKey: "AIzaSyART3iswf6FW03fWxUftkGdw2vVHb3bPvM",
                authDomain: "pc-tanisga.firebaseapp.com",
                projectId: "pc-tanisga",
                storageBucket: "pc-tanisga.appspot.com",
                messagingSenderId: "511490457421",
                appId: "1:511490457421:web:d209314e88662daf718104",
                measurementId: "G-2J4Z85R8MY"
            };
            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(response) {
                    console.log(response)
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('notif') }}',
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            console.log('Token disimpan.');
                            console.log(response);
                        },
                        error: function(error) {
                            console.log(error);
                        },
                    });
                }).catch(function(error) {
                    alert(error);
                });
            messaging.onMessage(function(payload) {
                const title = payload.notification.title;
                const options = {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                };
                new Notification(title, options);
            });
        </script>
    @endif

</body>

</html>
