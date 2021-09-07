@extends('layout.master')
@section('title')
  Ubah Data Lowongan Kerja
@endsection
@section('breadcrumb')
  Ubah Data Lowongan Kerja
@endsection
@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Ubah Data Lowongan Kerja
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <div class="dropdown relative ml-auto sm:ml-0">
        <button class="dropdown-toggle button px-2 box text-gray-700">
          <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
          </span>
        </button>
        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
          <div class="dropdown-box__content box p-2">
            <a href="{{ url('lowongaKerja/update') }}"
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
          <h2 class="font-medium text-base mr-auto">Perbarui Data Lowongan Kerja</h2>
        </div>
        <form action="{{ route('lowonganKerja.update', $data->id) }}" method="POST">
          @method('PATCH')
          @csrf
          <div class="p-5" id="horizontal-form">
            <div class="preview">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Pekerjaan</label>
                <input name="nama" type="text" class="input w-full border mt-2 flex-1" placeholder="Nama"
                  value="{{ old('nama') ?? $data->nama }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Detail</label>
                <input name="detail" type="text" class="input w-full border mt-2 flex-1" placeholder="Detail"
                  value="{{ old('detail') ?? $data->detail }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Tingkat Pendidikan</label>
                <input name="tingkat_pendidikan" type="text" class="input w-full border mt-2 flex-1"
                  placeholder="Pendidikan" value="{{ old('tingkat_pendidikan') ?? $data->tingkat_pendidikan }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="input w-full border mt-2 flex-1">
                  <option>Pilih Jenis Kelamin</option>
                  <option value="1">Pria</option>
                  <option value="2">Wanita</option>
                </select>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Umur</label>
                <input name="umur" type="number" class="input w-full border mt-2 flex-1" placeholder="Dalam Tahun"
                  value="{{ old('umur') ?? $data->umur }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Status Kerja</label>
                <input name="status_kerja" type="text" class="input w-full border mt-2 flex-1" placeholder="Status Kerja"
                  value="{{ old('status_kerja') ?? $data->status_kerja }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Gaji</label>
                <input name="gaji" type="number" class="input w-full border mt-2 flex-1" placeholder="Gaji"
                  value="{{ old('gaji') ?? $data->gaji }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Batas Lamaran</label>
                <input name="batas_lamaran" type="text" class="datepicker input w-full border mt-2 flex-1"
                  placeholder="Batas Lamaran" value="{!! Carbon\Carbon::parse($data->batas_lamaran)->format('m/d/Y') !!}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Deskripsi</label>
                <div class="input w-full h-auto mt-2 flex-1">
                  <textarea class="summernote" name="deskripsi"
                    placeholder="Deskripsi">{{ old('deskripsi') ?? $data->deskripsi }}</textarea>
                </div>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Persyaratan</label>
                <input name="persyaratan" type="text" class="input w-full border mt-2 flex-1" placeholder="Persyaratan"
                  value="{{ old('persyaratan') ?? $data->persyaratan }}">
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
@endsection
