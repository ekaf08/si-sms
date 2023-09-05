  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-lightblue">
      <!-- Brand Logo -->
      <a href="javascript:void(0)" class="brand-link bg-lightblue" style="text-align: center;">
          {{-- <img src="{{ asset('/asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          <span class="brand-text font-weight-light" style="font-weight: bold !important; font-size: 20px;">School</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('/asset/dist/img/user3-128x128.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block" style="color: #3c8dbc;">{{ ucwords(Auth::user()->name) }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>-->

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                  @if (Auth::user()->user_type == 1)
                      <!--Menu untuk admin-->
                      <li class="nav-item ">
                          <a href="{{ route('dashboard.admin') }}"
                              class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>

                      <li class="nav-item ">
                          <a href="{{ route('admin_list') }}"
                              class="nav-link @if (Request::segment(2) == 'list') active @endif">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  Admin
                              </p>
                          </a>
                      </li>

                      <li class="nav-item ">
                          <a href="{{ route('kelas.index') }}"
                              class="nav-link @if (Request::segment(2) == 'kelas') active @endif">
                              <i class="nav-icon fas fa-chalkboard-teacher"></i>
                              <p>
                                  Kelas
                              </p>
                          </a>
                      </li>
                      <!--End Menu untuk admin-->
                  @elseif(Auth::user()->user_type == 2)
                      <!--Menu untuk siswa-->
                      <li class="nav-item ">
                          <a href="{{ route('dashboard.student') }}"
                              class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>
                      <!--End Menu untuk siswa-->
                  @elseif(Auth::user()->user_type == 3)
                      <!--Menu untuk guru-->
                      <li class="nav-item ">
                          <a href="{{ route('dashboard.teacher') }}"
                              class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>
                      <!--End Menu untuk guru-->
                  @elseif(Auth::user()->user_type == 4)
                      <!--Menu untuk parent-->
                      <li class="nav-item ">
                          <a href="{{ route('dashboard.parent') }}"
                              class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>
                      <!--End Menu untuk parent-->
                  @endif

                  <li class="nav-item ">
                      <a href="{{ route('logout') }}" class="nav-link ">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>
                              Logout
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
