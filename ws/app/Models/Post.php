<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Tag;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];
    // protected $guarded; si on veut authoriser la modif de tout

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
    return $this->hasOne(Image::class/*, 'post'*/); //la modif est à faire si la clé étrangère est différente de post_id
    }

    public function imageArtist()
    {
        return $this->hasOneThrough(Artist::class, Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function latestComment()
    {
        return $this->hasOne(Comment::class)->latestOfMany();
    }

    public function oldestComment()
    {
        return $this->hasOne(Comment::class)->oldestOfMany();
    }
}

