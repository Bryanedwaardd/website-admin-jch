<?php

// app/Models/Registration.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'business_name',
        'business_location',
        'phone_number',
        'event_info_source',
    ];
}
