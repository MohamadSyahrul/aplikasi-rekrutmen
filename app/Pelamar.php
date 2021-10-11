<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telp',
        'foto',
        'user_id',
    ];


    public static function getPelamar()
    {
        return User::where('level', 'pelamar')->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }

    public function pendidikan()
    {
        return $this->hasOne(Pendidikan::class);
    }
    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
