@extends('admin/contentLayoutMaster')
@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($permission->id) && $permission->id != 0) { ?>
            <h4 class="card-title">Update {{$roles->name ?? ''}} permission</h4>

          <?php } else { ?>
            <h4 class="card-title">Add new permission</h4>
          <?php }
          ?>
          <a href="{{url('admin/permission/list')}}" class="btn btn-light me-1">
              <span class="icon">
                <i data-feather="arrow-left"></i>
                Back
              </span>
          </a>
        </div>
        <div class="card-body">
          <?php
          if (isset($permission->id) && $permission->id != 0) {
            $url = url('/admin/permission/update/' . $permission->id);
          } else {
            $url = url('/admin/permission/add');
          }
          ?>
          <form class="form form-horizontal formSubmited validationForm" action="{{ url($url)}}" method="post">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-8 offset-2">
                    <input type="text" class="form-control" name="name" value="{{$permission->name ?? ''}}" placeholder="Permission" />
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-sm-8 offset-sm-5">
                <?php
                if (isset($permission->id) && $permission->id != 0) { ?>
                  <button type="submit" class="btn btn-success me-1 submit_button">Update</button>
                <?php  } else { ?>
                  <button type="submit" class="btn btn-success me-1 submit_button">Submit</button>
                <?php }
                ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Horizontal form layout section end -->
@endsection
@section('js')
  <!-- Page js files -->
  @include('admin.layouts.templatejquery')
  <script src="{{ asset('js/scripts/theamjquery/permissions/jquery.js') }}"></script>
@endsection