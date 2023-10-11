<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
  <div class="container-fluid">
    <div class="tulisan ml-4">
      <span>
        CV PERMATA CAHAYA TANISGA
      </span>
    </div>
    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

      <!-- Notifikasi -->
      {{-- <li class="nav-item dropdown hidden-caret">
        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bell"></i>
          <span class="notification">4</span>
        </a>
        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
          <li>
            <div class="dropdown-title">You have 4 new notification</div>
          </li>
          <li>
            <div class="notif-center">
              <a href="#">
                <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                <div class="notif-content">
                  <span class="block">
                    New user registered
                  </span>
                  <span class="time">5 minutes ago</span> 
                </div>
              </a>
              <a href="#">
                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                <div class="notif-content">
                  <span class="block">
                    Rahmad commented on Admin
                  </span>
                  <span class="time">12 minutes ago</span> 
                </div>
              </a>
              <a href="#">
                <div class="notif-img"> 
                  <img src="../../assets/img/profile2.jpg" alt="Img Profile">
                </div>
                <div class="notif-content">
                  <span class="block">
                    Reza send messages to you
                  </span>
                  <span class="time">12 minutes ago</span> 
                </div>
              </a>
              <a href="#">
                <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                <div class="notif-content">
                  <span class="block">
                    Farrah liked Admin
                  </span>
                  <span class="time">17 minutes ago</span> 
                </div>
              </a>
            </div>
          </li>
          <li>
            <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
          </li>
        </ul>
      </li> --}}

      <!-- Logout -->
      <li class="nav-item dropdown hidden-caret">
        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
          <div class="avatar-sm mr-4">
            <img src="assets/img/admin/profil.png" alt="..." class="avatar-img">
          </div>
        </a>
        <ul class="dropdown-menu dropdown-user animated fadeIn">
          <div class="dropdown-user-scroll scrollbar-outer">
            <li>
              <div class="user-box">
                <div class="avatar-lg"><img src="assets/img/admin/profil.png" alt="image profile" class="avatar-img"></div>
                <div class="u-text">
                  <h4>{{ auth()->user()->nama }}</h4>
                  <p class="text-muted">{{ auth()->user()->email }}</p>
                </div>
              </div>
            </li>
            <li>
              <div class="tombol-logout d-flex justify-content-end mx-3 mb-2">
                <a href="/logout" class="btn btn-xs btn-danger btn-sm">Keluar</a>
              </div>
            </li>
          </div>
        </ul>
      </li>
    </ul>
  </div>
</nav>