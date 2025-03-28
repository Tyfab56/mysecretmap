<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComoresContestEntry extends Model
{
    use HasFactory;

    protected $table = 'comores_contest_entries';

    protected $fillable = [
        'email',
        'optin',
        'guidecomores_answer',
        'histoirecomores_answer',
        'culturalcomores_answer', // ✅ nouveau champ
    ];

    protected $casts = [
        'optin' => 'boolean',
        'guidecomores_answer' => 'boolean',
        'histoirecomores_answer' => 'boolean',
        'culturalcomores_answer' => 'boolean', // ✅ ajout du cast
    ];
}
