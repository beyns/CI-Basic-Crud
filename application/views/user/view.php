
	<?php echo $this->session->flashdata('success'); ?>
	<?php echo $this->session->flashdata('error'); ?>
	<?php
echo $this->session->flashdata('item'); ?>
	<div id="success-message"></div>
	<button type="button" class="btn btn-primary" id="btn-show">
		Create User
	</button>
	
	<table class="display table table-striped table-hover" id="userTable">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Firstname</th>
				<th scope="col">Lastname</th>
				<th scope="col">Email</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
	
	</table>
	<?php $this->load->view('user/modal.php');?>

	<div
		class="modal fade create-modal"
		id="create"
		tabindex="-1"
		role="dialog"
		aria-labelledby="exampleModalLabel"
		aria-hidden="true"
	>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button
						type="button"
						class="close"
						data-dismiss="modal"
						aria-label="Close"
					>
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div id="error-message"></div>

					<form id="frm">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Firstname</label>
								<input
									type="text"
									class="form-control"
									name="firstname"
									id="firstname"
									placeholder="Firstname"
									value=""
								/>
							</div>

							<div class="form-group col-md-6">
								<label for="inputPassword4">Lastname</label>
								<input
									type="text"
									class="form-control"
									name="lastname"
									id="lastname"
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
								id="email"
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
								id="password"
								placeholder="Password"
							/>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Confirm Password</label>
							<input
								type="password"
								class="form-control"
								name="confirm-password"
								placeholder="Confirm Password"
							/>
						</div>
						<button
							type="button"
							id="btn-add"
							class="btn btn-primary"
						>
							Submit
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
