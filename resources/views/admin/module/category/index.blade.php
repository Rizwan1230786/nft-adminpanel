@extends('admin/contentLayoutMaster')

@section('title', 'Blog List')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
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
</style>
    <!--Filter Form  -->
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categories</h4>
                </div>
                <div class="table-responsive width-95-per mx-auto">
                    <div class="dt-buttons float-end" style="margin-left: 20px; margin-top: 14px;">
                        <button class="dt-button add-new btn btn-success waves-effect waves-float waves-light" tabindex="0"
                            aria-controls="DataTables_Table_0" type="button"
                            onclick="window.location.href='/admin/category-create'">
                            <span>Add New</span>
                        </button>
                    </div>
                    <table class="table datatable table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                                <tr>
                                <td class="count"></td>
                                    <td title="{{ $data->name }}">{{Str::limit($data->name, 20)}}</td>
                                    <td><img src="{{ asset('images/category/'.$data->image) }}" width="50" height="50" style="border-radius:10px;" alt=""></td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="form-check form-switch form-check-success">
                                                <input name="is_publish" type="checkbox"
                                                    class="form-check-input toggle-class" id="customSwitch1"
                                                    data-id="{{ $data->id }}"
                                                    {{ $data->status ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="d-flex">
                                        <div>
                                            <a class="dropdown-item" href="/admin/edit/category/{{ $data->id }}">
                                                <i data-feather="edit" class="font-medium-2 text-body me-50"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <button class="btn btn-flat btn-sm remove-user dropdown-item" data-id="{{ $data->id }}"
                                                data-action="{{ url('/blog/category_delete', $data->id) }}"
                                                onclick="deleteConfirmation({{ $data->id }})">
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
          url: "{{url('admin/category/delete')}}/" + id,
          data: {
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            swal.fire({
              title: "Done",
              icon: 'success',
              text: "Data Deleted Successfully",
              type: "success"
            }).then(function() {
              location.reload();
            });
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
        url: '/admin/category/status',
        data: {
          'status': status,
          'id': id
        },
        success: function(data) {
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Status Changed',
            showConfirmButton: false,
            timer: 1100
          });
        }
      });
    })
});
</script>
