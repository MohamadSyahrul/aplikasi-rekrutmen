@extends('layout.master')
@section('title')
  Tambah Data Pelamar
@endsection
@section('breadcrumb')
  Tambah Data Pelamar
@endsection
@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Tambah Data Pelamar
    </h2>

  </div>

  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Horizontal Form -->
      <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Daftarkan User</h2>
        </div>
        <form action="{{ route('dataPelamar.store') }}" method="POST">
          @csrf
          <div class="p-5" id="horizontal-form">
            <div class="preview">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Username</label>
                <input name="username" type="text" class="input w-full border mt-2 flex-1" placeholder="Username">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Email</label>
                <input name="email" type="email" class="input w-full border mt-2 flex-1" placeholder="example@gmail.com">
              </div>
              <div class="flex flex-col sm:flex-row items-center mt-3">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Password</label>
                <input name="password" type="password" class="input w-full border mt-2 flex-1" placeholder="******">
              </div>
              <div class="flex flex-col sm:flex-row items-center  d-flexmt-3">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Password Confirmation</label>
                <input name="password_confirmation" type="password" class="input w-full border mt-2 flex-1"
                  placeholder="******">
              </div>
              <div class="flex sm:flex-row items-center mt-5">
                <input class="button bg-theme-6 text-white mr-3" type="button" value="Batal" onclick="history.back(-1)">
                <button type="submit" class="button bg-theme-1 text-white">Tambah</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- END: Horizontal Form -->
    </div>
  </div>

@endsection()
