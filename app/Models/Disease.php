<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $table = 'disease';
    
    protected $fillable = [
        'name','code'
    ];

    public function solutions()
    {
        return $this->hasMany('App\Models\Solution','disease_id');
    }

    public function rules()
    {
        return $this->hasMany('App\Models\Rule','disease_id');
    }
}
