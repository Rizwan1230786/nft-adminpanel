@extends('admin/contentLayoutMaster')

@section('title', 'User List')

@section('vendor-style')
{{-- Page Css files --}}
<!-- CSS only -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <h4 class="card-title">Permission's</h4>
      </div>
      <div class="table-responsive width-95-per mx-auto">
        <div class="dt-buttons float-end"  style="margin-left: 20px; margin-top: 14px;">
          <button class="dt-button add-new btn btn-success" data-toggle="modal" data-target="#addPermissionModal" tabindex="0" aria-controls="DataTables_Table_0" type="button">
            <span>Add New</span>
          </button>
        </div>
        <table class="table datatable table-bordered">
          <thead>
            <tr>
              <th>Id</th>
              <th>name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($assign as $data)
            <tr>
              <td class="count"></td>
              <td>{{$data->name}}</td>
              <td class="d-flex">
                <div>
                   <a class="dropdown-item"  href="/admin/permission/edit/{{$data->id}}">
                      <i data-feather="edit" class="font-medium-2 text-body me-50"></i>
                   </a>
                </div>
                <div>
                  <button class="btn btn-flat btn-sm remove-user dropdown-item" data-id="{{ $data->id }}" data-action="{{ url('/users/delete',$data->id) }}" onclick="deleteConfirmation({{$data->id}})">
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
@include('admin.module.permission.modal-add-permission')
@endsection

@section('vendor-script')
{{-- Vendor js files --}}
<!-- JavaScript Bundle with Popper -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
          url: "{{url('admin/permission/delete')}}/" + id,
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
        url: '/admin/status',
        data: {
          'status': status,
          'id': id
        },
        success: function(data) {
          if(data.status==true){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Status Changed',
            showConfirmButton: false,
            timer: 1100
          });
          }else{
            Swal.fire({
            position: 'top-end',
            icon: 'success',
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
  // $(document).on("click", ".createmodal", function(event){
  //       event.preventDefault();
  //       var id = $(this).data('id');
  //       var url = "{{url('admin/permission/create')}}";
  //       alert(url)
  //         $.ajax({
  //           type: 'GET',
  //           url: url,
  //           data:{'id':id},
  //           async:false,
  //           success: function(data) {
  //            $('#addPermissionModal').modal('show');
  //            $("#addPermissionModal .modal-body").html(data);
  //           }
  //       });
  //   });
</script>
@section('js')
@include('admin.layouts.templatejquery')
  <script src="{{ asset('js/scripts/theamjquery/permissions/jquery.js') }}"></script>
@endsection
  <!-- <script>
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
      $(document).on("click", ".editpermission", function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var url = "{{url('admin/permission/edit')}}/" +id;
          $.ajax({
            type: 'POST',
            url: url,
            data:{'id':id},
            async:false,
            success: function(data) {
             $('#addPermissionModal').modal('show');
             $("#addPermissionModal .modal-body").html(data);
            }
        });
    });
    $('#destory').on('click' , function(){
      $('#exampleModalCenter').modal('hide');
    })
  </script>  -->
