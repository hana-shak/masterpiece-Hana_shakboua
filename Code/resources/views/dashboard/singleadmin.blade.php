@extends('layouts.admin')
@section('title')
صفحة بيانات المسؤول
@endsection

@section('brief')
المعلومات الشخصية للأدمن
@endsection
@section('main')
{{-- {{$singleadmin}} --}}

<div class="card">
    <div class="card-body">
        <div>
            <label for="">الاسم:</label>
            <h6 class="card-text mb-4">{{$singleadmin->name}}</h6>
        </div>
    <div>
      <label for="">الدور الذي يقوم به:</label>
      <h6 class="card-text mb-4 ">{{$singleadmin->role}}</h6>
    </div>
    <div>
      <label for="">الموبايل:</label>
      <p class="card-text mb-4">{{$singleadmin->mobile}}</p>
    </div>
    <div>
      <label for="">البريد الالكتروني:</label>
      <p class="card-text mb-4">{{$singleadmin->email}}</p>
    </div>
    {{-- <div>
      <label for="">كلمة السر:</label>
      <p class="card-text">{{$singleadmin->password}}</p>
    </div> --}}

      <div class="mb-4" >
        <a href="/super/editadmin/{{$singleadmin->id}}">
            <button type="button" class="btn btn-primary">تعديل بيانات {{$singleadmin->name}}</button>
        </a>
      </div>
      <div>
        <a href="/super/deleteadmin/{{$singleadmin->id}}">
            <button type="button" class="btn btn-danger"> حذف المسؤول {{$singleadmin->name}}</button>
        </a>
      </div>
    </div>
  </div>

@endsection
