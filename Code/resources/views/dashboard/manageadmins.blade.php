@extends('layouts.admin')
@section('title')

إعدادات  المسؤولين

@endsection

@section('main')



<div>
    <a href="/super/addadmin" ><button type="button" class="btn btn-secondary" >إضافة مسؤول جديد</button>
        </a>
</div>

<div class="table-responsive">

    <table class="table">
        <thead>
        <tr>

            <th scope="col">الاسم</th>
            <th scope="col">الدور الذي يقوم به</th>
            <th scope="col">عرض بيانات المسؤول<th>
        </tr>
        </thead>
        <tbody>
            @foreach ($admins as $singleadmin)
        <tr>
            <td>{{$singleadmin->name}}</td>
            <td>{{$singleadmin->role}}</td>
            <td><a href="/super/singleadmin/{{$singleadmin->id}}">
                <button type="button" class="btn btn-info">بيانات {{$singleadmin->name}}</button>
            </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection
