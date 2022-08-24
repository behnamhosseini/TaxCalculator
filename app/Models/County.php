<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    //ToDo: برای تست
    public function countyIncome()
    {
        return $this->hasOne(CountyIncome::class);
    }
}
