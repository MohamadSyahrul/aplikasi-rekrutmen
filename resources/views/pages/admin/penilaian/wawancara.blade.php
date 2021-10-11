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
        <p>
            <div class="text-center">
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"
                    class="button inline-block bg-theme-1 text-white">
                    Tambah Data
                </a>
            </div>

            <div class="modal" id="header-footer-modal-preview">
                <div class="modal__content">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">Broadcast Message</h2>
                    </div>
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6"> <label>From</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="example@gmail.com"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label>To</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="example@gmail.com"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Subject</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Important Meeting"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Has the Words</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Job, Work, Documentation"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Doesn't Have</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Job, Work, Documentation"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Size</label> <select
                                class="input w-full border mt-2 flex-1">
                                <option>10</option>
                                <option>25</option>
                                <option>35</option>
                                <option>50</option>
                            </select> </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="button"
                            class="button w-20 border text-gray-700 mr-1">Cancel</button> <button type="button"
                            class="button w-20 bg-theme-1 text-white">Send</button> </div>
                </div>
            </div>
        </p>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="border text-center border-b-2 whitespace-no-wrap">#</th>
                    <th class="border text-center border-b-2 whitespace-no-wrap">Keterangan</th>
                    <th class="border text-center border-b-2 whitespace-no-wrap">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-200">
                    <td class="border text-center">1</td>
                    <td class="border text-center">Penilaian 1</td>
                    <td class="border text-center">
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-chris-evans"
                                    name="horizontal_radio_button" value="horizontal-radio-chris-evans"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-chris-evans">SB</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-liam-neeson"
                                    name="horizontal_radio_button" value="horizontal-radio-liam-neeson"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">B</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">C</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">K</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">SK</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-200">
                    <td class="border text-center">2</td>
                    <td class="border text-center">Penilaian 2</td>
                    <td class="border text-center">
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-chris-evans"
                                    name="horizontal_radio_button" value="horizontal-radio-chris-evans"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-chris-evans">SB</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-liam-neeson"
                                    name="horizontal_radio_button" value="horizontal-radio-liam-neeson"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">B</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">C</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">K</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">SK</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-200">
                    <td class="border text-center">3</td>
                    <td class="border text-center">Penilaian 3</td>
                    <td class="border text-center">
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-chris-evans"
                                    name="horizontal_radio_button" value="horizontal-radio-chris-evans"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-chris-evans">SB</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-liam-neeson"
                                    name="horizontal_radio_button" value="horizontal-radio-liam-neeson"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">B</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">C</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">K</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                    class="input border mr-2" id="horizontal-radio-daniel-craig"
                                    name="horizontal_radio_button" value="horizontal-radio-daniel-craig"> <label
                                    class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">SK</label>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
