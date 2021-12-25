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
use App\Wawancara;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

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
        $nilai          = Penilaian::where('pelamar_id', $id)->first();
    // dd($nilai);
        
        return view('pages.admin.penilaian.show', compact(['jawaban', 'soal', 'pelamar', 'lamaran', 'kuis', 'nilai']));
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
        $data = $request->all();
        $nilai = Penilaian::findOrFail($id);
        $nilai->update($data);

        return redirect(route('dataPenilaian.index'))->with('success', 'Nilai berhasil ditambahkan');
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

    public function wawancara($id)
    {
        $pelamar    = Pelamar::with('lamaran')->findOrFail($id);
        $lamaran    = Lamaran::where('pelamar_id', $pelamar->id)->first();
        $wawancara = Wawancara::where('pelamar_id', $pelamar->id)->first();
        // dd($wawancara);
        if ($wawancara == NULL) {
            $nilai = 0;
            $nilai1 = $nilai;
            $nilai2 = $nilai;
            $nilai3 = $nilai;
            $nilai4 = $nilai;
            $nilai5 = $nilai;
            $totalNilai = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
            $rataRataNilai = $totalNilai / 5;
        }else{
            $nilai = json_decode($wawancara->nilai);
            $nilai1 = $nilai[0];
            $nilai2 = $nilai[1];
            $nilai3 = $nilai[2];
            $nilai4 = $nilai[3];
            $nilai5 = $nilai[4];
            $totalNilai = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
            $rataRataNilai = $totalNilai / 5;
        }
        // dd($nilai1,$nilai2,$nilai3,$nilai4,$nilai5);
        return view('pages.admin.penilaian.wawancara', compact('pelamar', 'wawancara', 'lamaran', 'nilai1', 'nilai2', 'nilai3', 'nilai4', 'nilai5', 'totalNilai', 'rataRataNilai'));
    }
    public function wawancaraStore(Request $request)
    {
        $data = $request->all();
        $totalNilai = (($request->nilai1 + $request->nilai2 + $request->nilai3 + $request->nilai4 + $request->nilai5) / 5);
        if($totalNilai >= 86 && $totalNilai <= 90){$ket = 'Sanget Baik';
        }elseif($totalNilai >= 81 && $totalNilai <= 85){$ket = 'Baik';
        }elseif($totalNilai >= 76 && $totalNilai <= 80){$ket = 'Cukup';
        }elseif($totalNilai >= 71 && $totalNilai <= 75){$ket = 'Kurang';
        }elseif($totalNilai >= 0 && $totalNilai <= 70){$ket = 'Sanget Kurang';
        };
        $getNilai = array($request->nilai1,$request->nilai2,$request->nilai3,$request->nilai4,$request->nilai5);
        $nilai = json_encode($getNilai);
        $createData = array(
            "pelamar_id" => $request->pelamar_id,
            "lamaran_id" => $request->lamaran_id,
            "keterangan" => $ket,
            "nilai" => $nilai,
        );
        // dd($createData);
        Wawancara::create($createData);
        
        return redirect(route('dataPenilaian.index'));

    }

    public function wawancaraUpdate(Request $request, $id)
    {
        $data = $request->all();
        $wawancaraUpdate = Wawancara::findOrFail($id);
        $totalNilai = (($request->nilai1 + $request->nilai2 + $request->nilai3 + $request->nilai4 + $request->nilai5) / 5);
        if($totalNilai >= 86 && $totalNilai <= 90){$ket = 'Sanget Baik';
        }elseif($totalNilai >= 81 && $totalNilai <= 85){$ket = 'Baik';
        }elseif($totalNilai >= 76 && $totalNilai <= 80){$ket = 'Cukup';
        }elseif($totalNilai >= 71 && $totalNilai <= 75){$ket = 'Kurang';
        }elseif($totalNilai >= 0 && $totalNilai <= 70){$ket = 'Sanget Kurang';
        };
        $getNilai = array($request->nilai1,$request->nilai2,$request->nilai3,$request->nilai4,$request->nilai5);
        $nilai = json_encode($getNilai);
        $createData = array(
            "pelamar_id" => $request->pelamar_id,
            "lamaran_id" => $request->lamaran_id,
            "keterangan" => $ket,
            "nilai" => $nilai,
        );
        // dd($data);
        $wawancaraUpdate->update($createData);
        
        return redirect(route('dataPenilaian.index'));

    }


}
