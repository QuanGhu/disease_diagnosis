<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $table = 'cause';
    
    protected $fillable = [
        'name','code'
    ];
}
