<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref extends Model
{
    public $table = 'refs';
    public $fillable = ['ref_id','username',]; 
}
