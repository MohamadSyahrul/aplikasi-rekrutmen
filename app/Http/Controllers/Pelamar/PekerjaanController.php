<?php

namespace App\Http\Controllers\Pelamar;

use App\Pekerjaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PekerjaanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pelamar.pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required',
            'pengalaman' => 'required',
            'tahun' => 'required',
            'lama_bekerja' => 'required|numeric',
        ]);

        $data = $request->all();

        $date = strtotime($data['tahun']);
        $data['tahun'] = date('Y-m-d', $date);

        $data['pelamar_id'] = Auth::user()->pelamar->id;
        $pekerjaan = Pekerjaan::create($data);

        return redirect(route('pelamarDataPelamar.show'))->with('success', 'Pekerjaan berhasil ditambahkan');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        return view('pages.pelamar.pekerjaan.edit', compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $request->validate([
            'lokasi' => 'required',
            'pengalaman' => 'required',
            'tahun' => 'required',
            'lama_bekerja' => 'required|numeric',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($pekerjaan->id);

        $date = strtotime($request['tahun']);

        $pekerjaan['lokasi'] = $request->lokasi;
        $pekerjaan['pengalaman'] = $request->pengalaman;
        $pekerjaan['tahun'] = date('Y-m-d', $date);
        $pekerjaan['lama_bekerja'] = $request->lama_bekerja;

        $pekerjaan->update();
        // $data['pelamar_id'] = Auth::user()->pelamar->id;

        return redirect(route('pelamarDataPelamar.show'))->with('success', 'Pekerjaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();

        return redirect(route('pelamarDataPelamar.show'))->with('success', 'Pekerjaan berhasil dihapus');
    }
}
