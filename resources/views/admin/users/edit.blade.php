@extends('admin.layout.master') 

@section('title', 'Users')

@section('content')

<section class="content-header" dir="rtl">
    <h1 class="pull-left hidden-xs" dir="ltr">Users<small>Edit</small></h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="h4"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Users</a></li>
        <li class="active h4">
            <a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-edit"></i> Edit User {{ $user->name }}</a>
        </li>
    </ol>
</section>

<br class="hidden-xs"><br class="hidden-xs"><br>

<section class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $user->name }}'s Information</div>
                <div class="panel-body">
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'files' => true]) !!}

                    @include('admin.users.form')
                
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" style="width:150px;" class="btn btn-success btn-lg">
                                <i class="fa fa-edit"></i>Edit
                            </button>
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            </div>

            {{--  Password Form  --}}
        
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{ __('Change User Password') }}</h3></div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'admin-panal/users/PasswordChange', 'method'=>'POST']) !!}
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password"
                                required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> 
                                @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" style="width:150px;" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>{{ __('Change') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="panel panel-default">
            <div class="panel-heading">User Buildings</div>
                <div class="panel-body">
                    <div class="nav-tabs-custom">
                    
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">Active Buildings</a></li>
                            <li><a href="#timeline" data-toggle="tab">Disactive Buildings</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <table class="table table-hover text-center table-bordered">
                                    <tr>
                                        <th>Building Name</th><th>Type</th><th>Price</th>
                                        <th>Square</th><th>Location</th><th>Created at</th><th>Set Disactive</th>
                                    </tr>
                                    @forelse($buActive as $active)
                                    <tr>
                                        <td><a href="{{ route('buildings.edit', $active->id) }}">{{ ucwords($active->bu_name) }}</a></td>
                                        <td>{{ $active->bu_type }}</td>
                                        <td>{{ GetMoney($active->bu_price) }}</td>
                                        <td>{{ $active->bu_square }} M</td>
                                        <td>{{ $active->bu_gov }}</td>
                                        <td>{{ $active->created_at }}</td>    
                                        <td>
                                            <a href="{{ url('/admin-panal/ChangeStatus/'.$active->id.'/Disactive') }}">
                                                <i class="fa fa-check fa-2x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr><td colspan="7">{{ __('No Buildings avilable for this user') }}</td></tr>
                                    @endforelse
                                </table>
                                {{ GetPaginate($buActive) }}
                            </div>

                            <div class="tab-pane" id="timeline">
                                <table class="table table-hover text-center table-bordered">
                                    <tr>
                                        <th>Building Name</th><th>Type</th><th>Price</th>
                                        <th>Square</th><th>Location</th><th>Created at</th><th>Set Disactive</th>
                                    </tr>
                                    @forelse($buDisactive as $disactive)
                                    <tr>
                                        <td>
                                            <a href="{{ route('buildings.edit', $disactive->id) }}">{{ ucwords($disactive->bu_name) }}</a>
                                        </td>
                                        <td>{{ $disactive->bu_type }}</td>
                                        <td>{{ GetMoney($disactive->bu_price) }}</td>
                                        <td>{{ $disactive->bu_square }} M</td>
                                        <td>{{ $disactive->bu_gov }}</td>
                                        <td>{{ $disactive->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/admin-panal/ChangeStatus/'.$disactive->id.'/Active') }}">
                                                <i class="fa fa-check fa-2x"></i>
                                            </a>
                                        </td> 
                                    </tr>
                                    @empty
                                        <tr><td colspan="7">{{ __('No Buildings avilable for this user') }}</td></tr>
                                    @endforelse
                                </table>
                                {!! GetPaginate($buDisactive) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop