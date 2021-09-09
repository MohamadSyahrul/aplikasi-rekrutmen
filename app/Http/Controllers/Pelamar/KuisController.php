<?php

namespace App\Http\Controllers\Pelamar;

use App\Kuis;
use App\Lamaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kuis $kuis)
    {
        $data = Lamaran::where('pelamar_id', Auth::user()->pelamar->id)->get();
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
