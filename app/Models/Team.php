<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'acronym',
        'name',
        'full_name',
        'stadium',
        'country',
        'websites',
        'phone_numbers',
        'membership_date'
    ];
}
