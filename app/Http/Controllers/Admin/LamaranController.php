<?php

namespace App\Http\Controllers\Admin;

use App\Loker;
use App\Lamaran;
use App\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\User;

class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lamaran::all();
        return view('pages.admin.lamaran.index', compact('data'))->with('pelamar', 'loker');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pl = Pelamar::all();
        $lk = Loker::all();

        return view('pages.admin.lamaran.create',[
            'pelamar' => $pl,
            'loker' => $lk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_unggah' => 'required',
            'loker_id' => 'required',
            'pelamar_id' => 'required'
        ]);

        $lm = $request->all();

        $date = strtotime($lm['tanggal_unggah']);
        $lm['tanggal_unggah'] = date('Y-m-d', $date);
        $lamaran = Lamaran::create($lm);
        if ($lamaran == NULL) {
                    return redirect(route('lamaran.index'))->with('success', 'Lamaran anda berhasil dibuat');
        } else {
                return redirect(route('lamaran.index'))->with('success', 'Lamaran anda sudah ada');
            }

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
        $item = Lamaran::findOrFail($id);
        $item->delete();
        return redirect()->route('lamaran.index');
    }
}
