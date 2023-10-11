<!-- ======= Header ======= -->
@include("pengunjung.includes.header")
<!-- End Header -->

<body>
@include('sweetalert::alert')
  <!-- ======= Navbar ======= -->
  @include("pengunjung.includes.navbar")
  <!-- End Navbar -->

  <!-- ======= Form Pemesanan ======= -->
  <section class="pemesanan" id="pesanan">
    <div class="container">
      <div class="section-title">
        <h2>Form Pemesanan</h2>
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
                    <button class="nav-link text-dark active" data-bs-toggle="tab" id="akun-tab" type="button" data-bs-target="#akun" role="tab" aria-controls="akun" aria-selected="true" style="font-size: 15px;">Alamat Sendiri</button>
                  </li>
                  <li class="nav-item" role=presentation>
                    <button class="nav-link text-dark" data-bs-toggle="tab" id="ubah-tab" type="button" data-bs-target="#ubah" role="tab" aria-controls="ubah" aria-selected="true" style="font-size: 15px;">Alamat Lain</button>
                  </li>
                </ul>
              </div>
              <!-- Isi Tabs -->
              <div class="tab-content mt-5" id="myTabControl">
                <!-- Pesan -->
                <div class="tab-pane fade show active" role="tabpanel" id="akun" aria-labelledby="akun-tab">
                  <form action="/form-pesanan/tambah/{{ auth()->user()->kecamatan_id }}" method="POST">
                    @csrf
                    <div class="row mb-3 d-flex justify-content-center">
                      <div class="col-sm-6">
                        <div class="form-floating mb-3">
                          <input type="date" class="form-control" id="tgl-pesan" placeholder="name@example.com" name="tanggal_datang" style="border-radius: 20px;" required>
                          <label for="tgl-pesan">Tanggal Datang</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-floating">
                          <select class="form-select form-select-admin rounded-4" class="form-control" name="waktu_datang_id" id="waktupesan" required>
                            <option value="" disabled selected>Pilih Waktu</option>
                            @foreach ($waktu as $data)
                            <option value="{{ $data->id }}"> {{ $data->waktu_datang }} </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3 d-flex justify-content-center">
                      <div class="col-sm-9">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" style="border-radius: 20px;" required>
                          <label for="keterangan">Keterangan</label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-floating">
                          <input type="number" class="form-control" id="jumlah_ac" placeholder="Jumlah AC" name="jumlah_ac" style="border-radius: 20px;" required>
                          <label for="jumlah_ac">Jumlah AC</label>
                        </div>
                      </div>
                    </div>
                    <a href="#!" onclick="getTeknisi()" class="d-flex justify-content-center">
                      <button class="btn-cari-teknisi">Cari Teknisi</button>
                    </a>
                    <div class="col-sm-12">
                      <div class="form-floating">
                        <select class="form-select rounded-4" aria-label="Default select example" name="teknisi_id" id="pesan" required>
                          <option value="" disabled selected>Silahkan Pilih Tanggal dan Waktu Terlebih Dahulu dan Klik Cari Teknisi</option>
                        </select>
                      </div>
                    </div>
                    <!-- Tombol -->
                    <div class="tombol-ubah d-flex justify-content-center">
                      <div class="row mb-3 text-center">
                        <div class="batal col-md-6 mt-3">
                          <a href="/">
                            <button class="btn-secondary">Batal</button>
                          </a>
                        </div>
                        <div class="ubah col-md-6 mt-3">
                          <button class="btn-primary" type="submit">Pesan</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- Pesan Lain -->
                <div class="tab-pane fade show" role="tabpanel" id="ubah" aria-labelledby="ubah-tab">
                  <!-- Pesan Lain -->
                  <form action="/form-pesanan/tambah/0" method="POST">
                    @csrf
                    <div class="row mb-3 d-flex justify-content-center">
                      <div class="col-sm-6">
                        <div class="form-floating mb-3">
                          <input type="date" class="form-control" id="tgl-pesanlain" name="tanggal_datang_lain" placeholder="name@example.com" style="border-radius: 20px;" required>
                          <label for="tgl-pesanlain">Tanggal Datang</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-floating">
                          <select class="form-select form-select-admin rounded-4" class="form-control" name="waktu_datang_id_lain" id="waktupesanlain" required>
                            <option value="" disabled selected>Pilih Waktu</option>
                            @foreach ($waktu as $data)
                            <option value="{{ $data->id }}"> {{ $data->waktu_datang }} </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row my-3 p-0 d-flex justify-content-center">
                        <div class="col-sm-6">
                          <div class="form-floating mb-3">
                            <select class="form-select rounded-4" id="kecamatan" aria-label="Default select example" name="kecamatan_id_lain" required>
                              <option value="" disabled selected>Pilih Kecamatan</option>
                              @foreach ($kecamatan as $kecamatan)
                              <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <a href="#!" onclick="getTeknisi(false)" class="d-flex justify-content-center">
                          <button class="btn-cari-teknisi">Cari Teknisi</button>
                        </a>
                        <div class="col-sm-6">
                          <div class="form-floating">
                            <select class="form-select rounded-4" aria-label="Default select example" name="teknisi_id_lain" id="pesanlain" required>
                              <option value="" disabled selected>Silahkan Pilih Tanggal dan Waktu Terlebih Dahulu</option>
                            </select>
                          </div>
                        </div>
                        <!-- Tombol -->
                        <div class="tombol-ubah d-flex justify-content-center">
                          <div class="row mb-3 text-center">
                            <div class="batal col-md-6 mt-3">
                              <a href="/">
                                <button class="btn-secondary">Batal</button>
                              </a>
                            </div>
                            <div class="ubah col-md-6 mt-3">
                                <button class="btn-primary" type="submit">Lanjut</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
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
    function getTeknisi(pesan = true) {
      if (pesan) {
        let tgl = $('input[id="tgl-pesan"]').val();
        let waktu = $('select[id="waktupesan"]').val();
        let kec = "{{ auth()->user()->kecamatan_id }}";
        $.ajax({
          url: "/teknisi-pesan/" + kec + "/" + waktu + "/" + tgl,
          dataType: "json",
          method: "GET",
          success: function(res) {
            console.log(res);
            $('select[id="pesan"]').empty();
            $('select[id="pesan"]').append(
              '<option value="" selected disabled>Pilih Teknisi</option>'
            );
            $.each(res, function(key, value) {
              $('select[id="pesan"]').append(
                '<option value="' + key + '">' + value +
                '</option>');
            });
          }
        })
      } else {
        let tgl = $('input[id="tgl-pesanlain"]').val();
        let waktu = $('select[id="waktupesanlain"]').val();
        let kec = $('select[id="kecamatan"]').val();
        $.ajax({
          url: "/teknisi-pesan/" + kec + "/" + waktu + "/" + tgl,
          dataType: "json",
          method: "GET",
          success: function(res) {
            console.log(res);
            $('select[id="pesanlain"]').empty();
            $('select[id="pesanlain"]').append(
              '<option value="" selected disabled>Pilih Teknisi</option>'
            );
            $.each(res, function(key, value) {
              $('select[id="pesanlain"]').append(
                '<option value="' + key + '">' + value +
                '</option>');
            });
          }
        })
      }
    }
    $('.swa_btn_pesan').click(function(e) {
      e.preventDefault();
      swal("Pesanan berhasil dikirimkan.", "Silahkan tunggu konfirmasi dari Teknisi.", "success");
    });
  </script>



</body>

</html>