<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Lobster&display=swap');
  </style>
  <!-- Brand Logo -->
  <!-- <a href="">
    <span><img src="{{asset('admin_assets/dist/img/insurance_logo.png')}}" alt="" width="30%" height="10%" ></span><span style="color : #c2c7d0;"> Easy connect service </span>
    </a> -->

  <a href="{{ url('admin/dashboard') }}" class="brand-link text-center">
    <img src="{{asset('admin_assets/dist/img/insurance_logo1.png')}}" alt="logo" width="135">
 
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin_assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ url('admin/dashboard') }}" class="d-block">{{session('ADMIN_NAME')}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ url('admin/dashboard') }}" class="nav-link">
            <i class="ion-ios-speedometer-outline icon"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/users') }}" class="nav-link">
            <i class="ion-ios-people-outline icon"></i>
            <p>Customers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/policies') }}" class="nav-link">
            <i class="ion-ios-bookmarks-outline icon"></i>
            <p>
              Policies
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/product') }}" class="nav-link">
            <i class="ion-ios-lightbulb-outline icon"></i>
            <p>
              Product
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/companies') }}" class="nav-link">
            <i class="ion-ios-flower-outline icon"></i>
            <p>
              Companies
            </p>
          </a>
        </li>
        <!-- 
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link">
            <i class="ion-ios-gear-outline icon"></i>
              <p>
                Settings
              </p>
            </a>
          </li> -->


        <!-- <li class="nav-item">
            <a href="/#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="/#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>