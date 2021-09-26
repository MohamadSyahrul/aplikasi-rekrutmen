@extends('layout.master')
@section('title')
Detail Kuis
@endsection
@section('breadcrumb')
Detail Kuis
@endsection

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Detail Kuis</h2>
</div>
<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: FAQ Menu -->
    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3" style="position: fixed;">
        <div class="box mt-5">
            <div class="px-4 pb-3 pt-5">
                <a class="flex rounded-lg items-center px-4 py-2 bg-theme-1 text-white font-medium"
                    href="#informasi_umum">
                    <i data-feather="minimize-2" class="w-4 h-4 mr-2"></i>
                    <div class="flex-1 truncate">Data Kuis</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="#kualifikasi">
                    <i data-feather="paperclip" class="w-4 h-4 mr-2"></i>
                    <div class="flex-1 truncate">Data Soal</div>
                </a>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3">
    </div>
    <!-- END: FAQ Menu -->
    <!-- BEGIN: FAQ Content -->
    <div class="intro-y col-span-12 lg:col-span-8 xl:col-span-9">
        <div class="intro-y box lg:mt-5" id="informasi_umum">
            <div class="flex items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Data Kuis</h2>
            </div>
            <div class="accordion p-5">
                <div class="accordion__pane active border border-gray-200 p-4">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Nama Kuis</a>
                    <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->nama }}</div>
                </div>
                <div class="accordion__pane border border-gray-200 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Tanggal</a>
                    <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->tgl_kuis }}</div>
                </div>
                <div class="accordion__pane border border-gray-200 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Waktu Mulai</a>
                    <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->waktu_mulai }}
                    </div>
                </div>
                <div class="accordion__pane border border-gray-200 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Waktu Selesai</a>
                    <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{$data->waktu_selesai }}
                    </div>
                </div>
                <div class="accordion__pane border border-gray-200 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Durasi</a>
                    <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->durasi }}</div>
                </div>
                <div class="accordion__pane border border-gray-200 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Loker</a>
                    <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $data->loker->nama }}
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y box mt-5" id="kualifikasi">
            <div class="flex items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Data Soal</h2>
            </div>
            <div class="accordion p-5">
               

                <table class="table">
                    <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">Tipe Soal</th>
                            <th class="border-b-2 whitespace-no-wrap">Nama Soal</th>
                            <th class="border-b-2 whitespace-no-wrap">Soal</th>
                            <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $a=0; ?>
                        <?php $b=0; ?>
                        @foreach ($soal as $sl)
                        <tr>
                            <td class="border-b">
                                @if(empty($sl->pilihanGanda))
                                <div class="font-medium whitespace-no-wrap">Isian</div>
                                @else
                                <div class="font-medium whitespace-no-wrap">Pilihan Ganda</div>
                                @endif
                            </td>
                            <td class="border-b">
                                <div class="font-medium whitespace-no-wrap">{{$sl->nama_soal}}</div>
                            </td>
                            <td class="border-b">
                                <div class="font-medium whitespace-no-wrap">{{$sl->soal}}</div>
                            </td>
                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a href="javascript:;" data-toggle="modal" data-target="#editSoal{{$sl->id}}"
                                        class="flex items-center mr-3">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('dataSoal.destroy', $sl->id) }}" method="post"
                                        onsubmit="return confirm('Yakin hapus data ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <a class="flex items-center text-theme-6"> <i data-feather="trash-2"
                                                    class="w-4 h-4 mr-1"></i> Delete
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div class="modal" id="editSoal{{$sl->id}}">
                            @if(empty($sl->pilihanGanda))
                            <?php $getPilihan[$a]; $a++; $b++;?>
                            <div class="modal__content">
                                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                    <h2 class="font-medium text-base mr-auto">Edit Data Soal Isian</h2>
                                </div>
                                <form action="{{ route('dataSoal.update', $sl->id) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="p-5 cols-12 gap-4 row-gap-3">
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Soal</label>
                                            <input name="nama_soal" type="text" class="input w-full border mt-2 flex-1"
                                                value="{{$sl->nama_soal}}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Bobot
                                                Soal</label>
                                            <input name="bobot_soal" type="text" class="input w-full border mt-2 flex-1"
                                                value="{{$sl->bobot_soal}}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Soal</label>
                                            <input name="soal" type="text" class="input w-full border mt-2 flex-1"
                                                value="{{$sl->soal}}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Kunci
                                                Jawaban</label>
                                            <input name="kunci_jawaban" type="text"
                                                class="input w-full border mt-2 flex-1" value="{{$sl->kunci_jawaban}}">
                                        </div>
                                        <input name="kuis_id" type="hidden" class="input w-full border mt-2 flex-1"
                                            value="{{$sl->kuis_id}}">
                                    </div>
                                    <div class="px-5 py-3 text-right border-t border-gray-200">
                                        <button type="submit" class="button w-20 bg-theme-1 text-white">Send</button>
                                    </div>
                                </form>
                            </div>
                            @else
                            <div class="modal__content">
                                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                    <h2 class="font-medium text-base mr-auto">Edit Data Soal Pilihan Ganda</h2>
                                </div>
                                <form action="{{ route('dataSoal.update', $sl->id) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="p-5 cols-12 gap-4 row-gap-3">
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Soal</label>
                                            <input name="nama_soal" type="text" class="input w-full border mt-2 flex-1"
                                                value="{{$sl->nama_soal}}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Bobot
                                                Soal</label>
                                            <input name="bobot_soal" type="text" class="input w-full border mt-2 flex-1"
                                                value="{{$sl->bobot_soal}}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Soal</label>
                                            <input name="soal" type="text" class="input w-full border mt-2 flex-1"
                                                value="{{$sl->soal}}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Pilihan</label>
                                        </div>
                                        <div class="relative">
                                            <div
                                                class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                                A
                                            </div>
                                            <input type="text" class="input pl-12 w-full border col-span-4"
                                                placeholder="Pilihan A" name="pilihanGanda[0]"
                                                value="{{$getPilihan[$a][0]}}">
                                        </div>
                                        <div class="relative">
                                            <div
                                                class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                                B
                                            </div>
                                            <input type="text" class="input pl-12 w-full border col-span-4"
                                                placeholder="Pilihan B" name="pilihanGanda[1]"
                                                value="{{$getPilihan[$a][0]}}">
                                        </div>
                                        <div class="relative">
                                            <div
                                                class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                                C
                                            </div>
                                            <input type="text" class="input pl-12 w-full border col-span-4"
                                                placeholder="Pilihan C" name="pilihanGanda[2]"
                                                value="{{$getPilihan[$a][0]}}">
                                        </div>
                                        <div class="relative">
                                            <div
                                                class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                                D
                                            </div>
                                            <input type="text" class="input pl-12 w-full border col-span-4"
                                                placeholder="Pilihan D" name="pilihanGanda[3]"
                                                value="{{$getPilihan[$a][0]}}">
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Kunci
                                                Jawaban</label>
                                            <input name="kunci_jawaban" type="text"
                                                class="input w-full border mt-2 flex-1" value="{{$sl->kunci_jawaban}}">
                                        </div>
                                        <input name="kuis_id" type="hidden" class="input w-full border mt-2 flex-1"
                                            value="{{$sl->kuis_id}}">
                                    </div>
                                    <div class="px-5 py-3 text-right border-t border-gray-200">
                                        <button type="submit" class="button w-20 bg-theme-1 text-white">Send</button>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <!-- END: FAQ Content -->
</div>

{{-- modal --}}

<div class="modal" id="tambahSoal">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Tambah Data Soal</h2>
        </div>
        <form action="{{ route('dataSoal.store')}}" method="POST">
            @csrf
            <div class="p-5 cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-6">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Soal</label>
                    <input name="nama_soal" type="text" class="input w-full border mt-2 flex-1"
                        placeholder="Masukkan Nama Soal">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Bobot Soal</label>
                    <input name="bobot_soal" type="text" class="input w-full border mt-2 flex-1"
                        placeholder="Masukkan Bobot Soal">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Soal</label>
                    <input name="soal" type="text" class="input w-full border mt-2 flex-1" placeholder="Masukkan Soal">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Pilihan</label>
                </div>
                <div class="relative">
                    <div
                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                        A
                    </div>
                    <input type="text" class="input pl-12 w-full border col-span-4" placeholder="Pilihan A"
                        name="pilihanGanda[0]">
                </div>
                <div class="relative">
                    <div
                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                        B
                    </div>
                    <input type="text" class="input pl-12 w-full border col-span-4" placeholder="Pilihan B"
                        name="pilihanGanda[1]">
                </div>
                <div class="relative">
                    <div
                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                        C
                    </div>
                    <input type="text" class="input pl-12 w-full border col-span-4" placeholder="Pilihan C"
                        name="pilihanGanda[2]">
                </div>
                <div class="relative">
                    <div
                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                        D
                    </div>
                    <input type="text" class="input pl-12 w-full border col-span-4" placeholder="Pilihan D"
                        name="pilihanGanda[3]">
                </div>
                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">
                    <h4>*kosongkan Bila soal isian</h4>
                </label>
                <div class="col-span-12 sm:col-span-6">
                    <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Kunci Jawaban</label>
                    <input name="kunci_jawaban" type="text" class="input w-full border mt-2 flex-1"
                        placeholder="Masukkan Kunci Jawaban">
                </div>
                <input name="kuis_id" type="hidden" class="input w-full border mt-2 flex-1" value="{{$data->id}}">
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="submit" class="button w-20 bg-theme-1 text-white">Send</button>
            </div>
        </form>
    </div>
</div>
@endsection
