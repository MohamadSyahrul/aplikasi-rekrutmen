<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $guarded = ['id'];

    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
