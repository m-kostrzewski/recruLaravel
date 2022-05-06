<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function getPost(){
        return $this->hasOne(Post::class, 'id', 'post_id');
    }

    public function getAuthor(){
        return $this->hasOne(User::class, 'id', 'author');
    }
}
