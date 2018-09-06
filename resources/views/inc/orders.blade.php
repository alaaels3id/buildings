<div class="panel panel-default" style="padding: 50px;">
    @include('admin.layout.message')
    <div class="panel-heading"><h3>{{ __('Edit Profile Information') }}</h3></div>
    <div class="panel-body">
        <table class="table table-hover text-center" style="padding: 50px;margin: 10px;background-color: #fff;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Buiding Name</th>
                    <th>Rent Status</th>
                    <th>Buiding Cost</th>
                    <th>Buiding Rooms</th>
                    <th>Buiding Square</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ ucfirst(GetBuById($order->bu_id)->bu_name) }}</td>
                    <td>{{ $order->bu_rent == 'Yes' ? 'For Rent' : 'For Buy' }}</td>
                    <td>{{ GetMoney(GetBuById($order->bu_id)->bu_price) }}</td>
                    <td>{{ GetBuById($order->bu_id)->bu_rooms }}</td>
                    <td>{{ GetBuById($order->bu_id)->bu_square }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="alert alert-info">No Orders</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>