<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        if($data['pilihanGanda'] == [null,null,null,null])
        {
            $data['pilihanGanda'] = null;
            Soal::create($data);
        }else{
            $data['pilihanGanda'] = json_encode($request->pilihanGanda);
            Soal::create($data);
        }

        return redirect(route('dataKuis.edit', $request->kuis_id))->with('success', 'Soal berhasil Ditambahkan');
    }

    public function tambah(Request $request)
    {
        // $data = $request->all();
        $data = Soal::select('nama_soal','bobot_soal','soal','pilihanGanda','kunci_jawaban', 'kuis_id')
                    ->where('nama_soal', $request->nama_soal)->get();
        // dd($data[0]['bobot_soal']);
        Soal::create([
            'nama_soal' => $request->nama_soal,
            'bobot_soal' => $data[0]['bobot_soal'],
            'soal' => $data[0]['soal'],
            'pilihanGanda' => $data[0]['pilihanGanda'],
            'kunci_jawaban' => $data[0]['kunci_jawaban'],
            'kuis_id' => $data[0]['kuis_id']

        ]);

        return redirect(route('dataKuis.edit', $data[0]['kuis_id']))->with('success', 'Soal berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $soal = Soal::findOrFail($id);
        $data = $request->all();

        $soal->update($data);

        return redirect(route('dataKuis.edit', $request->kuis_id))->with('success', 'Soal berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Soal::findOrFail($id);

        $data->delete();

        return redirect(route('dataKuis.edit', $data->kuis_id))->with('success', 'Soal berhasil Dihapus');
    }
}
