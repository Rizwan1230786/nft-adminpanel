@extends('admin/contentLayoutMaster')
@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
            <?php
              if(isset($product->id) && $product->id !=0){?>
                <h4 class="card-title">update product</h4>
              <?php  
              }else{?>
                    <h4 class="card-title">add product</h4>
              <?php
              }
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
          <form class="form form-horizontal" action="{{ url($url)}}" method="post">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-8 offset-2">
                    <input type="text" class="form-control" name="name" value="{{$roles->name ?? ''}}" placeholder="Roles" />
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" name="detail" value="{{$roles->name ?? ''}}" placeholder="Roles" />
                    @error('detail')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-sm-8 offset-sm-5">
                <?php
                if (isset($roles->id) && $roles->id != 0) { ?>
                  <button type="submit" class="btn btn-success me-1">Update</button>
                <?php  } else { ?>
                  <button type="submit" class="btn btn-success me-1">Submit</button>
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