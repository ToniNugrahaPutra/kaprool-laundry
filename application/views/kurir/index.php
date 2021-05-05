<div class="container">


	<div>
		<h3 class="mb-3" style="color: grey;">Daftar Pesanan</h3>
		<p>Harga Rp 5.000/Kilogram</p>
	</div>

	<?php if ($this->session->flashdata()) : ?>
		<div class="row mt-3">
			<div class="col-md-4">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong><?= $this->session->flashdata('message'); ?></strong>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row mb-5">
		<?php foreach ($laundry as $ldr) : ?>
			<div class="col-md-4">

				<div class="card mt-3 mb-3">
					<div class="card-header">
						<h5 class="text-center">
							<strong class=""><?php echo $ldr["kode_transaksi"] ?></strong>
						</h5>
					</div>
					<div class="card-body">

						<p>Nama : <?php echo $ldr["nama"] ?></p>
						<p>Alamat : <?php echo $ldr["alamat"] ?></p>
						<p>Patokan : <?php echo $ldr["patokan"] ?></p>
						<p>No Hp : <?php echo $ldr["nohp"] ?></p>
						<p>Berat pakaian : <?php echo $ldr["berat"] ?></p>
						<p>Tagihan : <?php echo $ldr["berat"] * 5000 ?></p>
						<p>Status Pembayaran :

							<?php if ($ldr["status_pembayaran"] == "Belum Bayar") : ?>
								<span class="badge badge-warning">
									<?php echo $ldr["status_pembayaran"] ?>
								</span>
							<?php elseif ($ldr["status_pembayaran"] == "Lunas") : ?>
								<span class="badge badge-success">
									<?php echo $ldr["status_pembayaran"] ?>
								</span>
							<?php endif; ?>

						</p>
						<?php if ($ldr["status_cucian"] == "Laundry diterima") : ?>

							<p class="alert alert-info">Status Cucian : Diterima</p>

						<?php elseif ($ldr["status_cucian"] == "Cancel") : ?>

							<p class="alert alert-danger">Pesanan dibatalkan</p>

						<?php elseif ($ldr["status_cucian"] == "Pengambilan Laundry") : ?>

							<p>Status Cucian : Pengambilan</p>
							<a href="<?= base_url() ?>kurir/edit_status/<?= $ldr["id"] ?>" class="btn btn-warning">Edit Status</a>
							<a href="<?= base_url() ?>kurir/payment/<?= $ldr["id"] ?>" class="btn btn-success">Payment</a>

						<?php elseif ($ldr["status_cucian"] == "Pencucian Laundry") : ?>

							<p>Status Cucian : Pencucian Laundry</p>
							<a href="<?= base_url() ?>kurir/edit_status/<?= $ldr["id"] ?>" class="btn btn-warning disabled">Edit Status</a>

						<?php elseif ($ldr["status_cucian"] == "Laundry Selesai") : ?>

							<p>Status Cucian : Laundry selesai</p>
							<a href="<?= base_url() ?>kurir/edit_status/<?= $ldr["id"] ?>" class="btn btn-warning">Edit Status</a>

						<?php elseif ($ldr["status_cucian"] == "Pengiriman Laundry") : ?>

							<p>Status Cucian : Pengiriman</p>

						<?php elseif ($ldr["status_cucian"] == "Tunggu sebentar ya") : ?>

							<p class="alert alert-primary">Pesanan baru</p>
							<a href="<?= base_url() ?>kurir/edit_status/<?= $ldr["id"] ?>" class="btn btn-warning">Edit Status</a>
							<a href="<?= base_url() ?>kurir/payment/<?= $ldr["id"] ?>" class="btn btn-success">Payment</a>

						<?php endif; ?>

					</div>
				</div>

			</div>
		<?php endforeach; ?>
	</div>

</div>