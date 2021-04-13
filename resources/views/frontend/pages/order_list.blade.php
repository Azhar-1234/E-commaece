@extends('frontend.master')
@section('mainContent')
<div class="col-12">
    <!-- Main Content -->
    <div class="row">
        <div class="col-12 mt-3 text-center text-uppercase">
            <h2>Orders</h2>
        </div>
    </div>

    <main class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Shipping address</th>
                            <th>status</th>
                            <th>Qty</th>
                            <th>Total Amount</th>
                            <th>view</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $key=>$order)
                        <tr id="{{$order->id}}">
                            <td class="serial">{{++$key}}</td>
                            <td>{{$order->shipping_address}} </td>
                            <td>
                                @if ($order->status == 0)
                                    <button type="button" class="btn btn-warning">pending</button>
                                @elseif ($order->status == 1)
                                    <button type="button" class="btn btn-info">confirm</button>
                                @else
                                    <button type="button" class="btn btn-succeded">delivred</button>
                                @endif
                                
                            </td>
                            <td>
                                @php 
                                    $total_price = 0;
                                    $total_qty = 0;
                                    foreach($order->orderProducts as $orderProduct){
                                        $total_price = $total_price + $orderProduct->quantity * $orderProduct->price;
                                        $total_qty = $total_qty + $orderProduct->quantity;
                                    }
                                    echo $total_qty;
                                @endphp
                            </td>
                            <td>
                                    {{$total_price}}
                            </td>
                            <td>
                                    <a href="">Details views</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

    </main>
    <!-- Main Content -->
</div>

@endsection