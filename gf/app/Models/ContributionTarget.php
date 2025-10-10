<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributionTarget extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'target_amount',
        'description',
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
    ];
}


