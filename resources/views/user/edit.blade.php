@extends('layouts.pages') 

@section('title', $auth->name.'\'s Profile')

@section('style') 
{{ Html::style('admin/cus/buildings.css')}} 
{{ Html::style('admin/dist/css/select2.css') }}
<style>.padding {margin: 10px;}</style>
@endsection
 
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>User Profile</h1>
        <ol class="breadcrumb">
            <li class="h4"><a href="{{ url('/') }}">Home</a></li>
            <li class="active h4">{{ $auth->name }}'s Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">@include('user.sidebar')</div>

            <div class="col-md-9" style="background-color: #fff;color: #000;">
                <div class="text-center">
                    @include('admin.layout.message')
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Profile Information</div>
                        <div class="panel-body">
                            {!! Form::model($user, ['route' => ['user.UpdateUserData', $auth->id], 'method'=>'PATCH', 'files' => true]) !!}
                            @include('admin.users.form', ['some' => 'data'])
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" style="background-color: #2ABB9B;color: #fff;width:150px;" class="btn btn-lg" value="Edit" name="submit">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3><i class="fa fa-lock"> </i> {{ __('Change Password') }}</h3></div>
                        <div class="panel-body">
                            {!! Form::open(['url'=>'/user/ChangePassword', 'method'=>'POST']) !!}
                            <div class="form-group row">
                    
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                
                                    <div class="col-md-6">
                                
                                        <input type="password" name="password" class="form-control" required="required"> 
                                        @if($errors->has('password'))
                                            <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span> 
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newpassword" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                                
                                    <div class="col-md-6">
                                
                                        <input type="password" name="newpassword" class="form-control" required="required"> 
                                        
                                        @if($errors->has('newpassword'))
                                            <span class="invalid-feedback"><strong>{{ $errors->first('newpassword') }}</strong></span> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="submit" style="background-color: #2ABB9B;color: #fff;width:150px;" class="btn btn-lg">
                                        <i class="fa fa-edit"></i>{{ __('Change') }}
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection