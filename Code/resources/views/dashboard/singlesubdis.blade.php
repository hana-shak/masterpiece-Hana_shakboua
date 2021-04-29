@extends('layouts.admin')

@section('title')
{{$subdis->name}}
 {{-- <h3>{{$subcat->name}}</h3>  main category name--}}

@endsection


@section('main')

{{$subdis->name}}
<hr>
{{$subdis->description}}
<hr>
<img src="/discussion/images/{{$subdis->image}}" alt="" width="100px" height="100px">
<hr>
<a href="/sscedit/{{$subdis->id}}/subscatdis">
    <button type="button" class="btn btn-primary">تعديل بيانات {{$subdis->name}}</button>
</a>

<hr>

<a href="/sscdelete/{{$subdis->id}}">
    <button type="button" class="btn btn-danger"> حذف  {{$subdis->name}}</button>
</a>


@endsection
