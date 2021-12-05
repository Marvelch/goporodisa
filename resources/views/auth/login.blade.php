@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 3px 2px 2px #dcdbdb">
                <!-- <div class="card-header">{{ __('Login') }}</div> -->
                <div class="row m-5">
                    <div class="col-md-5 text-center mt-2">
                        <!-- <img src="{{asset('assets/img/login.gif')}}" alt="" srcset="" style="width: 100%;"> -->
                        <h1 class="font-weight-bold mt-5 text-primary">LOGIN</h1>
                        <p class="text-capitalize pt-2"><small>mengakses semua layanan goporodisa</small></p>
                    </div>
                    <div class="col-md-7 mt-3">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label text-md-left">Email</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-3 col-form-label text-md-left">Kata Sandi</label>

                                    <div class="col-md-8">
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

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        @if (Route::has('password.request'))
                                        <small>Tidak bisa login ? <a href="{{ route('password.request') }}">Lupa Password</a> / <a href="{{URL('register')}}">Register Baru</a></small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="ml-2 mr-2">Login</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
