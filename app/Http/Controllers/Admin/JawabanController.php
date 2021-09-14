<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jawaban;
use App\Kuis;
use App\Lamaran;
use App\Loker;
use App\Pelamar;
use App\Penilaian;
use App\Soal;
use App\User;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loker = Loker::all();
        $data = Jawaban::all();
        return view('pages.admin.penilaian.index', compact(['data', 'loker']));
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
        // dd($data);
        Penilaian::create($data);
        return redirect(route('dataPenilaian.index'))->with('success', 'Nilai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loker      = Loker::findOrFail($id);
        $lamaran    = Lamaran::where('loker_id', $id)->first();
        $lamaranALL = Lamaran::where('loker_id', $id)->get();
        $l=0;
        $p1=0;
        foreach ($lamaranALL as $lmr){
            $getPelamar[$l] = Pelamar::where('id', $lamaranALL[$l]->pelamar_id )->first();
            $l++;
        }
        foreach ($getPelamar as $pl){
            $getNilai[$p1] = Penilaian::where('pelamar_id', $getPelamar[$p1]->id)->first();
            $p1++;
        }
        // dd($lamaranALL);
        $kuis       = Kuis::where('loker_id', $id)->first();
        $soal       = Soal::where('kuis_id', $kuis->id)->get();
        $data       = Jawaban::where('lamaran_id', $lamaran->id)->get();
        $pelamar    = Pelamar::where('id', $lamaran->pelamar_id )->get();
        $getNilai   = Penilaian::where('lamaran_id', $lamaran->id)->get();

        return view('pages.admin.penilaian.edit', compact(['data', 'loker', 'soal', 'kuis', 'lamaran', 'pelamar', 'getNilai', 'lamaranALL', 'getPelamar']));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelamar        = Pelamar::findOrFail($id);
        $lamaran        = Lamaran::where('pelamar_id', $pelamar->id)->first();
        $jawaban        = Jawaban::where('pelamar_id', $pelamar->id)->get();
        $getLokerID     = $lamaran->loker_id;
        $kuis           = Kuis::where('loker_id', $getLokerID)->first();
        $soal           = Soal::where('kuis_id', $kuis->id)->get();
        
        return view('pages.admin.penilaian.show', compact(['jawaban', 'soal', 'pelamar', 'lamaran', 'kuis']));
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
        //
    }
}
