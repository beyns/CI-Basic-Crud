<?php $this->load->view('template/header.php');?>
<?php $this->load->view('template/navbar.php');?>
<?php echo $msg; ?>
<div class="container mt-5">
	<?php
echo $this->session->flashdata('item'); ?>
	<button
		type="button"
		class="btn btn-primary"
		data-toggle="modal"
		data-target="#create"
	>
		Create User
	</button>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Firstname</th>
				<th scope="col">Lastname</th>
				<th scope="col">Email</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
        foreach ($users as $user):
        ?>
			<tr>
				<th scope="row"><?php echo $user->id;?></th>
				<td><?php echo $user->firstname;?></td>
				<td><?php echo $user->lastname;?></td>
				<td><?php echo $user->email;?></td>
				<td>
					<a
						href=""
						class="btn btn-danger"
						data-toggle="modal"
						data-target="#remove"
						>Remove</a
					>
					<a
						href="<?php echo base_url(); ?>/user/edit/<?php echo $user->id; ?>"
						class="btn btn-primary"
						>Edit</a
					>
				</td>

				<div
					class="modal fade"
					id="remove"
					tabindex="-1"
					role="dialog"
					aria-labelledby="exampleModalLabel"
					aria-hidden="true"
				>
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Remove User</h5>
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
								<?php echo form_open('user/remove')?>
								<p>
									Are you sure you want to remove
									<strong><?php echo $user->email;?></strong>
								</p>
								<input
									type="hidden"
									name="id"
									value="<?php echo $user->id;?>"
								/>
								<input
									type="hidden"
									name="email"
									value="<?php echo $user->email;?>"
								/>
								<div class="modal-footer">
									<a
										href="<?php echo base_url('user'); ?>"
										class="btn btn-secondary"
										>Cancel</a
									>
									<button type="submit" class="btn btn-outline-danger">
										Remove
									</button>
								</div>
								<?php echo form_close()?>
							</div>
						</div>
					</div>
				</div>
				<?php
        endforeach;
      ?>
			</tr>
		</tbody>
	</table>

	<div
		class="modal fade"
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
              id="pass"
              placeholder="Password"
						/>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Confirm Password</label>
						<input
							type="password"
							class="form-control"
							name="confirm-password"
              id="c-pass"
              placeholder="Confirm Password"
						/>
					</div>
					<button type="submit" id='btn-submit' class="btn btn-primary">Submit</button>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('template/footer.php');?>
