<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <!-- <h1 class="text-light"><a href="/"><span>CV Permata Cahaya Tanisga</span></a></h1> -->
        <a href="/"><img src="/assets/img/logo4.png" alt="" class="img-fluid"></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Beranda</a></li>
          <li><a href="/#tentang">Tentang</a></li>
          <li><a href="/#layanan">Layanan</a></li>
          <li><a href="/#teknisi">Teknisi</a></li>
          <li><a href="/#hubungi">Hubungi Kami</a></li>
          <li><a  class="fw-bold" href="/form-pesanan">Pesan Sekarang</a></li>
          @if (Auth::user() == NULL)
          <li><a href="/login">Masuk</a></li>
          @elseif (Auth::user()->role == "Pengunjung" )
          <li><a href="/profil/{{ auth()->user()->id }}"><i class="fa-solid fa-user-large fa-2xs" style="color: #ffffff;"></i></a></li>
          @endif  
          <!-- <li><a href="#"><i class="fa-solid fa-arrow-right-to-bracket"></i></a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
</header>