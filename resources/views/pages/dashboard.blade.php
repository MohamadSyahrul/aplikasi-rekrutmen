@extends('layout.master')
@section('title')
  Dashboard
@endsection
@section('breadcrumb')
  Dashboard
@endsection
@section('content')

  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
      <!-- BEGIN: General Report -->
      <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
          <h2 class="text-lg font-medium truncate mr-5">
            Dashboard
          </h2>
          <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
            Reload Data </a>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
          <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <div class="report-box zoom-in">
              <div class="box p-5">
                <div class="flex">
                  <i data-feather="users" class="report-box__icon text-theme-10"></i>

                </div>
                <div class="text-3xl font-bold leading-8 mt-6">{{$user}}</div>
                <div class="text-base text-gray-600 mt-1">Total Pelamar</div>
              </div>
            </div>
          </div>
          <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <div class="report-box zoom-in">
              <div class="box p-5">
                <div class="flex">
                  <i data-feather="package" class="report-box__icon text-theme-11"></i>

                </div>
                <div class="text-3xl font-bold leading-8 mt-6">{{$lamaran}}</div>
                <div class="text-base text-gray-600 mt-1">Total Lamaran</div>
              </div>
            </div>
          </div>
          <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <div class="report-box zoom-in">
              <div class="box p-5">
                <div class="flex">
                  <i data-feather="log-in" class="report-box__icon text-theme-12"></i>

                </div>
                <div class="text-3xl font-bold leading-8 mt-6">{{ $lowongan }}</div>
                <div class="text-base text-gray-600 mt-1">Total Lowongan</div>
              </div>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            @foreach ($kategori as $item)
            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <div class="flex">
                    <i data-feather="paperclip" class="report-box__icon text-theme-70"></i>
                  </div>
                  <div class="text-3xl font-bold leading-8 mt-6">{{count([$item->pelamar_id])}}</div>
                  <div class="text-base text-gray-600 mt-1">{{$item->nama}}</div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
      </div>
      <!-- END: General Report -->

    </div>

  </div>
@endsection
