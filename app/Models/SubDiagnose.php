<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDiagnose extends Model
{
    protected $table = 'sub_diagnose';

    protected $fillable = [
        'diagnose_id','cause'
    ];

    public function diagnose()
    {
        return $this->belongsTo('App\Models\Diagnose','diagnose_id');
    }
}
