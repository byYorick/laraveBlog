@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="leave-comment mr0">
                        <h3 class="text-uppercase">{{ __('Login') }}</h3>
                        <div class="card-body">
                            <form class="form-horizontal contact-form" role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn send-btn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        </form>
                    </div>


                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>


@endsection

