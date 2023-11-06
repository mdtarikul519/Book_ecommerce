@extends('dashboard.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div style="margin-top: 100px;">
            <div class="card rounded-none">
                <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="bn" style="font-size: 22px !important;">All Product</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- <label class="switch">
                                        <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                                        <input v-else type="checkbox" @change="toggle">
                                        <span class="switch-state" style="background-color: #4c6887;"></span>
                                    </label> -->
                        <div class="ps-3 d-flex gap-2"><a href="{{ route('dashboard.product.create') }}"
                                class="btn btn-sm btn-info"> Create </a></div>
                    </div>
                </div>
                <div class="card-body px-4 py-2 form_area custom_scroll">
                    <div class="custom_table nowrap table-responsive w-100 h-100 custom_scroll">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">Id</th>
                                    <th style="width: 50px;">Image</th>
                                    <th style="width: 50px;">Product Name</th>
                                    <th style="width: 50px;">Avaiability </th>
                                    <th style="width: 50px;">price</th>
                                    <th style="width: 50px;">Discount %</th>
                                    <th style="width: 50px;">discount Price</th>
                                    <th style="width: 50px;">Current price</th>
                                    <th style="width: 50px;">Total Stock</th>
                                    <th style="width: 50px;">Total Sold</th>
                                    <th style="width: 50px;">Present stock</th>
                                    <th style="width: 50px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <img src="/{{ $item->image }}" height="40" alt="Image">
                                        </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>
                                            @if ($item->stocks_sum_qty - $item->orders_sum_qty > 0)
                                                in_stock
                                            @else
                                                not in stock
                                            @endif
                                        </td>
                                        <td>{{ $item->sales_price }}</td>
                                        <td>
                                            @isset($item->discount)
                                                {{ $item->discount->discount_percent }}
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($item->discount)
                                                {{ $item->discount->discount_price }}
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($item->discount)
                                                {{ $item->price - $item->discount->discount_price }}
                                            @endisset
                                        </td>
                                        <td>{{ $item->stocks_sum_qty }}</td>
                                        <td>{{ $item->orders_sum_qty }}</td>
                                        <td>{{ $item->stocks_sum_qty - $item->orders_sum_qty }}</td>



                                        <td class="text-end">
                                            <div class="d-flex justify-content-end gap-3">
                                                <a href="{{ route('dashboard.product.edit', $item->id) }}"
                                                    class="btn btn-sm btn-outline-info"> Edit </a>
                                                <a href="{{ route('dashboard.product.details', $item->id) }}"
                                                    class="btn btn-sm btn-outline-warning"> Details </a>
                                                <a href="{{ route('dashboard.product.discount', $item->id) }}"
                                                    class="btn btn-sm btn-outline-secondary"> Set Discount</a>
                                                <a href="{{ route('dashboard.product.destory', $item->id) }}"
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

                        {{ $all_data->links() }}

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
