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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
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
                            <img src=" {{ Storage::disk('public')->url('employees/'.$employee->photo) }} " alt="" class="rounded-circle img-thumbnail thumb-xl">
                            <div class="online-circle">
                                <i class="fas fa-circle text-success"></i>
                            </div>                                        
                            <h4 class=""> {{ $employee->name }} </h4>
                            <p class="text-muted font-12">{{ $employee->designation }}</p>
                            <span class="btn btn-pink btn-round px-5">{{ $employee->department_name }} Department</span>
                                                                
                        </div>                                    
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mt-0 mb-3">Others Information</h5>   
                        <ul class="list-unstyled mb-0">
                            <li class=""> <b> National ID </b> : {{ $employee->national_id }}</li>
                            <li class=""> <b> Age </b> : {{ $employee->age }}</li>
                            <li class="mt-2"> <b> Birth Date </b> : {{ date('F d, Y', strtotime($employee->birth_date)) }} </li>
                            <li class="mt-2"> <b>Hired Date</b> : {{ date('F d, Y', strtotime($employee->hired_date)) }}</li>
                            <li class="mt-2"> <b>Salary</b> : {{$employee->salary }}</li>
                            <li class="mt-2"> <b>Yearly Holiday</b> : {{ $employee->yearly_holiday }}</li>
                        </ul>
                    </div>
                </div>
                  
                

            </div>
            <div class="col-md-12 col-xl-9">
                <div class="card">                                       
                    <div class="card-body"> 
                        <h5 class="mt-0">Experience</h5>
                        <p class="text-muted font-14">
                            {{ $employee->experience }}
                        </p>
                    </div>
                </div>
                <h5 class="mt-0">Education</h5>
                <div class="row">
                    @if (count($employee->educations) > 0)
                        @foreach ($employee->educations as $education)
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="mb-0">{{ $education->education_level }}</h5>
                                            <small class="text-muted">{{ $education->major }}</small>
                                        </div>
                                    </div> 
                                    <div class="mt-3">
                                        <p class="mb-0 font-13">CGPA : <span class="text-muted">{{ $education->cgpa }}</span> </p>
                                        <p class="mb-0 font-13">Scale : <span class="text-muted">{{ $education->scale_of_cgpa }}</span> </p>
                                        <p class="mb-0 font-13">Year of Passing : <span class="text-muted">{{ $education->year_of_passing }}</span> </p>
                                        <p class="mb-0 font-13">Institute Name : <span class="text-muted">{{ $education->institute_name }}</span> </p>
                                        <p class="mb-0 font-13">Board : <span class="text-muted">{{ $education->board }}</span> </p>
                                    </div>                                                   
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>Education field empty!</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-0 mb-3">Contact</h5>   
                                <ul class="list-unstyled mb-0">
                                <li class=""><i class="mdi mdi-phone mr-2 text-success font-18"></i> <b> phone </b> : {{ $employee->phone }}</li>
                                    <li class="mt-2"><i class="mdi mdi-email-outline text-success font-18 mt-2 mr-2"></i> <b> Email </b> :  {{ $employee->email }} </li>
                                    <li class="mt-2"><i class="mdi mdi-map-marker text-success font-18 mt-2 mr-2"></i> <b>Location</b> : {{ $employee->address }}</li>
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