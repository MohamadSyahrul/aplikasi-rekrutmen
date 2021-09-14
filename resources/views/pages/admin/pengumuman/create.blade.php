@extends('layout.master')
@section('title')
  Tambah Pengumuman
@endsection
@section('breadcrumb')
  Tambah Pengumuman
@endsection
@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Tambah Pengumuman
    </h2>
  </div>

  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Horizontal Form -->
      <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Pengumuman</h2>
        </div>
        <form action="{{ route('pengumuman.store') }}" method="POST">
          @csrf
          <div class="p-5" id="horizontal-form">
            <div class="preview">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Judul Pengumuman</label>
                <input name="judul_pengumuman" type="text" class="input w-full border mt-2 flex-1"
                  placeholder="Masukan Judul Pengumuman" value="{{ old('judul_pengumuman') }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Tanggal</label>
                <input name="tgl_pengumuman" type="text" class="datepicker input w-full border mt-2 flex-1"
                  placeholder="Tanggal Pengumuman">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Keterangan</label>
                <div class="input w-full h-auto mt-2 flex-1">
                  <textarea class="summernote" name="ket_pengumuman"
                    placeholder="Keterangan">{{ old('ket_pengumuman') }}</textarea>
                </div>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Privasi</label>
                <select name="privasi" class="input w-full border mt-2 flex-1">
                  <option>Privasi</option>
                  <option value="1">Public</option>
                  <option value="2">Secret</option>
                </select>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Lowongan Kerja</label>
                <select name="loker_id" class="input w-full border mt-2 flex-1">
                  <option>Lowongan Kerja</option>
                  @foreach ($data as $loker)
                    <option value="{{ $loker->id }}">{{ $loker->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class=" w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Upload Berkas</label>
                <input name="berkas" type="file" class="input w-full border mt-2 flex-1" placeholder="Upload Disini">
              </div>
              <p class="text-sm text-gray-500 mt-3">
                Berkas berifat opsional bisa diupload bisa juga dibiarkan kosong
              </p>
              <div class="flex sm:flex-row items-center mt-5">
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
