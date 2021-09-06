<?php

namespace App\Http\Controllers\Pelamar;

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
    public function index(Kuis $kuis)
    {
        $data = $kuis->get();
        return view('pages.pelamar.kuis.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kuis  $kuis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kuis::findOrFail($id);
        return view('pages.pelamar.kuis.show', compact('data'));
    }
}
