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
        $data['pilihanGanda'] = json_encode($request->pilihanGanda);
        Soal::create($data);

        // return redirect(route('dataKuis.edit', $request->kuis_id))->with('success', 'Soal berhasil Ditambahkan');
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
