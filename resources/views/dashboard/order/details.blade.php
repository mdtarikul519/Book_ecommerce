@extends('dashboard.layouts.dashboard')
@section('content')
    <div class="container-fluid  ">
        <div style="margin-top: 100px;" class="print-m-0">
            @if ($message = Session::get('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>{{ $message }},
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card rounded-none">
                <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="bn" style="font-size: 22px !important;">Order Details</h4>
                    </div>
                    <div class="print-d-none">
                        <button onclick="window.print()" class="btn btn-primary" type="submit">Print</button>
                    </div>

                </div>
                <div class="card-body px-4 py-2 form_area custom_scroll">
                    <div class="custom_table nowrap table-responsive w-100 h-100 custom_scroll">
                        <div style="background-color:#C57550; padding:8px">
                            <h6>১ টি অর্ডার এর বিবরণ</h6>
                        </div>
                        <div class="d-flex justify-content-between p-4">
                            <div>শাখাঃ মোমেনশাহী মহানগর</div>
                            <div>তারিখঃ ০৭/১১ / ২০২৩</div>
                        </div>
                        <table class="table table-bordered table-hover text-center ">
                            <thead>
                                <tr>
                                    <th>ক্রমিক নং</th>
                                    <th>উপকরণ</th>
                                    <th>সংখ্যা</th>
                                    <th>একক মূল্য</th>
                                    <th>মোট মূল্য</th>

                                </tr>
                            </thead>
                            <tbody class="print-border">
                                @foreach ($details->order_products as $index => $detail)
                                    <tr>
                                        {{-- @dd( $detail); --}}
                                        <td>{{ $detail->id }}</td>
                                        <td>{{ $detail->product->product_name }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>{{ $detail->product_price }}</td>
                                        <td>{{ $detail->product_price * $detail->qty }}</td>


                                    </tr>
                                @endforeach
                                <div>

                                </div>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>মোট মূল্যঃ</td>
                                    <td> {{ $details->sub_total }} ট </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ব্যাংক চার্জঃ</td>
                                    <td>50 ট</td>

                                </tr>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>কুরিয়ার চার্জঃ</td>
                                    <td>{{ $details->delivery_cost }} ট</td>


                                </tr>
                                <tr class="print-border">
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>সর্বমোট মূল্যঃ</td>
                                    <td> {{ $details->sub_total + $details->delivery_cost + 50 }} </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end ">
                            <form class="print-d-none" action="{{ route('dashboard.order.order_details', $details->id) }}"
                                method="POST">
                                @csrf
                                <div class="d-flex align-item-center justify-content-biteween my-3 gap-3">
                                    <select class="form-select " name="order_status">
                                        <option value="processing">Processing</option>
                                        <option value="pending" selected>Pending</option>
                                        <option value="accepted">Accepted</option>
                                        <option value="delivered">Delivered</option>
                                    </select>
                                    <button type="submit" class=" btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
