<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $guarded = ['id'];

    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }
    
    public function lamaran()
    {
        return $this->belongsTo(lamaran::class);
    }
    
    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
    
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
    
}
