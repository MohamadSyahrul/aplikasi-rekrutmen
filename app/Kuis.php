<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $guarded = ['id'];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function loker()
    {
        return $this->belongsTo(Loker::class);
    }
}
