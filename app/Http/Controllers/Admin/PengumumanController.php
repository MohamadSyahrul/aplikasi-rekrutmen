<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loker;
use App\Mail\PengumumanMail;
use App\Pengumuman;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengumuman::orderBy('id', 'desc')->paginate(3);
        // return $data;
        return view('pages.admin.pengumuman.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Loker::get();
        return view('pages.admin.pengumuman.create')->with('data', $data);
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
            'judul_pengumuman' => 'required',
            'tgl_pengumuman' => 'required',
            'ket_pengumuman' => 'required',
            'privasi' => 'required',
            'loker_id' => 'required',
        ]);

        $data = $request->all();

        $date = strtotime($data['tgl_pengumuman']);
        $data['tgl_pengumuman'] = date('Y-m-d', $date);

        if ($data['privasi'] == 1) {
            $data['privasi'] = 'Public';
        } elseif ($data['privasi'] == 2) {
            $data['privasi'] = 'Secret';
        } else {
            $data['privasi'] = 'Uncategorized';
        }

        $details = [
            'title' => $data['judul_pengumuman'],
            'body' => $data['ket_pengumuman']
        ];

        $user = User::get();

        foreach ($user as $recipient) {
            Mail::to($recipient->email)->send(new PengumumanMail($details));
        }

        $pengumuman = Pengumuman::create($data);


        return redirect('pengumuman')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengumuman  $Pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pengumuman::findOrFail($id);
        return view('pages.pelamar.pengumuman.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengumuman  $Pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengumuman::findOrFail($id);
        $loker = Loker::get();
        return view('pages.admin.pengumuman.edit', compact('data', 'loker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengumuman  $Pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_pengumuman' => 'required',
            'tgl_pengumuman' => 'required',
            'ket_pengumuman' => 'required',
            'privasi' => 'required',
            'loker_id' => 'required',
        ]);

        $data = $request->all();

        $date = strtotime($data['tgl_pengumuman']);
        $data['tgl_pengumuman'] = date('Y-m-d', $date);

        if ($data['privasi'] == 1) {
            $data['privasi'] = 'Public';
        } elseif ($data['privasi'] == 2) {
            $data['privasi'] = 'Secret';
        } else {
            $data['privasi'] = 'Uncategorized';
        }

        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->update($data);

        return redirect(route('pengumuman.index'),)->with('success', 'Pengumuman berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengumuman  $Pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengumuman::findOrFail($id);

        $data->delete();

        return redirect(route('pengumuman.index'))->with('success', 'Pengumuman berhasil dihapus');
    }
}
