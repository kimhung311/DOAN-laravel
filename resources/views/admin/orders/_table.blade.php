<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Fullname</th>
            <th>Total Product</th>
            <th>Total Money</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($orders))
            @foreach ($orders as $key => $order)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td></td>
                    <td>
                        @include('admin.orders.parts.alert_order_status')
                    </td>
                    <td>{{ $order->status }}</td>
                    <td><a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-secondary">Order Detail</a></td>
                    <td><a href="{{ route('admin.order.edit', $order->id) }}" class="btn btn-info">Update Status</a></td>
                    <td>
                        <form action="{{ route('admin.order.destroy', $order->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure DELETE Order?')" class="btn btn-danger" />
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

{{ $orders->appends(request()->input())->links() }}