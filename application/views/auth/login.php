<?php $this->load->view('template/header.php');?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
        <?php echo validation_errors('<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong></strong>',
'</div>'); ?>

<?php echo $this->session->flashdata('error'); ?>

        <?php echo form_open('login') ?>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <?php echo form_close() ?>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer.php');?>

