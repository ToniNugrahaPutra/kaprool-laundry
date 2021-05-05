<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-md-6">
			
			<form action="" method="post">
			
			<h1 class="mb-5" style="color: grey;text-align: center">Form Order</h1>

			<div class="card">  	
			  	<div class="card-header" style="background-color: grey;color: white">Data Diri</div>
			  	<div class="card-body">

			  		<?php if(validation_errors()) : ?>
				  		<div class="alert alert-danger" role="alert">
				  			<?= validation_errors(); ?>
						</div>
					<?php endif; ?>

					<div class="form-group">
				    	<input type="hidden" name="kode_transaksi" class="form-control" value="<?= date('dmY-His'); ?>">
					</div>

				    <div class="form-group">
				    	<label for="nama">Nama : </label><br>
				    	<input type="text" name="nama" class="form-control" id="nama">
					</div>

					<div class="form-group">
					    <label for="alamat">Alamat : </label><br>
					    <input type="text" name="alamat" class="form-control" id="alamat">
					</div>

					<div class="form-group">
					    <label for="patokan">Patokan : </label><br>
					    <input type="text" name="patokan" class="form-control" id="patokan">
					</div>

					<div class="form-group">
					    <label for="nohp">No. Hp : </label><br>
					    <input type="text" name="nohp" class="form-control" id="nohp">
					</div>
				    

				</div> <!-- card body -->

			</div> <!-- card -->

			<div class="card mt-3 mb-3">  	
			  	<div class="card-header" style="background-color: grey;color: white">Data Pakaian</div>
			  	<div class="card-body">

			  		<?php if(validation_errors()) : ?>
				  		<div class="alert alert-danger" role="alert">
				  			<?= validation_errors(); ?>
						</div>
					<?php endif; ?>
				    
				    <div class="form-group">
				    	<label for="berat">Berat : </label><br>
				    	<select class="custom-select" name="berat" id="berat">
						  <option selected>-</option>
						  <option value="1 Kg">1 Kg</option>
						  <option value="2 Kg">2 Kg</option>
						  <option value="3 Kg">3 Kg</option>
						</select>
					</div>

					<div class="form-group">
					    <input type="hidden" name="status_cucian" class="form-control" id="status_cucian" value="Pengambilan Laundry">
					</div>


				</div> <!-- card body -->

			</div> <!-- card -->

	  		<?php if(validation_errors()) : ?>
		  		<div class="alert alert-danger" role="alert">
		  			<?= validation_errors(); ?>
				</div>
			<?php endif; ?>

			<div class="form-group">
			    <input type="hidden" name="status_pembayaran" class="form-control" id="status_pembayaran" value="Belum Bayar">
			</div>

			<button type="submit" class="btn btn-success form-control" style="box-shadow: 5px 10px 30px grey;margin-bottom: 100px">Order Sekarang!</button>
			
			</form>
		</div>

	</div>
</div>