<!DOCTYPE html>
<html>

<head>
	<title><?= $judul; ?></title>

	<!-- BOOTSTRAP 4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">

	<!-- FONT AWESOME -->
	<link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- SBADMIN -->
	<link href="<?= base_url('assets/') ?>css/sb-admin.css" rel="stylesheet">

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">

			<a class="navbar-brand" href="<?= base_url(); ?>"><strong>Kaprool-Laundry</strong></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">

					<a class="nav-item nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="<?= base_url(); ?>laundry">Daftar Pesanan <span class="sr-only">(current)</span></a>

					<div>
						<a class="nav-item btn btn-outline-primary" href="<?= base_url() ?>auth">Login<span class="sr-only">(current)</span></a>
						<a class="nav-item btn btn-primary my-2 my-sm-0 mr-2" href="<?= base_url() ?>auth/register">Register<span class="sr-only">(current)</span></a>
					</div>

				</div>
			</div>

		</div>
	</nav>