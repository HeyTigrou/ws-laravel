<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
    return $this->hasOne(Image::class/*, 'post'*/); //la modif est à faire si la clé étrangère est différente de post_id
    }
}
