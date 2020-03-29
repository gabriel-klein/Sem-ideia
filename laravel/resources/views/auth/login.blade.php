@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 2em">
        <div class="col s12 m6 offset-m3">
            <div class="card z-depth-2">
                <div class="card-content">
                    <span class="card-title center-align" style="margin-bottom: 1em">Login</span>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mail_outline</i>
                                <input id="email" type="email" class="@error('email') invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="password" type="password" class="@error('password') invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password">{{ __('Password') }}</label>
                                
                                @error('password')
                                    <span class="helper-text red-text">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label class="form-check-label" for="remember">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span>{{ __('Remember Me') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                @if (Route::has('password.request'))
                                    <a class="left" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
