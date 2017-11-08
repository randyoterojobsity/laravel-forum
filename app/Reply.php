<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    protected $with = ['owner', 'favorites'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function favorites()
    {
        return $this->morphMany(Favorites::class, 'favorited');
    }

    public function favorite()
    {
        $attributtes = ['user_id' => auth()->id()];

        if (! $this->favorites()->where($attributtes)->exists()) {
            return $this->favorites()->create($attributtes);
        }
    }

    public function isFavorited()
    {
        return ! ! $this->favorites->where('user_id', auth()->id())->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}

