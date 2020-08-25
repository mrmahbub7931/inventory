@extends('admin.layout.master')

@push('css')
    <!--Form Wizard-->
    <link rel="stylesheet" href=" {{ asset('assets/backend/plugins/jquery-steps/jquery.steps.css') }} ">
    <!-- Dropzone css -->
    <link href=" {{ asset('assets/backend/plugins/dropzone/dist/dropzone.css') }} " rel="stylesheet" type="text/css">
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
                        <li class="breadcrumb-item"><a href=" {{ route('admin.employee.index') }} ">Employees</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <h4 class="page-title">Employees</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="mt-0">New Customer</h5>
                    <p class="text-muted font-13 mb-4">Fill up this form for create an Customer</p>
                    <form id="createCustomer" action=" {{ route('admin.customers.store') }} " method="POST" enctype="multipart/form-data" class="was-validated">
                        @csrf
                        <h3>Customers Details</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-form-label">Full name</label>
                                        <div class="col-lg-9">
                                            <input id="name" name="name" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="phone" class="col-lg-3 col-form-label">Mobile No.</label>
                                        <div class="col-lg-9">
                                            <input id="phone" name="phone" type="number" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="address" class="col-lg-3 col-form-label">Address</label>
                                        <div class="col-lg-9">
                                            <textarea id="address" name="address" rows="4" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="experience" class="col-lg-3 col-form-label">Shopname</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="shopname" id="shopname" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </fieldset>
                        <h3>Photo</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="form-group row">
                                        <label for="photo" class="col-lg-3 col-form-label">Photo</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="photo" id="input-file-now" class="dropify" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    
                </div>
            </div>
        </div>
    </div><!--end row-->
    {{-- end form wizard --}}
</div>
{{-- end container-fluid --}}
@endsection

@push('js')
<script src=" {{ asset('assets/backend/plugins/jquery-steps/jquery.steps.min.js') }} "></script>
<script src=" {{ asset('assets/backend/pages/jquery.form-wizard.init.js') }} "></script>
<!-- Parsley js -->
<script src=" {{ asset('assets/backend/plugins/parsleyjs/parsley.min.js') }} "></script>
<script src=" {{ asset('assets/backend/pages/jquery.form-validation.init-.js') }} "></script>
<!-- Dropzone js -->
<script src=" {{ asset('assets/backend/plugins/dropzone/dist/dropzone.js') }} "></script>
<script src=" {{ asset('assets/backend/plugins/dropify/js/dropify.min.js') }} "></script>
<script src=" {{ asset('assets/backend/pages/jquery.dropzone.init.js') }} "></script> 
<script>
    var form = $("#createCustomer").show();
    
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onFinished: function (event, currentIndex)
        {
            form.submit();
        }
    });
</script>
@endpush