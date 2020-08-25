@extends('admin.layout.master')

@push('css')
    <!--popup-->
    <link href=" {{ asset('assets/backend/plugins/magnific-popup/magnific-popup.css') }} " rel="stylesheet">
    <link href=" {{ asset('assets/backend/plugins/dropify/css/dropify.min.css') }} " rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Inventory</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Information</h4>
                    
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-12 col-xl-3">
                <div class="card profile">
                    <div class="card-body">
                        <div class="text-center">
                            <img src=" {{ Storage::disk('public')->url('customers/'.$customer->photo) }} " alt="" class="rounded-circle img-thumbnail thumb-xl">
                            <div class="online-circle">
                                <i class="fas fa-circle text-success"></i>
                            </div>                                        
                            <h4 class=""> {{ $customer->name }} </h4>                 
                        </div>                                    
                    </div>
                </div>

            </div>
            <div class="col-md-12 col-xl-9">
                
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-0 mb-3">Contact Information</h5>   
                                <ul class="list-unstyled mb-0">
                                <li class=""><i class="mdi mdi-phone mr-2 text-success font-18"></i> <b> phone </b> : {{ $customer->phone }}</li>
                                    <li class="mt-2"><i class="mdi mdi-email-outline text-success font-18 mt-2 mr-2"></i> <b> Address </b> :  {{ $customer->address }} </li>
                                    <li class="mt-2"><i class="mdi mdi-map-marker text-success font-18 mt-2 mr-2"></i> <b>Shopname</b> : {{ $customer->shopname }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src=" {{ asset('assets/backend/plugins/magnific-popup/jquery.magnific-popup.min.js') }} "></script>
<script src=" {{ asset('assets/backend/plugins/dropify/js/dropify.min.js') }} "></script>
@endpush