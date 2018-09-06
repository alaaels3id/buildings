{!! Form::open(['url' => '/buildings/search', 'method' => 'GET', 'class' => 'sidebar-form']) !!}

<div class="row">
    <div class="col-md-3">
        {{ Form::text("bu_price_from", null, ['class' => 'form-control', 'placeholder' => 'Build Price From ...']) }}
    </div>

    <div class="col-md-3">
        {{ Form::select("bu_type", type(), null, ['class'=>'form-control', 'placeholder'=>'Build Type']) }}
    </div>

    <div class="col-md-3">
        {{ Form::text("bu_square", null, ['class' => 'form-control', 'placeholder' => 'Build Square ...']) }}
    </div>

    <div class="col-md-3">
        {{ Form::text("bu_price_to", null, ['class' => 'form-control', 'placeholder' => 'Build Price To ...']) }}
    </div>
</div><br>
<div class="row">
    <div class="col-md-3">
        {{ Form::select("bu_rent", rent(), null, ['class' => 'form-control', 'placeholder' => 'Build Rent']) }}
    </div>

    <div class="col-md-3">
        {{ Form::select("bu_rooms", rooms(), null, ['class' => 'form-control select2', 'placeholder' => 'Build Rooms']) }}
    </div>

    <div class="col-md-3">
        {{ Form::select("bu_gov", gov(), null, ['class' => 'form-control select2', 'placeholder' => 'Govenmente', 'style'=>'font-size: 15px;']) }}
    </div>

    <div class="col-md-3">
        {!! Form::submit("submit", ['class'=>'btn banner_btn', 'style'=>'width:260px;margin-top:0px;']) !!}
    </div>
</div>

{!! Form::close() !!}