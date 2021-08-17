<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $guarded = ['id'];

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
}
