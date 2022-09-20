@extends('Admin.master')
@section('main-section')

<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                   <!-- start widget -->
				
					<!-- end widget -->
					
					<div class="row">
	                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
	                        <div class="analysis-box m-b-0 bg-b-purple">
	                            <h3 class="text-white box-title">Today's Orders <span class="pull-right">{{$totalcount}}</span></h3>
	                            <div id="sparkline7"><canvas style="display: inline-block; width: 267px; height: 70px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
	                        <div class="analysis-box m-b-0 bg-b-danger">
	                            <h3 class="text-white box-title">Today Sales <span class="pull-right"> {{$siteConfig->currency}}{{$todaysales}}</span></h3>
	                            <div id="sparkline12"><canvas style="display: inline-block; width: 367px; height: 70px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
	                        <div class="analysis-box m-b-0 bg-b-cyan">
	                            <h3 class="text-white box-title">Total User <span class="pull-right">{{ $countUsers }}</span></h3>
	                            <div id="sparkline9"><canvas style="display: inline-block; width: 267px; height: 70px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
	                        <div class="analysis-box m-b-0 bg-b-blue">
	                            <h3 class="text-white box-title">Total Sales <span class="pull-right"><span>{{$siteConfig->currency}}</span>{{$total_collection}}</span></h3>
	                            <div id="sparkline16" class="text-center"><canvas style="display: inline-block; width: 215px; height: 70px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
                	</div>

				
                </div>
            </div>
@endsection