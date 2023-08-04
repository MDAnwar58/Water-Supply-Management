<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.dashboard') ? '' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>ড্যাশবোর্ড</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- @if(Auth::check())
      @if(Auth::user()->user_status == 'এডমিন') --}}
      <li class="nav-item">
        <a class="nav-link  {{ Route::is('admin.account.manager') ? '' : 'collapsed' }}" href="{{ route('admin.account.manager') }}">
          <i class="bi bi-person"></i>
          <span>অ্যাকাউন্ট পারমিশন</span>
        </a>
      </li><!-- End Profile Page Nav -->
      {{-- @endif
      @endif --}}
      
      <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.jar.price') ? '' : 'collapsed' }}" href="{{ route('admin.jar.price') }}">
          <i class="bi bi-circle"></i>
          <span>জারের দাম</span>
        </a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.user.card') ? '' : 'collapsed' }}" href="{{ route('admin.user.card') }}">
          <i class="bi bi-journal-text"></i>
          <span>গ্রাহক কার্ড</span>
        </a>
      </li><!-- End Contact Page Nav -->


      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope"></i><span>Communication</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Contact</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Contact Messages</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav --> --}}

     

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav --> --}}

    </ul>

  </aside>