@extends('backend.instructor.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Order</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View Order</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div style="display: flex; align-items:center; justify-content:space-between">
            <h6 class="mb-0 text-uppercase">View Order Details</h6>


        </div>

        <hr />

        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        <div style="display:flex; align-items:center; justify-content: flex-start; gap: 15px">

                            <div>
                                <img src="{{asset($order_info->user->photo)}}" class="text-center" width="120" height='120'  />

                            </div>


                            <div style="display: flex; flex-direction:column; gap: 10px;">
                                <span>Name : {{$order_info->user->name}}</span>
                                <span>Email : {{$order_info->user->email}}</span>
                                <span>Phone : {{$order_info->user->phone}}</span>
                                <span>Address: {{$order_info->user->address}}</span>
                                <span>Bio: {{$order_info->user->bio}}</span>
                                <span>Gender: {{$order_info->user->gender}}</span>
                            </div>

                        </div>



                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        <div style="display:flex; align-items:center; justify-content: flex-start; gap: 15px">




                            <div style="display: flex; flex-direction:column; gap: 10px;">
                                <span>Total Amount : {{$order_info->price}}</span>
                                <span>Payment Type : {{$order_info->payment->payment_type}}</span>
                                <span>Invoice Number : {{$order_info->payment->invoice_no}}</span>
                                <span>Order Date: {{ $order_info->payment->created_at->format('F d, Y') }}</span>

                                <span>Trx Id: {{$order_info->payment->transaction_id}}</span>

                            </div>

                        </div>



                    </div>
                </div>

            </div>


        </div>

        <div>
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Course Name</th>
                                    <th>Category</th>
                                    <th>Instructor</th>
                                    <th>Price</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <img src="{{asset($order_info->course->course_image)}}" width="80" height="80" style="border-radius: 5px" />
                                    </td>

                                    <td>{{$order_info->course->course_name}}</td>
                                    <td>
                                        {{$order_info->course->category->name}}
                                    </td>

                                    <td>
                                        {{$order_info->instructor->name}}
                                    </td>

                                    <td>
                                        ${{$order_info->price}}
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

