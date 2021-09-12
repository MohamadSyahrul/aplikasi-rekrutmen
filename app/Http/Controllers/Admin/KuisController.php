<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kuis;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kuis::all();
        // $data = Soal::orderBy('kuis_id', 'desc')->groupBy('kuis_id')->get();
        // $data2 = Soal::groupBy('kuis_id')
        //                 ->selectRaw('sum(bobot_soal) as nilaiMax')
        //                 ->get();
        // dd($data);
        return view('pages.admin.kuis.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kuis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Kuis::findOrFail($id);
        return view('pages.admin.kuis.edit', compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kuis::findOrFail($id);

        $data->delete();

        return redirect(route('dataKuis.index'))->with('success', 'Lowongan Kerja berhasil dihapus');
    }
}
