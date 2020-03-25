<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HourExtra extends Model
{
    protected $fillable=['employe_id', 'hours'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
