@extends('layouts.admin')
@section('title')

صفحة الفئة{{$subcat->name}}


@endsection

@section('main')

 {{-- {{$subs}} --}}
 {{-- @foreach ($subs as $item)
 <li>
    {{$item->name}}
    <br>
    <img src="/discussion/images/{{$item->image}}" alt="" width="100px" height="100px">
    <br>
    {{$item->description}}
</li>
 @endforeach --}}

 <h3>{{$subcat->name}}</h3>

<div>
    <a href="/new" ><button type="button" class="btn btn-secondary" >إضافة فئة فرعية جديدة</button>
        </a>
</div>

<div class="table-responsive">

    <table class="table">
        <thead>

        <tr>

            <th scope="col">العدد</th>
            <th scope="col">الاسم</th>
            {{-- <th scope="col">الوصف</th> --}}
            <th scope="col">الصورة</th>
            <th scope="col">عرض</th>
        </tr>

        </thead>
        <tbody>
            @php($count=0)
           @foreach ($subs as $item)
            @php($count++)
        <tr>
            <td>{{$count}}</td>
            <td> {{$item->name}}</td>
            {{-- <td> {{$item->description}}</td> --}}
            <td>  <img src="/discussion/images/{{$item->image}}" alt="" width="100px" height="100px"></td>
            <td><a href="/singlesub/{{$item->id}}">
                <button type="button" class="btn btn-info">عرض الفئة{{$item->name}}</button>
            </a>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection
