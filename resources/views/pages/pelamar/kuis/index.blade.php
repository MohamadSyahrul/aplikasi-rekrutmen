@extends('layout.master')
@section('title')
  Data Kuis
@endsection
@section('breadcrumb')
  Data Kuis
@endsection
@section('content')
  <!-- END: Top Bar -->
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Data Kuis
    </h2>
  </div>
  <!-- BEGIN: Datatable -->
  <div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
      <thead>
        <tr>
          <th class="border-b-2 whitespace-no-wrap">Nama Kuis</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Tanggal</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Durasi</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Loker</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $lamaran)
          <tr>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">
                {{ $lamaran->loker->kuis->nama ?? 'Belum ada kuis' }}</div>
            </td>
            <td class="text-center border-b">
              <div class="font-medium whitespace-no-wrap">
                {{ $lamaran->loker->kuis->tgl_kuis ?? 'Tanggal belum ditentukan' }}</div>
            </td>
            <td class="text-center border-b">
              <div class="font-medium whitespace-no-wrap">
                {{ $lamaran->loker->kuis->durasi ?? 'Durasi belum ditentukan' }}</div>
            </td>
            <td class="text-center border-b">
              <div class="font-medium whitespace-no-wrap">{{ $lamaran->loker->nama }}</div>
            </td>
            @if ($lamaran->loker->kuis != null)
              <td class="border-b w-5">
                <div class="flex sm:justify-center items-center">
                  <a class="flex items-bottom mr-3 text-theme-1"
                    href="{{ route('pelamarKuis.show', $lamaran->loker->kuis->id) }}">
                    <i data-feather="edit-2" class="w-4 h-4 mr-1"></i>
                    Kerjakan
                  </a>
                </div>
              </td>
            @else
              <td class="border-b w-5">
                <div class="flex sm:justify-center items-center">
                  <i data-feather="Close" class="w-4 h-4 mr-1"></i>
                  Tunggu
                </div>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- END: Datatable -->
@endsection