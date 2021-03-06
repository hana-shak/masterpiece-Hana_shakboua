<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded =[];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class,'discussions_id');

    }
    public function reports(){

        return $this->hasMany(Report::class,'replies_id');
    }
}
