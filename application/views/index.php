<?php $this->load->view('template/header.php');?>
<?php $this->load->view('template/navbar.php');?>

<div class="container">
<?php
        $user = $this->session->userdata('users');
        if($user){
          extract($user);
        }
?>
  <div class="jumbotron mt-5">
    <h1 class="display-3">Hello, world! <?php echo isset($firstname) ? $firstname : 'Guest'; ?></h1>
    <hr class="my-4">

    <?php if($user): ?>

      <p class="lead">
        <a href="<?php echo base_url('logout'); ?>" class="btn btn-primary btn-lg" href="#" role="button">Logout</a>
      </p>

    <?php else: ?>

      <p class="lead">
        <a href="<?php echo base_url('login'); ?>" class="btn btn-primary btn-lg" href="#" role="button">Login</a>
      </p>

    <?php endif; ?>

  </div>
</div>

<?php $this->load->view('template/footer.php');?>

