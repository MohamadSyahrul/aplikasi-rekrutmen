<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $guarded = ['id'];

    public function loker()
    {
        return $this->belongsTo(Loker::class);
    }

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}
