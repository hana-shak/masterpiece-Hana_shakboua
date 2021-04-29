@extends('layouts.admin')
@section('title')

إعدادات  فئات المناقشة

@endsection

@section('brief')

@endsection


@section('main')



<div>
    <a href="/newdiscussion" ><button type="button" class="btn btn-secondary" >إضافة فئة جديدة</button>
        </a>
</div>

<div class="table-responsive">

    <table class="table">
        <thead>
        <tr>

            <th scope="col">العدد</th>
            <th scope="col">الاسم</th>
            {{-- <th scope="col">الوصف</th> --}}
            <th scope="col">عرض الفئة</th>
            <th scope="col">الفئات الفرعية<th>
        </tr>
        </thead>
        <tbody>
            @php($count=0)
            @foreach ($discussioncategory as $singlediscussioncategory)
            @php($count++)
        <tr>
            <td>{{$count}}</td>
            <td>{{$singlediscussioncategory->name}}</td>
            {{-- <td>{{$singlediscussioncategory->description}}</td> --}}
            <td><a href="/singlediscussion/{{$singlediscussioncategory->id}}">
                <button type="button" class="btn btn-info">عرض الفئة{{$singlediscussioncategory->name}}</button>
            </a>
            </td>
            <td><a href="/subs/{{$singlediscussioncategory->id}}">
                <button type="button" class="btn btn-info">الفئات الفرعية {{$singlediscussioncategory->name}}</button>
            </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection
