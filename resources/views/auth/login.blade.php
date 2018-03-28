@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body mt-2">


                    <form class="card-text" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-12 input-group">
                                <div class="input-group-addon"><i class="far fa-envelope"></i></div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail..." required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-12 input-group">
                                <div class="input-group-addon"><i class="fas fa-unlock"></i></div>

                                <input id="password" type="password" class="form-control" name="password" placeholder="Senha..." required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
