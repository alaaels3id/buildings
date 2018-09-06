<nav class="navbar navbar-default sidebar">
    <ul class="list-group nav navbar-nav">

        <li style="background-color: #2ABB9B;color: #fff;padding: 10px;" class="showopacity text-center">
            <h3>Actions</h3>
        </li>
        
        <li class="{{ SetActive('user/create/building') }}">
            <a href="{{ url('/user/create/building') }}">
                {{ __('Add New Building') }}
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-plus"></span>
            </a>
        </li>

        <li class="{{ SetActive('buildings') }}">
            <a href="{{ url('/buildings') }}">
                {{ __('Buildings') }}
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-home"></span>
            </a>
        </li>
        
        <li class="{{ SetActive('buildings/ForRent') }}">
            <a href="{{ url('buildings/ForRent') }}">
                {{ __('For Rent') }}
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-th-list"></span>
            </a>
        </li>
       
        <li class="{{ SetActive('buildings/ForBuy') }}">
            <a href="{{ url('buildings/ForBuy') }}">
                {{ __('For Buy') }}
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-amazon"></span>
            </a>
        </li>
        
        <li class="{{ SetActive('buildings/type/Apartment') }}">
            <a href="{{ url('buildings/type/Apartment') }}">
                {{ __('Apartments') }}
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-apple"></span>
            </a>
        </li>
        
        <li class="{{ SetActive('buildings/type/Villa') }}">
            <a href="{{ url('buildings/type/Villa') }}">
                {{ __('Villas') }}
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-bomb"></span>
            </a>
        </li>
        
        <li class="{{ SetActive('buildings/type/Shallih') }}">
            <a href="{{ url('buildings/type/Shallih') }}">
                {{ __('Shalihats') }}
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-btc"></span>
            </a>
        </li>
        <li style="background-color: #2ABB9B;color: #fff;padding: 10px;" class="text-center">
            <h3>Search</h3>
        </li>
    </ul>

    <div class="text-center">
        <?php $class = 'form-control padding'; ?>
        
        {!! Form::open(['url' => '/buildings/search', 'method' => 'GET', 'class' => 'sidebar-form']) !!}
        {{ Form::text("bu_square", null, ['class' => $class, 'placeholder' => 'Build Square ...', 'style' => 'width: 321px;']) }}
        {{ Form::text("bu_price_from", null, ['class' => $class, 'placeholder' => 'Build Price From ...', 'style' => 'width: 321px;']) }}
        {{ Form::text("bu_price_to", null, ['class' => $class, 'placeholder' => 'Build Price To ...', 'style' => 'width: 321px;']) }}
        {{ Form::select("bu_rooms", rooms(), null, ['class' => $class, 'placeholder' => 'Build Rooms', 'style' => 'width: 321px;']) }} 
        {{ Form::select("bu_type", type(), null, ['class' => $class, 'placeholder'=>'Build Type', 'style' => 'width: 321px;']) }}
        {{ Form::select("bu_rent", rent(), null, ['class' => $class, 'placeholder' => 'Build Rent', 'style' => 'width: 321px;']) }}
        
        <div class="input-group" style="width: 321px; margin-left: 10px;">
            {!! Form::select('bu_gov', gov(), null, ['class' => $class.' select2', 'placeholder' => 'Build Governmente']) !!}
        </div>
        
        <div class="input-group">
            {!! Form::submit("submit", ['class'=>'btn banner_btn btn-lg btn-block padding', 'style' => 'width: 321px;']) !!}
        </div>
        
        {!! Form::close() !!}
    </div>
</nav>