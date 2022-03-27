<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function artist()
    {
        return $this->hasOne(Artist::class/*, 'post'*/); //la modif est à faire si la clé étrangère est différente de post_id
    }
}
