<?php

namespace App\Http\Controllers\Pelamar;

use App\User;
use App\Pelamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pendidikan;

class pelamarController extends Controller
{
    public function show()
    {
        return view('pages.pelamar.data-pelamar.show');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('pages.pelamar.data-pelamar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'berkas' => 'required|file',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'sd' => 'required',
            'smp' => 'required',
            'sma' => 'required',
            'perguruan_tinggi' => 'required',
            'foto' => 'required',
        ]);

        // $data = pelamar::findOrFail($id)->update($attr);

        $file = $request->file('berkas');
        $fileName = $file->getClientOriginalName();
        $filePath = base_path() . '/public/uploads/' . $fileName;
        $fileMimeType = $file->getMimeType();

        $file->move('uploads', $fileName);

        $date = strtotime($request->tgl_lahir);
        $date_format = date('Y-m-d', $date);

        $data = Pelamar::findOrFail($id);
        $data->nama = $request->nama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $date_format;
        if ($request->jenis_kelamin == 1) {
            $data->jenis_kelamin = 'Pria';
        } elseif ($request->jenis_kelamin == 2) {
            $data->jenis_kelamin = 'Wanita';
        }
        $data->no_telp = $request->no_telp;
        $data->file = $fileName;
        $data->path = $filePath;
        $data->mime = $fileMimeType;

        if ($request->hasFile('foto')) {
            $nm = $request->foto;
            $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
            $data->foto = $namaFile;
            $nm->move(public_path() . '/img', $namaFile);
        }else{
            $data->foto = 'default.png';
        }

        $data->update();

        $pendidikan = Pendidikan::where('pelamar_id', $id)
            ->update([
                'sd' => $request->sd,
                'smp' => $request->smp,
                'sma' => $request->sma,
                'perguruan_tinggi' => $request->perguruan_tinggi
            ]);

        return redirect(route('pelamarDataPelamar.show'))->with('success', 'Data User berhasil Diubah');
    }

    public function download($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        return response()->download($pelamar->path, $pelamar->file, ['Content-Type:' . $pelamar->mime]);
    }
}
