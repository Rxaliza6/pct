<!-- ======= Header ======= -->
@include("pengunjung.includes.header")
<!-- End Header -->

<body>
@include('sweetalert::alert')
  <!-- ======= Navbar ======= -->
  @include("pengunjung.includes.navbar")
  <!-- End Navbar -->

  <!-- ======= Form Pemesanan ======= -->
  <section class="pemesanan-lain" id="pesanan">
    <div class="container">
      <div class="section-title">
        <h2>Form Pemesanan</h2>
      </div>
      <div class="d-flex justify-content-center">
        <div class="d-flex align-items-stretch justify-content-center" data-aos="fade-up">
          <div class="icon-box rounded-5">
            <div class="container text-center">
              <form action="/form-pesanan-lain/tambah/{{ $id }}" method="POST">
                @csrf
                <div class="row g-1">
                  <div class="p-2">
                    <div class="form-floating">
                      <input type="text" class="form-control rounded-4" id="floatingInput" name="nama" placeholder="name@example.com" required>
                      <label for="floatingInput">Nama Lengkap</label>
                    </div>
                  </div>
                  <div class="p-2">
                    <div class="form-floating">
                      <input type="number" class="form-control rounded-4" id="floatingInput" name="no_hp" placeholder="name@example.com" required>
                      <label for="floatingInput">No Handphone</label>
                    </div>
                  </div>
                  <div class="p-2">
                    <div class="form-floating">
                      <textarea type="text" class="form-control rounded-4" id="floatingInput" name="alamat" style="height: 150px;" placeholder="name@example.com" required></textarea>
                      <label for="floatingInput">Detail Alamat</label>
                    </div>
                  </div>
                  <div class="p-2">
                    <div class="form-floating">
                      <input type="text" class="form-control rounded-4" id="floatingInput" name="keterangan" placeholder="name@example.com" required>
                      <label for="floatingInput">Keterangan</label>
                    </div>
                  </div>
                  <div class="p-2">
                    <div class="form-floating">
                      <input type="number" class="form-control rounded-4" id="floatingInput" name="jumlah_ac" placeholder="name@example.com" required>
                      <label for="floatingInput">Jumlah AC</label>
                    </div>
                  </div>
                </div>
                <div class="container mt-2 d-flex justify-content-center">
                  <div class="row mt-3 mb-3">
                    <div class="batal col-6">
                      <a href="/form-pesanan" class="btn btn-secondary d-flex justify-content-center align-items-center">
                        Batal
                      </a>
                    </div>
                    <div class="ubah col-6">
                      <button type="submit" class="btn-primary">Pesan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Form Pemesanan -->



  <!-- ======= Footer ======= -->
  @include("pengunjung.includes.footer")
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- ======= Script ======= -->
  @include("pengunjung.includes.script")
  <!-- End Script -->

  <!-- Sweet Alert -->
  <script>
    $('.swa_btn_pesan').click(function(e) {
      e.preventDefault();
      swal("Pesanan berhasil dikirimkan.", "Silahkan tunggu konfirmasi dari Teknisi.", "success");
    });
  </script>



</body>

</html>