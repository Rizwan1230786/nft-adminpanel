@extends('admin/contentLayoutMaster')

@section('title', 'Customer List')

@section('vendor-style')
    {{-- Page Css files --}}
    <!-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}"> -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
    <style>
        table {
            counter-reset: section;
        }

        .count:before {
            counter-increment: section;
            content: counter(section);
        }

        .dropdown-item1 {
            display: block;
            width: 100%;
            padding: 1.65rem 1.28rem;
            clear: both;
            font-weight: 400;
            color: #6e6b7b;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;

        }
    </style>
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Customers list</h4>
                </div>
                <div class="table-responsive width-95-per mx-auto">
                    <div class="dt-buttons float-end" style="margin-left: 20px; margin-top: 14px;">
                        <button class="dt-button add-new btn btn-success waves-effect waves-float waves-light"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button"
                            onclick="window.location.href='/admin/create/customer'">
                            <span>Add New</span>
                        </button>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone#</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client as $clients)
                                <tr>
                                    <td class="count"></td>
                                    <td><img src="{{ asset('uploads/seller-profile/' . $clients->image) }}" width="50" height="50"
                                        style="border-radius:10px;" alt=""></td>
                                    <td>{{ $clients->firstname . ' ' . $clients->lastname }}</td>
                                    <td>{{ $clients->email }}</td>
                                    <td>{{ $clients->phoneno }}</td>
                                    <td>
                                        <div>
                                            <div class="form-check form-switch form-check-success">
                                                <input name="status" type="checkbox" class="form-check-input toggle-class"
                                                    id="customSwitch1" data-id="{{ $clients->id }}"
                                                    {{ $clients->status ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="d-flex">
                                        <div>
                                            <a class="dropdown-item1" href="/admin/edit/customer/{{ $clients->id }}">
                                                <i data-feather="edit" class="font-medium-2 text-body me-50"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <button class="btn btn-flat btn-sm remove-user dropdown-item1"
                                                data-id="{{ $clients->id }}"
                                                data-action="{{ url('/customer/delete', $clients->id) }}"
                                                onclick="deleteConfirmation({{ $clients->id }})">
                                                <i data-feather="trash" class="font-medium-2 text-body me-50"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js
"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js
"></script>
<script src="{{ asset('swal/sweetalert.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            select: true
        });
    });
</script>
<script type="text/javascript">
    function deleteConfirmation(id) {
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then(function(e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/customer/delete') }}/" + id,
                    data: {
                        _token: CSRF_TOKEN
                    },
                    dataType: 'JSON',
                    success: function(results) {

                        if (results.status === true) {
                            swal.fire({
                                title: "Done",
                                icon: 'success',
                                text: "Data Deleted Successfully",
                                type: "success"
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            swal.fire({
                                title: "Ops...",
                                icon: 'error',
                                text: "Somthing Went Wrong",
                                type: "error"
                            }).then(function() {
                                location.reload();
                            });
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function(dismiss) {
            return false;
        })
    }
</script>
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/admin/customer/status',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Status Changed',
                            showConfirmButton: false,
                            timer: 1100
                        });
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Status can not be Changed',
                            showConfirmButton: false,
                            timer: 1100
                        }).then(function() {
                            location.reload();
                        });
                    }
                }
            });
        })
    })
</script>
