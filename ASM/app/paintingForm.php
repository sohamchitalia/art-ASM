<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paintingForm extends Model
{
    protected $fillable = [
        'painting_name','painting_type','description','sell_method','price','uploaded_by','name',
    ];
}
