@extends('layouts.app')

@section('content')
<div class="page-single">
    <div class="container">
        <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                    <img
                        src="https://tabler.github.io/tabler/demo/brand/tabler.svg"
                        class="h-6"
                        alt="Logo Tabler">
                </div>

                <form class="card" action="{{ route('register') }}" method="post" novalidate>
                    @csrf
                    <div class="card-body p-6">
                        <div class="card-title">Create new account</div>

                        <div class="form-group">
                            <label class="form-label">@lang('Name')</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="Enter name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">@lang('Email address')</label>
                            <input
                                type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="Enter email"
                                name="email"
                                value="{{ old('email') }}"
                                required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">@lang('Password')</label>
                            <input
                                type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Password"
                                name="password"
                                required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password-confirm">@lang('Confirm Password')</label>
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Confirm Password"
                                name="password_confirmation"
                                id="password-confirm">
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">
                                @lang('Create new account')
                            </button>
                        </div>
                    </div>
                </form>

                <div class="text-center text-muted">
                    Already have an account? <a href="{{ route('login') }}">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
