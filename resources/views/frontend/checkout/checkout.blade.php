@extends('frontend.layout.index')
@section('content')
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block text-center py-2 my-2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>


    <!-- Products End -->


    <div class="container">
        <form class="checkout-content" action="{{ route('order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card checkout-section checkout-box h-100 p-2">
                        <div class="section-head text-center">
                            <h5>Customer Information</h5>
                            <hr>
                        </div>
                        <div class="address cart">
                            <div class="multiple-form-group">
                                <div class="form-group mb-2">
                                    <label class="control-label" for="input-firstname">First Name</label>
                                    <input class="form-control" name="first_name" type="text" id="input-firstname"
                                        placeholder="First Name*">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label" for="input-lastname">Last Name</label>
                                    <input type="text" id="input-lastname" name="last_name" class="form-control"
                                        placeholder="Last Name*">
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label class="control-label" for="input-address">Delivery Address</label>
                                <textarea type="text" id="input-address" name="address" class="form-control" placeholder="Address*"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label" for="input-telephone">Mobile</label>
                                <input type="tel" id="input-telephone" name="mobile_number" class="form-control"
                                    placeholder="Telephone*">
                            </div>
                            <div class="form-group mb-2" for="input-email">
                                <label class="control-label">Email</label>
                                <input type="email" id="input-email" name="email" class="form-control"
                                    placeholder="E-Mail*">
                            </div>
                            <div class="multiple-form-group">
                                <div class="form-group mb-2" for="input-city">
                                    <label class="control-label">City</label>
                                    <input type="text" id="input-city" name="city" class="form-control"
                                        placeholder="City*">
                                </div>
                                <div class="form-group mb-2  d-none" for="input-zone">
                                    <label class="control-label">Zone</label>
                                    <select id="input-zone" name="zone" class="form-control">
                                        <option value="322" selected=""> Dhaka City</option>
                                        <option value="323"> Khulna City</option>
                                        <option value="4231"> Rangpur City</option>
                                        <option value="321">Chittagong City</option>
                                        <option value="4233">Gazipur City</option>
                                        <option value="4232">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label">Comment</label>
                                <textarea class="form-control" name="comment" placeholder="Comment" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="row row-payment-delivery-order">
                        <div class="col-md-12 col-lg-6 col-sm-12 payment-methods">
                            <div class="card checkout-section checkout-box h-100 p-4">
                                <div class="section-head ">
                                    <h5>Payment Method</h5>
                                </div>
                                <div class="">
                                    <p>Select a payment method</p>
                                    <label class="radio-inline">
                                        <input type="radio" onchange="change_cod()" id="cod_btn" name="payment_method"
                                            value="cod" checked="">
                                        Cash on Delivery
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" onchange="change_bkash()" id="bkash_btn"
                                            name="payment_method" value="bkash">
                                        Bkash
                                    </label>
                                    <br>

                                    <div id="bkash_section" class="border border-1 rounded-1 my-2 p-2 d-none">
                                        <p class="mb-3">
                                            অনুগ্রহ করে আপনার বিকাশ ‘পেমেন্ট অপশন’ থেকে আপনার পেমেন্ট কমপ্লিট করুন। তারপর
                                            নিচের ফর্মটি ফিলাপ করুন। আমাদের বিকাশ একাউন্টে টাকা পাঠানোর নিয়মঃ
                                        </p>
                                        <ul class="mb-3">
                                            <li class="d-flex gap-2"><span>১।</span> <span>*247# ডায়াল করে বিকাশ মোবাইল
                                                    মেন্যুতে যান</span></li>
                                            <li class="d-flex gap-2"><span>২।</span> <span>"Payment" অপশন সিলেক্ট
                                                    করুন।</span></li>
                                            <li class="d-flex gap-2"><span>৩।</span> <span>Enter Merchant Bkash account এ
                                                    নিচের নাম্বারটি লিখুন</span></li>
                                            <li class="d-flex gap-2"><span>৪।</span> <span> Amount এ আপনার বিল এমাউন্টটি
                                                    লিখুন।</span></li>
                                            <li class="d-flex gap-2"><span>৫।</span> <span>Enter Reference এ আপনার নামের
                                                    প্রথম শব্দ লিখুন।</span></li>
                                            <li class="d-flex gap-2"><span>৬।</span> <span>Enter counter number এ 1
                                                    লিখুন।</span></li>
                                            <li class="d-flex gap-2"><span>৭।</span> <span>আপনার বিকাশ মোবাইল মেন্যু পিনটি
                                                    দিয়ে লেনদেনটি সম্পন্ন করুন।</span></li>
                                            <li class="d-flex gap-2">
                                                <div>
                                                    <b>bKash Agent No : </b> <br>
                                                </div>
                                                <div>
                                                    <b onclick="bkash_number.value=`+8801315373025`">+8801315373025<br></b>
                                                    <b onclick="bkash_number.value=``"></b>
                                                    <b onclick="bkash_number.value=``"></b>
                                                </div>
                                            </li>
                                            <div class="form-group">
                                                <label class="control-label" for="input-firstname"><b>BKash Number:
                                                    </b></label>
                                                <input class="form-control" name="bkash_number" type="text"
                                                    id="bkash_number" placeholder="013******">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="input-firstname"><b>BKash transaction
                                                        ID: </b></label>
                                                <input class="form-control" name="bkash_trx_id" type="text"
                                                    id="bkash_trx" placeholder="TRX-4548">
                                            </div>
                                        </ul>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-sm-12 delivery-methods">
                            <div class="card checkout-section p-4">
                                <div class="section-head ">
                                    <h5>Delivery Method</h5>
                                </div>
                                <div class="">
                                    <p>Select a delivery method</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="shipping_method"
                                            value='{"method_name": "home_delivery", "cost": 70}'>
                                        Home Delivery - 70 ৳
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" name="shipping_method"
                                            value='{"method_name":"store_pickup","cost":0}'>
                                        Store Pickup - 0 ৳
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="shipping_method"
                                            value='{"method_name":"outsite_dhaka","cost":150}'>
                                        Home Delivery outside Dhaka - 150 ৳
                                    </label>
                                    <br>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 d-none">
                            <div class="checkout-section card checkout-box voucher-coupon mt-3 p-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12" id="gift-voucher">
                                            <div class="input-group">
                                                <input type="text" name="voucher" placeholder="Gift Voucher"
                                                    id="input-voucher" class="form-control">
                                                <span class="input-group-btn"><button type="button" id="button-voucher"
                                                        data-loading-text="Loading..." class="btn st-outline">Apply
                                                        Voucher</button></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="discount-coupon">
                                            <div class="input-group">
                                                <input type="text" name="coupon" placeholder="Promo / Coupon Code"
                                                    id="input-coupon" class="form-control">
                                                <span class="input-group-btn"><button type="button" id="button-coupon"
                                                        data-loading-text="Loading..." class="btn st-outline">Apply
                                                        Coupon</button></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 details-section-wrap mt-5">
                            <div class="card checkout-section checkout-box">
                                <div class="section-head text-center pt-2">
                                    <h2>Order Overview</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered bg-white checkout-data">
                                        <thead>
                                            <tr>
                                                <td>Product Name</td>
                                                <td>Price</td>
                                                <td class="text-end">Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $product)
                                                {{-- @dd($product);   --}}
                                                <tr>
                                                    <td class="name">
                                                        <a
                                                            href="javascript:void(0)">{{ $product->product->product_name }}</a>
                                                        <div class="options"></div>
                                                    </td>
                                                    <td class="price">
                                                        <span>{{ $product->product->discounts()->latest()->first()? $product->product->discounts()->latest()->first()->discount_price: $product->product->sales_price * $product->qty }}৳</span>
                                                        <span> x </span> <span>{{ $product->qty }}</span></td>
                                                    <td class="price text-end">
                                                        {{ $product->product->discounts()->latest()->first()? $product->product->discounts()->latest()->first()->discount_price * $product->qty: $product->product->sales_price * $product->qty }}৳
                                                    </td>
                                                </tr>
                                            @endforeach


                                            <tr class="total">
                                                <td colspan="2" class="text-end"><strong>Sub-Total:</strong></td>
                                                <input type="hidden" name="sub_total" value="{{ $totalCost }}"
                                                    id="cart_total">
                                                <td class="text-end"><span class="amount">{{ $totalCost }}</span></td>
                                            </tr>
                                            <tr class="total">
                                                <td colspan="2" class="text-end"><strong>Delivery:</strong></td>
                                                <td class="text-end">
                                                    <span class="amount">
                                                        <span id="shipping_cost">50</span>৳
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="total">
                                                <td colspan="2" class="text-end"><strong>Total:</strong></td>
                                                <input type="hidden" name="total_price" value="{{ $totalCost + 50 }}">
                                                <td class="text-end">
                                                    <span class="amount" id="total_cost">{{ $totalCost + 50 }}</span>৳
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="checkout-final-action mt-3">
                <div class="agree-text" style="margin-bottom: 10px;">
                    <input type="checkbox" name="agree" value="1" checked="checked">
                    I have read and agree to the
                    <a href="#">
                        <b>Terms and Conditions</b>
                    </a>,
                    <a href="#">
                        <b>Privacy Policy</b>
                    </a> and
                    <a href="#">
                        <b>Refund and Return Policy</b>
                    </a>
                </div>
                <a href="{{ route('order') }}"><button id="button-confirm" class="btn btn-primary pull-right"
                        type="submit">Confirm Order</button></a>
            </div>
        </form>

    </div>
@endsection
