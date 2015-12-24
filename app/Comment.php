<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'user_id', 
        'username', 
        'content_id',
        'comment',
    ];

    protected $hidden = ['password', 'remember_token'];
}
