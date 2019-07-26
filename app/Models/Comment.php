<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content',
        'user_id',
        'post_id'
    ];

    public function User()
    {
        return $this->belongsTo("App\Models\User", 'id', 'user_id');
    }
}
