@extends('admin.layout.master')

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href=" {{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" /> 
    
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
                        <li class="breadcrumb-item"><a href=" {{ route('admin.customers.index') }} ">Customers</a></li>
                        <li class="breadcrumb-item active">All</li>
                    </ol>
                </div>
                <h4 class="page-title">Customers</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{-- {{ $employee }} --}}
                    <h5 class="mt-0" style="text-align: right"><a href=" {{ route('admin.customers.create') }} " class="btn btn-soft-success btn-sm"><i class="mdi mdi-account-multiple-plus"></i> Create Customer</a></h5>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                            <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Shopname</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @if (isset($customers) && count($customers) > 0)
                                    
                                    @foreach ($customers as $key => $customer)    
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $customer->name }} </td>
                                            <td> {{ $customer->phone }} </td>
                                            <td> {{ $customer->address }} </td>
                                            <td>{{ $customer->shopname }}</td>
                                            <td>
                                                <a href="{{ route('admin.customers.edit',$customer->id) }}"><span class="btn btn-soft-warning btn-sm"><i class="mdi mdi-table-edit"></i></span></a>
                                                <button onclick="deleteCustomer({{ $customer->id }})" class="btn btn-soft-danger btn-sm "><i class="mdi mdi-delete-forever"></i></button>
                                                <form action="{{ route('admin.customers.destroy',$customer->id) }}" method="post"
                                                    style="display: none" id="delete-form-{{ $customer->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            <a href="{{ route('admin.customers.show',$customer->id) }}"><span class="btn btn-soft-info btn-sm"><i class="mdi mdi-eye"></i></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end container-fluid --}}
@endsection

@push('js')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src=" {{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.js') }} "></script>
    <!-- Datatable init js -->
    <script src=" {{ asset('assets/backend/pages/jquery.table-datatable.js') }} "></script> 
    <script type="text/javascript">
        // (function ($) {
        //     $(document).ready(function () {
        //         $("#customerDataTable").DataTable({
        //             'paging'      : true,
        //             'lengthChange': false,
        //             'searching'   : true,
        //             'ordering'    : true,
        //             'info'        : true,
        //             'autoWidth'   : true
        //         });
        //     });
        // })(jQuery);

        function deleteCustomer(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'This user data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush