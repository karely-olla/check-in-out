<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['hour_in','hour_out'];

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
