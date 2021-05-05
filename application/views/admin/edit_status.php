<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-md-6">

			<form action="<?= base_url('admin/edit_status') ?>" method="post">

				<h1 class="mb-5" style="color: grey;text-align: center">Update Status by Admin</h1>

				<div class="card">
					<div class="card-header" style="background-color: grey;color: white"><?= $laundry["kode_transaksi"] ?> a/n <?= $laundry["nama"] ?></div>

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

							<input type="hidden" name="id" id="id" value="<?= $laundry["id"] ?>">

							<select class="custom-select" name="status_cucian" id="status_cucian">

								<option value="<?= $laundry["status_cucian"] ?>"><?= $laundry["status_cucian"] ?></option>
								<option value="Pencucian Laundry">Pencucian Laundry</option>
								<option value="Laundry Selesai">Laundry Selesai</option>

							</select>

						</div>

					</div> <!-- card body -->

				</div> <!-- card -->

				<button type="submit" class="btn btn-primary form-control mt-3" style="box-shadow: 5px 10px 30px grey;margin-bottom: 100px">Update</button>

			</form>
		</div>

	</div>
</div>