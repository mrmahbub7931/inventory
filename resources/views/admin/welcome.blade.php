@extends('admin.layout.master')

@push('css')
    
@endpush

@section('content')
<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Amezia</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    
    <div class="row">                    
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <span class="float-right text-muted font-13">Last 3 month</span>
                    <h5 class="mt-0 mb-3">Workloed</h5>                                    
                    <div id="donut-example" class="morris-chart workloed-chart"></div> 
                    <ul class="list-unstyled text-center text-muted mb-0">
                        <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-purple mr-2"></i>External</li>
                        <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-pink mr-2"></i>Internal</li>
                        <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-light mr-2"></i>Other</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-0 mb-3">Budget Detail</h5>
                    <div id="morris-bar-chart" class="morris-chart project-budget-detail-chart"></div>
                    <ul class="list-unstyled text-center text-muted mb-0 mt-2">
                        <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-primary mr-2"></i>Total Budget</li>
                        <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-success mr-2"></i>Amount Used</li>
                        <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-secondary mr-2"></i>Target Amount</li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="col-md-12 col-xl-3">
            <div class="card profile">
                <div class="card-body">
                    <div class="text-center">
                        <img src="assets/images/users/user-3.jpg" alt="" class="rounded-circle img-thumbnail thumb-xl">
                        <div class="online-circle">
                            <i class="fa fa-circle text-success"></i>
                        </div>                                        
                        <h4 class="">Mark Kearney</h4>
                        <p class="text-muted font-12">Project Manager</p>
                        <p class="font-13 text-muted">There are many variations of passages 
                            of Lorem Ipsum available, but the majority have suffered alteration in some 
                            form,  or randomised words which don't look even slightly believable. 
                            If you are going to use a passage.</p>
                        <a href="#" class="btn btn-pink btn-round px-5">Follow Me</a>
                    </div>                                    
                </div>
            </div>
        </div>                                                                 
    </div><!--end row-->
</div>
@endsection

@push('js')
    
@endpush