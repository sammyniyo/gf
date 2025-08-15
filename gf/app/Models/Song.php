<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function writers()
{
    return $this->belongsToMany(Member::class, 'song_writer')
               ->withPivot('contribution');
}
}
