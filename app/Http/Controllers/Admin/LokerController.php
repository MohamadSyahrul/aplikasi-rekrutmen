<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loker;
use App\Mail\PengumumanMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Loker::all();
        return view('pages.admin.data-loker.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.data-loker.create');
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
        $request->validate([
            'nama' => 'required',
            'detail' => 'required',
            'tingkat_pendidikan' => 'required',
            'jenis_kelamin' => 'required',
            'status_kerja' => 'required',
            'gaji' => 'required',
            'batas_lamaran' => 'required',
            'deskripsi' => 'required',
            'persyaratan' => 'required'
        ]);

        $data = $request->all();

        $date = strtotime($data['batas_lamaran']);
        $data['batas_lamaran'] = date('Y-m-d', $date);

        if ($data['jenis_kelamin'] == 1) {
            $data['jenis_kelamin'] = 'Pria';
        } elseif ($data['jenis_kelamin'] == 2) {
            $data['jenis_kelamin'] = 'Wanita';
        } else {
            $data['jenis_kelamin'] = 'Pria atau Wanita';
        }

        // dd($data);

        $details = [
            'title' => 'Lowongan Pekerjaan Baru',
            'body' => 'Dibuka Lowongan Pekerjaan bagian ' . $data['nama'] . ' di perusahaan kami. Daftarkan diri anda sebelum tanggal ' . $data['batas_lamaran'] . '.'
        ];

        $user = User::get();

        foreach ($user as $recipient) {
            Mail::to($recipient->email)->send(new PengumumanMail($details));
        }

        $loker = Loker::create($data);

        return redirect('lowonganKerja')->with('success', 'Lowongan Kerja berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Loker::findOrFail($id);
        return view('pages.admin.data-loker.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Loker::findOrFail($id);
        return view('pages.admin.data-loker.edit', compact('data'));
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
        $request->validate([
            'nama' => 'required',
            'detail' => 'required',
            'tingkat_pendidikan' => 'required',
            'jenis_kelamin' => 'required',
            'status_kerja' => 'required',
            'gaji' => 'required',
            'batas_lamaran' => 'required',
            'deskripsi' => 'required',
            'persyaratan' => 'required'
        ]);

        $data = $request->all();

        $date = strtotime($data['batas_lamaran']);
        $data['batas_lamaran'] = date('Y-m-d', $date);

        if ($data['jenis_kelamin'] == 1) {
            $data['jenis_kelamin'] = 'Pria';
        } elseif ($data['jenis_kelamin'] == 2) {
            $data['jenis_kelamin'] = 'Wanita';
        } else {
            $data['jenis_kelamin'] = 'Pria atau Wanita';
        }

        $loker = Loker::findOrFail($id);

        $loker->update($data);

        return redirect(route('lowonganKerja.index'),)->with('success', 'Lowongan Kerja berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Loker::findOrFail($id);

        $data->delete();

        return redirect(route('lowonganKerja.index'))->with('success', 'Lowongan Kerja berhasil dihapus');
    }

    public function ubah_status($id)
    {
        $item = Loker::where("id", $id)->update(['status' => "Tidak aktif"]);
            return redirect()->route('lowonganKerja.index');

    }
     public function ubahStatus($id)
    {
        $item = Loker::where("id", $id)->update(['status' => "aktif"]);
            return redirect()->route('lowonganKerja.index');

    }
}
