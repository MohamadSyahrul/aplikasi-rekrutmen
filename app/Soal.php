<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
