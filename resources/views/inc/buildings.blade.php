<h4 class="text-center" style="padding: 20px;background-color: #ddd;color: #000;border-radius: 15px;">
    <b>Total Buildings : <small class="label label-info">{{ $buildings->count() }}</small></b>
</h4>

@forelse($buildings as $bu)
    <div class="col-sm-4">
        <article class="col-item">
            
            <div class="photo">
                <div class="options-cart-round">
                    <button class="btn btn-default" onclick="window.location.href='{{ route('makeorder', ['type' => $bu->bu_rent, 'id' => $bu->id]) }}'" title="{{ $bu->bu_rent == 'Yes' ? 'Rent Now!' : 'Buy Now!' }}">
                        <span class="fa fa-shopping-cart"></span>
                    </button>
                </div>
                <a href="#">
                    <img src="{{ SetImage($bu->bu_image, 'buildings') }}" title="{{ $bu->bu_name }}" class="img-responsive thumbnail" alt="{{ $bu->bu_name }}" />
                </a>
            </div>
            
            <div class="row">
                <div class="price-details col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item" style="background-color: #f5f5f5;color: #000;">{{ ucfirst($bu->bu_name) }}</li>
                        <li class="list-group-item">
                            Status : 
                            @if($bu->bu_rent == 'Yes')
                                <span class="pull-right label label-success"><b>For Rent</b></span> 
                            @else
                                <span class="pull-right label label-danger"><b>For Buy</b></span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            Square : <span class="pull-right"><b>{{ $bu->bu_square }} M</b></span>
                        </li>
                        <li class="list-group-item">
                            Price : <span class="pull-right"><b>{{ GetMoney($bu->bu_price) }}</b></span>
                        </li>
                        <li class="list-group-item">
                            <p class="text-justify">
                                {{ str_limit($bu->bu_small_dis, 25) }}
                            </p>
                        </li>
                        <li class="list-group-item">
                            @if($bu->bu_status == 'Active')
                                {{-- Read More --}}
                                <a style="background-color: #2abb9b;color: #fff;" class="btn btn-block" href="{!! url('/buildings/build/'.$bu->id) !!}">
                                    <i style="color: #fff;" class="fa fa-book"> </i>
                                    {{ __('Read More') }}
                                </a><br>                                    
                            @else
                                {{-- Waited --}}
                                <a class="btn btn-danger btn-block" disabled href="javascript:void(0)">
                                    <i style="color: #fff;" class="fa fa-spinner fa-spin"> </i> 
                                    {{ __('Disactive') }}
                                </a>
                                {{-- Edit --}}
                                <a style="background-color: #2abb9b;color: #fff;" class="btn btn-block" href="{!! url('/buildings/build/'.$bu->id.'/edit') !!}">
                                    <i style="color: #fff;" class="fa fa-edit"> </i>{{ __('Edit') }}
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </div>
@empty
    <div class="alert alert-danger text-center" role="alert" style="padding:20px;margin:10px;">
        <h3><strong>Warning !! </strong>{{ __('Sorry there is no Buildings available now') }}.</h3>
    </div>
@endforelse
<div class="clearfix"></div>