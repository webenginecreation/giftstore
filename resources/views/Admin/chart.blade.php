@extends('Admin.master')
@push('css')
{!! Charts::styles() !!}
@endpush
@section('main-section')
<div class="page-content-wrapper">
                <div class="page-content">
               
                           <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!} 
                  
                </div>
            </div>
@endsection
