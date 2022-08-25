<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountyIncome extends Model
{
    use HasFactory;


    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
