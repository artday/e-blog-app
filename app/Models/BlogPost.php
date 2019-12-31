<?php

namespace App\Models;

use App\Traits\Eloquent\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Eloquent\PublishedLive\PublishedHasLivePost;

class BlogPost extends Model
{
    use SoftDeletes, PublishedHasLivePost, Taggable;

    protected $fillable = ['slug', 'title', 'excerpt', 'content', 'category_id', 'user_id', 'is_published'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
