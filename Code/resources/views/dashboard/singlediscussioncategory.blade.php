@extends('layouts.admin')
@section('title')
صفحة بيانات الفئة
@endsection

@section('main')



{{$sdiscussioncategory->name}}
<hr>
{{$sdiscussioncategory->description}}
<hr>
<img src="/discussion/images/{{$sdiscussioncategory->image}}" alt="" width="100px" height="100px">
<hr>
<a href="/editscatdis/{{$sdiscussioncategory->id}}">
    <button type="button" class="btn btn-primary">تعديل بيانات {{$sdiscussioncategory->name}}</button>
</a>

<hr>

<a href="/catdisdelete/{{$sdiscussioncategory->id}}">
    <button type="button" class="btn btn-danger"> حذف  {{$sdiscussioncategory->name}}</button>
</a>

{{-- {{$sdiscussioncategory}} --}}

<div class="card">
    {{-- <div class="card-body">
        <div>
            <label for="">الاسم:</label><h3 class="card-title">{{$singleadmin->name}}</h3>
        </div>
    <div>
      <label for="">الدور الذي يقوم به:</label>
      <h6 class="card-subtitle mb-2 text-muted">{{$singleadmin->role}}</h6>
    </div>
    <div>
      <label for="">الموبايل:</label>
      <p class="card-text">{{$singleadmin->mobile}}</p>
    </div>
    <div>
      <label for="">البريد الالكتروني:</label>
      <p class="card-text">{{$singleadmin->email}}</p>
    </div>
    <div>
      <label for="">كلمة السر:</label>
      <p class="card-text">{{$singleadmin->password}}</p>
    </div> --}}

      {{-- <div>
        <a href="/super/editadmin/{{$singleadmin->id}}">
            <button type="button" class="btn btn-primary">تعديل بيانات {{$singleadmin->name}}</button>
        </a>
      </div>
      <div>
        <a href="/super/deleteadmin/{{$singleadmin->id}}">
            <button type="button" class="btn btn-danger"> حذف المسؤول {{$singleadmin->name}}</button>
        </a>
      </div>
   </div> --}}
  </div>

@endsection
