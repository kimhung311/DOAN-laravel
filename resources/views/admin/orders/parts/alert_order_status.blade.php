@if ($order->status == \App\Models\Order::STATUS[0])
    <div class="alert alert-primary" role="alert">chưa thanh toán</div>
@elseif ($order->status == \App\Models\Order::STATUS[1])
    <div class="alert alert-danger" role="alert">đã thanh toán online</div>
@elseif ($order->status == \App\Models\Order::STATUS[2])
    <div class="alert alert-danger" role="alert">shipper đang đi giao hàng</div>
@elseif ($order->status == \App\Models\Order::STATUS[3])
    <div class="alert alert-danger" role="alert">cancel đơn hàng</div>
@else
    <div class="alert alert-success" role="alert">hoàn thành</div>
@endif