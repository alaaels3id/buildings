{{-- Name --}}
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    <div class="col-md-6 col-xs-12">
        @php $thevalue = isset($user) ? $user : null; @endphp
        {!! Form::text('name', $thevalue->name, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
        
        @if ($errors->has('name'))
        <span class="invalid-feedback">
             <strong>{{ $errors->first('name') }}</strong>
        </span> 
        @endif
    </div>
</div>

{{-- Data of birth --}}
<div class="form-group row">
    <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
    <div class="col-md-6 col-xs-12">
    
        {!! Form::date('dob', $thevalue->dob, ['class'=> $errors->has('dob') ? 'form-control is-invalid' : 'form-control']) !!}

        @if ($errors->has('dob'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('dob') }}</strong>
        </span> 
        @endif
    </div>
</div>

{{--  Username  --}}
<div class="form-group row">
    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
    <div class="col-md-6 col-xs-12">
        
        {!! Form::text('username', $thevalue->username, ['class'=>$errors->has('username') ? 'form-control is-invalid' : 'form-control']) !!}
        
        @if ($errors->has('username'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('username') }}</strong>
        </span> 
        @endif
    </div>
</div>

{{--  Email  --}}
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6 col-xs-12">
        {!! Form::email('email', $thevalue->email, ['class'=> $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}

        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span> 
        @endif
    </div>
</div>

{{-- location --}}
<div class="form-group row">
    <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
    <div class="col-md-6 col-xs-12">

        {!! Form::text('location', $thevalue->location, ['class'=>$errors->has('location') ? 'form-control is-invalid' : 'form-control']) !!} 
        @if($errors->has('location'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('location') }}</strong>
        </span> 
        @endif
    </div>
</div>

@if(!isset($user) && !isset($some) && !isset($admin))
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6 col-xs-12">
            
            <input type="password" name="password" class="form-control" required="required" >
            @if($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span> 
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        <div class="col-md-6 col-xs-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>
@endif
<div class="form-group row">
    <label for="user_image" class="col-md-4 col-form-label text-md-right">{{ __('User Image') }}</label>
    <div class="col-md-6 col-xs-12">
        <input type="file" name="user_image" class="{{ $errors->has('user_image') ? 'form-control is-invalid' : 'form-control' }}" />

        @if ($errors->has('user_image'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('user_image') }}</strong>
        </span> 
        @endif
    </div>
    <div class="row col-md-12 col-md-offset-4">
        <img width="390" style="margin-top: 10px;" src="{{ SetImage($thevalue->user_image, 'users') }}" class="thumbnail"/>
    </div>
    <div class="clearfix"></div>
</div>