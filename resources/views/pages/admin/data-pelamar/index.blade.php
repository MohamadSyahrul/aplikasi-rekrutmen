@extends('layout.master')
@section('title')
  Data Pelamar
@endsection
@section('breadcrumb')
  Data Pelamar
@endsection
@section('content')
  <!-- END: Top Bar -->
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Data Pelamar
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <div class="dropdown relative ml-auto sm:ml-0">
        <button class="dropdown-toggle button px-2 box text-gray-700">
          <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
          </span>
        </button>
        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
          <div class="dropdown-box__content box p-2">
            <a href="{{ route('dataPelamar.create') }}"
              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
              <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Tambah Data </a>
          </div>
        </div>
      </div>
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
          <th class="border-b-2 whitespace-no-wrap">Username</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Nama Lengkap</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Foto</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Jenis Kelamin</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Telepon</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $user)
          <tr>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">{{ $user->username }}</div>
            </td>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">{{ $user->pelamar->nama }}</div>
            </td>
            <td class="text-center border-b">
              <div class="flex sm:justify-center">
                <div class="intro-x w-10 h-10 image-fit">
                  <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                    src="{{ asset('img/'.$user->pelamar->foto) }}">
                </div>
              </div>
            </td>
            <td class="text-center border-b">
              {{ $user->pelamar->jenis_kelamin }}
            </td>
            <td class="w-40 border-b text-center">
              {{ $user->pelamar->no_telp }}
            </td>
            <td class="border-b w-5">
              <div class="flex sm:justify-center items-center">
                <a class="flex items-bottom mr-3 text-theme-1" href="{{ route('dataPelamar.show', $user->id) }}">
                  <i data-feather="corner-down-right" class="w-4 h-4 mr-1"></i>
                  Detail
                </a>
                <a class="flex items-center mr-3" href="{{ route('dataPelamar.edit', $user->id) }}">
                  <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Ubah
                </a>
                <form action="{{ route('dataPelamar.destroy', $user->id) }}" method="post"
                  onsubmit="return confirm('Yakin hapus data ?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                    <div class="flex items-center text-theme-6"><i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                      Hapus
                    </div>
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
