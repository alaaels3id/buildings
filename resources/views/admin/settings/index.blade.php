@extends('admin.layout.master') 

@section('title', 'Settings') 

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <section class="content-header">
                <h1>Settings<small>Edit Website Settings</small></h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url($root.'/admin-panal/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"><a href="{{ url($root.'/admin-panal/settings') }}"><i class="fa fa-gear"></i> Settings</a></li>
                </ol>
            </section>

            <div class="panel-heading"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin-panal/settings', 'method' => 'POST', 'files'=>true]) !!}
                    @forelse($settings as $set)
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ ucfirst(__($set->slug)) }}</label>
                            <div class="col-md-8">
                                
                                @if($set->type == 0)
                                
                                    {!! Form::text($set->name, $set->value, ['class' => 'form-control']) !!}
                                
                                @elseif($set->type == 3)
                                    
                                    @if($set->value != '')
                                        <img src="{{ GetImage($set->value, '/public/one/images/', '/one/images/') }}" alt="Image" style="margin:20px 0px;" width="150">
                                    @endif
                                    <br>
                                    <code style="margin:10px 0px;">{{ $set->value }}</code>
                                    <input type="file" name="{{ $set->name }}" class="form-control" style="margin:10px 0px;">
                                   
                                @else
                                    {!! Form::textarea($set->name, $set->value, ['class' => 'form-control', 'cols'=>'8', 'rows'=>'6', 'style'=>'resize:none;']) !!}
                                @endif
                            </div>
                        </div>
                    @empty
                        <h3>There are no settings aveilable</h3>
                    @endforelse
                    <div class="form-group row mb-0">
                        <div class="col-md- offset-md-4">
                            <button type="submit" name="submit" class="btn btn-app"><i class="fa fa-save"></i>{{ __('Save') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection