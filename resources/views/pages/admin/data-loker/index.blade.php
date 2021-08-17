@extends('layout.master')
@section('title')
  Data Lowongan Kerja
@endsection
@section('breadcrumb')
  Data Lowongan Kerja
@endsection

@section('content')
  <!-- END: Top Bar -->
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Data Lowongan Kerja
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href="{{ route('lowonganKerja.create') }}">
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
          <th class="border-b-2 whitespace-no-wrap">Nama</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Pendidikan</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Jenis Kelamin</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $loker)
          <tr>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">{{ $loker->nama }}</div>
              <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $loker->detail }}</div>
            </td>
            <td class="text-center border-b">{{ $loker->tingkat_pendidikan }}</td>
            <td class="text-center border-b">{{ $loker->jenis_kelamin }}</td>
            <td class="border-b w-5">
              <div class="flex sm:justify-center items-center">
                <a class="flex items-bottom mr-3 text-theme-1" href="{{ route('lowonganKerja.show', $loker->id) }}">
                  <i data-feather="corner-down-right" class="w-4 h-4 mr-1"></i>
                  Detail
                </a>
                <a class="flex items-bottom mr-3" href="{{ route('lowonganKerja.edit', $loker->id) }}">
                  <i data-feather="edit-2" class="w-4 h-4 mr-1"></i>
                  Edit
                </a>
                <form action="{{ route('lowonganKerja.destroy', $loker->id) }}" method="post"
                  onsubmit="return confirm('Yakin hapus data ?')">
                  @csrf
                  @method('DELETE')
                  <a class="flex items-bottom text-theme-6" href="">
                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                    Delete
                  </a>
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
@push('plugin-scripts')

@endpush
