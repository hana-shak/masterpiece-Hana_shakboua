<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionCategory extends Model
{
    protected $guard = 'discussioncategory';
    protected $fillable = [
        'name', 'description', 'image',
    ];

    public function subdiscussions()
    {
        return $this->hasMany(SubDiscussionCategory::class, 'discussion_categories_id');
    }
}
