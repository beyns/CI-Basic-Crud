<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
        $user = $this->session->userdata('users');
        if($user){
          extract($user);
        }
?>
  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
     
    <?php if($user): ?>
    <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
  </li>
    <li class="nav-item ">
    <a class="nav-link" href="<?php echo base_url('user'); ?>">User</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link" href="<?php echo base_url('user'); ?>">Shopping Cart</a>
  </li>


<?php else: ?>
<li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
  </li>
<?php endif; ?>

    
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <?php echo isset($firstname) ? $firstname : 'Guest'; ?>
    </form>
  </div>
</nav>

 