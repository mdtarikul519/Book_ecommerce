@extends('frontend.layout.index')
@section('content')
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block text-center py-2 my-2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <form method="POST" action="{{ route('prductQuantityUpdate') }}">
                    @csrf
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>

                        <tbody class="align-middle">
                            @foreach ($carts as $cart)
                                <tr>
                                    <td class="align-middle"><img src="img/product-1.jpg" alt=""
                                            style="width: 50px;">{{ $cart->product->product_name }}</td>

                                    <td class="align-middle">{{$cart->product->discounts()->latest()->first()? $cart->product->discounts()->latest()->first()->discount_price : $cart->product->sales_price }}Tk</td>
                                    <td class="align-middle">


                                        <div class="input-group quantity mx-auto">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>

                                            <input type="text"
                                                class="form-control form-control-sm bg-secondary text-center"
                                                value="{{ $cart->qty }}" name="product[{{ $cart->id }}]">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="align-middle">{{$cart->product->discounts()->latest()->first() ? $cart->product->discounts()->latest()->first()->discount_price * $cart->qty: $cart->product->sales_price * $cart->qty}}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('cartDelete', $cart->id) }}"> <button type="button"
                                                class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @if ($carts && count($carts))
                        <div class="float-right my-2">
                            <button type="submit" class="btn btn-sm btn-info">
                                Update
                            </button>
                        </div>
                    @endif

                </form>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $totalSum }} Tk</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">50 Tk</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ $totalSum + 50 }} Tk</h5>
                        </div>
                        <a href="{{ route('checkout') }}"> 
                            <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
