<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-md-6">
			
			<form action="<?= base_url('user/ubah_pesanan') ?>" method="post">

			<h1 class="mb-5" style="color: grey;text-align: center">Update Pesanan</h1>

			<div class="card">  	
			  	<div class="card-header" style="background-color: grey;color: white"><?= $laundry["kode_transaksi"] ?> a/n <?= $laundry["nama"] ?></div>

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

            		<input type="hidden" name="id" value="<?= $laundry["id"] ?>">

				    <div class="form-group">
				    	<label for="alamat">Alamat : </label><br>
				    	<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $laundry["alamat"] ?>">
					</div>

					<div class="form-group">
					    <label for="patokan">Patokan : </label><br>
					    <input type="text" name="patokan" class="form-control" id="patokan" value="<?= $laundry["patokan"] ?>">
					</div>

					<div class="form-group">
					    <label for="nohp">No Hp : </label><br>
					    <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $laundry["nohp"] ?>">
					</div>

					<div class="form-group">
					    <label for="berat">Berat : </label><br>
					    <input type="text" name="berat" class="form-control" id="berat" value="<?= $laundry["berat"] ?>">
					</div>
				    

				</div> <!-- card body -->

			</div> <!-- card -->

			<button type="submit" class="btn btn-primary form-control mt-3" style="box-shadow: 5px 10px 30px grey;margin-bottom: 100px">Update</button>
			
			</form>
		</div>

	</div>
</div>