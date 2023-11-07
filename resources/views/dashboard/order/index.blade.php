@extends('dashboard.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div style="margin-top: 100px;">
            <div class="card rounded-none">
                <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="bn" style="font-size: 22px !important;">All Order</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- <label class="switch">
                                    <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                                    <input v-else type="checkbox" @change="toggle">
                                    <span class="switch-state" style="background-color: #4c6887;"></span>
                                </label> -->
                      
                    </div>
                </div>
                <div class="card-body px-4 py-2 form_area custom_scroll">
                    <div class="custom_table nowrap table-responsive w-100 h-100 custom_scroll">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">Id</th>
                                    <th style="width: 50px;">user id</th>
                                    <th style="width: 50px;">Order status</th>
                                    <th style="width: 50px;">Total price </th>
                                    <th style="width: 50px;">Sub total</th>
                                    <th style="width: 50px;">Invoice id </th>
                                    <th style="width: 50px;">Date</th>
                                    <th style="width: 50px;">Discount percent</th>
                                    <th style="width: 50px;">Discount price</th>
                                    <th style="width: 50px;">Payment status</th>
                                    <th style="width: 50px;">Delivery method</th>
                                    <th style="width: 50px;">Delivery cost</th>
                                    <th style="width: 50px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order)
       {{-- @dd($order) --}}
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->user_name }}</td>

                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->sub_total }}</td>
                                    <td>{{ $order->invoice_id }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->discount_percent }}</td>
                                    <td>{{ $order->discount_price }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_method }}</td>
                                    <td>{{ $order->delivery_cost }}</td>


                                     <td class="text-end">
                                        <div class="d-flex justify-content-end gap-3"><a
                                                href="{{ route('dashboard.order.edit',$order->id) }}"
                                                class="btn btn-sm btn-outline-info"> Edit </a>
                                            <a href="{{ route('dashboard.order.details',$order->id) }}"
                                                class="btn btn-sm btn-outline-warning"> Details </a>
                                            <a href="{{ route('dashboard.order.destory',$order->id) }}"
                                                class="btn btn-sm btn-outline-danger">delete </a>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-2">
                    <nav aria-label="Page navigation example" class="">

                        {{-- {{ $all_data->links() }} --}}

                        {{-- <ul class="pagination pagination-warning">
                        <li class="page-item">
                            <a class="page-link"><span>« Previous</span></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="http://127.0.0.1:8000/api/v1/navbar-menu-details/all?orderByType=DESC&amp;sub_menu_slug=vrti-notis-82634719&amp;page=1"><span>1</span></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"><span>Next »</span></a>
                        </li>
                    </ul> --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
