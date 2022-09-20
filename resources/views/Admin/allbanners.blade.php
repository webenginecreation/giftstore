<br>
<div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Slider</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>image</th>
                                                <th>Text Allowed</th>
                                                <th>H5 Text</th>
                                                <th>H2 Text</th>
                                                <th>Position</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @php $i=0; @endphp
                                            @foreach($allBanners as $value)

                                             <td>{{ ++$i }}</td>
                                             <td> <img src="/slider_image/{{$value->slider_image }}" height="50px;" width="50px;"> </td>
                                              <td>@if ($value->slider_text == 0) 

                                                     <a href="">
                                                     <span class="label label-sm label-danger"> NO </span>  </a> 
                                                    @else 
                                                    <a href="">
                                                    <span class="label label-sm label-success">YES </span>   </a>  @endif</td>
                                              <td>{{ $value->title_1 }}</td>
                                              <td>{{ $value->title_2 }}</td>
                                            <td>{{ $value->position }}</td>
                                           
                                            <td>
                                                
                                                <a href="{{route('delete.sliders',['id' => $value->id ])}}" class="label label-sm label-danger"> Delete</a>
                                            </td>
                                        </tbody>
                                  @endforeach
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>