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
        <form action="{{ route('pelamarDataPelamar.update', $data->pelamar->id) }}" method="POST"
          enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="p-5" id="horizontal-form">
            <div class="preview">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left">Username</label>
                <input name="username" type="text" class="input w-full border my-2" placeholder="Username"
                  value="{{ old('username') ?? $data->username }}" disabled>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left">Email</label>
                <input name="email" type="email" class="input w-full border my-2" placeholder="example@gmail.com"
                  value="{{ old('email') ?? $data->email }}" disabled>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class=" w-full lg:w-40 sm:w-20 sm:text-left">Upload Berkas</label>
                <div>
                  <input name="berkas" type="file" class="input w-full border my-2" placeholder="Upload Disini">
                  <p class="text-sm text-gray-500">
                    Silakan cek berkas apa saja yang dibutuhkan untuk melamar pekerjaan. Berkas yang
                    dikumpulkan dijadikan
                    satu lalu dikompress dalam format
                    Zip / Rar
                  </p>
                </div>
              </div>

              <div class="md:flex sm:flex md:space-x-4 sm:space-x-4">
                <div class="flex-1 p-5">
                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <h4 class="font-medium text-base mx-auto">Data Diri</h4>
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left">Nama Lengkap</label>
                    <input name="nama" type="text" class="input w-full border my-2" placeholder="Nama"
                      value="{{ old('nama') ?? $data->pelamar->nama }}">
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left">Tempat Lahir</label>
                    <input name="tempat_lahir" type="text" class="input w-full border my-2" placeholder="Tempat Lahir"
                      value="{{ old('tempat_lahir') ?? $data->pelamar->tempat_lahir }}">
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left">Tanggal Lahir</label>
                    <input name="tgl_lahir" type="text" class="datepicker input w-full border my-2"
                      placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="input w-full border my-2">
                      <option>Pilih Jenis Kelamin</option>
                      <option value="1">Pria</option>
                      <option value="2">Wanita</option>
                    </select>
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left">No Telepon</label>
                    <input name="no_telp" type="text" class="input w-full border my-2" placeholder="Nomor Telepon"
                      value="{{ old('no_telp') ?? $data->pelamar->no_telp }}">
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left">Foto Profil</label>
                    <input type="file" class="input w-full border my-2" name="foto" placeholder="Upload Foto Profil">
                  </div>

                </div>
                <div class="flex-1 p-5">
                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <h4 class="font-medium text-base mx-auto">Pendidikan</h4>
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-64 sm:w-20 sm:text-left">Sekolah Dasar</label>
                    <input name="sd" type="text" class="input w-full border my-2" placeholder="Sekolah Dasar"
                      value="{{ old('sd') ?? $data->pelamar->pendidikan->sd }}">
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-64 sm:w-20 sm:text-left">Sekolah Menengah Pertama</label>
                    <input name="smp" type="text" class="input w-full border my-2" placeholder="Sekolah Menengah Pertama"
                      value="{{ old('smp') ?? $data->pelamar->pendidikan->smp }}">
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-64 sm:w-20 sm:text-left">Sekolah Menengah Atas</label>
                    <input name="sma" type="text" class="input w-full border my-2" placeholder="Sekolah Menengah Atas"
                      value="{{ old('sma') ?? $data->pelamar->pendidikan->sma }}">
                  </div>
                  <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full lg:w-64 sm:w-20 sm:text-left">Perguruan Tinggi</label>
                    <input name="perguruan_tinggi" type="text" class="input w-full border my-2"
                      placeholder="Perguruan Tinggi"
                      value="{{ old('perguruan_tinggi') ?? $data->pelamar->pendidikan->perguruan_tinggi }}">
                  </div>
                </div>

              </div>
              <div class="flex sm:flex-row items-center mt-5">
                <input class="button bg-theme-6 text-white mr-3" type="button" value="Batal" onclick="history.back(-1)">
                <button type="submit" class="button bg-theme-1 text-white">Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- END: Horizontal Form -->
    </div>
  </div>
@endsection()
