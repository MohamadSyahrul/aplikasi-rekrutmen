@extends('layout.master')
@section('title')
  Data Lamaran
@endsection
@section('breadcrumb')
  Data Lamaran
@endsection
@section('content')
  <!-- END: Top Bar -->
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Data Lamaran
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href=" {{ route('lamaran.create') }}">
        <button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Data</button>
      </a>
    </div>
  </div>
  @if (session()->get('success'))
    <div class="p-5" id="icon-dismiss-alert">
      <div class="preview">
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10">
          <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> {{ session()->get('success') }} <i data-feather="x"
            class="w-4 h-4 ml-auto"></i>
        </div>
      </div>
    </div>
  @endif
  <!-- BEGIN: Datatable -->
  <div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
      <thead>
        <tr>
          <th class="border-b-2 whitespace-no-wrap">Nama Pekerjaan</th>
          <th class="border-b-2 whitespace-no-wrap">Nama Pelamar</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Batas Lamaran</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Tanggal Unggah</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $lamaran)
          <tr>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">{{ $lamaran->loker->nama }}</div>
              <div class="text-gray-600 text-xs whitespace-no-wrap">{!! $lamaran->loker->detail !!}</div>
            </td>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">{{ $lamaran->pelamar->user->username }}</div>
            </td>
            {{-- <td class="text-center border-b">
              <div class="flex sm:justify-center">
                <div class="intro-x w-10 h-10 image-fit">
                  <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                    src="{{ asset('template/dist/images/preview-11.jpg') }}">
                </div>
              </div>
            </td> --}}
            <td class="text-center border-b">
              {{ $lamaran->loker->batas_lamaran }}
            </td>
            <td class="w-40 border-b text-center">
              {{ $lamaran->tanggal_unggah }}
            </td>
            <td class="border-b w-5">
              <div class="flex sm:justify-center items-center">
                <a class="flex items-center mr-3" href="{{ route('dataPelamar.edit', $lamaran->id) }}"> <i
                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Ubah </a>
                <form action="{{ route('dataPelamar.destroy', $lamaran->id) }}" method="post"
                  onsubmit="return confirm('Yakin hapus data ?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                    <a class="flex items-center text-theme-6"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Hapus
                    </a>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- END: Datatable -->
@endsection
