<a href="" class="intro-x flex items-center pl-5 pt-4">
  <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('template/dist/images/logo.svg') }}">
  <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
</a>
<div class="side-nav__devider my-6"></div>
<ul>
  <li>
    <a href="{{ url('/dashboard') }}" class="side-menu {{ Request::is('dashboard*') ? 'side-menu--active' : '' }}">
      <div class="side-menu__icon"> <i data-feather="home"></i> </div>
      <div class="side-menu__title"> Dashboard </div>
    </a>
  </li>
  <li>
    <a href="{{ url('dataPelamar') }}"
      class="side-menu {{ Request::is('dataPelamar*') ? 'side-menu--active' : '' }}">
      <div class="side-menu__icon"> <i data-feather="user"></i> </div>
      <div class="side-menu__title"> Data Pelamar </div>
    </a>
  </li>
  <li>
    <a href="{{ url('lowonganKerja') }}"
      class="side-menu {{ Request::is('lowonganKerja*') ? 'side-menu--active' : '' }}">
      <div class="side-menu__icon"> <i data-feather="clipboard"></i> </div>
      <div class="side-menu__title"> Lowongan Kerja </div>
    </a>
  </li>
  <li>
    <a href="{{ url('lamaran') }}" class="side-menu {{ Request::is('lamaran*') ? 'side-menu--active' : '' }}">
      <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
      <div class="side-menu__title"> Lamaran </div>
    </a>
  </li>
  <li>
    <a href="#" class="side-menu {{ Request::is('kuis*') ? 'side-menu--active' : '' }}">
      <div class="side-menu__icon"> <i data-feather="layers"></i> </div>
      <div class="side-menu__title"> Kuis </div>
    </a>
  </li>
  <li>
    <a href="#" class="side-menu {{ Request::is('penilaian*') ? 'side-menu--active' : '' }}">
      <div class="side-menu__icon"> <i data-feather="pocket"></i> </div>
      <div class="side-menu__title"> Penilaian </div>
    </a>
  </li>
  <li>
    <a href="#" class="side-menu {{ Request::is('pengumuman*') ? 'side-menu--active' : '' }}">
      <div class="side-menu__icon"> <i data-feather="volume-2"></i> </div>
      <div class="side-menu__title"> Pengumuman </div>
    </a>
  </li>
</ul>
