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
      Data Penilaian
    </h2>
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
          <th class="border-b-2 whitespace-no-wrap">Nama Loker</th>
          <th class="border-b-2 whitespace-no-wrap">Tanggal Kuis</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Jumlah</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($loker as $lk)
          <tr>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">{{$lk->nama}}</div>
            </td>
            <td class="border-b">
              @if(!empty($lk->kuis->tgl_kuis))
                <div class="font-medium whitespace-no-wrap">{{$lk->kuis->tgl_kuis}}</div>
              @else
                <div class="font-medium whitespace-no-wrap">Tidak ada Kuis</div>
              @endif
            </td>
            <td class="border-b text-center">
              <div class="font-medium whitespace-no-wrap">{{$lk->lamaran->count('pelamar_id')}} Peserta</div>
            </td>
            <td class="border-b w-5">
              <div class="flex sm:justify-center items-center">
                <a class="flex items-bottom mr-3 text-theme-1" href="{{ route('dataPenilaian.show', $lk->id) }}">
                  <i data-feather="corner-down-right" class="w-4 h-4 mr-1"></i>
                  Detail
                </a>
                <form action="{{ route('dataPenilaian.destroy', $lk->id) }}" method="post"
                  onsubmit="return confirm('Yakin hapus data ?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                    <a class="flex items-center text-theme-6"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
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
