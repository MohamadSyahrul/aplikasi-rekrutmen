@extends('layout.master')
@section('title')
  Tambah Lamaran
@endsection
@section('breadcrumb')
  Tambah Lamaran
@endsection
@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Tambah Lamaran
    </h2>

  </div>

  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Horizontal Form -->
      <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Tambah Lamaran Offline</h2>
        </div>
        <form action="{{ route('lamaran.store') }}" method="POST">
          @csrf
          <div class="p-5" id="horizontal-form">
            <div class="preview">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Pelamar</label>
                <select name="pelamar_id" class="input w-full border mt-2 flex-1">
                  <option>Pilih Pelamar</option>
                  @foreach ($pelamar as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Lowongan Kerja</label>
                <select name="loker_id" class="input w-full border mt-2 flex-1">
                  <option>Pilih Loker</option>
                  @foreach ($loker as $row)
                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Tanggal Upload</label>
                <input name="tanggal_unggah" type="text" class="datepicker input w-full border mt-2 flex-1"
                  placeholder="Tanggal Unggah">
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
