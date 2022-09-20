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
                                <div class="page-title">Slider Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Slider</li>
                            </ol>
                        </div>
                    </div>
                @include('flash-message')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" action="{{ route('store-slider') }}" enctype="multipart/form-data" id="adminBannerValidation" > @csrf     
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-head">
                                                        <header> Add Slider Images</header>
                                                         
                                         
                                                </div>

                                            </div>
                                           
                                            
                                            
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-6">
                                               
                                      
                                      
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Slider  Image</label>
                                            <input type="file" class="form-control" id="slider_image" name="slider_image">
                                                @if ($errors->has('slider_image'))
                                                        {{ $errors->first('slider_image') }}
                                                          @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" id="slider_text" name="slider_text" value="1" >&nbsp;
                                            <label for="simpleFormEmail">Want to show slider content ?</label>
                                           
                                           
                                        </div>

                                      
                                         <div class="form-group">
                                            <label for="simpleFormEmail">H2 Tag Content</label>
                                            <input type="text" id="title_1" name="title_1"  value="" class="form-control"   >
                                                       @if ($errors->has('title_1'))
                                                        {{ $errors->first('title_1') }}
                                                          @endif 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">H5 Tag Content</label>
                                            <input type="text" id="title_2" name="title_2" id="" value="" class="form-control"   >
                                                       @if ($errors->has('title_2'))
                                                        {{ $errors->first('title_2') }}
                                                          @endif 
                                        </div>


                                        

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Banner Redirect Link</label>
                                            <input type="text" id="banner_link" name="banner_link" value="" class="form-control"   >
                                                       @if ($errors->has('banner_link'))
                                                        {{ $errors->first('banner_link') }}
                                                          @endif 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Banner Position</label>
                                            <input type="number" id="position" name="position" value="" class="form-control" >
                                                       @if ($errors->has('position'))
                                                        {{ $errors->first('position') }}
                                                          @endif 
                                        </div>

                                        <button type="submit" class="btn btn-primary" style="float: right;">Add Banner</button>



                                        </div>

                                        <div class="col-md-6">
                                          <img src="https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg?size=626&ext=jpg&ga=GA1.2.505090971.1614211200" width="100%">
                                        </div>
                                          
                                      
                                    </form>

                                </div>

                                     
                            </div>

                      </div>
                    
                 

                    </div>


                  
                        @include('Admin.allbanners')

                 
              
                    
                  
                </div>
            </div>


@endsection

@push('scripts')
<script src="{{url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/js/pages/table/table_data.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}" ></script>
@endpush