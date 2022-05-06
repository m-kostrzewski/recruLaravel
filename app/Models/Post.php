<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
class Post extends Model
{
    use HasFactory;

    public function getAuthor(){
        return $this->hasOne(User::class, 'id', 'author');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

}
