@extends('admin.layout.master')

@section('title', 'Profile')

@section('content')

<section class="content-header" dir="rtl">
    <h1 class="pull-left hidden-xs" dir="ltr">Admin Profile</h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active h4">Admin Profile</li>
    </ol>
</section>

<br><br>

<section class="content">
    <div class="row">
        <div class="col-md-3">
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>

                <div class="box-body">
                    <img class="profile-user-img img-responsive img-circle" src="{{ SetImage($user->user_image, 'users') }}" alt="Admin profile picture">
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-muted lead text-center">Software Engineer</p>

                    <strong><i class="fa fa-building margin-r-5"></i> Buildings</strong>
                    <p class="text-muted lead">{{ getUserBuildingsCount($auth->id, 'admin_buliding', 'admin_id') }}</p>

                    <hr>

                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                    <p class="text-muted lead">{{ $user->email }}</p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted lead">{{ $user->location }}</p>

                    <hr>
                    <strong><i class="fa fa-clock-o margin-r-5"></i> Join in</strong>

                    <p class="text-muted lead">{{ $user->created_at->diffForHumans() }}</p>

                    <hr>

                    <strong><i class="fa fa-calendar-o margin-r-5"></i> Date Of Birth</strong>
                    <p class="text-muted lead">{{ $user->dob->format('d-m-Y') }}</p>

                    <hr>

                    <strong><i class="fa fa-gift margin-r-5"></i> Age</strong>
                    <p class="text-muted lead">{{ $user->dob->age }} Years old</p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        @forelse($admins as $admin)

                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{ SetImage($admin->user_image, 'users') }}" alt="user image">
                                <span class="username"><a href="{{ route('admin-profile', $user->name) }}">{{ $admin->name }}</a></span>
                                <span class="description">Added at - {{ \Carbon\Carbon::parse($admin->created_at)->diffForHumans() }}</span>
                            </div>
                            
                            <p class="text-justify lead">
                                You have added a buiding called "{{ ucwords($admin->bu_name) }}"
                            </p>
                        </div>
                        @empty
                            <div class="post"><div class="alert alert-info">No Buildings</div></div>
                        @endforelse
                        <hr>
                    </div>

                    <div class="tab-pane" id="settings">
                        <div class="panel panel-default">
                        <div class="panel-heading">{{ ('Admin Information') }}</div>
                            <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('admin-panal.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @include('admin.users.form', ['admin' => 'admin', 'user' => $user])
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" style="width:150px;" class="btn btn-success btn-lg">
                                            <i class="fa fa-edit"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                        {{--  Password Form  --}}
            
                        
                        <div class="panel panel-default">
                        <div class="panel-heading">{{ __('Change Password') }}</div>
                            <div class="panel-body">
                                {!! Form::open(['url'=>'admin-panal/users/PasswordChange', 'method'=>'POST']) !!}
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    <div class="col-md-6">
                                        <input type="hidden" value="{{ $user->id }}" name="id">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                            name="password" required>
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> 
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" style="width:150px;" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>
                                        {{ __('Change') }}</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection