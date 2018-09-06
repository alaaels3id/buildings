<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    {{ Html::style('one/css/bootstrap.min.css') }}
    {{ Html::style('one/css/font-awesome.min.css') }}
    {{ Html::script('one/js/jquery.min.js') }}
    {{ Html::style('one/css/hover.css') }}
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 offset-md-3" style="margin-top: 80px;">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body" style="padding: 40px;">
                    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" autocomplete="off" type="email" 
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" 
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span style="margin: 5px;">{{ __('Remember Me') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
{{ Html::script('one/js/jquery.flexslider.js') }}
{{ Html::script('one/js/responsive-nav.js') }} 
{{ Html::script('one/js/bootstrap.min.js') }}
{{ Html::script('one/js/select2.min.js') }}
<script type="text/javascript">
    $('.select2').select2();
</script>
</html>