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
                                <div class="page-title">Site Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">site-config</li>
                            </ol>
                        </div>
                    </div>
                @include('flash-message')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" id="adminSiteConfigValidation" enctype="multipart/form-data" action="{{route('update.site.config',["id" => $site_config->id])}}" > @csrf     
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-head">
                                                        <header>Site Settings</header>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">

                                          <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Name</label>
                                            <input type="text"   value="{{$site_config->store_name}}" class="form-control" id="store_name" name="store_name">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Logo</label>
                                            <input type="file" id="logo"  value="" class="form-control" name="logo">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Current Logo</label>
                                            <img src="{{url('images')}}/{{$site_config->logo}}">
                                            <input type="text" hidden=""   value="{{$site_config->logo}}" class="form-control" name="old_logo">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Favicon</label>
                                            <input type="file" id="fevicon"  value="" class="form-control" name="fevicon">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Current Favicon</label>
                                            <img src="{{url('Users_assets')}}/assets/images/{{$site_config->fevicon}}">
                                            <input type="text" hidden=""   value="{{$site_config->fevicon}}" class="form-control" name="old_fevicon">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Location</label>
                                            <input type="text" id="location"  value="{{$site_config->location}}" class="form-control" name="location">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Currency</label>
                                            <input type="text" id="currency"  value="{{$site_config->currency}}" class="form-control" name="currency">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Contact No</label>
                                            <input type="text"  id="mobile" value="{{$site_config->mobile}}" class="form-control" name="mobile">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Facebook</label>
                                            <input type="text"  id="facebook" value="{{$site_config->facebook}}" class="form-control" name="facebook">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Twitter </label>
                                            <input type="text"  id="twitter" value="{{$site_config->twitter}}" class="form-control" name="twitter">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">pinterest</label>
                                            <input type="text"  id="pinterest" value="{{$site_config->pinterest}}" class="form-control" name="pinterest">
                                            </div>
                                        
                                        
                                      </div>
                                       <div class="col-md-6">
                                         
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Skype</label>
                                            <input type="text" id="skype"  value="{{$site_config->skype}}" class="form-control" name="skype">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Instagram</label>
                                            <input type="text" id="instagram"  value="{{$site_config->instagram}}" class="form-control" name="instagram">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Email</label>
                                            <input type="text" id="email"  value="{{$site_config->email}}" class="form-control" name="email">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Footer Text</label>
                                            <input type="text" id="footer_text"  value="{{$site_config->footer_text}}" class="form-control" name="footer_text">
                                            </div>
                                             <div class="form-group">
                                            <label for="simpleFormEmail">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="4"> {{$site_config->address}}  </textarea>
                                            </div>
                                             <div class="form-group">
                                            <label for="simpleFormEmail">Address Line 2 (Area)</label>
                                            <textarea class="form-control" id="address_2" name="address_2" rows="4"> {{$site_config->address_2}}  </textarea>
                                            </div>
                                             <div class="form-group">
                                            <label for="simpleFormEmail">city</label>
                                            <input type="text" id="city"  value="{{$site_config->city}}" class="form-control" name="city">
                                            </div>
                                             <div class="form-group">
                                                 <label for="simpleFormEmail">State</label>
                        <div class="custom_select">
                            <select class="form-control" id="state" name="state">
                                <option value="">Select State</option>
                               <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>

                            </select>
                        </div>
                    </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                           
                                               <div class="col-md-4"> 
                                                <button type="submit" name="submit"  class="btn btn-success">UPDATE</button>
                                                
                                               </div>
                                              

                                               </div>
                                              
                                        </div>
                                          
                                      
                                    </form>

                                </div>



                                     
                            </div>

                      </div>
                    
                 

                    </div>


                  
                      
                 
              
                    
                  
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