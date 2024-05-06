@extends('layouts.app')
@section('title','Register')
@section('content')

<div class="row g-0 app-auth-wrapper">
            <div class="app-auth-body mx-auto">
                <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
                <h2 class="auth-heading text-center mb-5">{{__('Create user in to Pilgrims service')}}</h2>
                <div class="auth-form-container text-start">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="name mb-3">
                            <label class="sr-only" for="name">{{__('Name')}}</label>
                            <div>
                                <input id="name" type="text" aria-describedby="nameHelp" placeholder="{{__('Name')}}" class="form-control @error('name') is-invalid @enderror signin-name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="email mb-3">
                            <label class="sr-only" for="email">{{__('Email')}}</label>
                            <div>
                                <input id="email" type="email" aria-describedby="emailHelp" placeholder="{{__('Email')}}" class="form-control @error('email') is-invalid @enderror signin-email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="sr-only" for="role">{{__('Role')}}</label>
                            <div>
                                <select name="role" class="form-control @error('name') is-invalid @enderror signin-name">
                                    <option disabled selected>Select user role</option>
                                    @foreach($roles as $role)
                                        <option @if(old('role') == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="user_id_num" class="sr-only">{{ __('ID number') }}</label>
                            <div>
                                <input id="user_id_num" type="text" placeholder="ID number" class="form-control @error('user_id_num') is-invalid @enderror" name="user_id_num" value="{{ old('user_id_num') }}" required autocomplete="user_id_num">

                                @error('user_id_num')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone_num" class="sr-only">{{ __('Phone number') }}</label>

                            <div>
                                <input id="phone_num" type="text" placeholder="{{__('Phone number')}}" class="form-control @error('phone_num') is-invalid @enderror signin-email" name="phone_num" value="{{ old('phone_num') }}" required autocomplete="new-phone_num">
                                @error('phone_num')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--//form-group-->
                        <div class="password mb-3">
                            <label class="sr-only" for="password">{{__("Password")}}</label>
                            <div>
                                <input id="password" type="password" placeholder="{{__('Password')}}" class="form-control signin-password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="password mb-3">
                            <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
                            <div>
                                <input id="password-confirm" type="password-confirm" placeholder="{{__('Confirm Password')}}" class="form-control signin-password @error('password-confirm') is-invalid @enderror" name="password-confirm" required autocomplete="current-password-confirm">

                                @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="extra mt-3 row justify-content-between">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div><!--//col-6-->
                        </div><!--//form-group-->
                        <div class="text-center">
                            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">{{__('Register')}}</button>
                        </div>
                    </form>
                </div><!--//auth-form-container-->

            </div><!--//auth-body-->
</div><!--//row-->
@endsection
