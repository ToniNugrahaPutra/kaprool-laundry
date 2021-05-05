<div class="jumbotron jumbotron-fluid" style="
	background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
	url(<?= base_url('assets/img/bg.jpg') ?>); 
	height: 350px;
	background-size: cover;
	background-attachment: fixed;
	background-position: -100px;">

	<div class="container">
		<h1 class="display-4 mt-5" style="color:white;">Selamat Datang di <strong> Kaprool-Laundry</strong></h1>
	</div>

</div>

<div class="container">

	<h1 class="text-center mb-5" style="color: grey;">Daftar Pesanan</h1>

	<div class="row mb-5">
		<?php foreach ($laundry as $ldr) : ?>
			<div class="col-md-4">

				<div class="card mt-3 mb-3">
					<div class="card-header">
						<h5 class="text-center">
							<strong class=""><?= $ldr["kode_transaksi"] ?></strong>
						</h5>
					</div>
					<div class="card-body">

						<h3><?= $ldr["nama"] ?></h3>
						<p><?= $ldr["patokan"] ?>, <?= $ldr["alamat"] ?></p>
						<p>Berat : <?= $ldr["berat"] ?></p>
						<p>Status : <?= $ldr["status_cucian"] ?></p>
						<p>Pembayaran :

							<?php if ($ldr["status_pembayaran"] == "Belum Bayar") : ?>
								<span class="badge badge-warning">
									<?= $ldr["status_pembayaran"] ?>
								</span>
							<?php elseif ($ldr["status_pembayaran"] == "Lunas") : ?>
								<span class="badge badge-success">
									<?= $ldr["status_pembayaran"] ?>
								</span>
							<?php endif; ?>

						</p>


					</div>
				</div>

			</div>
		<?php endforeach; ?>
	</div>

</div>