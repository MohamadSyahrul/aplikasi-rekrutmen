@extends('layout.master')
@section('title')
Ubah Data Kuis
@endsection
@section('breadcrumb')
Kuis {{$data->nama}}
@endsection
@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Ubah Data Kuis
    </h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Horizontal Form -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Perbarui Data Kuis</h2>
            </div>
            <form action="{{ route('dataKuis.update', $data->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="p-5" id="horizontal-form">
                    <div class="preview">
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Kuis</label>
                            <input name="nama" type="text" class="input w-full border mt-2 flex-1"
                                placeholder="Masukkan Nama Kuis" value="{{$data->nama}}">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">tanggal</label>
                            <input name="tgl_kuis" type="text" class="input w-full border mt-2 flex-1"
                                value="{{$data->tgl_kuis}}">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center mt-3">
                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">waktu_mulai</label>
                            <input name="waktu_mulai" type="text" data-timepicker="true"
                                class="input w-full border mt-2 flex-1" value="{{$data->waktu_mulai}}">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center  d-flexmt-3">
                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">waktu_selesai</label>
                            <input name="waktu_selesai" type="text" data-timepicker="true"
                                class="input w-full border mt-2 flex-1" value="{{$data->waktu_selesai}}">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center  d-flexmt-3">
                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">durasi</label>
                            <input name="durasi" type="text" data-timepicker="true"
                                class="input w-full border mt-2 flex-1" value="{{$data->durasi}}">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center  d-flexmt-3">
                            <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Loker</label>
                            <select id="loker_id" name="loker_id" class="select2 w-full border mt-2 flex-1">
                                @foreach($loker as $key => $lk)
                                <option id="loker_id[{{$key}}]" name="loker_id" value="{{$lk->id}}">{{$lk->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex sm:flex-row items-center mt-5">
                            <button type="submit" class="button bg-theme-1 text-white">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- END: Horizontal Form -->
    </div>
</div>

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Data Soal
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <div class="dropdown relative ml-auto sm:ml-0">
            <button class="dropdown-toggle button px-2 box text-gray-700">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
                </span>
            </button>
            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                <div class="dropdown-box__content box p-2">
                    <a href="javascript:;" data-toggle="modal" data-target="#tambahSoal"
                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                    <i data-feather="file-plus" class="w-4 h-4 mr-2"></i>Data Soal</a>
                    <a href="javascript:;" data-toggle="modal" data-target="#createSoal"
                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-400 rounded-md">
                        <i data-feather="file" class="w-4 h-4 mr-2"></i>Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
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
                                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Bobot Soal</label>
                                <input name="bobot_soal" type="text" class="input w-full border mt-2 flex-1"
                                    value="{{$sl->bobot_soal}}">
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Soal</label>
                                <input name="soal" type="text" class="input w-full border mt-2 flex-1"
                                    value="{{$sl->soal}}">
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Kunci Jawaban</label>
                                <input name="kunci_jawaban" type="text" class="input w-full border mt-2 flex-1"
                                    value="{{$sl->kunci_jawaban}}">
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
                                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Bobot Soal</label>
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
                                <input type="text" class="input pl-12 w-full border col-span-4" placeholder="Pilihan A"
                                    name="pilihanGanda[0]" value="{{$getPilihan[$a][0]}}">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                    B
                                </div>
                                <input type="text" class="input pl-12 w-full border col-span-4" placeholder="Pilihan B"
                                    name="pilihanGanda[1]" value="{{$getPilihan[$a][0]}}">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                    C
                                </div>
                                <input type="text" class="input pl-12 w-full border col-span-4" placeholder="Pilihan C"
                                    name="pilihanGanda[2]" value="{{$getPilihan[$a][0]}}">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                    D
                                </div>
                                <input type="text" class="input pl-12 w-full border col-span-4" placeholder="Pilihan D"
                                    name="pilihanGanda[3]" value="{{$getPilihan[$a][0]}}">
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Kunci Jawaban</label>
                                <input name="kunci_jawaban" type="text" class="input w-full border mt-2 flex-1"
                                    value="{{$sl->kunci_jawaban}}">
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


<div class="modal" id="createSoal">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Tambah Data Soal Yang Sudah Ada</h2>
        </div>
        <form action="{{ route('dataSoal.tambah')}}" method="POST">
            @csrf
            <div class="p-5 cols-12 gap-4 row-gap-3">


                <div class="col-span-12 sm:col-span-6">

                    <label class="w-full lg:w-40 sm:w-20 sm:text-left sm:mr-5">Nama Soal</label>
                            <select id="nama_soal" name="nama_soal" class="select2 w-full border mt-2 flex-1">
                                @foreach($soal as $key => $sl)
                                <option id="nama_soal[{{$key}}]" name="nama_soal" value="{{$sl->nama_soal}}">{{$sl->nama_soal}}
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



@endsection()
