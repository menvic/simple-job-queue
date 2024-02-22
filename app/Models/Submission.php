<?php

namespace App\Models;

use App\Events\SubmissionSaved;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'message',
    ];

    protected $dispatchesEvents = [
        'saved' => SubmissionSaved::class,
    ];
}
