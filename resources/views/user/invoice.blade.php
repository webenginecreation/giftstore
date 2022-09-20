@extends('user.master')
@section('main-section')


<br>
<div class="container" >
{{--     <div class="row">
        <a href="{{route('generate-pdf',['order_code' =>$orderDetails->order_code ])}}" target="_blank" class="btn btn-danger btn-xs">Print</a>
    </div> --}}
<br/>
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="{{url('images')}}/{{(isset($siteConfig->logo)) ? $siteConfig->logo : 'logo_dark.png' }}">
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Order Code : #{{ $orderDetails->order_code }}</p>
                            <p class="text-muted">Due to: {{ \Carbon\Carbon::parse($orderDetails->order_date)->format('j F, Y') }}</p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1">{{ $orderDetails->order_name  }}</p>
                            <p>{{ $orderDetails->order_email  }}</p>
                            <p class="mb-1">{{ $orderDetails->order_phone  }}</p>
                            
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Payment Details</p>
                            <p class="mb-1"><span class="text-muted">Address: </span> {{ $orderDetails->order_address  }}</p>
                             <p class="mb-1"><span class="text-muted">Address: </span> {{ $orderDetails->order_address2  }}</p>
                            <p class="mb-1"><span class="text-muted">City: </span> {{ $orderDetails->city  }}</p>
                            <p class="mb-1"><span class="text-muted">Zip: </span> {{ $orderDetails->order_zip  }}</p>
                            <p class="mb-1"><span class="text-muted">State: </span> {{ $orderDetails->state  }}</p>
                            <p class="mb-1"><span class="text-muted">Payment Mode: </span> {{ $orderDetails->payment  }}</p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Variant</th>
                                        
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(json_decode($orderDetails->order_products) as $index => $value)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->size }}</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{$siteConfig->currency}}{{ $value->price }}</td>
                                        <td>{{$siteConfig->currency}}{{ $value->quantity * $value->price }}</td>
                                    </tr>

                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light">{{$siteConfig->currency}}{{$orderDetails->total_amount}}</div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    


</div>



@stop


