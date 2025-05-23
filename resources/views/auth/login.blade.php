@extends('auth.layouts.template')
@section('title')
    {{ trans('auth/site.title') }}
@endsection

@section('main')


    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">{{ trans('auth/site.email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email"
                       value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">{{ trans('auth/site.pass') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password"
                       required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"
                               name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('auth/site.remember') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    {{ trans('auth/site.login') }}
                </button>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <a class="btn btn-link" href="{{ route('cas_login') }}">
                    <button type="button" class="btn btn-success">
                        {{ trans('auth/site.cas') }}
                    </button>
                </a></div>
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ trans('auth/site.forgot') }}
            </a>
            <a class="btn btn-link" href="{{ route('register') }}">
                {{ trans('auth/site.register') }}
            </a>
        </div>
    </form>

@endsection
