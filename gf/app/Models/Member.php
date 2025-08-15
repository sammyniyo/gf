<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
protected $fillable = [
    'names',
    'email',
    'phone',
    'physical_address',
    'job_title',
    'work_place',
    'church',
    'talent',
    'hobbies',
    'status',
    'gf_join_date',
    'voice',
    'roles',
    'birthday',
    'photo',
    'message',
];

}
