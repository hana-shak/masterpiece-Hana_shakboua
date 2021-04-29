<?php

namespace App\Http\Controllers;

use App\DiscussionCategory;
use App\SubDiscussionCategory;
use App\Discussion;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class SubDiscussionCategoryController extends Controller
 {
    public function __construct(){
        Date::setLocale('ar');
        $this->middleware('auth:admin')->except('onesubcat', 'onecategory');
    }
    //This method to show single category discussion, lists all subs for this cat
    public function index($id)
    {
         $subcat = DiscussionCategory::findOrFail($id);
         $subs = $subcat->subdiscussions;
         //return $subs;
         return view('dashboard.subcatdisc',compact('subcat','subs'));
    }


    //This method to show single sub category discussion
    public function show($id)
    {
        $subdis = SubDiscussionCategory::findOrFail($id);
        return view('dashboard.singlesubdis',compact('subdis'));
    }


    //This method to reach create form
    public function newsub()
    {
        $catdis = DiscussionCategory::all();
        //dd($catdisid);
        return view('dashboard.subcatdiscreation',compact('catdis'));
    }

    public function validation($request)
    {
        // $request->validate([
        //     'name'           => 'required|min:3',
        //     'description'    => 'required',

        // ]);
        $rules = [
            'name'           => 'required|min:3',
            'description'    => 'required',
            'discussion_categories_id' => 'required',
            'image'=>'required',
        ];
        $customMessages = [
            'name.required' => 'يجب ملأ حقل الاسم',
            'description.required'=>'يجب ملأ حقل الوصف',
            'discussion_categories_id.required'=> 'يجب اختيار فئة رئيسية',
            'image.required'=>'يجب اختيار صورة جديدة ',

        ];
        $this->validate($request, $rules, $customMessages);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
         $filename = "1611290375.jpg";
     }
        SubDiscussionCategory::create([
             'name'           =>  $request->name,
             'description'    =>  $request->description,
             'image'          =>  $filename,
             'discussion_categories_id'  =>  $request->discussion_categories_id,
         ]);

         $id =  $request->discussion_categories_id;
         return ($this->index($id));
     }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubDiscussionCategory  $subDiscussionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubDiscussionCategory $subDiscussionCategory, $id)
    {
        $ssubdiscat = SubDiscussionCategory::findOrFail($id);
        $catdis = DiscussionCategory::all();
        return view ('dashboard.subcatdiscedit',compact('ssubdiscat','catdis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubDiscussionCategory  $subDiscussionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDiscussionCategory $subDiscussionCategory, $id)
    {
         $this->validation($request);

        if ($request->hasFile('image')) {
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time() . '.' . $ext;
         $file->move('discussion/images', $filename);
     }
    //  else {

    //     $filename ='1611290375.jpg';
    //  }

     SubDiscussionCategory::where('id',$id)->update([
        'name'           =>  $request->name,
        'description'    =>  $request->description,
        'image'          => $filename,
        'discussion_categories_id'  =>  $request->discussion_categories_id,
     ]);

    //  dd($request);
    //  return "edited";
    return ($this->show($id));//return to method that return to singlesubcat

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubDiscussionCategory  $subDiscussionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubDiscussionCategory $subDiscussionCategory ,$id)
    {
        $subdis= SubDiscussionCategory::find($id);
        $cat_id = $subdis->discussioncategory->id;
        SubDiscussionCategory::destroy($id);
        return ($this->index($cat_id));
    }

    // public function tt(){
    //     $x= SubDiscussionCategory::find(2);
    //     return $x->discussions;
    // }

    public function tot(){
        // $x= SubDiscussionCategory::find(3);
        // $xx = $x->discussioncategory;
        // dd($xx);
        // $y = $x->discussion_categories_id;
    //return((int)$y);
    //    $cat_id = DiscussionCategory::where('id',$y)->get();

    //  return $cat_id;
    }

    //Public Website
    //This method to show single category discussion, lists all subs for this cat
    public function onecategory($id){
        $dis = Discussion::orderByDesc('id')->get();
        $maincat = DiscussionCategory::orderByDesc('id')->get();
        $subcat = DiscussionCategory::findOrFail($id);
        $subs = $subcat->subdiscussions;
         //return $subs;
         return view('web.com.singlecategory',compact('subcat','subs','maincat','dis'));
    }

     //This method to show single sub category discussion,
     // list all discussions in this subdiscussion
     public function onesubcat($id)
     {
         $subdis = SubDiscussionCategory::findOrFail($id);
         return view('dashboard.singlesubdis',compact('subdis'));
     }
}
