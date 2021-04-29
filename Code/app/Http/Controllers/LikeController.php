<?php

namespace App\Http\Controllers;
use App\User;
use App\Discussion;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Date\Date;


class LikeController extends Controller
{
    public function __construct()
    {
        Date::setLocale('ar');
        $this->middleware('auth');
    }
    //Discussion like creation
    public function store($id)

    {

        $disclike = Discussion::findOrFail($id);
        $user = auth()->user()->id;
        //dd((auth()->user()->id));
       // dd($disclike->likedBy($user));

        //   //dd($discussion);
          if($disclike->likedBy($user)){
            //return response(null,409);
            return redirect()->back();
          }


          $disclike->likes()->create([
              'user_id'=>$user,
          ]);
          return redirect()->back();
    }

    public function destroy($id){
        $disclike=Discussion::find($id);
        //dd( $disclike->likes()->where('id', $id));

        //like object (has user & discussion id)
       //return($disclike->likes);

       $likedelete = $disclike->likes();

       $likedelete->delete();

        return redirect()->back();
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function show(Like $like)
    {
        //
    }


    public function edit(Like $like)
    {
        //
    }


    public function update(Request $request, Like $like)
    {
        //
    }



}
