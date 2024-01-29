@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #c9eb89b0;">
                    <div class="card-header text-center pt-4" style="background-color: #e1ed72;"><h3
                            style="font-weight: bold;">會員登入</h3></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><h5
                                        style="font-weight: bold;">E-Mail</h5></label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " @error('email') is-invalid
                                           @enderror name="email" value="{{ old('email') }}" required
                                           autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><h5
                                        style="font-weight: bold;">密碼
                                    </h5></label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"
                                            style="font-size: 16pt;font-weight: bolder;">登入
                                    </button>
                                </div>
                            </div>

                            <hr style="border-color:#3490dc;">


                            <div class="form-group row m-0">
                                <div class="col-md-4 offset-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            <h5 style="font-weight: bold;">記住我</h5>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-link p-0" href="https://vanilla.htit.com.tw/password/reset">
                                        <h5 style="font-weight: bold; text-primary;">忘記密碼?
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
