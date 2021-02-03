<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'stories';
    protected $fillable = ['city_id', 'humedity'
    ];
}
