<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = [
        'url', 
        'user_id', 
        'type',
    ];

    protected $hidden = ['password', 'remember_token'];
}
