<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Lamaran;
use App\Loker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('pages.pelamar.data-loker.index')->with('data', $data);
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
        return view('pages.pelamar.data-loker.show', compact('data'));
    }

    public function lamar($id)
    {
        $data = Loker::all();
        $loker = Loker::findOrFail($id);
        $lamaran = Lamaran::where('loker_id', $loker->id)
            ->where('pelamar_id', Auth::user()->pelamar->id)->first();

        // dd($lamaran);

        if ($lamaran == NULL) {
            $lamaran = Lamaran::create([
                'tanggal_unggah' => Carbon::now(),
                'loker_id' => $loker->id,
                'pelamar_id' => Auth::user()->pelamar->id,
            ]);
            return redirect(route('pelamarLowonganKerja.index', compact('data')))->with('success', 'Lamaran anda berhasil dibuat');
        } else {
            return redirect(route('pelamarLowonganKerja.index', compact('data')))->with('success', 'Lamaran anda sudah ada');
        }
    }

    public function hapusLamaran($id)
    {
        $data = Loker::all();
        $loker = Loker::findOrFail($id);
        $lamaran = Lamaran::where('loker_id', $loker->id)
            ->where('pelamar_id', Auth::user()->pelamar->id)
            ->delete();

        // $lamaran->delete();
        return redirect(route('pelamarLowonganKerja.index', compact('data')))->with('success', 'Lamaran anda berhasil dihapus');
    }
}
