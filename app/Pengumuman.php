<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $guarded = ['id'];

    public function loker()
    {
        return $this->belongsTo(Loker::class);
    }
}
