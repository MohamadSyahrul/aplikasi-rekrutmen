<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kuis;
use App\Loker;
use App\Soal;
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
        $loker = Loker::all();
        // $data = Soal::orderBy('kuis_id', 'desc')->groupBy('kuis_id')->get();
        // $data2 = Soal::groupBy('kuis_id')
        //                 ->selectRaw('sum(bobot_soal) as nilaiMax')
        //                 ->get();
        // dd($data);
        return view('pages.admin.kuis.index', compact('data', 'loker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loker = Loker::all();
        // dd($loker);
        return view('pages.admin.kuis.create', compact('loker'));
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

        $date  = strtotime($data['tgl_kuis']);
        $date2 = strtotime($data['waktu_mulai']);
        $date3 = strtotime($data['waktu_selesai']);
        $date4 = strtotime($data['durasi']);
        $data['tgl_kuis']       = date('Y-m-d', $date);
        $data['waktu_mulai']    = date('Y-m-d H:i:s', $date2);
        $data['waktu_selesai']  = date('Y-m-d H:i:s', $date3);
        $data['durasi']         = date('H:i:s', $date4);

        // dd($data);
        kuis::create($data);
        return redirect(route('dataKuis.index'))->with('success', 'Data Kuis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data  = Kuis::with('loker')->findOrFail($id);
        $soal  = Soal::where('kuis_id', $id)->get();
        // $getPilihan = [null,null,null,null];
        $a=0;
        if(Soal::where('kuis_id', $id)->first() == null){
            foreach ($soal as $row)  {
                $getPilihan[$a] = json_decode($row->pilihanGanda);
                $a++;
            }
            $date  = strtotime($data['tgl_kuis']);
            $date2 = strtotime($data['waktu_mulai']);
            $date3 = strtotime($data['waktu_selesai']);
            $date4 = strtotime($data['durasi']);
            $data['tgl_kuis']       = date('Y-m-d', $date);
            $data['waktu_mulai']    = date('Y-m-d H:i:s', $date2);
            $data['waktu_selesai']  = date('Y-m-d H:i:s', $date3);
            $data['durasi']         = date('H:i:s', $date4);

            return view('pages.admin.kuis.detail', compact(['data', 'soal']));
        }else{
            foreach ($soal as $row)  {
                $getPilihan[$a] = json_decode($row->pilihanGanda);
                $a++;
            }
            $date  = strtotime($data['tgl_kuis']);
            $date2 = strtotime($data['waktu_mulai']);
            $date3 = strtotime($data['waktu_selesai']);
            $date4 = strtotime($data['durasi']);
            $data['tgl_kuis']       = date('Y-m-d', $date);
            $data['waktu_mulai']    = date('Y-m-d H:i:s', $date2);
            $data['waktu_selesai']  = date('Y-m-d H:i:s', $date3);
            $data['durasi']         = date('H:i:s', $date4);

            return view('pages.admin.kuis.detail', compact(['data', 'soal', 'getPilihan']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = Kuis::findOrFail($id);
        $soal  = Soal::where('kuis_id', $id)->get();
        $loker = Loker::all();


        $a=0;
        if(Soal::where('kuis_id', $id)->first() == null){
            foreach ($soal as $row)  {
                $getPilihan[$a] = json_decode($row->pilihanGanda);
                $a++;
            }
            $date  = strtotime($data['tgl_kuis']);
            $date2 = strtotime($data['waktu_mulai']);
            $date3 = strtotime($data['waktu_selesai']);
            $date4 = strtotime($data['durasi']);
            $data['tgl_kuis']       = date('Y-m-d', $date);
            $data['waktu_mulai']    = date('Y-m-d H:i:s', $date2);
            $data['waktu_selesai']  = date('Y-m-d H:i:s', $date3);
            $data['durasi']         = date('H:i:s', $date4);

            return view('pages.admin.kuis.edit', compact(['data', 'loker', 'soal']));
        }else{
            foreach ($soal as $row)  {
                $getPilihan[$a] = json_decode($row->pilihanGanda);
                $a++;
            }
            $date  = strtotime($data['tgl_kuis']);
            $date2 = strtotime($data['waktu_mulai']);
            $date3 = strtotime($data['waktu_selesai']);
            $date4 = strtotime($data['durasi']);
            $data['tgl_kuis']       = date('Y-m-d', $date);
            $data['waktu_mulai']    = date('Y-m-d H:i:s', $date2);
            $data['waktu_selesai']  = date('Y-m-d H:i:s', $date3);
            $data['durasi']         = date('H:i:s', $date4);

            return view('pages.admin.kuis.edit', compact(['data', 'loker', 'soal', 'getPilihan']));
        }
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

        $date  = strtotime($data['tgl_kuis']);
        $date2 = strtotime($data['waktu_mulai']);
        $date3 = strtotime($data['waktu_selesai']);
        $date4 = strtotime($data['durasi']);
        $data['tgl_kuis']       = date('Y-m-d', $date);
        $data['waktu_mulai']    = date('Y-m-d H:i:s', $date2);
        $data['waktu_selesai']  = date('Y-m-d H:i:s', $date3);
        $data['durasi']         = date('H:i:s', $date4);

        $kuis = Kuis::findOrFail($id);

        $kuis->update($data);

        return redirect(route('dataKuis.index'))->with('success', 'Data Kuis berhasil update');
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

        return redirect(route('dataKuis.index'))->with('success', 'Data Kuis berhasil dihapus');
    }


    public function tambah(Request $request)
    {
        // $data = $request->all();
        $data = Kuis::select('id','nama','tgl_kuis','waktu_mulai','waktu_selesai','durasi')
                    ->where('nama', $request->nama)->first();
        // dd($data['nama']);

        $kuis = Kuis::create([
                'nama' => $data['nama'],
                'tgl_kuis' => $data['tgl_kuis'],
                'waktu_mulai' => $data['waktu_mulai'],
                'waktu_selesai' => $data['waktu_selesai'],
                'durasi' => $data['durasi'],
                'loker_id' => $request->loker_id
                ]);

        $soal = Soal::select('nama_soal', 'bobot_soal', 'soal', 'pilihanGanda', 'kunci_jawaban')
                    ->where('kuis_id', $data['id'])->get();
            $sl = json_decode($soal);
            // dd($sl[1]);

            foreach($sl as $item){
                // $nama = $item->nama_soal;
                // dd($nama);
                Soal::insert([
                    'nama_soal' => $item->nama_soal,
                    'bobot_soal' => $item->bobot_soal,
                    'soal' => $item->soal,
                    'pilihanGanda' => $item->pilihanGanda,
                    'kunci_jawaban' => $item->kunci_jawaban,
                    'kuis_id' => $kuis->id,
                ]);
            }

        return redirect(route('dataKuis.index'))->with('success', 'Soal berhasil Ditambahkan');
    }
}
