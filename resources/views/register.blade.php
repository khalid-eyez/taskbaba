@extends('layouts.auth')
@section('content')
    <div class="nk-block toggled" id="l-register">
        <div class="nk-form">
            <form action="{{ route('registration') }}" method="post">
                @csrf
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Username"
                            name="name"
                            value="{{ old('name') }}"
                            style="@error('name') border-bottom: 1px solid red; @enderror"
                        />
                        @error('name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Email Address"
                            name="email"
                            value="{{ old('email') }}"
                            style="@error('email') border-bottom: 1px solid red; @enderror"
                        />
                        @error('email')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input
                            type="password"
                            class="form-control"
                            placeholder="Password"
                            name="password"
                            style="@error('password') border-bottom: 1px solid red; @enderror"
                        />
                        @error('password')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input
                            type="password"
                            class="form-control"
                            placeholder="Confirm Password"
                            name="password_confirmation"
                            style="@error('password_confirmation') border-bottom: 1px solid red; @enderror"
                        />
                        @error('password_confirmation')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="nk-int-st mt-3" style="margin-top: 18px">
                    <button type="submit" class="btn btn-md m-1" style="background-color: #00c292; color: white">
                        <i class="fa fa-pencil"></i>
                        Register
                    </button>
                </div>
            </form>
            <a
                href="{{ route('login') }}"
                data-toggle="tooltip"
                data-title="Go To Login"
                data-placement="right"
                data-ma-block="#l-login"
                class="btn btn-login btn-success btn-float white-tooltip"
            >
                <i class="notika-icon notika-right-arrow"></i>
            </a>
        </div>

        <div class="nk-navigation rg-ic-stl">
            <a href="{{ route('login') }}" data-ma-block="#l-login">
                <i class="notika-icon notika-right-arrow"></i>
                <span>Login</span>
            </a>
        </div>
    </div>
@endsection
