{{-- Instead of first page --}}


@extends('layouts.public')
@section('title')
مجتمع أكزيمتي
@endsection

@section('main')
<div>
    <h1>يا أهلا وسهلا فيكم</h1>
    <h4>It will contain listed duscussions</h4>
     <a href="/start">ابدأ نقاشك</a>
    <hr>
    <hr>
</div>
<div class="strip_booking">
    <!---->
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="date">
                <h3>المناقشات </h3>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="date">
                <h3>أماكنها </h3>
            </div>
        </div>
        {{-- <div class="col-lg-6 col-md-5">
            <h3 class="hotel_booking">Hotel Mariott Paris</h3>
            <span>2 Adults / 2 Nights</span>
        </div> --}}
        <div class="col-lg-2 col-md-2">
            <ul class="info_booking">
                <h3>الردود</h3>

            </ul>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="booking_buttons">
                <h3>اللايكات</h3>
            </div>
        </div>
    </div>
    <!-- End row -->

  <!--Dynamic data fetching-->
  @foreach ($all_disc as $item)
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="date">
                <a href="/single/{{$item->id}}">
                <h5>{{$item->disc_title}} </h5></a>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="date">
                <a href="/dispersub/{{$item->subdiscussion->id}}">
                <h5>{{$item->subdiscussion->name}} </h5> </a>
            </div>
        </div>
        {{-- <div class="col-lg-6 col-md-5">
            <h3 class="hotel_booking">Hotel Mariott Paris</h3>
            <span>2 Adults / 2 Nights</span>
        </div> --}}


        <div class="col-lg-2 col-md-2">
            <ul class="info_booking">
                <h5> {{$item->replies->count()}}</h5>

            </ul>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="booking_buttons">
                <h5> {{$item->likes->count()}}</h5>

            </div>
        </div>
    </div>
    @endforeach

</div>
<!-- End strip booking -->

@endsection
