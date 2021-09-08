@extends('layout.master')
@section('title')
  Data Pelamar
@endsection
@section('breadcrumb')
  Data Pelamar
@endsection

@section('content')
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Pelamar</h2>
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
  <!-- BEGIN: Profile Info -->
  <div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
      <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
          <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"
            src="{{ asset('template/dist/images/preview-11.jpg') }}">
          <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2">
            <i class="w-4 h-4 text-white" data-feather="camera"></i>
          </div>
        </div>
        <div class="ml-5">
          <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
            {{ Auth::user()->pelamar->nama }}</div>
          <div class="text-gray-600">{{ '-' }}</div>
        </div>
      </div>
      <div
        class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
        <div class="truncate sm:whitespace-normal flex items-center">
          <i data-feather="user" class="w-4 h-4 mr-2"></i>
          <div class="text-gray-600">{{ Auth::user()->username }}</div>
        </div>
        <div class="truncate sm:whitespace-normal flex items-center mt-3">
          <i data-feather="mail" class="w-4 h-4 mr-2"></i>
          <div class="text-gray-600">{{ Auth::user()->email }}</div>
        </div>
        <div class="truncate sm:whitespace-normal flex items-center mt-3">
          <i data-feather="calendar" class="w-4 h-4 mr-2"></i>
          <div class="text-gray-600">{{ date('d - M - Y', strtotime(Auth::user()->created_at)) }}</div>
        </div>
      </div>
      <div class="w-full sm:w-auto flex items-center justify-center m-3 sm:mt-0">
        <a href="{{ route('pelamarDataPelamar.download', Auth::user()->pelamar->id) }}">
          <button class="button text-white bg-theme-1 shadow-md mr-2">Download Berkas</button>
        </a>
      </div>
      <div class="w-full sm:w-auto flex items-center justify-center m-3 sm:mt-0">
        <a href="{{ route('pelamarDataPelamar.edit', Auth::user()->id) }}">
          <button class="button text-white bg-theme-1 shadow-md mr-2">Ubah Data</button>
        </a>
      </div>
    </div>
  </div>
  <!-- END: Profile Info -->
  <div class="intro-y tab-content mt-5">
    <div class="tab-content__pane active" id="dashboard">
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Informasi Umum -->
        <div class="intro-y box col-span-12 lg:col-span-12">
          <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Informasi Umum</h2>
            <div class="dropdown relative ml-auto sm:hidden">
              <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i>
              </a>
              <div class="nav-tabs dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                <div class="dropdown-box__content box p-2">
                  <a href="javascript:;" data-toggle="tab" data-target="#profil"
                    class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Profil</a>
                  <a href="javascript:;" data-toggle="tab" data-target="#pendidikan"
                    class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Pendidikan</a>
                </div>
              </div>
            </div>
            <div class="nav-tabs ml-auto hidden sm:flex">
              <a data-toggle="tab" data-target="#profil" href="javascript:;" class="py-5 ml-6 active">Profil</a>
              <a data-toggle="tab" data-target="#pendidikan" href="javascript:;" class="py-5 ml-6">Pendidikan</a>
            </div>
          </div>
          <div class="p-5">
            <div class="tab-content">
              <div class="tab-content__pane active" id="profil">
                <div class="flex items-center">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Nama</a>
                    <div class="text-gray-600">{{ Auth::user()->pelamar->nama }}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Tempat Lahir</a>
                    <div class="text-gray-600">{{ Auth::user()->pelamar->tempat_lahir }}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Tanggal Lahir</a>
                    <div class="text-gray-600">{{ date('d - M - Y', strtotime(Auth::user()->pelamar->tgl_lahir)) }}
                    </div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Jenis Kelamin</a>
                    <div class="text-gray-600">{{ Auth::user()->pelamar->jenis_kelamin }}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">No Telepon</a>
                    <div class="text-gray-600">{{ Auth::user()->pelamar->no_telp }}</div>
                  </div>
                </div>
              </div>
              <div class="tab-content__pane" id="pendidikan">
                <div class="flex items-center">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Sekolah Dasar</a>
                    <div class="text-gray-600">{{ Auth::user()->pelamar->pendidikan->sd }}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Sekolah Menengah Pertama</a>
                    <div class="text-gray-600">{{ Auth::user()->pelamar->pendidikan->smp }}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Sekolah Menengah Atas</a>
                    <div class="text-gray-600">{{ Auth::user()->pelamar->pendidikan->sma }}
                    </div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Perguruan Tinggi</a>
                    <div class="text-gray-600">{{ Auth::user()->pelamar->pendidikan->perguruan_tinggi }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END: Informasi umum-->
        <!-- BEGIN: Pekerjaan -->
        <div class="intro-y box col-span-12 lg:col-span-12">
          <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Pekerjaan</h2>
            <div class="w-full sm:w-auto flex items-center justify-center sm:mt-0">
              <a href="{{ route('pekerjaan.create') }}">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Data</button>
              </a>
            </div>
          </div>
          <div class="p-5">
            @foreach (Auth::user()->pelamar->pekerjaan as $pekerjaan)
              <div class="relative flex items-center my-3">
                <div class="w-12 h-12 flex-none image-fit">
                  <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"
                    src="{{ asset('template/dist/images/preview-11.jpg') }}">
                </div>
                <div class="ml-4 mr-auto">
                  <a href="" class="font-medium">{{ $pekerjaan->lokasi }}</a>
                  <div class="text-gray-600 mr-5 sm:mr-5">
                    {{ 'Sebagai ' . $pekerjaan->pengalaman . ' selama ' . $pekerjaan->lama_bekerja . ' Tahun' }}</div>
                  <div class="font-medium text-gray-700 block">{{ 'Tahun ' . date('Y', strtotime($pekerjaan->tahun)) }}
                  </div>
                </div>

                <div class="flex sm:justify-center items-center mx-5 sm:mr-5">
                  <a class="flex items-bottom mr-3" href="{{ route('pekerjaan.edit', $pekerjaan->id) }}">
                    <i data-feather="edit-2" class="w-4 h-4 mr-1"></i>
                    Edit
                  </a>
                  <form action="{{ route('pekerjaan.destroy', $pekerjaan->id) }}" method="post"
                    onsubmit="return confirm('Yakin hapus data ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                      <div class="flex items-bottom text-theme-6" href="">
                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                        Delete
                      </div>
                    </button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <!-- END: Pekerjaan -->
      </div>
    </div>
  </div>
@endsection
