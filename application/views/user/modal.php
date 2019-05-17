<div
	class="modal fade"
	id="editModal"
	tabindex="-1"
	role="dialog"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button
				type="button"
				class="close mt-3"
				data-dismiss="modal"
				aria-label="Close"
			>
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-body">
				<div class="update-error"></div>

				<form id="editfrm">
					<input type="hidden" name="id" id="userid" />
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Firstname </label>
							<input
								type="text"
								class="form-control"
								id="fname"
								name="firstname"
							/>
						</div>

						<div class="form-group col-md-6">
							<label>Lastname</label>
							<input
								type="text"
								class="form-control"
								id="lname"
								placeholder="Lastname"
								name="lastname"
							/>
						</div>
					</div>
					<div class="form-group">
						<label>Email address</label>
						<input
							type="email"
							class="form-control"
							id="email"
							placeholder="Enter email"
							name="email"
						/>
					</div>
					<div class="custom-control mb-1 custom-checkbox">
						<input
							type="checkbox"
							class="custom-control-input"
							id="customCheck1"
							name = "changePass"
							value='checked'
							checked = ''
						/>
						<label class="custom-control-label" for="customCheck1"
							>Change password</label
						>
					</div>
					<div class="changePassword ">
					<div class="form-group">
						<label>Password</label>
						<input
							type="password"
							class="form-control"
							id="password"
							name="password"
						/>
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input
							type="password"
							class="form-control"
							id="password"
							name="confirm-password"
						/>
					</div>
					</div>

					<button type="submit" id="btn-update" class="btn btn-primary">
						Update
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div
	class="modal fade "
	id="removeModal"
	tabindex="-1"
	role="dialog"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-sm " role="document">
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
				<p>
					Are you sure you want to remove
					<strong id="delEmail"></strong>
				</p>
				<form id="delfrm">
					<input type="hidden" id="delId" name="id" />
				</form>

				<div class="modal-footer">
					<a class="btn btn-secondary">Cancel</a>
					<button type="button" id="btn-remove" class="btn btn-outline-danger ">
						Remove
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
