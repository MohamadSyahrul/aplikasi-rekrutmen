<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $guarded = ['id'];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}
