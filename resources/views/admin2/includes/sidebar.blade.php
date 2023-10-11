<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="assets/img/admin/profil.png" alt="..." class="avatar-img">
        </div>
        <div class="info">
          <a>
            <span class="text-light">
              {{ auth()->user()->nama }}
              <span class="user-level text-light">Administrator</span>
            </span>
          </a>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item mt-2 {{request()->is('admin-dashboard*') ? 'active' : ''}}">
          <a href="/admin-dashboard">
            <i class="fa-solid fa-user" style="color: #ffffff;"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section text-light">Data Tabel</h4>
        </li>
        <li class="nav-item mt-2 submenu {{request()->is('data-akun-pengunjung','data-akun-admin') ? 'active' : ''}}">
          <a data-toggle="collapse" href="#akun">
            <i class="fa-solid fa-user" style="color: #ffffff;"></i>
            <p>Akun</p>
          </a>
          <div class="collapse {{request()->is('data-akun-pengunjung','data-akun-admin') ? 'show' : ''}}" id="akun">
            <ul class="nav nav-collapse">
              <li class="{{request()->is('data-akun-admin') ? 'active' : ''}}">
                <a href="data-akun-admin">
                  <span class="sub-item text-light">Akun Admin</span>
                </a>
              </li>
              <li class="{{request()->is('data-akun-pengunjung') ? 'active' : ''}}">
                <a href="/data-akun-pengunjung">
                  <span class="sub-item text-light">Akun Pengunjung</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-2 {{request()->is('data-pesanan','data-pesananlain') ? 'active' : ''}}">
          <a data-toggle="collapse" href="#pesanan">
            <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
            <p>Pesanan</p>
          </a>
          <div class="collapse {{request()->is('data-pesanan','data-pesananlain') ? 'show' : ''}}" id="pesanan">
            <ul class="nav nav-collapse">
              <li class="{{request()->is('data-pesanan') ? 'active' : ''}}">
                <a href="/data-pesanan">
                  <span class="sub-item text-light">Alamat Sendiri</span>
                </a>
              </li>
              <li class="{{request()->is('data-pesananlain') ? 'active' : ''}}">
                <a href="/data-pesananlain">
                  <span class="sub-item text-light">Alamat Lain</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-2 {{request()->is('data-teknisi') ? 'active' : ''}}">
          <a href="/data-teknisi">
            <i class="fa-solid fa-users-line" style="color: #ffffff;"></i>
            <p>Teknisi</p>
          </a>
        </li>
        <li class="nav-item mt-2 {{request()->is('data-kecamatan') ? 'active' : ''}}">
          <a href="/data-kecamatan">
            <i class="fa-solid fa-house-flag" style="color: #ffffff;"></i>
            <p>Kecamatan</p>
          </a>
        </li>
        <li class="nav-item mt-2 {{request()->is('waktu-datang') ? 'active' : ''}}">
          <a href="/waktu-datang">
            <i class="fa-solid fa-stopwatch" style="color: #ffffff;"></i>
            <p>Waktu Datang</p>
          </a>
        </li>
        <li class="nav-item mt-2 {{request()->is('laporan-data-pesanan','laporan-data-pesananlain') ? 'active' : ''}}">
          <a data-toggle="collapse" href="#laporanpesanan">
            <i class="fa-solid fa-book" style="color: #ffffff;"></i>
            <p> Laporan Pesanan</p>
          </a>
          <div class="collapse {{request()->is('laporan-data-pesanan','laporan-data-pesananlain') ? 'show' : ''}}" id="laporanpesanan">
            <ul class="nav nav-collapse">
              <li class="{{request()->is('laporan-data-pesanan') ? 'active' : ''}}">
                <a href="/laporan-data-pesanan">
                  <span class="sub-item text-light">Alamat Sendiri</span>
                </a>
              </li>
              <li class="{{request()->is('laporan-data-pesananlain') ? 'active' : ''}}">
                <a href="/laporan-data-pesananlain">
                  <span class="sub-item text-light">Alamat Lain</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>