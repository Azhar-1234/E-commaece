@extends('frontend.master')
@section('mainContent')
<div class="col-12">
    <!-- Main Content -->
    <div class="row">
        <div class="col-12 mt-3 text-center text-uppercase">
            <h2>Shopping Cart</h2>
        </div>
    </div>

    <main class="row">
        <div class="col-12 bg-white py-3 mb-3">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 mx-auto table-responsive">
                    <form class="row">
                        <div class="col-12">
                            <table class="table table-striped table-hover table-sm">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Total Amount</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $key=>$product)
                                <tr id="{{$product->id}}">
                                    <input type="hidden" value="{{$product->id}}" id="product_id" name="product_id">
                                    <input type="hidden" value="{{$key}}" id="key" name="product_id">
                                    <td>{{$product->name}} </td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <input type="number" min="1" class="product_quantity" id="product_quantity" value="{{$product->qty}}">
                                    </td>
                                    <td>
                                        {{$product->price * $product->qty }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link text-danger delete_product"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="3" class="text-right">Total</th>
                                    <th>${{Cart::subtotal()}}</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{route('checkout')}}" class="btn btn-outline-success">Checkout</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
    <!-- Main Content -->
</div>
 
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".product_quantity").on('keyup',function(){
                var formData = {
                    product_id: $(this).closest("tr").find('#product_id').val(),
                    key: $(this).closest("tr").find('#key').val(),
                    product_quantity : $(this).val()
                }

                $.ajax({
                type:'GET',
                context: this,
                url:"{{route('check-quantity')}}",
                data:formData,
                success:function(data){
                    console.log(data);
                    if(data[0] == 'failed'){
                        alert('not available accorading to you');
                       
                    }
                
                    $(this).val('');
                    $(this).val(data[1]['qty']);
                    $('#total_price').html(data[1]['total_price']);
                    $(this).closest("tr").find('#price').html(data[1]['price']);

                    $('#header_qty').html(data[1]['total_qty']);
                    $('#header_price').html(data[1]['total_price']);
                   
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
        });
        $(document).ready(function(){
            $(".delete_product").on('click',function(){
                var formData = {
                    key: $(this).closest("tr").find('#key').val(),
                }
                $.ajax({
                type:'GET',
                context: this,
                url:"{{route('delete-cart-product')}}",
                data:formData,
                success:function(data){
                    console.log(data);
                    if(data[0] == 'success'){
                        alert('deleted successfully');
                        
                        $(this).closest("tr").remove();
                       
                    }
                    $('#total_price').html(data[1]['total_price']);

                    $('#header_qty').html(data[1]['total_qty']);
                    $('#header_price').html(data[1]['total_price']);
                   
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
        });
    </script>
@endsection