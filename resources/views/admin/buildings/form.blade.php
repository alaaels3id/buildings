{{-- Building Name --}}
<div class="form-group row">
    <label for="bu_name" class="col-md-3 col-form-label text-md-right">{{ __('Building Name') }}</label>
    <div class="col-md-9 col-xs-12">
        {!! Form::text('bu_name', null, ['class' => $errors->has('bu_name') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
        @if ($errors->has('bu_name'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_name') }}</strong></span> @endif
    </div>
</div>

{{-- Building Price --}}
<div class="form-group row">
    <label for="bu_price" class="col-md-3 col-form-label text-md-right">{{ __('Building Price') }}</label>

    <div class="col-md-9 col-xs-12">
        {!! Form::text('bu_price', null, ['class' => $errors->has('bu_price') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!} 
        @if ($errors->has('bu_price'))<span class="invalid-feedback"> <strong>{{ $errors->first('bu_price') }}</strong></span> @endif
    </div>
</div>

{{-- Building Rooms --}}
<div class="form-group row">
    <label for="bu_rooms" class="col-md-3 col-form-label text-md-right">{{ __('Building Rooms') }}</label>
    <div class="col-md-9 col-xs-12">
        {!! Form::select('bu_rooms', rooms(), null, ['class' => $errors->has('bu_rooms') ? 'select2 form-control is-invalid' : 'select2 form-control', 'required' => 'required']) !!}
        @if ($errors->has('bu_rooms'))<span class="invalid-feedback"> <strong>{{ $errors->first('bu_rooms') }}</strong></span> @endif
   </div>
</div>

{{-- Building Square --}}
<div class="form-group row">
    <label for="bu_square" class="col-md-3 col-form-label text-md-right">{{ __('Building Square (m)') }}</label>
    <div class="col-md-9 col-xs-12">
       {!! Form::text('bu_square', null, ['class' => $errors->has('bu_square') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
       @if ($errors->has('bu_square'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_square') }}</strong></span>@endif
   </div>
</div>

{{-- Building Type --}}
<div class="form-group row">
    <label for="bu_type" class="col-md-3 col-form-label text-md-right">{{ __('Building Type') }}</label>
    <div class="col-md-9 col-xs-12">
        {!! Form::select('bu_type', type(), null, ['class' => $errors->has('bu_type') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!} 
        @if ($errors->has('bu_type'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_type') }}</strong></span> @endif
   </div>
</div>

{{-- Building Rent --}}
<div class="form-group row">
    <label for="bu_rent" class="col-md-3 col-form-label text-md-right">{{ __('Building Rent') }}</label>
    <div class="col-md-9 col-xs-12">
        {!! Form::select('bu_rent', rent(), null, ['class' => $errors->has('bu_rent') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!} 
        @if ($errors->has('bu_rent'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_rent') }}</strong></span> @endif
   </div>
</div>

{{-- Building Gov --}}
<div class="form-group row">
    <label for="bu_gov" class="col-md-3 col-form-label text-md-right">{{ __('Building Gov') }}</label>
    <div class="col-md-9 col-xs-12">
        {!! Form::select('bu_gov', gov(), null, ['class' => $errors->has('bu_gov') ? 'form-control select2 is-invalid' : 'form-control select2', 'required' => 'required']) !!}
        @if ($errors->has('bu_gov'))<span class="invalid-feedback"> <strong>{{ $errors->first('bu_gov') }}</strong></span> @endif
    </div>
</div>

{{-- Building Meta --}}
<div class="form-group row">
  <label for="bu_meta" class="col-md-3 col-form-label text-md-right">{{ __('Building Key Words') }}</label>
  <div class="col-md-9 col-xs-12">
    {!! Form::text('bu_meta', null, ['class' => $errors->has('bu_meta') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
    @if ($errors->has('bu_meta'))<span class="invalid-feedback">ong>{{ $errors->first('bu_meta') }}</strong></span> @endif
  </div>
</div>

{{-- Building Latitude --}}
<div class="form-group row">
    <label for="bu_latitude" class="col-md-3 col-form-label text-md-right">{{ __('Building latitude') }}</label>
    <div class="col-md-9 col-xs-12">
        {!! Form::text('bu_latitude', null, ['class' => $errors->has('bu_latitude') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
      @if ($errors->has('bu_latitude'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_latitude') }}</strong></span> @endif
   </div>
</div>

{{-- Building Langtude --}}
<div class="form-group row">
    <label for="bu_langtude" class="col-md-3 col-form-label text-md-right">{{ __('Building langtude') }}</label>
    <div class="col-md-9 col-xs-12">
        {!! Form::text('bu_langtude', null, ['class' => $errors->has('bu_langtude') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!} 
        @if ($errors->has('bu_langtude'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_langtude') }}</strong></span> @endif
    </div>
</div>

{{-- Building Discription --}}
<div class="form-group row">
    <label for="bu_large_dis" class="col-md-3 col-form-label text-md-right">{{ __('Building Discription') }}</label>
    <div class="col-md-9 col-xs-12">
        {!! Form::textarea('bu_large_dis', null, ['class' => $errors->has('bu_large_dis') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
        @if ($errors->has('bu_large_dis'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_large_dis') }}</strong></span> @endif
   </div>
</div>

{{-- Building Image --}}
<div class="form-group row">
    <label for="bu_image" class="col-md-3 col-form-label text-md-right">{{ __('Building Image') }}</label>
    <div class="col-md-9 col-xs-12">
        <input type="file" name="bu_image" class="{{ $errors->has('bu_image') ? 'form-control is-invalid' : 'form-control' }}" />
        @if ($errors->has('bu_image'))<span class="invalid-feedback"> <strong>{{ $errors->first('bu_image') }}</strong></span> @endif
   </div>
   
   <div class="row col-md-12 col-md-offset-4">
        @if(isset($build))
            @if($build->bu_image != '')
                <img style="margin-top: 10px;" src="{{ SetImage($build->bu_image, 'buildings') }}" class="thumbnail img-responsive" width="390" />    
            @endif  
        @endif
    </div>
    <div class="clearfix"></div>
</div>
