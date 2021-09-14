<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Jawaban;
use App\Soal;
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
        echo 'haha';
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
        // dd($request->all());
        $n = 0;
        $a = 0;

        $kuis_id        = $request->kuis_id;
        $loker_id       = $request->loker_id;
        $pelamar_id     = $request->pelamar_id;
        $jawaban        = $request->jawaban;
        $soal           = Soal::where('kuis_id', $request->kuis_id)->get();
        $total_nilai    = Soal::where('kuis_id', $request->kuis_id)->sum('bobot_soal');

        // foreach($soal as $sl){
        //     $getBenar  = $sl->where('kunci_jawaban', $jawaban[$n])->select('bobot_soal')->first();
        //     if($getBenar) {
        //         $bn[$n] = $getBenar->bobot_soal;
        //     }
        //     $n++;
        // }
        // $total = array_sum($bn);
        // $benar = count($bn);
        if($request)
        {
           foreach($request->jawaban as $jwb)
           {
               $data[$n] = array(
                   'lamaran_id' => $request->lamaran_id,
                   'pelamar_id' => $request->pelamar_id,
                   'soal_id' => $request->soal_id[$n],
                   'jawaban' => $request->jawaban[$n],
               );
               Jawaban::create($data[$n]);
               $n++;
           }
        }


        $jawaban = new Jawaban();
        
        // $data = $request->all();
        // dd($data);

        return redirect(route('pelamarKuis.index'))->with('success', '');
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
