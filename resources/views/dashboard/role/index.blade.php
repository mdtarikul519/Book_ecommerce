
@extends('dashboard.layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div style="margin-top: 100px;">
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                <div><h4 class="bn" style="font-size: 22px !important;">User Roll</h4></div>
                <div class="d-flex justify-content-between">
                    <!-- <label class="switch">
                        <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                        <input v-else type="checkbox" @change="toggle">
                        <span class="switch-state" style="background-color: #4c6887;"></span>
                    </label> -->
                    <div class="ps-3 d-flex gap-2"><a href="{{route('dashboard.role.create')}}" class="btn btn-sm btn-info"> Create </a></div>
                </div>
            </div>
            <div class="card-body px-4 py-2 form_area custom_scroll">
                <div class="custom_table nowrap table-responsive w-100 h-100 custom_scroll">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th  style="width: 50px;">SL</th>
                                <th  style="width: 50px;">title</th>
                                <th  style="width: 200px;">Role serial</th>
                                <th  style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alldata as $item)
                            <tr>
                                <td >{{$loop->index + 1}}</td>
                                <td >{{$item->title}}</td>
                                <td>{{$item->role_serial}}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-3">
                                        <a href="{{route('dashboard.role.edit',$item->id)}}" class="btn btn-sm btn-outline-info"> Edit </a>
                                        <a href="{{route('dashboard.role.destory',$item->id)}}" class="btn btn-sm btn-outline-danger"> delete </a></div>
                                </td>
                            </tr>
                            @endforeach
                   
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-2">
                <nav aria-label="Page navigation example" class="">
                    <ul class="pagination pagination-warning">
                        <li class="page-item">
                            <a class="page-link"><span>« Previous</span></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="http://127.0.0.1:8000/api/v1/navbar-menu-details/all?orderByType=DESC&amp;sub_menu_slug=vrti-notis-82634719&amp;page=1"><span>1</span></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"><span>Next »</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>  
@endsection

