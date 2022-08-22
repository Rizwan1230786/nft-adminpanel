@extends('admin/contentLayoutMaster')

@section('title', 'User List')

@section('vendor-style')
{{-- Page Css files --}}
<!-- CSS only -->
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
<!-- Basic Tables start -->
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Nfc Request</h4>
          <div>
            <a href="/admin/pdfreport"><button class="btn btn-light">Weekly Report</button></a>
            <a href="/admin/monthly_pdfreport"><button class="btn btn-light">Monthly Report</button></a>
          </div>
      </div>
      <div class="table-responsive width-95-per mx-auto">
        <div class="dt-buttons float-end"  style="margin-left: 20px; margin-top: 14px;">
          
        </div>
        <table class="table datatable">
          <thead>
            <tr>
              <th>Id</th>
              <th>name</th>
              <th>email</th>
              <th>contact</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user as $data)
            <tr>
              <td class="count"></td>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->contact}}</td>
              <td class="d-flex">
                <div>
                  <a class="dropdown-item editpermission view_details"  data-toggle="modal" data-target="#detail_modal" data-id="{{ $data->id }}">
                     <i data-feather="file" class="font-medium-2 text-body me-50"></i>
                  </a>
                </div>
                <div>
                  <button class="btn btn-flat btn-sm remove-user" style="margin-top:2px;" data-id="{{ $data->id }}" data-action="{{ url('/users/delete',$data->id) }}" onclick="deleteConfirmation({{$data->id}})">
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
<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detail_modal">Customer Detail</h5>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('vendor-script')
{{-- Vendor js files --}}
<!-- JavaScript Bundle with Popper -->
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js
"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js
"></script>
<script src="{{asset('swal/sweetalert.js')}}"></script>
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
          url: "{{url('admin/NfcRequest/delete')}}/" + id,
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
<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $(document).on("click", ".view_details", function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var url = "{{url('admin/NfcRequest/detail')}}";
          $.ajax({
            type: 'POST',
            url: url,
            data:{'id':id},
            async:false,
            success: function(data) {
            $('#detail_modal').modal('show');
            $("#detail_modal .modal-body").html(data);
            }
        });
    });
    $('#close').on("click",function(){
      $('#detail_modal').modal('hide');
    })
  });
</script>