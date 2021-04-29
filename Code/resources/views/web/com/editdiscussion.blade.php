
@extends('layouts.public')
@section('token')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
@endsection
@section('title')
مجتمع أكزيمتي
@endsection

{{-- I will comment the selected menus until relations work  --}}

@section('main')

@foreach($disc as $item)
 {{-- {{$item->disc_title}}
{{$item->disc_body}}
{{$item->disc_image}}
<hr>
{{$item->ananyoums}} --}}
{{-- {{$item->sub_discussion_categories_id}} --}}
@endforeach


<div class="container margin_60">
    <div class="row">
        <div class="col-md-8">
            <div class="form_title">
                <h3><strong><i class="icon-pencil"></i>تعديل مناقشة</strong></h3>

                <p>تعديل مناقشة</p>
            </div>
            <div class="step">
                <div id="message-contact"></div>
                <form method="POST" action="/update/{{$disc->id}}" id="contactform" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="subcat" name="subcat" value=" {{$disc->sub_discussion_categories_id}}">
                    <input type="hidden" id="itemid" name="id" value=" {{$disc->id}}">



                    {{-- <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الفئة الرئيسية</label>
                                <select class="form-control dynamic" name="category" id="category">

                                    <option value="">اختر الفئة الرئيسية</option>
                                    @foreach($cats as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الفئة الفرعية</label>
                                {{-- Dependent Dropdown Select List/Subcategory--}}
                                {{-- <select class="form-control" name="subcategory" id="subcategory" >
                                    <option value="" ></option>
                                </select>
                            </div>
                        </div>
                    </div> --}}


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> عنوان المناقشة</label>
                                <input type="text" class="form-control"  name="disc_title" placeholder="عنوان المناقشة"  value="{{$disc->disc_title}}">
                            </div>
                        </div>

                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>المناقشة</label>
                                <textarea rows="5" id="message_contact" name="disc_body" class="form-control" placeholder="اكتب هنا" style="height:200px;">{{$disc->disc_body}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>ادخال صورة</label>
                                    <input type="file" name="image" id="js-upload-files" multiple>

                                    @if($disc->disc_image)
                                    <img src="/discussion/images/{{$disc->disc_image}}"  width="100px" height="100px" />
                                    @endif

                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                             <label><input type="checkbox" name="anonymous" id="anonymous">
                                الظهور كمتخفي(عدم اظهار الاسم)</label>

                            </div>
                            <input type="submit" value="ادخال" class="btn_1" id="submit-contact">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End col-md-8 -->

        <div class="col-md-4">

                <h4>الإعلانات</h4>
                <hr>
                <img src="/Ads/aminalogo.png" alt="Image" width="250px" class="mb-3">
                <img src="/Ads/oliveoil.png" alt="Image" width="250px" class="mb-3">


           
        </div>
        <!-- End col-md-4 -->
    </div>
    <!-- End row -->
</div>
<!-- End container -->



<script>
$(document).ready(function(){
    $('select[name="category"]').on('change',function(){
        // console.log("listening");
        var cat_id = $(this).val();

        if(cat_id){

            // console.log(cat_id);
            $.ajax({
                url:'/getSubs/'+cat_id,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log(data);
                    $('select[name="subcategory"]').empty();
                    $.each(data,function(key,value){
                             $('select[name="subcategory"]')
.append('<option value="'+key+'">'+value+'</option>');
                    });
                }
            });
        }else{
            $('select[name="subcategory"]').empty();
        }
    });
});
</script>
@endsection
