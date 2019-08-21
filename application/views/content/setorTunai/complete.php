<div class="container">
	<h3 class="section-heading text-tengah header-phylosoper home-header">Setor Tunai</h3>
	<hr class="border-blue"/>
	<div class="row clearfix gray-wrap-content">
		<div class="col-lg-12 col-md-12 m_t_b_10 text-tengah">
			 <span class="fa fa-check-circle notification-icon"></span>
			 <h3 class="notification-header">Setor Tunai Berhasil</h3>
		</div>
		<div class="col-lg-12 col-md-12 m_t_b_10 text-tengah notifikasi-content-general-wrapper">
			<p class="notifikasi-content-general">No.Transaksi : <?php echo $transactionNumber;?></p>
			<p class="notifikasi-content-general">Waktu : <?php echo $transactionDate;?></p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="notifikasi-content left-notifikasi">
				<p class="notifikasi-content-header">No. e-cash :</p>
				<p class="notifikasi-content-value"><?php echo $ecash; ?></p>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="notifikasi-content">
				<p class="notifikasi-content-header">Amount :</p>
				<p class="notifikasi-content-value"><?php echo "Rp. ".number_format($amount,0,".",",").",-"; ?></p>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="notifikasi-content notifikasi-content-center">
				<p class="notifikasi-content-header">Keterangan :</p>
				<p class="notifikasi-content-value"><?php echo $keterangan?></p>
			</div>
		</div>
	</div>
</div>