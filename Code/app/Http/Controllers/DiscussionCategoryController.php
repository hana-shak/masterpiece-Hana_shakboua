<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Discussion;
use App\User;
use App\DiscussionCategory;
use App\Report;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class DiscussionCategoryController extends Controller
{
    public function __construct(){
        Date::setLocale('ar');
        $this->middleware('auth:admin')->except('eczematee');
    }

    public function landingdash(){

       $numrep = Reply::count();
       $numdis = Discussion::count();
       $numusers = User::count();
       $numrepor = Report::count();
       return view('dashboard.landingdash',compact('numrep','numdis','numusers','numrepor'));
    }

    public function index()
    {
        return view('dashboard.discussioncategory');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newdiscussioncategory()
    {
        return view('dashboard.catdiscussioncreation');
    }
    public function validation($request)
    {
        // $request->validate([
        //     'name'           => 'required|min:3',
        //     'description'    => 'required',
        //     'image'          => 'required',
        // ]);
        $rules = [
            'name'           => 'required|min:3',
            'description'    => 'required',
            'image'          => 'required',
        ];
        $customMessages = [
            'name.required' => 'يجب ملأ حقل الاسم',
            'description.required'=>'يجب ملأ حقل الوصف',
            'image.required'=>' يجب اختيار صورة جديدة ',
        ];
        $this->validate($request, $rules, $customMessages);

    }


    public function create(Request $request)
    {
       $this->validation($request);

       if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('discussion/images', $filename);
    }
    else {
        $filename = '1611290375.jpg';
    }
        DiscussionCategory::create([
            'name'           =>  $request->name,
            'description'    =>  $request->description,
            'image'          =>  $filename,
        ]);

        // return "added new discussion to show allcategory";
        return redirect('/totalcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiscussionCategory  $discussionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DiscussionCategory $discussionCategory)
    {
        $discussioncategory = DiscussionCategory::orderByDesc('id')->get();
        // dd($discussioncategory);
        return view('dashboard.discussioncategory',compact('discussioncategory'));
    }
     public function singlecat(DiscussionCategory $discussionCategory, $id)
     {

        $sdiscussioncategory = DiscussionCategory::findOrFail($id);
                //mostly no need for it
        return view ('dashboard.singlediscussioncategory',compact('sdiscussioncategory'));
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscussionCategory  $discussionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscussionCategory $discussionCategory, $id)
    {
        $singlediscussioncategory = DiscussionCategory::findOrFail($id);
        return view('dashboard.categorydiscussionedit', compact('singlediscussioncategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscussionCategory  $discussionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscussionCategory $discussionCategory, $id)
    {


        $this->validation($request);
        if ($request->hasFile('image')) {
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time() . '.' . $ext;
         $file->move('discussion/images', $filename);
        }
          else {
         $filename ='1611290375.jpg';
             }

     DiscussionCategory::where('id',$id)->update([
        'name'           =>  $request->name,
        'description'    =>  $request->description,
        'image'          => $filename,
     ]);

      return redirect ('/totalcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscussionCategory  $discussionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscussionCategory $discussionCategory, $id)
    {
           DiscussionCategory::destroy($id);
           return redirect('/totalcategory');
    }



    // Public Website
    // landing page for all users , no need for registration or sth else
    public function eczematee(){

        $discussioncategory = DiscussionCategory::orderByDesc('id')->get();
        return view('web.com.landing',compact('discussioncategory'));
    }
}
