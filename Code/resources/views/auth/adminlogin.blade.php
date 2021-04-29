@extends('layouts.public')

@section('main')


<section id="hero" class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <div id="login">
                        <div class="text-center"><img src="{{URL::asset('fedash/assets/media/image/five.png')}}"  height='95' width="250" alt="Image" data-retina="true" ></div>
                        <hr>
                        <form method="POST" action="/admin/submit">
                            @csrf
                        {{-- <a href="#0" class="social_bt facebook">Login with Facebook</a>
                        <a href="#0" class="social_bt google">Login with Google</a> --}}
                        {{-- <div class="divider"><span>Or</span></div> --}}
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>كلمة المرور</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <p class="small">
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4  ">
                                        <div class="form-check">

                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                  تذكرني
                                                </label>

                                        </div>
                                    </div>
                                </div>

                            </p>
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class="btn btn-secondary">
                                    دخول
                                 </button>
                            </div>


                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                هل نسيت كلمة المرور؟
                            </a>
                        @endif
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>



@endsection
