<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    protected $fillable = ['nilai', 'keterangan', 'pelamar_id', 'lamaran_id'];
}
