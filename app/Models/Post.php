<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use HasFactory, Commentable;
    public function postCategory()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsToMany(Category::class,'post_categories','post_id','category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
