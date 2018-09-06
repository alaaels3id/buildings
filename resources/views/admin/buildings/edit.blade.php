@extends('admin.layout.master') 
@section('title', 'Buildings')
@section('style')
    {{ Html::style('admin/dist/css/select2.min.css') }}
@stop 
@section('content')

<section class="content-header">
    <h1>Buildings<small>Edit - {{ $build->bu_name }}</small></h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="h4"><a href="{{ url($root.'/admin-panal/buildings') }}"><i class="fa fa-home"></i> Buildings</a></li>
        <li class="active h4"><a href="{{ route('buildings.edit', $build->id) }}"><i class="fa fa-home"></i> Edit Building</a></li>
    </ol>
</section>

<br>

<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
            <div class="box-header">Owner Information</div>
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <img class="thumbnail img-responsive" src="{{ SetImage($user->user_image, 'users') }}">
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-user"></i> Name : <span class="pull-right">{{ $user->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-globe"></i> Location : <span class="pull-right">{{ $user->location }}</span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-envelope"></i> Email: 
                            <span class="pull-right">
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </span>
                        </li>
                        <li class="list-group-item">
                            For More Information : 
                            <span class="pull-right">
                                <a href="{{ route('users.edit', $user->id) }}">Click here</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="box box-danger">
            <div class="box-header">Edit {{ $build->bu_name }}'s Information</div>
                <div class="box-body">
                    {!! Form::model($build, ['route'=>['buildings.update', $build->id], 'method'=>'PATCH', 'files'=>true]) !!}
                        
                        @include('admin.buildings.form')
                        
                        {{-- Building Status --}}
                        <div class="form-group row">
                            <label for="bu_status" class="col-md-4 col-form-label text-md-right">{{ __('Building Status') }}</label>
                            <div class="col-md-6">
                            {!! Form::select('bu_status', status(), null, ['class' => $errors->has('bu_status') ? 'form-control is-invalid' : 'form-control',
                                'required' => 'required']) !!} 
                                @if ($errors->has('bu_status'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('bu_status') }}</strong>
                                </span> 
                                @endif
                            </div>
                        </div>
                            
                        {{-- Building Search --}}
                        <div class="form-group row">
                            <label for="bu_small_dis" class="col-md-4 col-form-label text-md-right">{{ __('Building Search Discription') }}</label>
                            <div class="col-md-6">
                                {!! Form::textarea('bu_small_dis', null, ['class' => $errors->has('bu_small_dis') ? 'form-control is-invalid' : 'form-control',
                                'required' => 'required']) !!} 
                                @if ($errors->has('bu_small_dis'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bu_small_dis') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="width:150px;" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>{{ __('Edit') }}</button>
                                <a style="width:150px;" href="{{ url('/admin-panal/buildings/'.$build->id.'/destroy') }}" class="btn btn-danger btn-lg">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop