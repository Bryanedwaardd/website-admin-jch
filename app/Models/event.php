<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = ['EventName', 'Category', 'Description', 'Date', 'PIC', 'CollaboratorName', 'CollaboratorContact'];
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

}
