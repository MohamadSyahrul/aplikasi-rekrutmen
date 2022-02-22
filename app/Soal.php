<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $guarded = ['id'];

        protected $attributes = [
        'kuis_id' => false,
        ];

    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
