@extends('layouts.public')
@section('title')
مجتمع أكزيمتي
@endsection

@section('main')

{{--
@foreach($sub->discussions as $item)

{{$item->disc_title}}<br>
{{$item->disc_body}}<br>
{{$item->disc_id}}<br>
<hr>
@endforeach --}}

<div class="container margin_60">
    <h5><span>{{$sub->discussioncategory->name}}<small>>> {{$sub->name}}</small></span></h5>
    <div class="row">
        <div class="col-md-8">
          <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">

            @foreach($sub->discussions as $item)
            <div class="row">


              <div class="col-lg-4 col-md-4 mb-2">
                  <div class="img_list" >

                    @if($item->disc_image)
                    <a href="/single/{{$item->id}}"><img src="/discussion/images/{{$item->disc_image}}" alt="Image" height="50px">
                    </a>
                  @else
                  <a href="/single/{{$item->id}}">
                   <img src="/discussion/images/discussion-featured.jpg" alt="Image" height="50px"> \
                  </a>
                @endif



                  </div>
             </div>



             <div class="col-lg-8 col-md-8">
                  <div class="tour_list_desc">
                         <h3><strong>{{$item->disc_title}}</strong> </h3>
                         @if($item->anonymous)

                                <p>الناشر<a href="#index">مجهول</a>
                                    <span> بتاريخ</span> {{Date::instance($item->created_at)->diffForHumans()}}
                                </p>
                                @else
                                <p>الناشر<a href="#profilepage">{{$item->user->name}} </a>
                                    <span> بتاريخ</span> {{Date::instance($item->created_at)->diffForHumans()}}
                                </p>
                                @endif

                         {{-- <p> <span> الناشر</span>{{$item->user->name}} , <span> بتاريخ</span> {{Date::instance($item->created_at)->diffForHumans()}}</p> --}}
                         <p> <span>{{$item->replies->count()}}</span>رد , <span>  {{$item->likes->count()}}</span>لايك</p>
                        <p>{{$item->disc_body}}</p>
                 </div>
             </div>


           </div>
           @endforeach
         </div>



        </div>

        <div class="col-md-4">

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
