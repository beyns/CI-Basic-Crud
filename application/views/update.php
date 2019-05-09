<?php $this->load->view('index.php');?>
<?php $this->load->view('navbar.php');?>
<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-md-5">
			<?php echo form_open('home') ?>

			<form>
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
                <button type="submit" class="btn btn-primary">UPDATE</button>
			</form>

			<?php echo form_close()?>
		</div>
	</div>
</div>
