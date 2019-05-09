<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open('register/create') ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Firstname</label>
            <input
                type="text"
                class="form-control"
                name="firstname"
                placeholder="Email"
            />
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Lastname</label>
            <input
                type="text"
                class="form-control"
                name="lastname"
                placeholder="Lastname"
            />
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input
            type="email"
            class="form-control"
            name="email"
            placeholder="Enter email"
        />
        <small id="emailHelp" class="form-text text-muted"
            >We'll never share your email with anyone else.</small
        >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input
            type="password"
            class="form-control"
            name="password"
            placeholder="Password"
        />
    </div>
    <!-- <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input
            type="password"
            class="form-control"
            name="confirm-password"
            placeholder="Confirm Password"
        />
    </div> -->
    <button type="submit" class="btn btn-primary">Submit</button>

<?php echo form_close()?>
      </div>
    </div>
  </div>
</div>