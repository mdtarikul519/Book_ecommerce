@extends('dashboard.layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div style="margin-top: 100px;">
            <div class="card rounded-none">
                <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="bn" style="font-size: 22px !important;">Order Details</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- <label class="switch">
                                <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                                <input v-else type="checkbox" @change="toggle">
                                <span class="switch-state" style="background-color: #4c6887;"></span>
                            </label> -->
                        {{-- <div class="ps-3 d-flex gap-2"><a href="#/admin/blog/category" class="btn btn-sm btn-info"> All
                                Category </a><a href="#/admin/blog/create" class="btn btn-sm btn-info"> Create </a></div> --}}
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
                        <table class="table table-bordered table-hover text-center">
                              <thead>
                                   <tr>
                                     <th>ক্রমিক নং</th>
                                     <th>উপকরণ</th> 
                                     <th>সংখ্যা</th> 
                                     <th>একক মূল্য</th> 
                                     <th>মোট মূল্য</th> 
                                     <th>রিমুভ কার্ট</th>
                                   </tr>
                              </thead>
                            <tbody>
                                 <tr>
                                    <td> ১ </td>
                                    <td> মোদের চলার পথ ইসলাম </td>
                                    <td> 4 </td>
                                    <td> ৩৫ ৳ </td>
                                    <td> ১৪০ ট </td>
                                    <td class="btn btn-sm btn-danger">Delete</td>
                                 </tr>
                                 <div>

                                  </div>
                                  <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>মোট মূল্যঃ</td>
                                    <td> ১৪০ ট </td>
                                  </tr>
                                  <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ব্যাংক চার্জঃ</td>
                                    <td> ৩০ ট </td>

                                  </tr> 
                                  <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>কুরিয়ার চার্জঃ</td>
                                    <td> ১০০ t</td>
                       

                                  </tr>  
                                  <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>সর্বমোট মূল্যঃ</td>
                                    <td> ২৭০ ট </td>     

                                 </tr>

                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
