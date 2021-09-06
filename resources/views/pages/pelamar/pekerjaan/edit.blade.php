@extends('layout.master')
@section('title')
  Ubah Data Pekerjaan
@endsection
@section('breadcrumb')
  Ubah Data Pekerjaan
@endsection
@section('content')
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Ubah Data Pekerjaan
    </h2>
  </div>

  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Horizontal Form -->
      <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Perbarui Data Pekerjaan</h2>
        </div>
        <form action="{{ route('pekerjaan.update', $pekerjaan->id) }}" method="POST">
          @method('PATCH')
          @csrf
          <div class="p-5" id="horizontal-form">
            <div class="preview">
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Lokasi</label>
                <input name="lokasi" type="text" class="input w-full border mt-2 flex-1"
                  placeholder="Lokasi Tempat Bekerja" value="{{ old('lokasi') ?? $pekerjaan->lokasi }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Pengalaman</label>
                <input name="pengalaman" type="text" class="input w-full border mt-2 flex-1" placeholder="Pengalaman"
                  value="{{ old('pengalaman') ?? $pekerjaan->pengalaman }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Tahun</label>
                <input name="tahun" type="text" class="datepicker input w-full border mt-2 flex-1"
                  placeholder="Tahun Bekerja" value="{{ old('tahun') }}">
              </div>
              <div class="flex flex-col sm:flex-row items-center">
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Lama Bekerja</label>
                <input name="lama_bekerja" type="number" class="input w-full border mt-2 flex-1" placeholder="Dalam Tahun"
                  value="{{ old('lama_bekerja') ?? $pekerjaan->lama_bekerja }}">
              </div>
              <div class="flex sm:flex-row items-center mt-5">
                <button type="submit" class="button bg-theme-1 text-white">Ubah</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- END: Horizontal Form -->
    </div>
  </div>
@endsection
