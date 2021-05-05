<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-md-6">

			<form action="<?= base_url('admin/edit_user') ?>" method="post">

				<h1 class="mb-5" style="color: grey;text-align: center">Update User by Admin</h1>

				<div class="card">
					<div class="card-header" style="background-color: grey;color: white"><?= $idUser["nama"] ?></div>

					<div class="card-body">

						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors(); ?>
							</div>
						<?php endif; ?>

						<?php if ($this->session->flashdata()) : ?>
							<div class="row mt-2">
								<div class="col-md-12">
									<div class="alert alert-info alert-dismissible fade show" role="alert">
										<strong><?= $this->session->flashdata('message'); ?></strong>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<div class="form-group">

							<!-- id -->
							<input type="hidden" name="id" id="id" value="<?= $idUser["id"] ?>">

							<!-- role -->
							<label for="role">Role</label>
							<select class="custom-select" name="role" id="role">

								<option value="<?= $idUser["role_id"] ?>"><?= $idUser["role_id"] ?></option>
								<option value="2">Member (2)</option>
								<option value="3">Kurir (3)</option>

							</select>

							<div class="alert alert-info mt-2">
								<strong>Kode Role</strong>
								<ul>
									<li>Kode Member : 2</li>
									<li>Kode Kurir : 3</li>
								</ul>
							</div>
							<!-- end role -->


							<!-- aktifasi -->
							<!-- <label for="aktifasi" class="mt-2">Aktifasi</label>
						<select class="custom-select" name="aktifasi" id="aktifasi">

							<option value="<?= $idUser["is_active"] ?>"><?= $idUser["is_active"] ?></option>
							<option value="0">Belum Aktifasi (0)</option>
							<option value="1">Aktifasi (1)</option>

						</select>

						<div class="alert alert-info mt-2">
							<strong>Kode Aktifasi</strong>
							<ul>
								<li>Belum Aktif : 0</li>
								<li>Status Aktif : 1</li>
							</ul>
						</div> -->
							<!-- end aktifasi -->

						</div>

					</div> <!-- card body -->

				</div> <!-- card -->

				<button type="submit" class="btn btn-primary form-control mt-3" style="box-shadow: 5px 10px 30px grey;margin-bottom: 100px">Update</button>

			</form>
		</div>

	</div>
</div>