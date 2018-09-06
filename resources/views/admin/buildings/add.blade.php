@extends('admin.layout.master')

@section('title', 'Buildings')

@section('style')
    {{ Html::style('admin/dist/css/select2.min.css') }}
@stop 

@section('content')
<section class="content">
    <div class="row">

        <section class="content-header">
            <h1>Data Tables<small>advanced tables</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ $root }}/admin-panal/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="h4"><a href="{{ url($root.'/admin-panal/buildings/') }}"><i class="fa fa-home"></i> Buildings</a></li>
                <li class="active h4"> New Building</li>
            </ol>
        </section>

        <br><br>

        <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header"> Create a new Building</div>
                <div class="box-body" style="padding: 50px;">
                    {!! Form::open(['url' => 'admin-panal/buildings/', 'method' => 'POST', 'files' => true]) !!}
                    @include('admin.buildings.form')

                    {{-- Building Status --}}
                    <div class="form-group row">
                        <label for="bu_status" class="col-md-3 col-form-label text-md-right">{{ __('Building Status') }}</label>
                        <div class="col-md-9 col-xs-12">
                            {!! Form::select('bu_status', status(), null, ['class' => $errors->has('bu_status') ? 'form-control is-invalid' : 'form-control',
                            'required' => 'required']) !!} 
                            @if ($errors->has('bu_status'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_status') }}</strong></span> @endif
                        </div>
                    </div>
                        
                    {{-- Building Search --}}
                    <div class="form-group row">
                        <label for="bu_small_dis" class="col-md-3 col-form-label text-md-right">{{ __('Building Search Discription') }}</label>
                        <div class="col-md-9 col-xs-12">
                            {!! Form::textarea('bu_small_dis', null, ['class' => $errors->has('bu_small_dis') ? 'form-control is-invalid' : 'form-control',
                            'required' => 'required']) !!} 
                            @if ($errors->has('bu_small_dis'))<span class="invalid-feedback"><strong>{{ $errors->first('bu_small_dis') }}</strong></span> @endif
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <div class="col-md-6">
                            <button style="padding: 10px;width:120px;" type="submit" class="btn btn-primary"><i style="padding:2px;" class="fa fa-plus fa-1x"> </i>  {{ __('Add') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop