<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class State extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(County::class);
    }

    public function counties()
    {
        return $this->hasMany(County::class);
    }
}
