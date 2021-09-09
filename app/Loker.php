<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $guarded = ['id'];

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }

    public function pengumuman()
    {
        return $this->hasOne(Pengumuman::class);
    }

    public function kuis()
    {
        return $this->hasOne(Kuis::class);
    }
}
