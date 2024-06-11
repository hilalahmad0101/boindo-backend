<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');
    }
    public function recents()
    {
        return $this->hasMany(Recent::class, 'content_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'content_id')->orderBy('star', 'desc');
    }
    public function playlists()
    {
        return $this->hasMany(Playlist::class, 'content_id');
    }
}
