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
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'sd' => 'required',
            'smp' => 'required',
            'sma' => 'required',
            'perguruan_tinggi' => 'required',
        ]);

        // $data = pelamar::findOrFail($id)->update($attr);


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

        $data->update();

        $pendidikan = Pendidikan::where('pelamar_id', $id)
            ->update([
                'sd' => $request->sd,
                'smp' => $request->smp,
                'smp' => $request->smp,
                'perguruan_tinggi' => $request->perguruan_tinggi
            ]);

        return redirect(route('pelamarDataPelamar.show'))->with('success', 'Data User berhasil Diubah');
    }
}
