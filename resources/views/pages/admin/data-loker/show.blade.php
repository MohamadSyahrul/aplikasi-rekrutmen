@extends('layout.master')
@section('title')
  Detail Lowongan Kerja
@endsection
@section('breadcrumb')
  Detail Lowongan Kerja
@endsection

@section('content')
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Lowongan Kerja</h2>
  </div>
  <div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: FAQ Menu -->
    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3" style="position: fixed;">
      <div class="box mt-5">
        <div class="px-4 pb-3 pt-5">
          <a class="flex rounded-lg items-center px-4 py-2 bg-theme-1 text-white font-medium" href="#informasi_umum">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>
            <div class="flex-1 truncate">Informasi Umum</div>
          </a>
          <a class="flex items-center px-4 py-2 mt-1" href="#kualifikasi">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>
            <div class="flex-1 truncate">Kualifikasi</div>
          </a>
          <a class="flex items-center px-4 py-2 mt-1" href="#persyaratan">
            <i data-feather="lock" class="w-4 h-4 mr-2"></i>
            <div class="flex-1 truncate">Persyaratan</div>
          </a>
          <a class="flex items-center px-4 py-2 mt-1" href="#pelamar">
            <i data-feather="settings" class="w-4 h-4 mr-2"></i>
            <div class="flex-1 truncate">Pelamar</div>
          </a>
        </div>
      </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3">
    </div>
    <!-- END: FAQ Menu -->
    <!-- BEGIN: FAQ Content -->
    <div class="intro-y col-span-12 lg:col-span-8 xl:col-span-9">
      <div class="intro-y box lg:mt-5" id="informasi_umum">
        <div class="flex items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Informasi Umum</h2>
        </div>
        <div class="accordion p-5">
          <div class="accordion__pane active border border-gray-200 p-4">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Nama</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->nama }}</div>
          </div>
          <div class="accordion__pane border border-gray-200 p-4 mt-3">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Detail</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->detail }}</div>
          </div>
          <div class="accordion__pane border border-gray-200 p-4 mt-3">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Status Kerja</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->status_kerja }}</div>
          </div>
          <div class="accordion__pane border border-gray-200 p-4 mt-3">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Gaji</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->gaji }}</div>
          </div>
        </div>
      </div>
      <div class="intro-y box mt-5" id="kualifikasi">
        <div class="flex items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Kualifikasi</h2>
        </div>
        <div class="accordion p-5">
          <div class="accordion__pane active border border-gray-200 p-4">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Jenis Kelamin</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->jenis_kelamin }}</div>
          </div>
          <div class="accordion__pane border border-gray-200 p-4 mt-3">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Umur</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->umur }}</div>
          </div>
          <div class="accordion__pane border border-gray-200 p-4 mt-3">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Batas Lamaran</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->batas_lamaran }}</div>
          </div>
        </div>
      </div>
      <div class="intro-y box mt-5" id="persyaratan">
        <div class="flex items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Persyaratan</h2>
        </div>
        <div class="accordion p-5">
          <div class="accordion__pane active border border-gray-200 p-4">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Deskripsi</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{!! $data->deskripsi !!}</div>
          </div>
          <div class="accordion__pane border border-gray-200 p-4 mt-3">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Persyaratan</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->persyaratan }}</div>
          </div>
        </div>
      </div>
      <div class="intro-y box mt-5" id="pelamar">
        <div class="flex items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">Pelamar</h2>
        </div>
        <div class="accordion p-5">
          <div class="accordion__pane active border border-gray-200 p-4">
            <a href="javascript:;" class="accordion__pane__toggle font-medium block">Total Pelamar</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ '-' }}</div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: FAQ Content -->
  </div>
@endsection
