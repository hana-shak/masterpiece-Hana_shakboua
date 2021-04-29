@extends('layouts.public')
@section('title')
أكزيمتي
@endsection
@section('slider')

@endsection
@section('main')

<div class="container ">

    <div class="banner_2">
        <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)" style="background-color: rgba(0, 0, 0, 0.3);">
            <div>
                <h3>أكزيمتي<br>أول مجتمع عربي متخصص عن الاكزيما </h3>
                <p>مساحة لكل شخص بده يشارك تجربته و يسأل عن اي شي بهمه عن الاكزيما</p>
            </div>
        </div>
        <!-- /wrapper -->
    </div>



  <div class="row">
    @foreach ($discussioncategory as $singlediscussioncategory)
        <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
                <div class="img_container">
                    <a href="/onecategory/{{$singlediscussioncategory->id}}">
                        {{-- <img src="/discussion/images/{{$singlediscussioncategory->image}}" alt="all categories" width="180px" height="150" > class="img-fluid" --}}
                        <img src="/discussion/images/{{$singlediscussioncategory->image}}" width="300" height="300"  alt="Image">

                    </a>
                </div>

                <div class="tour_title">
                    <h3><strong>{{$singlediscussioncategory->name}}</strong> </h3>
                </div>
        </div>
    @endforeach
  </div>
</div>

        <!-- End col-md-6 -->

@endsection
