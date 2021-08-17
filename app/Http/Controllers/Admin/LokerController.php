<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loker;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Loker::all();
        return view('pages.admin.data-loker.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.data-loker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'detail' => 'required',
            'tingkat_pendidikan' => 'required',
            'jenis_kelamin' => 'required',
            'status_kerja' => 'required',
            'gaji' => 'required',
            'batas_lamaran' => 'required',
            'deskripsi' => 'required',
            'persyaratan' => 'required'
        ]);

        $data = $request->all();

        $date = strtotime($data['batas_lamaran']);
        $data['batas_lamaran'] = date('Y-m-d', $date);

        if ($data['jenis_kelamin'] == 1) {
            $data['jenis_kelamin'] = 'Laki laki';
        } elseif ($data['jenis_kelamin'] == 2) {
            $data['jenis_kelamin'] = 'Perempuan';
        }

        // dd($data);

        $loker = Loker::create($data);

        return redirect('lowonganKerja')->with('success', 'Lowongan Kerja berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Loker::findOrFail($id);
        return view('pages.admin.data-loker.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Loker::findOrFail($id);
        return view('pages.admin.data-loker.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'detail' => 'required',
            'tingkat_pendidikan' => 'required',
            'jenis_kelamin' => 'required',
            'status_kerja' => 'required',
            'gaji' => 'required',
            'batas_lamaran' => 'required',
            'deskripsi' => 'required',
            'persyaratan' => 'required'
        ]);

        $data = $request->all();

        $date = strtotime($data['batas_lamaran']);
        $data['batas_lamaran'] = date('Y-m-d', $date);

        if ($data['jenis_kelamin'] == 1) {
            $data['jenis_kelamin'] = 'Laki laki';
        } elseif ($data['jenis_kelamin'] == 2) {
            $data['jenis_kelamin'] = 'Perempuan';
        } else {
            $data['jenis_kelamin'] = 'Laki laki atau Perempuan';
        }

        $loker = Loker::findOrFail($id);

        $loker->update($data);

        return redirect(route('lowonganKerja.index'))->with('success', 'Lowongan Kerja berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Loker::findOrFail($id);

        $data->delete();

        return redirect(route('lowonganKerja.index'))->with('success', 'Lowongan Kerja berhasil dihapus');
    }
}
