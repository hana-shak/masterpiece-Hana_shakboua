<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Date\Date;

class AdminController extends Controller
{

     //Worked
     public function __construct(){
        Date::setLocale('ar');
        $this->middleware('auth:admin');
    }
    public function index()
    {
        //blank-empty page in dashboard
        return view('dashboard.index');
    }

    public function addnewadmin()
    {
        return view('dashboard.addadmin');
    }

    public function validation($request)
    {
        // $request->validate([
        //     'name'     => 'required|min:3',
        //     'email'    => 'required|email',
        //     'password' => 'required',
        //     'role'     => 'required',
        //     'mobile'   => 'required',
        // ]);

        $rules = [
            'name'     => 'required|min:2',
            'email'    => 'required|email',
            'password' => 'required',
            'role'     => 'required',
            'mobile'   => 'required',
        ];
        $customMessages = [
            'name.required' => 'يجب ادخال اسم صحيح، ممكن يحتوي على حروف وارقام ورموز ولا يحتوي على فراغات',
            'email.required'=> 'يجب ادخال بريد الكتروني صحيح',
            'password.required'=> 'يجب ادخال كلمة مرور صحيحة، تحوي على احرف وارقام ورمز واحد على الاقل، وان لاتكون اقل من 6 خانات',
            'mobile.required'=> 'يجب ادخال رقم موبايل صحيح',
            'role.required'=> 'يجب ملأ حقل الوظيفة',
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
        Admin::create([
            'name'     =>  $request->name,
            'email'    =>  $request->email,
            'password' =>  Hash::make($request->password),
            'role'     =>  $request->role,
            'mobile'   =>  $request->mobile,
        ]);

        return redirect('/super/alladmins');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $admins=Admin::orderByDesc('id')->get();
        return view('dashboard.manageadmins',compact('admins'));
    }

    public function showsingleadmin(Admin $admin,$id)
    {
        $singleadmin=Admin::findOrFail($id);
        return view('dashboard.singleadmin',compact('singleadmin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin,$id)
    {
        $singleadmin=Admin::findOrFail($id);
        return view ('dashboard.editadmin',compact('singleadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin,$id)
    {
        $this->validation($request);
        Admin::where('id', $id)->update([
            "name"           => $request->name,
            "email"          => $request->email,
            "password"       =>  Hash::make($request->password),
            'mobile'         => $request->mobile,
            'role'           => $request->role,
        ]);
        return redirect('/super/alladmins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin, $id)
    {
        $admin=Admin::findOrFail($id)->delete();
        return redirect('/super/alladmins');
    }
}
