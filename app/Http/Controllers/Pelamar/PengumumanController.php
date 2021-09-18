<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengumuman::orderBy('created_at', 'desc')->paginate(3);
        // dd($data);
        return view('pages.pelamar.pengumuman.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pengumuman::findOrFail($id);
        return view('pages.pelamar.pengumuman.show', compact('data'));
    }
}
