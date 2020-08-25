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

                    <h5 class="mt-0">New Employee</h5>
                    <p class="text-muted font-13 mb-4">Fill up this form for create an employee</p>
                    <form id="createEmployee" action=" {{ route('admin.employee.update',$employee->id) }} " method="POST" enctype="multipart/form-data" class="was-validated">
                        @csrf
                        @method('PUT')
                        <h3>Employeer Details</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-form-label">Full name</label>
                                        <div class="col-lg-9">
                                            <input id="name" name="name" type="text" class="form-control" required value=" {{ $employee->name }} ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="phone" class="col-lg-3 col-form-label">Mobile No.</label>
                                        <div class="col-lg-9">
                                            <input id="phone" name="phone" type="number" class="form-control" required value="{{ $employee->phone }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="age" class="col-lg-3 col-form-label">Age</label>
                                        <div class="col-lg-9">
                                            <input id="age" name="age" type="number" class="form-control" required value="{{ $employee->age }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="email" class="col-lg-3 col-form-label">Email Address</label>
                                        <div class="col-lg-9">
                                            <input type="email" id="email" name="email" class="form-control" required value="{{ $employee->email }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="address" class="col-lg-3 col-form-label">Address</label>
                                        <div class="col-lg-9">
                                            <textarea id="address" name="address" rows="4" class="form-control" required >{{ $employee->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="experience" class="col-lg-3 col-form-label">Experience</label>
                                        <div class="col-lg-9">
                                            <textarea id="experience" name="experience" rows="4" class="form-control" required >{{ $employee->experience }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="birth_date" class="col-lg-3 col-form-label">Birth Date</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="date" id="birth_date" name="birth_date" required value="{{ $employee->birth_date }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="hired_date" class="col-lg-3 col-form-label">Hired Date</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="date" id="hired_date" name="hired_date" required value="{{ $employee->hired_date }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="national_id" class="col-lg-3 col-form-label">National ID</label>
                                        <div class="col-lg-9">
                                            <input id="national_id" name="national_id" type="number" class="form-control" required value="{{ $employee->national_id }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="department_name" class="col-lg-3 col-form-label">Department name</label>
                                        <div class="col-lg-9">
                                            <input id="department_name" name="department_name" type="text" class="form-control" required value="{{ $employee->department_name }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="designation" class="col-lg-3 col-form-label">Designation</label>
                                        <div class="col-lg-9">
                                            <input id="designation" name="designation" type="text" class="form-control" required value="{{ $employee->designation }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="salary" class="col-lg-3 col-form-label">Salary</label>
                                        <div class="col-lg-9">
                                            <input id="salary" name="salary" type="text" class="form-control" required value="{{ $employee->salary }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="yearly_holiday" class="col-lg-3 col-form-label">Yearly Holiday</label>
                                        <div class="col-lg-9">
                                            <input id="yearly_holiday" name="yearly_holiday" type="text" class="form-control" required value="{{ $employee->yearly_holiday }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h3>Employeer Education</h3>
                        <fieldset>
                            <div class="employee_repeater_field_body">

                                @if (count($employee->educations) > 0)
                                    @foreach ($employee->educations as $education)
                                    <div class="employee_repeater_field">
                                        <div class="form-group row  d-flex align-items-end">
                                            <div class="col-sm-4">
                                                <label class="control-label">Education Level</label>
                                                <select name="education_level" class="form-control">
                                                    <option value="honours" >BSC/Honours</option>
                                                    <option value="hsc">HSC/O Level</option>
                                                    <option value="ssc">SSC/A Level</option>
                                                </select>
                                            </div>
                                
                                            
                                            <div class="col-sm-4">
                                                <label class="control-label">Major</label>
                                            <input type="text" name="major" id="major" class="form-control" value="{{ $education->major }}">
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <label class="control-label">Board</label>
                                                <input type="text" name="board" id="board" class="form-control" value="{{ $education->board }}">
                                            </div>
    
                                            <div class="col-sm-1">
                                            <span data-repeater-delete="" class="btn btn-danger btn-sm">
                                                <span class="fa fa-times"></span> Delete
                                            </span>
                                            </div>
                                        </div>
                                        <div class="form-group row  d-flex align-items-end">
                                            <div class="col-sm-4">
                                                <label for="institute_name" class="control-label">Institute Name</label>
                                                <input type="text" id="institute_name" name="institute_name" class="form-control" value="{{ $education->institute_name }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label" for="cgpa">CGPA</label>
                                                <input type="text" id="cgpa" name="cgpa" class="form-control" value="{{ $education->cgpa }}">
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <label class="control-label">Scale</label>
                                                <input type="text" name=scale_of_cgpa id="scale_of_cgpa" class="form-control" value="{{ $education->scale_of_cgpa }}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row  d-flex align-items-end">
                                            <div class="col-sm-6">
                                                <label for="year_of_passing" class="control-label">Year of Passing</label>
                                                <input type="text" id="year_of_passing" name=year_of_passing class="form-control" value="{{ $education->year_of_passing }}">
                                            </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="duration">Duration</label>
                                                <input type="text" id="duration" name="duration" class="form-control" value="{{ $education->duration }}">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    
                                @endif

                                {{-- <div class="employee_repeater_field">
                                    <div class="form-group row  d-flex align-items-end">
                                        <div class="col-sm-4">
                                            <label class="control-label">Education Level</label>
                                            <select name="education_level" class="form-control">
                                                <option value="honours" selected="">BSC/Honours</option>
                                                <option value="hsc">HSC/O Level</option>
                                                <option value="ssc">SSC/A Level</option>
                                            </select>
                                        </div>
                            
                                        
                                        <div class="col-sm-4">
                                            <label class="control-label">Major</label>
                                            <input type="text" name="major" id="major" class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label class="control-label">Board</label>
                                            <input type="text" name="board" id="board" class="form-control">
                                        </div>

                                        <div class="col-sm-1">
                                        <span data-repeater-delete="" class="btn btn-danger btn-sm">
                                            <span class="fa fa-times"></span> Delete
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group row  d-flex align-items-end">
                                        <div class="col-sm-4">
                                            <label for="institute_name" class="control-label">Institute Name</label>
                                            <input type="text" id="institute_name" name="institute_name" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cgpa">CGPA</label>
                                            <input type="text" id="cgpa" name="cgpa" class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label class="control-label">Scale</label>
                                            <input type="text" name=scale_of_cgpa id="scale_of_cgpa" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row  d-flex align-items-end">
                                        <div class="col-sm-6">
                                            <label for="year_of_passing" class="control-label">Year of Passing</label>
                                            <input type="text" id="year_of_passing" name=year_of_passing class="form-control">
                                        </div>
                                        <div class="col-sm-5">
                                            <label class="control-label" for="duration">Duration</label>
                                            <input type="text" id="duration" name="duration" class="form-control">
                                        </div>
                                        
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-sm-12">
                                    <span class="btn btn-light btn-md fieldRepeater">
                                        <span class="fa fa-plus"></span> Add
                                    </span>
                                </div>
                            </div>                                         
                        </fieldset>
                     
                        <h3>Photo</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="form-group row">
                                        <label for="salary" class="col-lg-3 col-form-label">Photo</label>
                                        <div class="col-lg-9">
                                        <input type="file" name="photo" id="input-file-now" class="dropify" data-default-file="{{ Storage::disk('public')->url('employees/'.$employee->photo) }}" />
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
    
    var form = $("#createEmployee").show();
    
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onFinished: function (event, currentIndex)
        {
            form.submit();
        }
    });
    var itemNo = 1;
    
    function employee_dynamic_field() {
        var html = '<div class="employee_repeater_field">';
            // html += 'added new line<br><span class="btn btn-danger btn-sm fieldRemove"><span class="fa fa-times"></span> Delete</span>';
            html += '<div class="form-group row  d-flex align-items-end"><div class="col-sm-4"><label class="control-label">Education Level</label><select name="education_level[]" class="form-control"><option value="honours" selected="">BSC/Honours</option><option value="hsc">HSC/O Level</option><option value="ssc">SSC/A Level</option></select></div><div class="col-sm-4"><label class="control-label">Major</label><input type="text" name="major[]" id="major" class="form-control"></div><div class="col-sm-3"><label class="control-label">Board</label><input type="text" name="board[]" id="board" class="form-control"></div><div class="col-sm-1"><span class="btn btn-danger btn-sm fieldRemove"><span class="fa fa-times"></span> Delete</span></div></div>';

            html += '<div class="form-group row  d-flex align-items-end"><div class="col-sm-4"><label for="institute_name" class="control-label">Institute Name</label><input type="text" id="institute_name" name="institute_name[]" class="form-control"></div><div class="col-sm-4"><label class="control-label" for="cgpa">CGPA</label><input type="text" id="cgpa" name="cgpa[]" class="form-control"></div><div class="col-sm-3"><label class="control-label">Scale</label><input type="text" name="scale_of_cgpa[]" id="scale_of_cgpa" class="form-control"></div></div>';

            html += '<div class="form-group row  d-flex align-items-end"><div class="col-sm-6"><label for="year_of_passing" class="control-label">Year of Passing</label><input type="text" id="year_of_passing" name="year_of_passing[]" class="form-control"></div><div class="col-sm-5"><label class="control-label" for="duration">Duration</label><input type="text" id="duration" name="duration[]" class="form-control"></div></div>';
            html += '</div>';
            $('.employee_repeater_field_body').append(html);
            
    }
    // employee_dynamic_field();
    $('.fieldRepeater').click(function () {
        employee_dynamic_field();
    });
    $(document).on('click','.fieldRemove',function(e) {
        $(this).closest('.employee_repeater_field').remove();
    });

</script>
@endpush