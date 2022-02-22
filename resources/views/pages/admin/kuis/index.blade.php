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
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <div class="dropdown relative ml-auto sm:ml-0">
        <button class="dropdown-toggle button px-2 box text-gray-700">
          <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
          </span>
        </button>
        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
          <div class="dropdown-box__content box p-2">
            <a href="{{ route('dataKuis.create') }}"
              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
              <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Tambah Data </a>

            <a href="javascript:;" data-toggle="modal" data-target="#tambahKuis"
            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
              <i data-feather="file" class="w-4 h-4 mr-2"></i> Create Data </a>
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
          <th class="border-b-2 whitespace-no-wrap">Nama Tes</th>
          <th class="border-b-2 whitespace-no-wrap">Loker</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Durasi</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Jumlah</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $ks)
          <tr>
            <td class="border-b">
              @if($ks->nama != null)
              <div class="font-medium whitespace-no-wrap">{{$ks->nama}}</div>
              @else
              <div class="font-medium whitespace-no-wrap">Nama Kuis Tidak Tercantumkan</div>
              @endif
            </td>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">{{$ks->loker->nama}}</div>
            </td>
            <td class="text-center border-b">{{$ks->durasi}}</td>
            <td class="text-center border-b">{{$ks->loker->lamaran->count()}} Pelamar</td>
            <td class="border-b w-5">
              <div class="flex sm:justify-center items-center">
                <a class="flex items-bottom mr-3 text-theme-1" href="{{ route('dataKuis.show', $ks->id) }}">
                  <i data-feather="corner-down-right" class="w-4 h-4 mr-1"></i>
                  Detail
                </a>
                <a class="flex items-center mr-3" href="{{ route('dataKuis.edit', $ks->id) }}">
                  <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                </a>
                <form action="{{ route('dataKuis.destroy', $ks->id) }}" method="post"
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


  <div class="modal" id="tambahKuis">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Tambah Data Kuis</h2>
        </div>
        <form action="{{ route('dataTambahKuis.tambah')}}" method="POST">
            @csrf
            <div class="p-5 cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-6">

                    <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Kuis</label>
                            <select id="nama" name="nama" class="select2 w-full border mt-2 flex-1">
                                @foreach($data as $key => $sl)
                                <option id="nama[{{$key}}]" name="nama" value="{{$sl->nama}}">{{$sl->nama}}
                                </option>
                                @endforeach
                            </select>
                </div>


                <div class="col-span-12 sm:col-span-6">

                    <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Loker</label>
                            <select id="loker_id" name="loker_id" class="select2 w-full border mt-2 flex-1">
                                @foreach($loker as $key => $sl)
                                <option id="loker_id[{{$key}}]" name="loker_id" value="{{$sl->id}}">{{$sl->nama}}
                                </option>
                                @endforeach
                            </select>
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="submit" class="button w-20 bg-theme-1 text-white">Send</button>
            </div>
        </form>
    </div>
</div>
@endsection
