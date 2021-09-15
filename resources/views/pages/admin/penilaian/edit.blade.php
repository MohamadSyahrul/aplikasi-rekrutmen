@extends('layout.master')
@section('title')
  Detail Pelamar
@endsection
@section('breadcrumb')
  Detail Pelamar
@endsection

@section('content')
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Penilaian</h2>
  </div>

  <!-- END: Profile Info -->
  <div class="intro-y tab-content mt-5">
    <div class="tab-content__pane active" id="dashboard">
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Informasi Umum -->
        <div class="intro-y box col-span-12 lg:col-span-12">
          <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Informasi Loker</h2>
            <div class="dropdown relative ml-auto sm:hidden">
              <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i>
              </a>
              <div class="nav-tabs dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                <div class="dropdown-box__content box p-2">
                  <a href="javascript:;" data-toggle="tab" data-target="#akun"
                    class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Detail</a>
                  <a href="javascript:;" data-toggle="tab" data-target="#profil"
                    class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Kuis</a>
                </div>
              </div>
            </div>
            <div class="nav-tabs ml-auto hidden sm:flex">
              <a data-toggle="tab" data-target="#akun" href="javascript:;" class="py-5 ml-6 active">Detail</a>
              <a data-toggle="tab" data-target="#profil" href="javascript:;" class="py-5 ml-6">Kuis</a>
            </div>
          </div>
          <div class="p-5">
            <div class="tab-content">
              <div class="tab-content__pane active" id="akun">
                <div class="flex items-center">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Nama Loker</a>
                    <div class="text-gray-600">{{$loker->nama}}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Detail Loker</a>
                    <div class="text-gray-600">{!! $loker->detail !!}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Status Kerja</a>
                    <div class="text-gray-600">{{$loker->status_kerja}}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Gaji</a>
                    <div class="text-gray-600">{{$loker->gaji}}</div>
                  </div>
                </div>
              </div>
              <div class="tab-content__pane" id="profil">
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Nama Kuis</a>
                    <div class="text-gray-600">{{$kuis->nama}}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">tanggal Kuis</a>
                    <div class="text-gray-600">{{$kuis->tgl_kuis}}</div>
                  </div>
                </div>
                <div class="flex items-center mt-5">
                  <div class="border-l-2 border-theme-1 pl-4">
                    <a href="" class="font-medium">Total Peserta</a>
                    <div class="text-gray-600">{{$kuis->loker->lamaran->count('pelamar_id')}} Peserta</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
      <thead>
        <tr>
          <th class="border-b-2 whitespace-no-wrap">Nama Pelamar</th>
          <th class="border-b-2 whitespace-no-wrap">Nomor Telepon</th>
          <th class="border-b-2 whitespace-no-wrap">Email</th>
          <th class="border-b-2 whitespace-no-wrap">Nilai</th>
          <th class="border-b-2 whitespace-no-wrap">Status</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($getPelamar as $pl)
          <tr>
            <td class="border-b">
                @if(!empty($pl->nama))
                    <div class="font-medium whitespace-no-wrap">{{$pl->nama}}</div>
                @else
                    <div class="font-medium whitespace-no-wrap">Nama Tidak Dicantumkan</div>
                @endif
            </td>
            <td class="border-b">
                @if(!empty($pl->no_tlp))
                    <div div class="font-medium whitespace-no-wrap">{{$pl->no_tlp}}</div>
                @else
                    <div class="font-medium whitespace-no-wrap">Telepon Tidak Dicantumkan</div>
                @endif
            </td>
            <td class="border-b">
                @if(!empty($pl->user->email))
                    <div class="font-medium whitespace-no-wrap">{{$pl->user->email}}</div>
                @else
                    <div class="font-medium whitespace-no-wrap">Email Tidak Dicantumkan</div>
                @endif
            </td>
            <td class="border-b">
                @if(!empty($pl->penilaian[0]->nilai))
                <div class="font-medium whitespace-no-wrap">{{$pl->penilaian[0]->nilai}} POIN</div>
                @else
                <div class="font-medium whitespace-no-wrap">Belum Dinilai</div>
                @endif
            </td>
            <td class="border-b">
                @if(!empty($pl->penilaian[0]->status))
                  <div class="font-medium whitespace-no-wrap">{{$pl->penilaian[0]->status}}</div>
                @else
                  <div class="font-medium whitespace-no-wrap">Belim Dinilai</div>
                @endif
            </td>
            <td class="border-b w-5">
              <div class="flex sm:justify-center items-center">
                @if(empty($pl->penilaian[0]))
                ` <a class="flex items-bottom mr-3 text-theme-12">
                  <i data-feather="x-circle" class="w-4 h-4 mr-1"></i>
                  Belum Dinilai
                  </a>
                  <a class="flex items-bottom mr-3 text-theme-1" href="{{ route('dataPenilaian.edit', $pl->id) }}">
                  <i data-feather="corner-down-right" class="w-4 h-4 mr-1"></i>
                  Detail
                  </a>
                  <form action="{{ route('dataKuis.destroy', $pl->id) }}" method="post"
                  onsubmit="return confirm('Yakin hapus data ?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                      <a class="flex items-center text-theme-6"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                      </a>
                  </button>
                  </form>
                  @else
                  <a class="flex items-bottom mr-3 text-theme-9">
                  <i data-feather="check-circle" class="w-4 h-4 mr-1"></i>
                  Sudah Dinilai
                  </a>
                  <a class="flex items-bottom mr-3 text-theme-1" href="{{ route('dataPenilaian.edit', $pl->id) }}">
                  <i data-feather="corner-down-right" class="w-4 h-4 mr-1"></i>
                  Detail
                  </a>
                  <form action="{{ route('dataKuis.destroy', $pl->id) }}" method="post"
                  onsubmit="return confirm('Yakin hapus data ?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                      <a class="flex items-center text-theme-6"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                      </a>
                  </button>
                  </form>
                @endif
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
