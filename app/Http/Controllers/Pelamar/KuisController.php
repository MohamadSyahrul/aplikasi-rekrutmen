<?php

namespace App\Http\Controllers\Pelamar;

use App\Kuis;
use App\Lamaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soal;
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
        $n=0;
        $s=0;
        foreach ($data as $dt){
            $getKuis = Kuis::where('loker_id', $data[$n]->loker->id)->get();
            $n++;
        }
        // dd($getKuis);
        foreach ($getKuis as $gk){
            $getSoal[$s] = Soal::where('kuis_id', $gk->id)->get();
            $s++;
        }
        // dd($getSoal);
        return view('pages.pelamar.kuis.index', compact('data', 'getKuis', 'getSoal'));
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
