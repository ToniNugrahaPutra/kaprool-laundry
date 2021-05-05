<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-md-6">
			
			<form action="<?= base_url('kurir/payment') ?>" method="post">

			<h1 class="mb-5" style="color: grey;text-align: center">Payment by Kurir</h1>

			<div class="card">  	
			  	<div class="card-header" style="background-color: grey;color: white">Payment</div>

			  	<div class="card-body">

			  		<?php if(validation_errors()) : ?>
				  		<div class="alert alert-danger" role="alert">
				  			<?= validation_errors(); ?>
						</div>
					<?php endif; ?>

					<?php if($this->session->flashdata()): ?>
                    <div class="row mt-2">
	                    <div class="col-md-12">
	                        <div class="alert alert-info alert-dismissible fade show" role="alert">
	                          <strong><?= $this->session->flashdata('message'); ?></strong>
	                        </div>
	                      </div>
	                    </div>  
            		<?php endif; ?>

				    <div class="form-group">

				    	<input type="hidden" name="id" value="<?= $laundry["id"] ?>">

				    	<select class="custom-select" name="status_pembayaran" id="status_pembayaran">

							<option value="<?= $laundry["status_pembayaran"] ?>"><?= $laundry["status_pembayaran"] ?></option>
							<option value="Belum Bayar">Belum Bayar</option>
							<option value="Lunas">Lunas</option>

						</select>

					</div>

				</div> <!-- card body -->

			</div> <!-- card -->

			<button type="submit" class="btn btn-primary form-control mt-3" style="box-shadow: 5px 10px 30px grey;margin-bottom: 100px">Update</button>
			
			</form>
		</div>

	</div>
</div>