@extends('dashboard.layouts.dashboard')
@section('content')
    
<div class="container-fluid" style="margin-top: 100px;">
    <form action="{{route('dashboard.role.update', $editdata->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Edit user Role</h6>
                    <a href="#/admin/blog/category" class="router-link-active btn btn-info btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group col-md-6">
                    <label for=""> title </label>
                    <div class="mt-1 mb-3"><input type="text" value="{{$editdata->title}}" name="title" class="form-control mb-1" /></div>
                </div>

                <div class="form-group col-md-6">
                    <label for=""> Role_serial </label>
                    <div class="mt-1 mb-3"><input type="number"  value="{{$editdata->role_serial}}" name="role_serial" class="form-control mb-1" /></div>
                </div>
            </div>

            <div class="card-header py-2 position-sticky d-flex justify-content-start"><button type="submit" class="btn btn-info btn-sm">update</button></div>
        </div>
    </form>
</div>
@endsection
