@extends('layout.master')
@section('title')
Detail Pelamar
@endsection
@section('breadcrumb')
Nilai Wawancara
@endsection

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Penilaian Wawancara</h2>
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
                            </div>
                        </div>
                    </div>
                    <div class="nav-tabs ml-auto hidden sm:flex">
                        <a data-toggle="tab" data-target="#akun" href="javascript:;" class="py-5 ml-6 active">Detail</a>
                    </div>
                </div>
                <div class="p-5">
                    <div class="tab-content">
                        <div class="tab-content__pane active" id="akun">
                            <div class="flex items-center">
                                <div class="border-l-2 border-theme-1 pl-4">
                                    <a href="" class="font-medium">Nama Pelamar</a>
                                    <div class="text-gray-600">{{ $pelamar->nama }}</div>
                                </div>
                            </div>
                            <div class="flex items-center mt-5">
                                <div class="border-l-2 border-theme-1 pl-4">
                                    <a href="" class="font-medium">Jenis Kelamin</a>
                                    <div class="text-gray-600">{{ $pelamar->jenis_kelamin }}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            Tabel Penilaian
        </h2>
    </div>
    <div class="overflow-x-auto">
        <form action="{{ route('NilaiWawancaraStore') }}" method="post">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th class="border text-center border-b-2 whitespace-no-wrap">#</th>
                        <th class="border text-center border-b-2 whitespace-no-wrap">Keterangan</th>
                        <th class="border text-center border-b-2 whitespace-no-wrap">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a=0; ?>
                    @foreach ($wawancara as $key=> $item)
                    <?php $getPilihan[$a]; $a++;?>
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">1</td>
                        <td class="border text-center">pertanyaan 1</td>
                       
                        <td class="border text-center">
                            <div class="flex flex-col sm:flex-row mt-2 inline-flex">
                                <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                        class="input border mr-2" id="sb"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][0]}}"> <label
                                        class="cursor-pointer select-none" for="sb">90</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="b"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][1]}}"> <label
                                        class="cursor-pointer select-none" for="b">85</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="c"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][2]}}"> <label
                                        class="cursor-pointer select-none" for="c">80</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="k"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][3]}}"> <label
                                        class="cursor-pointer select-none" for="k">75</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="sk"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][4]}}"> <label
                                        class="cursor-pointer select-none" for="sk">70</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">2</td>
                        <td class="border text-center">pertanyaan 2</td>
                        <td class="border text-center">
                       

                            <div class="flex flex-col sm:flex-row mt-2 inline-flex">
                                <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                        class="input border mr-2" id="sb"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][0]}}"> <label
                                        class="cursor-pointer select-none" for="sb">90</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="b"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][1]}}"> <label
                                        class="cursor-pointer select-none" for="b">85</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="c"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][2]}}"> <label
                                        class="cursor-pointer select-none" for="c">80</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="k"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][3]}}"> <label
                                        class="cursor-pointer select-none" for="k">75</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="sk"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][4]}}"> <label
                                        class="cursor-pointer select-none" for="sk">70</label>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">3</td>
                        <td class="border text-center">pertanyaan 3</td>
                        <td class="border text-center">
                       

                            <div class="flex flex-col sm:flex-row mt-2 inline-flex">
                                <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                        class="input border mr-2" id="sb"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][0]}}"> <label
                                        class="cursor-pointer select-none" for="sb">90</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="b"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][1]}}"> <label
                                        class="cursor-pointer select-none" for="b">85</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="c"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][2]}}"> <label
                                        class="cursor-pointer select-none" for="c">80</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="k"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][3]}}"> <label
                                        class="cursor-pointer select-none" for="k">75</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="sk"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][4]}}"> <label
                                        class="cursor-pointer select-none" for="sk">70</label>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">4</td>
                        <td class="border text-center">pertanyaan 4</td>
                        <td class="border text-center">
                       

                            <div class="flex flex-col sm:flex-row mt-2 inline-flex">
                                <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                        class="input border mr-2" id="sb"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][0]}}"> <label
                                        class="cursor-pointer select-none" for="sb">90</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="b"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][1]}}"> <label
                                        class="cursor-pointer select-none" for="b">85</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="c"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][2]}}"> <label
                                        class="cursor-pointer select-none" for="c">80</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="k"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][3]}}"> <label
                                        class="cursor-pointer select-none" for="k">75</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="sk"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][4]}}"> <label
                                        class="cursor-pointer select-none" for="sk">70</label>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">5</td>
                        <td class="border text-center">pertanyaan 5</td>
                        <td class="border text-center">
                       

                            <div class="flex flex-col sm:flex-row mt-2 inline-flex">
                                <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                        class="input border mr-2" id="sb"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][0]}}"> <label
                                        class="cursor-pointer select-none" for="sb">90</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="b"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][1]}}"> <label
                                        class="cursor-pointer select-none" for="b">85</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="c"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][2]}}"> <label
                                        class="cursor-pointer select-none" for="c">80</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="k"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][3]}}"> <label
                                        class="cursor-pointer select-none" for="k">75</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                        class="input border mr-2" id="sk"
                                        name="nilai[{{$key}}]" value="{{$getPilihan[$a][4]}}"> <label
                                        class="cursor-pointer select-none" for="sk">70</label>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit" class="button bg-theme-1 text-white">Send</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>
@endsection
