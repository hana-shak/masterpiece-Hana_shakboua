@extends('layouts.admin')
@section('title')

الردود المشتكى عليها
@endsection

@section('main')


<div class="card">
    @if($singlereport->reply->reply_image)
    <img src="discussion/images/{{$singlereport->reply->reply_image}}" class="card-img-top" width="200px" height="200px">
    @endif
      <div class="card-body">
        <h5 class="card-title">{{$singlereport->reply->user->name}}</h5>
        <h5 class="card-title">
            {{Date::instance($singlereport->reply->created_at)->diffForHumans()}}</h5>
        <p class="card-text">{{$singlereport->reply->reply_body}}</p>
        <a href="/repdelete/{{$singlereport->reply->id}}" class="btn btn-primary">حذف</a>
      </div>
 </div>

@endsection
