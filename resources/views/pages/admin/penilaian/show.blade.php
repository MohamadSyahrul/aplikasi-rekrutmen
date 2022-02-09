@extends('layout.master')
@section('title')
  Detail Pelamar
@endsection
@section('breadcrumb')
  Detail Pelamar
@endsection

@section('content')
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">PENILAIAN</h2>
  </div>
  <!-- END: Profile Info -->
  <div class="intro-y tab-content mt-5">
    <div class="tab-content__pane active" id="dashboard">
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Pendidikan-->
        @if(!empty($nilai))
        <div class="intro-y box col-span-12 lg:col-span-12">
            <form action="{{route('dataPenilaian.update', $nilai->id)}}" method="POST" >
              @method('PATCH')
                @csrf
                <input type="hidden" name="lamaran_id" value="{{$lamaran->id}}" >
                <input type="hidden" name="kuis_id" value="{{$kuis->id}}" >
                <input type="hidden" name="pelamar_id" value="{{$pelamar->id}}" >
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Nilai Untuk Pelamar : @if(!empty($pelamar->nama)){{{$pelamar->nama}}}@endif</h2>
                </div>
                <div class="p-5">
                    <div class="flex flex-col sm:flex-row">
                      <div class="mr-auto">
                          <a href="" class="font-medium">Nilai</a>
                          <div class="text-gray-600 mt-1">
                              <input name="nilai" type="text" class="input w-full border mt-2 flex-1" placeholder="Masukkan Nilai" value="{{$nilai->nilai}}">
                          </div>
                      </div>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-5">
                      <div class="mr-auto">
                          <a href="" class="font-medium">Status / Keterangan</a>
                          <div class="text-gray-600 mt-1">
                              <select name="status" id="status">
                                  <option value="diterima">Diterima</option>
                                  <option value="tidak diterima">Tidak Diterima</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <button type="submit" class="button bg-theme-1 text-white">Sumbit</button>
                </div>
            </form>
        </div>
        @else
        <div class="intro-y box col-span-12 lg:col-span-12">
            <form action="{{route('dataPenilaian.store')}}" method="POST" >
                @csrf
                <input type="hidden" name="lamaran_id" value="{{$lamaran->id}}" >
                <input type="hidden" name="kuis_id" value="{{$kuis->id}}" >
                <input type="hidden" name="pelamar_id" value="{{$pelamar->id}}" >
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Nilai Untuk Pelamar : @if(!empty($pelamar->nama)){{{$pelamar->nama}}}@endif </h2>
                </div>
                <div class="p-5">
                    <div class="flex flex-col sm:flex-row">
                      <div class="mr-auto">
                          <a href="" class="font-medium">Nilai</a>
                          <div class="text-gray-600 mt-1">
                              <input name="nilai" type="text" class="input w-full border mt-2 flex-1" placeholder="Masukkan Nilai">
                          </div>
                      </div>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-5">
                      <div class="mr-auto">
                          <a href="" class="font-medium">Status / Keterangan</a>
                          <div class="text-gray-600 mt-1">
                              <select name="status" id="status">
                                  <option value="diterima">Diterima</option>
                                  <option value="tidak diterima">Tidak Diterima</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <button type="submit" class="button bg-theme-1 text-white">Sumbit</button>
                </div>
            </form>
        </div>
        @endif
      </div>
    </div>
  </div>

  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">PENGECEKAN JAWABAN</h2>
  </div>
  <!-- END: Profile Info -->
  <div class="intro-y tab-content mt-5">
    <div class="tab-content__pane active" id="dashboard">
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Pendidikan-->
        <div class="intro-y box col-span-12 lg:col-span-6">
          <div class="flex items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">SOAL, total: {{$soal->count()}} soal, Nilai Maksimal: {{$soal->sum('bobot_soal')}} </h2>
          </div>
          <div class="p-5">
              <?php $n = 1;  ?>
            @foreach($soal as $sl)
            <div class="flex flex-col sm:flex-row">
              <div class="mr-auto">
                <a href="" class="font-medium">Soal Nomor {{$n++}}, Dengan Bobot {{$sl->bobot_soal}}</a>
                <div class="text-gray-600 mt-1">{{$sl->soal}}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="intro-y box col-span-12 lg:col-span-3">
          <div class="flex items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">JAWABAN, total dijawab : {{$jawaban->count()}}</h2>
          </div>
          <div class="p-5">
              <?php $j=1;$n=0;  ?>
            @foreach($jawaban as $jwb)
            <div class="flex flex-col sm:flex-row">
              <div class="mr-auto">
                <a href="" class="font-medium">Jawaban Nomor {{$j++}}</a>
                @if ($jwb->jawaban == $soal[$n]->kunci_jawaban)
                  <div class="text-green-600 mt-1">{{$jwb->jawaban}}</div>
                @else
                  <div class="text-red-600 mt-1">{{$jwb->jawaban}}</div>
                @endif
              </div>
            </div>
            <?php $n++; ?>
            @endforeach
          </div>
        </div>

        <div class="intro-y box col-span-12 lg:col-span-3">
          <div class="flex items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">KUNCI JAWABAN</h2>
          </div>
          <div class="p-5">
              <?php $k=1; ?>
              @foreach ($soal as $sl2)
            <div class="flex flex-col sm:flex-row">
              <div class="mr-auto">
                <a href="" class="font-medium">Kunci Jawaban Nomor {{$k++}}</a>
                <div class="text-gray-600 mt-1">{{$sl2->kunci_jawaban}}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
