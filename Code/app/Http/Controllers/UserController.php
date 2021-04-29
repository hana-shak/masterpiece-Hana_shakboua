<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Date\Date;
use App\User;

class UserController extends Controller
{

    public function __construct(){
        Date::setLocale('ar');
        $this->middleware('auth');
        // except('');

    }


    public function validation($request)
    {


        $rules = [
            'name'     => 'required|min:2',
            'email'    => 'required|email',
            //'password' => 'required',
            'mobile'   => 'required'
            // 'image'    => 'required',
        ];
        $customMessages = [
            'name.required' => 'يجب ادخال اسم صحيح، ممكن يحتوي على حروف وارقام ورموز ولا يحتوي على فراغات',
            'email.required'=> 'يجب ادخال بريد الكتروني صحيح',
            //'password.required'=> 'يجب ادخال كلمة مرور صحيحة، تحوي على احرف وارقام ورمز واحد على الاقل، وان لاتكون اقل من 6 خانات',
            'mobile.required'=> 'يجب ادخال رقم موبايل صحيح'
            //'image.required'=> 'يجب ملأ حقل الوظيفة',
        ];
        $this->validate($request, $rules, $customMessages);



    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('web.com.useredit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        User::where('id',$id)->update([


            'name'     =>  $request->name,
            'email'      =>  $request->email,
            'mobile'     =>  $request->mobile,
            'image'      =>  $filename,
            'password' =>  Hash::make($request->password),
        ]);
        return redirect("/profile");

    }

    public function pro($id){
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // user::where('id', $id)->delete();
        // return redirect('/admin/manage_users');
    }
}
