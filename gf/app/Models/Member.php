<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function writtenSongs()
{
    return $this->belongsToMany(Song::class, 'song_writer')
               ->withPivot('contribution');
}

public function attendedEvents()
{
    return $this->belongsToMany(Event::class, 'event_attendee')
               ->withPivot('status');
}
}