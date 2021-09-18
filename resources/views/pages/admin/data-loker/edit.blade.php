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

                <div class="input w-full h-auto mt-2 flex-1">
                  <textarea class="summernote" name="detail"
                    placeholder="detail">{{ old('detail') ?? $data->detail }}</textarea>
                </div>
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
                  <option value="3">Pria/Wanita</option>
                </select>
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Umur</label>
                <input name="umur" type="text" class="input w-full border mt-2 flex-1" placeholder="Dalam Tahun"
                  value="{{ old('umur') ?? $data->umur }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Status Kerja</label>
                <input name="status_kerja" type="text" class="input w-full border mt-2 flex-1" placeholder="Status Kerja"
                  value="{{ old('status_kerja') ?? $data->status_kerja }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Gaji</label>
                <input name="gaji" type="text" class="input w-full border mt-2 flex-1" placeholder="Gaji"
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

                <div class="input w-full h-auto mt-2 flex-1">
                  <textarea class="summernote" name="persyaratan"
                    placeholder="Persyaratan">{{ old('persyaratan') ?? $data->persyaratan }}</textarea>
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
@endsection
