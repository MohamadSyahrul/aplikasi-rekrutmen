<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
}
