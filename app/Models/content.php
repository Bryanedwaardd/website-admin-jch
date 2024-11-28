<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusEnum;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'EventName',
        'Description',
        'PIC',
        'Deadline',
        'Platform',
        'Status',
    ];

    protected $casts = [
        'Status' => StatusEnum::class,  // Casting status ke enum
    ];
}
