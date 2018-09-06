@extends('admin.layout.master') 
@section('title', 'Contacts') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1>Data Tables<small>advanced tables</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ $root }}/admin-panal/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ url($root.'/admin-panal/contactus/') }}"><i class="fa fa-users"></i> Contacts</a></li>
                <li class="active"><a href="{{ url($root.'/admin-panal/contactus/'.$contact->id.'/edit') }}"><i class="fa fa-users"></i> Edit Contacts</a></li>
            </ol>
        </section>
        
        <div class="col-md-12">
            <div class="panel-heading">
                <h3>{!! __('Edit Message Information') !!}</h3>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($contact, ['route'=>['contactus.update', $contact->id], 'method'=>'PATCH']) !!}
                        
                        @include('admin.contactus.form')
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="width:150px;" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>{{ __('Edit') }}</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection