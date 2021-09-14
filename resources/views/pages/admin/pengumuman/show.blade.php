@extends('layout.master')
@section('title')
  Detail Pengumuman
@endsection
@section('breadcrumb')
  Detail Pengumuman
@endsection

@section('content')
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Pengumuman</h2>
    @if ($data->file)
      <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('pelamarPengumuman.download', $data->id) }}"
          class=" button text-white bg-theme-1 shadow-md mr-2">
          Download Berkas
        </a>
      </div>
    @endif
  </div>
  <!-- BEGIN: Pengumuman -->
  <div class="intro-y box overflow-hidden mt-5">
    <div class="border-b border-gray-200 text-center sm:text-left">
      <div class="px-5 py-1 sm:px-20 sm:py-20">
        <div class="text-theme-1 font-semibold text-3xl">{{ $data->judul_pengumuman }}</div>
        <div class="mt-1">{{ date('d-M-Y', strtotime($data->tgl_pengumuman)) }}</div>
      </div>
      <div class="block lg:flex-row px-5 sm:px-20 sm:pb-20">
        <div class=" text-base text-gray-600">
          {{ $data->loker->nama }}
        </div>
        <div class="text-gray-700 mt-3 text-justify">{!! $data->ket_pengumuman !!}</div>
      </div>
    </div>
  </div>
  <!-- END: Pengumuman -->
@endsection
