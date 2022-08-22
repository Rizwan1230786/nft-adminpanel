
        <?php if (isset($permission->id) && $permission->id != 0) { ?>
            <h1 class="mb-1">Update Permission</h1>
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
              value="{{$permission->name ?? ''}}"
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

