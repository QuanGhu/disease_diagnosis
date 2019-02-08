<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'rule';
    
    protected $fillable = [
        'disease_id','cause_id'
    ];

    public function disease()
    {
        return $this->belongsTo('App\Models\Disease','disease_id');
    }

    public function cause()
    {
        return $this->belongsTo('App\Models\Cause','cause_id');
    }
}
