@extends('layouts.auth')
@section('content')
    <div class="nk-block toggled" id="l-login">
        @foreach (['success', 'info', 'warning', 'error'] as $msg)
            @if (session($msg))
                <div
                    class="alert alert-{{ $msg == 'error' ? 'danger' : $msg }} alert-dismissible fade in"
                    role="alert"
                >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach

        <div class="nk-form">
            <form action="{{ route('loginprocess') }}" method="post">
                @csrf
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Username"
                            name="name"
                            style="@error('name') border-bottom: 1px solid red; @enderror"
                        />
                        @error('name')
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

                <div class="nk-int-st mt-3" style="margin-top: 18px">
                    <button type="submit" class="btn btn-md m-1" style="background-color: #00c292; color: white">
                        <i class="fa fa-sign-in"></i>
                        Login
                    </button>
                </div>
            </form>

            <a
                href="{{ route('registration') }}"
                data-toggle="tooltip"
                data-title="Go To Register"
                data-placement="right"
                data-ma-block="#l-register"
                class="btn btn-login btn-success btn-float white-tooltip"
            >
                <i class="notika-icon notika-right-arrow right-arrow-ant"></i>
            </a>
        </div>

        <div class="nk-navigation nk-lg-ic">
            <a href="{{ route('registration') }}" data-ma-block="#l-register">
                <i class="notika-icon notika-plus-symbol"></i>
                <span>Register</span>
            </a>
        </div>
    </div>
@endsection
