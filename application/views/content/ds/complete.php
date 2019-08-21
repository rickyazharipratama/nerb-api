<div class="container">
	<h3 class="section-heading text-tengah header-phylosoper home-header">Deposit Settlement</h3>
	<hr class="border-blue"/>
	<div class="row clearfix gray-wrap-content">
		<div class="col-lg-12 col-md-12 m_t_b_10 text-tengah">
			 <span class="fa fa-check-circle notification-icon"></span>
			 <h3 class="notification-header">Deposit Settlement Berhasil</h3>
		</div>
		<div class="col-lg-12 col-md-12 m_t_b_10 text-tengah notifikasi-content-general-wrapper">
			<p class="notifikasi-content-general">No.Transaksi : <?php echo $resp['transactionNumber'];?></p>
			<p class="notifikasi-content-general">Waktu : <?php echo $resp['transactionDate'];?></p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="notifikasi-content left-notifikasi">
				<p class="notifikasi-content-header">No. Rekening :</p>
				<p class="notifikasi-content-value"><?php echo $resp['rekSettlement'];?></p>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="notifikasi-content">
				<p class="notifikasi-content-header">Nama Agen:</p>
				<p class="notifikasi-content-value"><?php echo $resp['namaAgent'];?></p>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="notifikasi-content left-notifikasi">
				<p class="notifikasi-content-header">Nominal :</p>
				<p class="notifikasi-content-value"><?php echo "Rp. ".number_format($resp['amount'],0,".",",").",-"; ?></p>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="notifikasi-content">
				<p class="notifikasi-content-header">Keterangan :</p>
				<p class="notifikasi-content-value"><?php echo $resp['description'];?></p>
			</div>
		</div>
	</div>
</div>