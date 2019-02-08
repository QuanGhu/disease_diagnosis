<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $table = 'solution';
    
    protected $fillable = [
        'name','disease_id'
    ];

    public function disease()
    {
        return $this->belongsTo('App\Models\Disease','disease_id');
    }
}
