<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Discussion;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        //->except('')
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {
        if(!$request->hasFile('image') && !$request->message ){
            return redirect()->back();
        }else{

        $replier = auth::user();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('discussion/images', $filename);
        }else{
            $filename = "0";
        }

        if($request->has('anonymous')){
            $anon = 1;
        }else{
            $anon = 0;
        }

        Comment::create([
            'discussions_id'  =>  $request->invisible,
            'user_id'         =>  $replier->id,
            'comment_body'      =>  $request->message,
            'comment_image'     =>  $filename,
            'anonymous'       =>  $anon,
        ]);


        // dd($request);
        //return ($request);
       return redirect()->route('singlediscussion');
        }
    }


          public function latest(Comment $comment){

         $disc = Discussion::findOrFail(1)->comments;

         
         return ($disc);

          //$x = $disc->comment_body;
          //$x = $disc->reply_body;
        //   return ($disc);

                  }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
