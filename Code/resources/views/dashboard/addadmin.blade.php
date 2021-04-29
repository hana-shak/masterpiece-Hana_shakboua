@extends('layouts.admin')
@section('title')
إضافة مسؤول
@endsection

@section('main')

<form method="POST" action="/super/newadmin">
    @csrf

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="exampleInputEmail1">الاسم كامل</label>
        <input class="form-control" name="name" type="text" placeholder="الاسم الكامل">
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="exampleInputEmail1">البريد الالكتروني</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
               aria-describedby="emailHelp" placeholder="ادخل الايميل">
               <small class="text-danger">{{ $errors->first('email') }}</small>

    </div>

    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label for="exampleInputEmail1">رقم الموبايل</label>
        <input class="form-control"  name="mobile" type="text" placeholder="رقم الموبايل">
        <small class="text-danger">{{ $errors->first('mobile') }}</small>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="exampleInputPassword1">كلمة المرور</label>
        <input type="text" name="password" class="form-control" id="exampleInputPassword1"
               placeholder="كلمة المرور">
         <small class="text-danger">{{ $errors->first('password') }}</small>
    </div>

    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <label for="exampleInputPassword1"> وظيفة المسؤول</label>
        <select class="custom-select mb-3" name="role">
            <option selected></option>
            <option value="مجتمع">
                مسؤول/ة المجتمع</option>
            <option value="تغذية">
                مسؤول/ة التغذية</option>
            <option value="مقالات">
                مسؤول المقالات</option>
        </select>
        <small class="text-danger">{{ $errors->first('role')}}</small>
    </div>




    <button type="submit" class="btn btn-primary">ادخال</button>
</form>
@endsection
