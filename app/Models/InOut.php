<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InOut extends Model
{
    protected $fillable = ['employe_id','hour_in','hour_out'];
    public $timestamps = false;

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
