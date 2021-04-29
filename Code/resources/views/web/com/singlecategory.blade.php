@extends('layouts.public')
@section('title')
مجتمع أكزيمتي
@endsection

@section('main')

{{-- <h5>{{$sub->discussioncategory->name}} >>>  {{$sub->name}}</h5></span> --}}




<div class="container margin_60">
    <div class="row">

        <div class="col-md-8">

<div class="container ">
    {{-- <h3>{{$subcat->name}}</h3> --}}
    <div class="row">
      @foreach($subs as $item)
          <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
                  <div class="img_container">
                      <a href="/dispersub/{{$item->id}}">
                        
                          <img src="/discussion/images/{{$item->image}}" width="300" height="300"  alt="Image">
                      </a>
                  </div>

                  <div class="tour_title">
                      <h3><strong>{{$item->name}}</strong> </h3>
                  </div>
          </div>
      @endforeach
    </div>
  </div>
</div>





<div class="col-md-4">
    <div class="box_style_1">
        <div >
            <h4> الفئات الرئيسية  </h4>
            <ul>
                @foreach ($maincat as $cat )
                <li><a href="/onecategory/{{$cat->id}}">{{$cat->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- <div class="box_style_4"> --}}
        <div class="widget">
            <h4>أحدث المشاركات</h4>
            <ul class="recent_post">
               @foreach ( $dis as $dis )
                <li>
                    <i class="icon-calendar-empty"></i>
                    {{Date::instance($dis->created_at)->format('l j F Y ')}}
                    <div><a href="/single/{{$dis->id}}"> {{$dis->disc_title}}</a>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
        <!-- End widget -->
        <hr>
        <div class="widget tags">
            <h4>الإعلانات</h4>
            <img src="/Ads/aminalogo.png" alt="Image" width="250px" class="mb-3">
            <img src="/Ads/oliveoil.png" alt="Image" width="250px" class="mb-3">


           <img>
        </div>
        <!-- End widget -->

    {{-- </aside> --}}


    </div>
</div>

    </div>
</div>
@endsection
