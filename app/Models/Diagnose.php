<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    protected $table = 'diagnose';

    protected $fillable = [
        'result','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }

    public function subDiagnoses()
    {
        return $this->hasMany('App\Models\SubDiagnose','diagnose_id');
    }
}
