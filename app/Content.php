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
        'content_id',
        'content_title',
    ];

    protected $hidden = ['password', 'remember_token'];
}
