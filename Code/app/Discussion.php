<?php

namespace App;
use App\Auth;
use App\User;
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subdiscussion()
    {
        return $this->belongsTo(SubDiscussionCategory::class,'sub_discussion_categories_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class ,'discussions_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class ,'discussions_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'discussions_id');
    }

    //user can only make one like for one post
    public function likedBy($id){

        //$id = User::user()->id;
        return $this->likes->contains('user_id',$id);

    }

   
}
