<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delay extends Model
{
    protected $fillable = ['employe_id','minutes'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
