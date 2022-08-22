@extends('admin/contentLayoutMaster')
@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($roles->id) && $roles->id != 0) { ?>
            <h4 class="card-title">Update {{$roles->name ?? ''}} roles</h4>

          <?php } else { ?>
            <h4 class="card-title">Add new roles</h4>
          <?php }
          ?>
          <a href="{{url('admin/role-list')}}" class="btn btn-light me-1">
              <span class="icon">
                <i data-feather="arrow-left"></i>
                Back
              </span>
          </a>
        </div>
        <div class="card-body">
          <?php
          if (isset($roles->id) && $roles->id != 0) {
            $url = url('/admin/roles/add/' . $roles->id);
          } else {
            $url = url('/admin/roles/add');
          }
          ?>
          <form class="form form-horizontal formSubmited validationForm" action="{{ url($url)}}" method="post">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-8 offset-2">
                    <input type="text" class="form-control" name="name" value="{{$roles->name ?? ''}}" placeholder="Roles Name" />
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <?php
                  if(isset($roles->id) && $roles->id !=0){?>
                      <div class="form-group row">
                             <strong style="margin-bottom: 15px; margin-top: 10px;">Assign Permission:
                              <input class="name" style="margin-left:11px; position:absolute; left:153px; top:145px;" type="checkbox" id="selectAll" />
                              <label class="form-check-label" style="margin-left: 18px;" for="selectAll"> Select All </label>
                             </strong>
                            <br/>
                            @foreach($permission as $value)
                                <label class="col-md-3">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach  
                        </div>
                    <?php
                  }else{?>
                      <div class="form-group row">
                        <strong style="margin-bottom: 15px; margin-top: 10px;">Assign Permission:
                          <input class="name" style="margin-left:11px; position:absolute; left:153px; top:145px;" type="checkbox" id="selectAll" />
                          <label class="form-check-label" style="margin-left: 18px;" for="selectAll"> Select All </label>
                       </strong>
                        <br/>
                        @foreach($permission as $value)
                            <label class="col-md-3">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
                      </div>
                <?php
                  }
                  ?>
              </div>
              <div class="col-sm-8 offset-sm-5">
                <?php
                if (isset($roles->id) && $roles->id != 0) { ?>
                  <button style="margin-top: 30px;" type="submit" class="btn btn-success me-1 submit_button">Update</button>
                <?php  } else { ?>
                  <button style="margin-top: 30px;" type="submit" class="btn btn-success me-1 submit_button">Submit</button>
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
    @include('admin.layouts.templatejquery')
    <script src="{{ URL::asset('js/scripts/theamjquery/roles/jquery.js') }}"></script>
@endsection