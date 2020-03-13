<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = ['name','department','key','schedule_id'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function delays()
    {
        return $this->hasMany(Delay::class);
    }

    public function inouts()
    {
        return $this->hasMany(InOut::class);
    }
}
