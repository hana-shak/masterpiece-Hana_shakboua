@extends('layouts.public')
@section('title')
أكزيمتي
@endsection
@section('slider')

@endsection
@section('main')


<div class="container margin_60">
    <h5>مناقشاتي</h5>
    <div class="row">
        <div class="col-md-8">
          <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">

             @foreach ($discs as $disc )
            <div class="row">
              <div class="col-lg-4 col-md-4 mb-2">
                  <div class="img_list" >
                    @if($disc->disc_image)
                    <a href="/single/{{$disc->id}}"><img src="/discussion/images/{{$disc->disc_image}}" alt="Image" height="50px">
                    </a>
                  @else
                  <a href="/single/{{$disc->id}}">
                   <img src="/discussion/images/discussion-featured.jpg" alt="Image" height="50px"> \
                  </a>
                @endif



                  </div>
             </div>



             <div class="col-lg-8 col-md-8">
                  <div class="tour_list_desc">
                         <h3><strong>{{$disc->disc_title}}</strong> </h3>
                         @if($disc->anonymous)

                                <p>الناشر<a href="#index">مجهول</a>
                                    <span> بتاريخ</span> {{Date::instance($disc->created_at)->diffForHumans()}}
                                </p>
                                @else
                                <p>الناشر<a href="#profilepage">{{$disc->user->name}} </a>
                                    <span> بتاريخ</span> {{Date::instance($disc->created_at)->diffForHumans()}}
                                </p>
                                @endif

                         {{-- <p> <span> الناشر</span>{{$item->user->name}} , <span> بتاريخ</span> {{Date::instance($item->created_at)->diffForHumans()}}</p> --}}
                         <p> <span>{{$disc->replies->count()}}</span>رد , <span>  {{$disc->likes->count()}}</span>لايك</p>
                        <p>{{$disc->disc_body}}</p>
                 </div>
             </div>


           </div>
           @endforeach
         </div>



        </div>

        <div class="col-md-4">
            <div class="box_style_1">
                <a href="/uedit/{{Auth::id()}}" class="btn_1" class="mb-3">تعديل بيانات الملف الشخصي  </a>

            </div>


            <div class="widget">

                <div class="widget tags">
                <h4>الإعلانات</h4>
                <hr>
                <img src="/Ads/shealogo.jpg" alt="Image" width="250px" class="mb-3">
                <img src="/Ads/lava.png" alt="Image" width="250px" class="mb-3">
                {{-- sheasecretslogo.png --}}
            </div>


        </div>


    </div>
</div>



@endsection
