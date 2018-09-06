@extends('admin.layout.master')

@section('title', 'Users')

@section('content')
<div class="container">
    <div class="row">
        
        <section class="content-header" dir="rtl">
            <h1 class="pull-left" dir="ltr">Data Tables<small>advanced tables</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ $root }}/admin-panal/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i>Users</a></li>
                <li class="active"><a href="{{ route('users.create') }}"><i class="fa fa-user"></i> Add New User</a></li>
            </ol>
        </section>

        <br><br>
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new user</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'users.index', 'method' => 'POST', 'files'=>true]) !!}
                        @include('admin.users.form')
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="width:120px;" type="submit" name="submit" class="btn btn-lg btn-primary">{{ __('Register') }}</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection