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
          <th class="border-b-2 whitespace-no-wrap">Tanggal</th>
          <th class="border-b-2 whitespace-no-wrap">Nama Pekerjaan</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $loker)
          <tr>
            <td class="whitespace-no-wrap border-b">{{ date('d F Y',strtotime($loker->created_at)) }}</td>
            <td class="border-b">
              <div class="font-medium whitespace-no-wrap">{{ $loker->nama }}</div>
              <div class="text-gray-600 text-xs whitespace-no-wrap">{!! $loker->detail !!}</div>
            </td>
            <td class="border-b w-5">
              <div class="flex sm:justify-center items-center">
                <a class="flex items-bottom mr-3 text-theme-1" href="{{ route('lowonganKerja.show', $loker->id) }}">
                  <i data-feather="corner-down-right" class="w-4 h-4 mr-1"></i>
                  Detail
                </a>
                {{-- <a href="{{ route('detail.show',$loker->id) }}"
                    class="button text-white bg-theme-1">
                    Aktif
                </a>
                @else
                <button class="button text-white bg-theme-20">
                   Tidak aktif
               </button>
                @endif --}}
                        <input data-target="#input" name="status" class="show-code input input--switch border" type="checkbox"
                        {{$loker->status ? 'checked' : '' }} onclick="changeStatus(event.target, {{ $loker->id }});">

              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- END: Datatable -->

    <script>
        // $(document).ready(function(){
        //     $
        // })
        $(function(){
            $('.show-code').change(function(){
                var status  = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                    $.ajax({
                        type : "GET",
                        dataType : "json",
                        url : "/changeStatus",
                        data : {'status': status, 'id': id},
                        success: function(data){
                            console.log(data.success)
                        }

                    });
            });
        });
    </script>
@endsection
@push('plugin-scripts')

@endpush
