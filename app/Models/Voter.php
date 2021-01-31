<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'token', 'block_id', 'election_id'];
    protected $casts = [
        'name' => 'json'
    ];
}
