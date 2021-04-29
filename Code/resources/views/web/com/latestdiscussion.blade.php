@extends('layouts.public')
@section('title')
مناقشة واحدة
@endsection

@section('main')



{{-- {{$latestdis}} --}}
<h3></h3>
 @foreach ($latestdis as $item)
{{-- {{$item->id}} --}}
{{-- {{$items->replies->reply_body}} --}}
{{-- {{$item->anonymous}}<hr> --}}
 {{-- {{$item->id}}<hr>
{{$item->disc_title}}<hr>
{{$item->disc_body}}<hr>
{{$item->created_at}}<hr>
{{$item->sub_discussion_categories_id}}<hr>
{{$item->anonymous}}<hr>
{{auth::user()->name}}<hr>
<hr>
<img src="/discussion/images/{{$item->disc_image}}" height="100px" width="100px">  --}}
 @endforeach

<div class="container margin_60">
    <div class="row">

        <div class="col-lg-9">
             <div class="box_style_1">
                <div class="post nopadding">
                    @if($item->disc_image)
                           <img src="/discussion/images/{{$item->disc_image}}" alt="Image" height="400px" width="100%" >
                    @else
                    {{-- <h5> No PICTURE</h5> --}}
                    @endif
                    <div class="post_info clearfix">


                         <div class="post-left" id="custom-info">
                            <ul>
                                @if($item->anonymous)
                                <li><i class="icon-tags"></i>الناشر<a href="#index">مجهول</a>
                                </li>
                                @else
                                <li><i class="icon-tags"></i>الناشر<a href="#profilepage">{{$item->user->name}}</a>
                                {{-- <li><i class="icon-tags"></i>الناشر<a href="#profilepage">{{$user->name}}</a> --}}
                                </li>
                                @endif
                                <li><i class="icon-calendar-empty"></i>كتب بتاريخ <span>{{Date::instance($item->created_at)->format('l j F Y ')}}</span>
                                </li>
                                {{-- <li><i class="icon-inbox-alt"></i>In <a href="#"> </a>
                                </li>
                                <li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a>
                                </li> --}}
                             </ul>
                         </div>

                    </div>
                    <h2>{{$item->disc_title}}</h2>
                    <p>
                        {{$item->disc_body}}
                    </p>

                    @if($item->replies->count() !== 0)
                    <div class="post-right"><i class="icon-comment"></i><a href="#">{{$item->replies->count()}}  </a>رد</div>
                    @else
                    <div class="post-right"><i class="icon-comment"></i><a href="#">0</a>رد</div>
                    @endif


                    {{$item->likes->count()}} <i class="icon-thumbs-up"></i> لايك
                    @auth

                    @if(!($item->likedBy(Auth::id())))
                    <div title="Code: 0xe843" class="the-icons col-md-3"><i class="icon-thumbs-up"></i><a href="/like/{{$item->id}}">لايك </a><span class="i-name"></span><span class="i-code"></span></div>
                    @else
                    <div title="Code: 0xe842" class="the-icons col-md-3"><i class="icon-thumbs-down"></i><a href="/unlike/{{$item->id}}">مولايك </a> <span class="i-name"></span><span class="i-code"></span></div>
                    @endif
                    @endauth


                    @if(auth::id() == $item->user->id )
                    <div title="Code: 0xec78" class="the-icons col-md-3"><i class="icon-edit-2"></i><a href="/update/{{$item->id}}">تعديل </a> <span class="i-name"></span><span class="i-code"></span></div>
                    <div title="Code: 0xec80" class="the-icons col-md-3"><i class="icon-trash-4"></i><a href="/delete/{{$item->id}}">حذف </a> <span class="i-name"></span><span class="i-code"></span></div>
                    @endif

                    {{-- <p>
                        Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                    </p> --}}
                    {{-- <blockquote class="styled">
                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        <small>Someone famous in <cite title="">Body of work</cite></small>
                    </blockquote> --}}
                </div>

                <!-- end post -->
             </div>
            <!-- end box_style_1 -->

            <!-- REPLY SECTION -->


            @auth
            <h4>شارك بإجابة</h4>
            <form action="/reply" method="post" enctype="multipart/form-data">
                @csrf
                <input name="invisible" type="hidden" value={{$item->id}}>

                <div class="form-group">
                    <textarea name="message"   class="form-control style_2" style="height:150px;" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <label>ادخال صورة</label>
                    <input type="file" name="image" id="js-upload-files" multiple>
                </div>
                <div class="form-group">
                    <label><input type="checkbox" name="anonymous" id="anonymous">
                       الظهور كمتخفي(عدم اظهار الاسم)</label>
            </div>
                <div class="form-group">
                    <input type="submit" class="btn_1" value="شارك بإجابة" />
                </div>
            </form>

            @endauth

            @guest
            {{-- Add button to register so you can reoly [LATER AFTER FULLY DISCUSSION-REPLY CRUD with AUTHORIZATION] --}}
            @endguest

            <!--  END REPLY -->
        <h4>الردود</h4>
          <div id="comments">
                <ol>
                    @if($item->replies)

                    @foreach ($item->replies as $m)
                    <li>
                        <img src="/discussion/images/ {{$m->reply_image}}" alt="Image" class="img-fluid"   height="35%" width="70%" > --}}
                        <!---->

                       <div class="avatar">
                            <a href="#"><img src="{{URL::asset('main/img/avatar1.jpg')}}" alt="Image">
                            </a>
                        </div>
                        <div class="comment_right clearfix">
                            <div class="comment_info">
                                رد بواسطة <a href="#">{{$m->user->name}}</a><span>|</span>  apr 2019 <span>|</span><a href="#">Reply</a>
                            </div>
                            <p> {{$m->reply_body}}</p>
                        </div>

                    </li>
                    @endforeach
                </ol>
           </div>
            <!-- End Comments -->
         </div>
         @endif
        <!-- End col-md-8-->

        <aside class="col-lg-3 add_bottom_30">

            <div class="widget tags">
                <h4>الإعلانات</h4>
                <hr>
                <img src="/Ads/aminalogo.png" alt="Image" width="250px" class="mb-3">
                <img src="/Ads/oliveoil.png" alt="Image" width="250px" class="mb-3">



            </div>
            <!-- End widget -->

        </aside>
        <!-- End aside -->

    </div>
    <!-- End row-->
</div>
<!-- End container -->
@endsection

