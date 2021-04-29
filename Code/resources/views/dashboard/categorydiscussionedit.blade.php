@extends('layouts.admin')
@section('title')
تعديل فئة مناقشة
@endsection

@section('main')


<form method="POST" action="/catdiscupdate/{{$singlediscussioncategory->id}}"  enctype="multipart/form-data">
    @csrf

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="exampleInputEmail1">الاسم كامل</label>
        <input class="form-control" name="name" type="text" placeholder="الاسم الكامل" value="{{$singlediscussioncategory->name}}">
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>


    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="exampleFormControlTextarea1">الوصف</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" > {{$singlediscussioncategory->description}}</textarea>
        <small class="text-danger">{{ $errors->first('description') }}</small>
    </div>



    <!-- File input -->
   <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label for="exampleFormControlFile1">اختيار صورة</label>
       <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" value="">
       <hr>
       <img src="/discussion/images/{{$singlediscussioncategory->image}}" alt="" width="100px" height="100px">
       <hr>
       <small class="text-danger">{{ $errors->first('image') }}</small>
    </div>

    <button type="submit" class="btn btn-primary">تعديل</button>
</form>
@endsection
