<!-- Add Permission Modal -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-sm-5 pb-5">
        <div class="text-center mb-2">
          <?php if (isset($permission->id) && $permission->id != 0) { ?>
              <h4 class="card-title">Update {{$permission->name ?? ''}} Permission</h4>
            <?php } else { ?>
              <h1 class="mb-1">Add New Permission</h1>
              <p>Permissions you may use and assign to your users.</p>
              <?php }
            ?>
        </div>
        <?php
            if (isset($permission->id) && $permission->id != 0) {
              $url = url('/admin/permission/update/' . $permission->id);
            } else {
              $url = url('/admin/permission/add');
            }
            ?>
        <form id="addPermissionForm" action="{{url($url)}}" method="post" class="row formSubmited validationForm">
          @csrf
          <div class="col-12">
            <label class="form-label" for="modalPermissionName">Permission Name</label>
            <input
              type="text"
              id="modalPermissionName"
              name="name"
              class="form-control"
              placeholder="Permission Name"
              autofocus
              data-msg="Please enter permission name"
            />
          </div>
          <div class="col-12 text-center">
           <?php if (isset($permission->id) && $permission->id != 0) { ?>
            <button type="submit" class="btn btn-success mt-2 me-1 submit_button">Update Permission</button>
              <button type="button" id="destroy" class="btn btn-outline-secondary mt-2" data-dismiss="modal" aria-label="Close">
                Discard
              </button>
            <?php  } else { ?>
              <button type="submit" class="btn btn-success mt-2 me-1 submit_button">Create Permission</button>
              <button type="button" id="destroy" class="btn btn-outline-secondary mt-2" data-dismiss="modal" aria-label="Close">
                Discard
              </button>
              <?php }
              ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add Permission Modal -->
