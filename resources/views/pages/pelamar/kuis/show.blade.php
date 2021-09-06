@extends('layout.master')
@section('title')
  Detail Kuis
@endsection
@section('breadcrumb')
  Detail Kuis
@endsection

@section('content')
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Kuis</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href="{{ route('pelamarSoal.show', $data->id) }}" class=" button text-white bg-theme-1 shadow-md mr-2">
        Kerjakan
      </a>
    </div>
  </div>
  <!-- BEGIN: Invoice -->
  <div class="intro-y box overflow-hidden mt-5">
    <div class="border-b border-gray-200 text-center sm:text-left">
      <div class="px-5 py-1 sm:px-20 sm:py-20">
        <div class="text-theme-1 font-semibold text-3xl">Peraturan {{ $data->nama }}</div>
        <div class="mt-1">{{ date('d-M-Y', strtotime($data->tanggal_kuis)) }}</div>
      </div>
      <div class="flex flex-col lg:flex-row px-5 sm:px-20 sm:pb-20">
        <div class="">
          <div class="text-base text-gray-600">Detail</div>
          <ol>
            <li class="mt-1">Jawablah pertanyaan dengan baik dan benar</li>
            <li class="mt-1">Soal kuis terdiri dari pilihan ganda dan esai</li>
            <li class="mt-1">Anda bisa mengulang ke pertanyaan sebelumnya untuk memeriksa jawaban</li>
            <li class="mt-1">Durasi pengerjaan soal selama {{ date('H', strtotime($data->durasi)) }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- END: Invoice -->
@endsection
