<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
