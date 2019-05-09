<?php $this->load->view('template/header.php');?>
<div class="container">
	<div class="row justify-content-center mt-5">

		<div class="col-md-5">
		<?php echo validation_errors('<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong></strong>',
'</div>'); ?>
			<?php echo form_open('user/update') ?>
			<form>
            <input
							type="hidden"
							class="form-control"
							name="id"
                            placeholder="Email"
                            value="<?php echo $users['id']?>"
                        />
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">Firstname</label>
						<input
							type="text"
							class="form-control"
							name="firstname"
                            placeholder="Email"
                            value="<?php echo $users['firstname']?>"
                        />
                        
                        
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Lastname</label>
						<input
							type="text"
							class="form-control"
							name="lastname"
                            placeholder="Lastname"
                            value="<?php echo $users['lastname']?>"
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
                        value="<?php echo $users['email']?>"
					/>
					<small id="emailHelp" class="form-text text-muted"
						>We'll never share your email with anyone else.</small
					>
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
                <button type="submit" class="btn btn-primary">Update</button>
			</form>

			<?php echo form_close()?>
		</div>
	</div>
</div>
<?php $this->load->view('template/footer.php');?>
