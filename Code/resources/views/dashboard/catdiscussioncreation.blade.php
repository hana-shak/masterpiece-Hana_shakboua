@extends('layouts.admin')
@section('title')
إضافة فئة مناقشة
@endsection

@section('main')


{{-- <div>
    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
</div> --}}
<form method="POST" action="/catdis"  enctype="multipart/form-data">
    @csrf
    <p style="color:red">يجب ملأ كل الحقول</p>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="exampleInputEmail1">الاسم كامل</label>
        <input class="form-control" name="name" type="text" placeholder="الاسم الكامل">
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>


    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="exampleFormControlTextarea1">الوصف</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        <small class="text-danger">{{ $errors->first('description') }}</small>
    </div>



    <!-- File input -->
   <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label for="exampleFormControlFile1">اختيار صورة</label>
       <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
       <small class="text-danger">{{ $errors->first('image') }}</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
