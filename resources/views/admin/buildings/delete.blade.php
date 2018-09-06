@extends('admin.layout.master') 

@section('title', 'Buildings') 

@section('content')
<div class="content">
    <div class="row">

        <section class="content-header">
            <h1>Buildings<small>Deleted Buildings</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="h4"><a href="{{ url($root.'/admin-panal/buildings/') }}">Buildings</a></li>
                <li class="active h4">Deleted Buildings</li>
            </ol>
        </section>

        <br><br>
    
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header" dir="rtl"></div>
                <div class="box-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead><tr><th>{{ ('#') }}</th><th>Title</th><th>Restore</th><th>Remove</th></tr></thead>
                        <tbody>
                            @forelse($trash as $trashed)
                            <tr>
                                <td>{{ $trashed->id }}</td>
                                <td>{{ ucfirst($trashed->bu_name) }}</td>
                                <td><a href="{{ route('buildings.restore', $trashed->id) }}" class="btn btn-danger">Restore</a></td>
                                <td>
                                    <a href="{{ route('buildings.forcedelete', $trashed->id) }}" class="btn btn-danger" title="Remove">
                                        Remove
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">{{ __('لا يوجد أي محذوفات') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@stop