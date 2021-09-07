<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Pelamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelamar::getPelamar();
        return view('pages.admin.data-pelamar.index')->with('data', $data)->with('pendidikan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.data-pelamar.create');
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // $data = Validator::make($request, [
        //     'username' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        $data = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $pelamar = Pelamar::create([
            'user_id' => $data->id
        ]);

        return redirect('dataPelamar')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('pages.admin.data-pelamar.show', compact('data'))->with('pelamar', 'pendidikan', 'pekerjaan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('pages.admin.data-pelamar.edit', compact('data'));
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
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required'
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

        return redirect(route('dataPelamar.index'))->with('success', 'Data User berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $pelamar = Pelamar::where('user_id', $data->id);

        $data->delete();
        $pelamar->delete();

        return redirect(route('dataPelamar.index'))->with('success', 'Data User berhasil dihapus');
    }
}
