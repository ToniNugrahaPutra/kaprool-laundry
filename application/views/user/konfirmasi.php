<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-md-6">
			
			<form action="<?= base_url('user/konfirmasi') ?>" method="post">

			<h1 class="mb-5" style="color: grey;text-align: center"><?= $title ?></h1>

			<div class="card">  	
			  	<div class="card-header" style="background-color: grey;color: white">Berikan Konfirmasi dan Ulasanmu</div>

			  	<div class="card-body">

			  		<?php if(validation_errors()) : ?>
				  		<div class="alert alert-danger" role="alert">
				  			<?= validation_errors(); ?>
						</div>
					<?php endif; ?>

					<input type="hidden" name="id" value="<?= $laundry["id"] ?>">

				    <div class="form-group">
				    	<div class="alert">
					    	<input type="checkbox" name="konfirmasi" id="konfirmasi" 
					    	value="Laundry diterima">
					    	<label for="konfirmasi">Laundry diterima</label>
				    	</div>
					</div>

					<div class="form-group">
					    <label for="ulasan">Ulasan : </label><br>
					    <input type="text" name="ulasan" class="form-control" id="ulasan" value="<?= $laundry["ulasan"] ?>">
					    <p class="alert alert-info mt-3">Maksimal 30 Kata</p>
					</div>

				</div> <!-- card body -->

			</div> <!-- card -->

			<button type="submit" class="btn btn-primary form-control mt-3" style="box-shadow: 5px 10px 30px grey;margin-bottom: 100px">Kofirmasi</button>
			
			</form>
		</div>

	</div>
</div>