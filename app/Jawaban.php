<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $guarded = ['id'];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}
