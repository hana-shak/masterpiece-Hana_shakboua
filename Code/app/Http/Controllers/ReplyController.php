<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Discussion;
use App\SubDiscussionCategory;
use App\DiscussionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;


class ReplyController extends Controller
{

    public function __construct(){
        Date::setLocale('ar');
        $this->middleware('auth');
        //->except('')
    }



    public function index()
    {

    }


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

        Reply::create([
            'discussions_id'  =>  $request->invisible,
            'user_id'         =>  $replier->id,
            'reply_body'      =>  $request->message,
            'reply_image'     =>  $filename,
            'anonymous'       =>  $anon,
        ]);

        $id = $request->invisible;
        return redirect()->back();

       // return redirect()->route('singlediscussion');
        }
    }


        public function latestReply(Reply $reply){

         // $disc = Discussion::findOrFail(1)->replies;
          //$disc = Reply::findOrFail(1)->get();

          //return ($disc);

                  }



    public function store(Request $request)
    {
        //
    }


    public function show(Reply $reply)
    {
        //
    }


    public function edit(Reply $reply, $id)
    {
        $reply = Reply::findOrFail($id);
        return view('web.com.editreply',compact('reply'));
    }


    public function update(Request $request, Reply $reply, $id)
    {
        //Not empty
        if($request->hasFile('image') || $request->message  ){

            $replier = auth::user();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('discussion/images', $filename);
            } else {
                $filename = "0";
            }

            if($request->has('anonymous')){
                $anon = 1;
            }else{
                $anon = 0;
            }

            $rep = Reply::findOrFail($id);
            $disid = $rep->discussion->id;
            //$discussion = $rep->discussion->name;

            Reply::where('id',$id)->update([
                'user_id'         =>  $replier->id,
                'reply_body'      =>  $request->message,
                'reply_image'     =>  $filename,
                'anonymous'       =>  $anon,
                'discussions_id'  =>  $disid,
            ]);



            $id = $rep->discussion->id;
           return ($this->updatedreply($id));

        }else{
            return redirect()->back();
        }
    }

    public function updatedreply($id)
    {
            // $disc = Discussion::findorFail($id);
            // return view('web.com.singlediscussion', compact('disc'));


            $disc = Discussion::findorFail($id);
            $recentdiscs = Discussion::orderByDesc('id')->get();
            $subcat_id = $disc->subdiscussion->id;
            $subcat = SubDiscussionCategory::findOrFail($subcat_id)->discussioncategory;


            return view('web.com.singlediscussion', compact('disc','subcat','recentdiscs'));
    }
    // public function dddd(){
    //     $x = Reply::findOrFail(3);
    //   dd($x->discussion->disc_title);
    //   dd($x->discussion->id);
    // }

    public function destroy(Reply $reply,$id)
    {
        $rep = Reply::findOrFail($id);
        $discussion_id = $rep->discussion->id;
        Reply::destroy($id);

        return ($this->updatedreply($discussion_id));

    }
}
