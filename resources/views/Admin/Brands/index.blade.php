@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<style type="text/css">
    label{
        font-weight: bold;
    }

    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    input.error { border-left: 4px solid #f00; }

</style>

@endpush
@section('main-section')
<div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Brand Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add-Brand</li>
                            </ol>
                        </div>
                    </div>
        @include('flash-message')
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">

                    <div class="card-body " id="bar-parent">
<form method="POST" action="{{ (isset($brandByid->id) ? route('update.brand',$brandByid->id) : route('store.brand') ) }}" enctype="multipart/form-data"id="adminBrandValidation" > @csrf     
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-head">
                                        <header> Add Brand Here</header>


                                    </div>

                                </div>



                            </div><br> 
                            <div class="row">

                                <div class="col-lg-6">

                                    <br>
                                    <br>
                                   
                                     <div class="form-group">
                                        <h4 for="simpleFormEmail">Brand Name</h4>
                                        <input type="text" class="form-control" value="{{ (isset($brandByid->brand_name) ?  $brandByid->brand_name : '' ) }}" name="brand_name" id="brand_name" placeholder="Add Brand Name" >
                                    </div>   

                                     @if(isset($brandByid->brand_icon))

                                     <div class="form-group">
                                            <label for="simpleFormEmail">Brand Current icon</label>
                                            <input type="hidden" readonly class="form-control" value="{{$brandByid->brand_icon}}" name="old_brand_icon"><br>
                                            <img src="{{env('APP_URL')}}/brand_icon/{{$brandByid->brand_icon }}" height="100px;" width="100;">
                                               
                                        </div>
                                    
                                    <div class="form-group">
                                        <label for="simpleFormEmail">Change Brand Icon</label>
                                        <input type="file" id="brand_icon"  class="form-control" id="brand_icon" name="brand_icon">
                                        @if ($errors->has('brand_icon'))
                                        {{ $errors->first('brand_icon') }}
                                        @endif
                                    </div>
                                     
                                     @else

                                     <div class="form-group">
                                        <label for="simpleFormEmail">Brand Icon</label>
                                        <input type="file" id="brand_icon"  class="form-control" id="brand_icon" name="brand_icon">
                                        @if ($errors->has('brand_icon'))
                                        {{ $errors->first('brand_icon') }}
                                        @endif
                                    </div>

                                    @endif

                                     <div class="form-group">
                                        <h4 for="simpleFormEmail">About Brand </h4>
                                        <textarea class="form-control" name="about_brand" id="about_brand">{{ (isset($brandByid->about_brand) ?  $brandByid->about_brand : '' ) }}  </textarea>
                                    </div>   

                                    <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1"  >Active</option>
                                                    <option value="0" >Deactive</option>
                                                </select>
                                            </div>

                                    <button type="submit" class="btn btn-primary" style="float: right;">Save</button>



                                </div>

                                <div class="col-md-6">
                                  <img src="https://i.pinimg.com/736x/b9/87/bb/b987bbe3173d6ef0bcceb6e781655a46.jpg" width="100%">
                              </div>


                          </form>

                      </div>


                  </div>

              </div>
          </div>
      </div>

       @include('Admin.Brands.allbrands')
  </div>


  @endsection

  @push('scripts')
  <script src="{{url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
  <script src="{{url('Eadmin/assets/js/pages/table/table_data.js')}}" ></script>
  <script src="{{url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" ></script>
  <script src="{{url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}" ></script>
  @endpush