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
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <div class="dropdown relative ml-auto sm:ml-0">
        <button class="dropdown-toggle button px-2 box text-gray-700">
          <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
          </span>
        </button>
        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
          <div class="dropdown-box__content box p-2">
            <a href="{{ url('dataPelamar/create') }}"
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
          <h2 class="font-medium text-base mr-auto">Daftarkan User</h2>
        </div>
        <form action="{{ route('dataKuis.store') }}" method="POST">
          @csrf
          <div class="p-5" id="horizontal-form">
            <div class="preview">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Kuis</label>
                <input name="nama" type="text" class="input w-full border mt-2 flex-1" placeholder="Masukkan Nama Kuis">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">tanggal</label>
                <input name="tgl_kuis" type="text" class="datepicker input w-full border mt-2 flex-1"
                  placeholder="Masukkan Nama Kuis">
              </div>
              <div class="flex flex-col sm:flex-row items-center mt-3">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">waktu_mulai</label>
                <input name="waktu_mulai" type="text" data-timepicker="true"
                  class="datepicker input w-full border mt-2 flex-1">
              </div>
              <div class="flex flex-col sm:flex-row items-center  d-flexmt-3">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">waktu_selesai</label>
                <input name="waktu_selesai" type="text" data-timepicker="true"
                  class="datepicker input w-full border mt-2 flex-1">
              </div>
              <div class="flex flex-col sm:flex-row items-center  d-flexmt-3">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">durasi</label>
                <input name="durasi" type="text" data-timepicker="true"
                  class="datepicker input w-full border mt-2 flex-1">
              </div>
              <div class="flex flex-col sm:flex-row items-center  d-flexmt-3">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Loker</label>
                <select id="loker_id" name="loker_id" class="select2 w-full border mt-2 flex-1">
                  @foreach ($loker as $key => $lk)
                    <option id="loker_id[{{ $key }}]" name="loker_id" value="{{ $lk->id }}">
                      {{ $lk->nama }}</option>
                  @endforeach
                </select>
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
