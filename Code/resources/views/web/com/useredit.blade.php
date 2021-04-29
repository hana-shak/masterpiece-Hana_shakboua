@extends('layouts.public')
@section('title')
أكزيمتي
@endsection
@section('slider')

@endsection
@section('main')
{{-- @foreach ($discs as $d )
<h3>{{$d->disc_title}}</h3>
@endforeach --}}

<div class="container margin_60">

  <div class="row">
    <div class="col-md-8">
        <div class="form_title">
            <h3><strong><i class="icon-pencil"></i></strong>تعديل المعلومات الشخصية</h3>

        </div>
        <div class="step">
            <div id="message-contact"></div>
            <form method="POST" action="/useredit/{{Auth::id()}}" id="contactform" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>الاسم </label>
                            <input type="text" class="form-control"  name="name" placeholder="{{$user->name}}" value={{$user->name}}>
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>البريد الالكتروني</label>
                            <input type="text" class="form-control"  name="email" placeholder="{{$user->email}}" value={{$user->email}}  >
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label> رقم الموبايل</label>
                            <input type="text" class="form-control"  name="mobile" placeholder="{{$user->mobile}}" value={{$user->mobile}}>
                            <small class="text-danger">{{ $errors->first('mobile') }}</small>

                        </div>
                    </div>

                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>كلمة المرور</label>
                            <input type="password" class="form-control"  name="password" placeholder="">
                            <small class="text-danger">{{ $errors->first('password') }}</small>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                            <div class="form-group">
                                <label>صورة الملف الشخصي</label>

                                @if($user->image)
                                <img src="/discussion/images/{{$user->image}}"  width="100px" height="100px" />
                                @endif

                                <input type="file" name="image" id="js-upload-files" multiple>

                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                     <input type="submit" value="تعديل">
                    </div>
                </div>
            </form>
        </div>
    </div>


  </div>



</div>


@endsection
