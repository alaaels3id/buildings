{{-- 'co_name', 'co_email', 'co_subject', 'co_message', 'co_view', 'co_type' --}}

{{-- contact image --}}
<div class="form-group row">
    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Contact Iamge') }}</label>
    <div class="col-md-6">
        <img src="{{ GetImage($contact->image, '/public/one/uploads/users/', '/one/uploads/users/') }}" width="150" height="150" alt="{{ $contact->image }}">
    </div>
</div>

{{--  Contact name  --}}
<div class="form-group row">
    <label for="co_name" class="col-md-4 col-form-label text-md-right">{{ __('Contact Name') }}</label>
    <div class="col-md-6">
        {!! Form::text('co_name', null, ['class' => $errors->has('co_name') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
        
        @if ($errors->has('co_name'))
        <span class="invalid-feedback">
             <strong>{{ $errors->first('co_name') }}</strong>
        </span> 
        @endif
    </div>
</div>

{{-- Contact email --}}
<div class="form-group row">
    <label for="co_email" class="col-md-4 col-form-label text-md-right">{{ __('Contact Email') }}</label>
    <div class="col-md-6">
        {!! Form::email('co_email', null, ['class'=> $errors->has('co_email') ? 'form-control is-invalid' : 'form-control']) !!}

        @if ($errors->has('co_email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('co_email') }}</strong>
        </span> 
        @endif
    </div>
</div>

{{-- Contact subject --}}
<div class="form-group row">
    <label for="co_subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>
    <div class="col-md-6">
        
        {!! Form::text('co_subject', null, ['class'=>$errors->has('co_subject') ? 'form-control is-invalid' : 'form-control']) !!}
        
        @if ($errors->has('co_subject'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('co_subject') }}</strong>
        </span> 
        @endif
    </div>
</div>

{{-- Contact type --}}
<div class="form-group row">
    <label for="co_type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
    <div class="col-md-6">
        
        {!! Form::select('co_type', contacts(), null, ['class'=>$errors->has('co_type') ? 'form-control is-invalid' : 'form-control']) !!}
        
        @if ($errors->has('co_type'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('co_type') }}</strong>
        </span> 
        @endif
    </div>
</div>

{{--  contact message  --}}
<div class="form-group row">
    <label for="co_message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

    <div class="col-md-6">
        {!! Form::textarea('co_message', null, ['class'=> $errors->has('co_message') ? 'form-control is-invalid' : 'form-control']) !!}

        @if ($errors->has('co_message'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('co_message') }}</strong>
        </span> 
        @endif
    </div>
</div>