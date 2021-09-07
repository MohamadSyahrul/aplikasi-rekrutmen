@extends('layout.master')
@section('title')
  Ubah Data Pelamar
@endsection
@section('breadcrumb')
  Ubah Data Pelamar
@endsection
@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Ubah Data Pelamar
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <div class="dropdown relative ml-auto sm:ml-0">
        <button class="dropdown-toggle button px-2 box text-gray-700">
          <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
          </span>
        </button>
        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
          <div class="dropdown-box__content box p-2">
            <a href="{{ url('dataPelamar/update') }}"
              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
              <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Tambah Data </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Horizontal Form -->
      <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Perbarui Data User</h2>
        </div>
        <form action="{{ route('dataPelamar.update', $data->pelamar->id) }}" method="POST">
          @method('PATCH')
          @csrf
          <div class="p-5" id="horizontal-form">
            <div class="preview">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Username</label>
                <input name="username" type="text" class="input w-full border mt-2 flex-1" placeholder="Username"
                  value="{{ old('username') ?? $data->username }}" disabled>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Email</label>
                <input name="email" type="email" class="input w-full border mt-2 flex-1" placeholder="example@gmail.com"
                  value="{{ old('email') ?? $data->email }}" disabled>
              </div>
              <hr class="mt-2">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Lengkap</label>
                <input name="nama" type="text" class="input w-full border mt-2 flex-1" placeholder="Nama"
                  value="{{ old('nama') ?? $data->pelamar->nama }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Tempat Lahir</label>
                <input name="tempat_lahir" type="text" class="input w-full border mt-2 flex-1" placeholder="Tempat Lahir"
                  value="{{ old('tempat_lahir') ?? $data->pelamar->tempat_lahir }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Tanggal Lahir</label>
                <input name="tgl_lahir" type="text" class="datepicker input w-full border mt-2 flex-1"
                  placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="input w-full border mt-2 flex-1">
                  <option>Pilih Jenis Kelamin</option>
                  <option value="1">Laki laki</option>
                  <option value="2">Perempuan</option>
                </select>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">No Telepon</label>
                <input name="no_telp" type="text" class="input w-full border mt-2 flex-1" placeholder="Nomor Telepon"
                  value="{{ old('no_telp') ?? $data->pelamar->no_telp }}">
              </div>
              <div class="flex sm:flex-row items-center mt-5">
                <button type="submit" class="button bg-theme-1 text-white">Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- END: Horizontal Form -->
    </div>
  </div>
  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">

  </div>
@endsection()
