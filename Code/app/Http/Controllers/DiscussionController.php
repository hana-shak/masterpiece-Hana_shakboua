<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Reply;
use App\DiscussionCategory;
use App\SubDiscussionCategory;
use Jenssegers\Date\Date;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function __construct(){
        Date::setLocale('ar');
        $this->middleware('auth')->except('showsingleDiscussion','showAllDiscussions','singlesubdiscussion');
    }

    public function index()
    {
        $cats =DiscussionCategory::all()->pluck('name','id');

        return view('web.com.startdiscussion',compact('cats'));
    }

    public function subCat($id)
    {
        $subs = SubDiscussionCategory::where('discussion_categories_id',$id)->pluck('name','id');

        return json_encode($subs);
    }

    public function validation($request)
    {
        $request->validate([

            'category'             => 'required',
            'subcategory'          => 'required',
            'disc_title'           => 'required|min:3',
            'disc_body'            => 'required',

        ]);
    }

    public function create(Request $request)
    {
        $this->validation($request);
        $user = auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('discussion/images', $filename);
        }else{
            $filename = "0";
        }


        if($request->has('anonymous')){
            //Checkbox checked, it will be existed in the request and has on value
            // return "exist";
            // return $request;
            $anon = 1;

        }else{
            //Checkbox not checked, the request does not hold it at all
            // return "does not exist";
            //return $request;
            $anon = 0;

        }
        Discussion::create([
            'sub_discussion_categories_id' =>  $request->subcategory,
            'user_id'        =>  $user->id,
            'disc_title'     =>  $request->disc_title,
            'disc_body'      =>  $request->disc_body,
            'disc_image'     =>  $filename,
            'anonymous'      =>  $anon,
        ]);


           // return "I am Fabulous";
              return redirect()->route('singlediscussion');
    }


    public function showlatestDiscussion(Discussion $discussion)
    {
            $latestdis = Discussion::latest()->take(1)->get();
            return view('web.com.latestdiscussion', compact('latestdis'));
            //return dd($latestdis);
    }

    //Adam test for reply relation
    // public function test(){
    //     $x = Discussion::findOrFail(3);
    //    return $x->replies->count();
    //     //return $x->subdiscussion;
    // }

    public function showsingleDiscussion(Discussion $discussion, $id)
    {
            Date::setLocale('ar');
            $disc = Discussion::findorFail($id);
            $recentdiscs = Discussion::orderByDesc('id')->get();
            $subcat_id = $disc->subdiscussion->id;
            $subcat = SubDiscussionCategory::findOrFail($subcat_id)->discussioncategory;
            //$recentreplies = Reply::orderByDesc('id')->get();
            return view('web.com.singlediscussion', compact('disc','subcat','recentdiscs'));
    }


    //show all discussions in first community page
    public function showAllDiscussions(){
        $all_disc = Discussion::latest('id')->get();
       return view ('web.com.first',compact('all_disc'));
        //dd($all_disc);

    }
    //this for profile/discussions section
    public function discussionPerUser(){
        $discs =auth()->user()->discussions;
        //dd($discs);
        return view ('web.com.profile',compact('discs'));
    }

    public function store(Request $request)
    {
        return view('web.com.editdiscussion');
    }

    public function edit(Discussion $discussion, $id)
    {
        //because of relations, error in retrieving data
        //for ajax
        $cats =DiscussionCategory::all()->pluck('name','id');
        $s = SubDiscussionCategory::all();
        $disc = Discussion::findOrFail($id);
        return view('web.com.editdiscussion',compact('disc','cats'));
    }


    public function update(Request $request, Discussion $discussion,$id)
    {

        //Not empty
        if(($request->hasFile('image') || $request->disc_body ) && $request->disc_title ){

            $user = auth::user();
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

            Discussion::where('id',$id)->update([
                'sub_discussion_categories_id' =>  $request->subcat,
                'user_id'        =>  $user->id,
                'disc_title'     =>  $request->disc_title,
                'disc_body'      =>  $request->disc_body,
                'disc_image'     =>  $filename,
                'anonymous'      =>  $anon,
            ]);

            $id = $request->id;
            //$discussion = Discussion::findOrFail($id)->get();
           return ($this->showafterupdate($id));
        }else{
            return redirect()->back();
        }
    }

    public function showafterupdate($id){


        $disc = Discussion::findorFail($id);
        $recentdiscs = Discussion::orderByDesc('id')->get();
        $subcat_id = $disc->subdiscussion->id;
        $subcat = SubDiscussionCategory::findOrFail($subcat_id)->discussioncategory;


        return view('web.com.singlediscussion', compact('disc','subcat','recentdiscs'));

    }

    public function destroy(Discussion $discussion, $id)
    {
        $dis = Discussion::findOrFail($id);
        Discussion::destroy($id);
        $sub = $dis->subdiscussion->id;
        // return ($this->showAllDiscussions());
        return ($this->singlesubdiscussion($sub));
    }

    public function singlesubdiscussion($id){

        $sub = SubDiscussionCategory::findOrFail($id);
        return view('web.com.singlesubdiscussion',compact('sub'));
    }

    public function replycreate(Request $request)

    {
        $id = $request->invisible;
        if(!$request->hasFile('image') && !$request->message ){

            return ($this->showafterupdate($id));
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


        return ($this->showafterupdate($id));

       // return redirect()->route('singlediscussion');
        }
    }




    }

