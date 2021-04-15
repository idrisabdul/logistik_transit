<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view('_partials/header'); ?>

</head>

<body>
	<div id="app">
		<div class="main-wrapper">

			<!-- Menu Navbar -->
			<?php $this->load->view('_partials/navbar') ?>

			<!-- Menu Sidebar -->
			<?php $this->load->view('_partials/sidebar') ?>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Update PO Berhasil</h1>
						<a class='btn btn-success ml-5' href='Home'>BACK TO HOME</a>
					</div>

					<div id="container">
						<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
					</div>
				</section>

			</div>
		</div>
		</section>
	</div>

	<div class="preloader">
		<div class="loading">
			<img src="<?= base_url() ?>assets/img/loadpo.gif" width="80">
			<p>Harap Tunggu</p>
		</div>
	</div>

	<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<script>
		function updatePo(url) {
			$('#btn-updatePo').attr('href', url);
			$('#updatePoModal').modal();
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.preloader').fadeOut();
		});
	</script>