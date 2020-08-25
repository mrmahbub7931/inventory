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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Suppliers</a></li>
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
                            <img src=" {{ Storage::disk('public')->url('suppliers/'.$supplier->photo) }} " alt="" class="rounded-circle img-thumbnail thumb-xl">
                            <div class="online-circle">
                                <i class="fas fa-circle text-success"></i>
                            </div>                                        
                            <h4 class=""> {{ $supplier->name }} </h4>
                            <p class="text-muted font-12">{{ $supplier->type }}</p>
                            <span class="btn btn-pink btn-round px-5">{{ $supplier->shopname }}</span>
                        </div>                                    
                    </div>
                </div>
                  
                

            </div>
            <div class="col-md-12 col-xl-9">
                
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-0 mb-3">Contact</h5>   
                                <ul class="list-unstyled mb-0">
                                <li class=""><i class="mdi mdi-phone mr-2 text-success font-18"></i> <b> phone </b> : {{ $supplier->phone }}</li>
                                    <li class="mt-2"><i class="mdi mdi-email-outline text-success font-18 mt-2 mr-2"></i> <b> Email </b> :  {{ $supplier->email }} </li>
                                    <li class="mt-2"><i class="mdi mdi-map-marker text-success font-18 mt-2 mr-2"></i> <b>Location</b> : {{ $supplier->address }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-0 mb-3">Others Information</h5>   
                                <ul class="list-unstyled mb-0">
                                <li class="mt-2"> <b> Account name </b> :  {{ $supplier->account_name }} </li>
                                <li class="mt-2"> <b> Account number </b> :  {{ $supplier->account_number }} </li>
                                <li class="mt-2"> <b> Bank name </b> :  {{ $supplier->bank_name }} </li>
                                <li class="mt-2"> <b> Branch name </b> :  {{ $supplier->branch_name }} </li>
                                <li class="mt-2"> <b> Routing number </b> :  {{ $supplier->routing_number }} </li>
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