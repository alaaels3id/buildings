@extends('layouts.pages') 
@section('title', $auth->name.'\'s Profile') 
@section('style') {{ Html::style('admin/cus/buildings.css')
}} {{ Html::style('admin/dist/css/select2.css') }}
<style>
    .padding {
        margin: 10px;
    }
</style>
@endsection
 
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('user.sidebar')
            </div>

            <div class="col-md-9">
                <div class="alert alert-danger text-center" role="alert" style="padding:20px;margin:10px;">
                    <h3><strong>Warning !! </strong>{{ $buildinfo->bu_name.' is Disactive no untill the mangement accept it' }}.</h3>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection