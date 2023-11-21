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

@php
    
@endphp
@section('content')



    <div layout_title="Product Management">
        <h3 class="mb-2">Product Management</h3>
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
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="admin_form form_1 d-grid">

                                    <div>
                                     <input type="text" name="exam">
                                    </div>
                                    <div class="form-group full_width d-grid align-content-start gap-1 mb-2">
                                        <div class="field_wrapper">
                                            <label class="text-capitalize d-block">
                                                <span class="mb-2 d-block">
                                                    Product Name
                                                </span>
                                                <input type="text" name="product_name" class="form-control" />
                                                <!---->
                                            </label>
                                        </div>
                                        @error('product_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group full_width d-grid align-content-start gap-1 mb-2">
                                        <div class="field_wrapper">
                                            <label for="search_keywords" class="text-capitalize d-block">
                                                <span class="mb-2 d-block">
                                                    Meta keywords
                                                </span>
                                                <input type="text" id="meta_keywords" name="meta_keywords"
                                                    class="form-control" />
                                                <!---->
                                            </label>
                                            <!---->
                                        </div>
                                        @error('meta_keywords')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="full_width row">
                                        <div class="form-group d-grid col-lg-4  align-content-start gap-1 mb-2">
                                            <div class="field_wrapper">
                                                <label for="cost" class="text-capitalize d-block">
                                                    <span class="mb-2 d-block">
                                                        cost
                                                    </span>
                                                    <input type="text" id="cost" name="cost"
                                                        class="form-control" />
                                                    <!---->
                                                </label>
                                                <!---->
                                            </div>

                                        </div>
                                        <div class="form-group d-grid col-lg-4 align-content-start gap-1 mb-2">
                                            <div class="field_wrapper">
                                                <label for="sales_price" class="text-capitalize d-block">
                                                    <span class="mb-2 d-block">
                                                        sales price
                                                    </span>
                                                    <input type="text" id="sales_price" name="sales_price"
                                                        class="form-control" />
                                                    <!---->
                                                </label>
                                                <!---->
                                            </div>
                                            @error('sales_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="form-group d-grid col-lg-4 align-content-start gap-1 mb-2">
                                            <div class="field_wrapper">
                                                <label for="stock" class="text-capitalize d-block">
                                                    <span class="mb-2 d-block">
                                                        stock
                                                    </span>
                                                    <input type="text" name="stock" class="form-control" />
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
                                                <label for="low_stock" class="text-capitalize d-block">
                                                    <span class="mb-2 d-block">
                                                        low stock
                                                    </span>
                                                    <input type="text" id="low_stock" name="low_stock"
                                                        class="form-control" />
                                                    <!---->
                                                </label>
                                                <!---->
                                            </div>
                                            @error('stock')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group d-grid col-lg-4 align-content-start gap-1 mb-2">

                                            <label class="mb-2 text-capitalize">
                                                is top product
                                            </label>
                                            <input type="number" name=" is_top_product" class="form-control">
                                        </div>




                                        <div class="form-group full_width d-grid align-content-start gap-1 mb-4">
                                            <div>
                                                <label class="mb-2 text-capitalize">
                                                    selected categories
                                                </label>
                                                <select name="selected_categories" id="cars" class="form-control">
                                                    @foreach ($product_categories as $product_catagory)
                                                        <option value="{{ $product_catagory->id }}">
                                                            {{ $product_catagory->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            @error('selected_categories')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group full_width d-grid align-content-start gap-1 mb-2">
                                        <h5 class="text-capitalize">
                                            Product status
                                        </h5>
                                        <label for="call_for_price">
                                            <input type="checkbox" value="1" id="call_for_price"
                                                class="form-check-input" />
                                            &nbsp; &nbsp; Call for price
                                        </label>
                                        <label for="is_upcomming">
                                            <input type="checkbox" value="1" id="is_upcomming"
                                                class="form-check-input" />
                                            &nbsp; &nbsp; Upcomming
                                        </label>
                                        <label for="is_tba">
                                            <input type="checkbox" value="1" id="is_tba"
                                                class="form-check-input" />
                                            &nbsp; &nbsp; TBA
                                        </label>
                                        <label for="is_pre_order">
                                            <input type="checkbox" value="1" id="is_pre_order"
                                                class="form-check-input" />
                                            &nbsp; &nbsp; Pre order
                                        </label>
                                        <label for="is_in_stock">
                                            <input checked="checked" type="checkbox" value="1" id="is_in_stock"
                                                class="form-check-input" />
                                            &nbsp; &nbsp; In stock available
                                        </label>
                                        <br />
                                    </div> --}}
                                        <div class="full_width mb-2 row mb-4">
                                            <div class="col-lg-3">
                                                <div class="field_wrapper">
                                                    <label class="text-capitalize d-block">
                                                        <span class="mb-2 d-block">
                                                            Image
                                                        </span>
                                                        <input type="file" name="image" class="form-control" />
                                                        <!---->
                                                    </label>

                                                </div>
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="field_wrapper">
                                                    <label for="image2" class="text-capitalize d-block">
                                                        <span class="mb-2 d-block">
                                                            Related Image 1
                                                        </span>
                                                        <input type="file" accept="image/*" id="image2"
                                                            name="image2" class="form-control" />
                                                        <!---->
                                                    </label>
                                                    <div class="file_preview"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="field_wrapper">
                                                    <label for="image3" class="text-capitalize d-block">
                                                        <span class="mb-2 d-block">
                                                            Related Image 2
                                                        </span>
                                                        <input type="file" accept="image/*" id="image3"
                                                            name="image3" class="form-control" />
                                                        <!---->
                                                    </label>
                                                    <div class="file_preview"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="field_wrapper">
                                                    <label for="image4" class="text-capitalize d-block">
                                                        <span class="mb-2 d-block">
                                                            Related Image 3
                                                        </span>
                                                        <input type="file" accept="image/*" id="image4"
                                                            name="image4" class="form-control" />
                                                        <!---->
                                                    </label>
                                                    <div class="file_preview"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="field_wrapper">
                                                    <label for="image5" class="text-capitalize d-block">
                                                        <span class="mb-2 d-block">
                                                            Related Image 4
                                                        </span>
                                                        <input type="file" accept="image/*" id="image5"
                                                            name="image5" class="form-control" />
                                                        <!---->
                                                    </label>
                                                    <div class="file_preview"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="field_wrapper">
                                                    <label for="image6" class="text-capitalize d-block">
                                                        <span class="mb-2 d-block">
                                                            Related Image 5
                                                        </span>
                                                        <input type="file" accept="image/*" id="image6"
                                                            name="image6" class="form-control" />
                                                        <!---->
                                                    </label>
                                                    <div class="file_preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group d-grid align-content-start full_width  gap-1 mb-2 ">
                                            <label for="short_description">Short Description</label>
                                            <textarea id="editor" name="short_description"></textarea>
                                            <script>
                                                ClassicEditor.create(document.querySelector('#editor'))
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>

                                            @error('short_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group d-grid align-content-start full_width gap-1 mb-2">
                                            <label for="specification">Description</label>
                                            <textarea id="data" name="description"></textarea>


                                            <script>
                                                ClassicEditor.create(document.querySelector('#data'))
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>

                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="form-group d-grid align-content-start full_width gap-1 mb-2">
                                            <label for="description">meta description</label>
                                            <div id="description">
                                                <textarea id="item" style="display: none;" aria-hidden="true" name="meta_description"></textarea>

                                                <script>
                                                    ClassicEditor.create(document.querySelector('#item'))
                                                        .catch(error => {
                                                            console.error(error);
                                                        });
                                                </script>

                                            </div>
                                            @error('meta_description ')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="seo_section full_width mt-5">
                                            <div class="heading mb-4">
                                                <h4 class="d-flex justify-content-center">Seo section</h4>
                                                <h6 class="d-flex justify-content-center">Boost traffic to your online
                                                    business.</h6>
                                            </div>
                                            <hr />
                                            <div class="admin_form form_1 col_2 mt-3">
                                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                                    <div class="field_wrapper">
                                                        <label class="text-capitalize d-block">
                                                            <span class="mb-2 d-block">
                                                                meta title
                                                            </span>
                                                            <input type="text" name="meta_title"
                                                                class="form-control" />
                                                            <!---->
                                                        </label>
                                                        <!---->
                                                    </div>
                                                    @error('meta_title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                                    <div class="field_wrapper">
                                                        <label class="text-capitalize d-block">
                                                            <span class="mb-2 d-block">
                                                                product url
                                                            </span>
                                                            <input type="text" name="product_url"
                                                                class="form-control" />
                                                            <!---->
                                                        </label>
                                                        <!---->
                                                    </div>
                                                </div>


                                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                                    <div class="field_wrapper">
                                                        <label class="text-capitalize d-block">
                                                            <span class="mb-2 d-block">
                                                                video_url
                                                            </span>
                                                            <input type="text" name="video_url"
                                                                class="form-control" />
                                                            <!---->
                                                        </label>
                                                        <!---->
                                                    </div>
                                                </div>

                                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                                    <div class="field_wrapper">
                                                        <label class="text-capitalize d-block">
                                                            <span class="mb-2 d-block">
                                                                schema_tag
                                                            </span>
                                                            <input type="text" name="schema_tag"
                                                                class="form-control" />
                                                            <!---->
                                                        </label>
                                                        <!---->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
