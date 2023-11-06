@extends('dashboard.layouts.dashboard')
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }

    .ck.ck-editor__main>.ck-editor__editable {
        background-color: #283046 !important;
        border-color: #757575 !important;
    }
</style>
@section('content')
    <div layout_title="Product Management">
        <h3 class="mb-2">Product Discount</h3>
        <div class="container">
            <div class="card list_card">
                <div class="card-header">
                    <h4>Create</h4>
                    <div class="btns">
                        <a href="https://dibyo-bd.com/admin#/product/"
                            class="btn rounded-pill btn-outline-warning router-link-active">
                            <i class="fa fa-arrow-left me-5px"></i>
                            Back
                        </a>
                    </div>
                </div>
                <form action="{{ route('dashboard.product.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group d-grid col-lg-4 align-content-start gap-1 mb-2">
                            <div class="field_wrapper">
                                <label for="stock" class="text-capitalize d-block">
                                    <span class="mb-2 d-block">
                                        Discount parsent
                                    </span>
                                    <input type="number" name="discount_percent" class="form-control" />
                                    <!---->
                                </label>
                                <!---->
                            </div>
                            @error('stock')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group d-grid col-lg-4 align-content-start gap-1 mb-2">
                            <div class="field_wrapper">
                                <label for="stock" class="text-capitalize d-block">
                                    <span class="mb-2 d-block">
                                        Start date
                                    </span>
                                    <input type="date" name="start_date" class="form-control" />
                                    <!---->
                                </label>
                                <!---->
                            </div>
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group d-grid col-lg-4 align-content-start gap-1 mb-2">
                            <div class="field_wrapper">
                                <label for="stock" class="text-capitalize d-block">
                                    <span class="mb-2 d-block">
                                        End date
                                    </span>
                                    <input type="date" name="end_date" class="form-control" />
                                    <!---->
                                </label>
                                <!---->
                            </div>
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa fa-upload"></i>
                                Submit
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
