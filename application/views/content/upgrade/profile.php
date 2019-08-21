<div class="container">
	<h3 class="section-heading text-tengah header-phylosoper home-header">Profil Nasabah</h3>
	<hr class="border-blue"/>
	<div class="row clearfix gray-wrap-content">
		<form action="<?php echo $upgLayananEndpoint;?>" method="post" role="form" data-parsley-validate>
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="namaUpgrade" class="w_normal text-gray">Nama Lengkap :</label>
                    <div class="input-group">
                    	<span class="input-group-addon icon-login">
                        	<i class="fa fa-user"></i>
                    	</span>
                    	<input id="namaUpgrade" type="text" class="form-control" name="namaUpgrade" value="<?php echo $profile['name'];?>" placeholder="" required/>
                    	<div class="required-icon">
                    		<div class="text">*</div>
                    	</div>
                    </div>
                </div>
			</div>
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group">
					<label for="moEcash" class="w_normal text-gray">No. e-cash :</label>
					<div class="input-group">
                    	<span class="input-group-addon icon-login">
                        	<i class="fa fa-bank"></i>
                    	</span>
                    	<input id="noEcash" type="text" class="form-control" name="ecash" value="<?php echo $profile['msisdn'];?>" readonly="readonly" placeholder="No. e-cash"/>
                    </div>
                </div>
			</div>

			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="email" class="w_normal text-gray">Email :</label>
					<div class="input-group">
                    	<span class="input-group-addon icon-login">
                        	<i class="glyphicon glyphicon-envelope"></i>
                    	</span>
                    	<input id="email" type="email" class="form-control" name="email" value="<?php echo $profile['email'];?>" placeholder=""/>
                    	<div class="required-icon">
                    		<div class="text">*</div>
                    	</div>
                    </div>
                </div>
			</div>
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group">
					<label for="group" class="w_normal text-gray">Group :</label>
					<div class="input-group">
                    	<span class="input-group-addon icon-login">
                    	    <i class="fa fa-group"></i>
                    	</span>
                    	<input id="group" type="text" class="form-control" name="group" value="UNREGISTERED"  readonly="readonly" placeholder=""/>
                    </div>
                </div>
			</div>
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="identitas" class="w_normal text-gray">No. Identitas :</label>
                    <div class="input-group">
                    	<span class="input-group-addon icon-login">
                        	<i class="fa fa-drivers-license"></i>
                    	</span>
                    	<input id="identitas" type="text" class="form-control" name="identitas" value="<?php echo $profile['id'];?>" placeholder="" required/>
                    	<div class="required-icon">
                    		<div class="text">*</div>
                    	</div>
                    </div>
                </div>
			</div>
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="ttlForm" class="w_normal text-gray">Tanggal Lahir :</label>
                    <div class="input-group">
                    	<span class="input-group-addon icon-login">
                        	<i class="fa fa-calendar"></i>
                    	</span>
                    	<input id="ttlForm" type="text" class="form-control" name="ttlForm" value="<?php echo $formatDate;?>" readonly="readonly" placeholder="" required/>
                    	<div class="required-date">
                    		<div class="text">*</div>
                    	</div>
                    </div>
                </div>
			</div>
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="jobField" class="w_normal text-gray">Pekerjaan :</label>
                    <div class="input-group">
                    	<span class="input-group-addon icon-login">
                        	<i class="fa fa-briefcase"></i>
                    	</span>
                    	<input id="jobField" type="text" class="form-control" name="jobField" value="<?php echo $profile['work'];?>" placeholder="" required/>
                    	<div class="required-icon">
                    		<div class="text">*</div>
                    	</div>
                    </div>
                </div>
			</div>
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="ibuKandung" class="w_normal text-gray">Nama Ibu Kandung :</label>
                    <div class="input-group">
                    	<span class="input-group-addon icon-login">
                        	<i class="fa fa-female"></i>
                    	</span>
                    	<input id="ibuKandung" type="text" class="form-control" name="ibuKandung" value="<?php echo $profile['motherMaiden'];?>" placeholder="" required/>
                    	<div class="required-date">
                    		<div class="text">*</div>
                    	</div>
                    </div>
                </div>
			</div>
			<div class="col-xs-12 col-sm-12 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="alamat" class="w_normal text-gray">Alamat :</label>
                    <div class="input-group">
                    	<span class="input-group-addon icon-login">
                        	<i class="fa fa-map-marker"></i>
                    	</span>
                    	<textarea id="alamat" required class="fixed-area form-control" name="alamat"><?php echo $profile['address'];?></textarea>
                    	<div class="required-icon">
                    		<div class="text">*</div>
                    	</div>
                    </div>
                </div>
			</div>
			<div class="col-xs-12 col-sm-12 m_t_b_10">
			<div class="form-group">
              	<div class="button-right">
                	<a href="<?php echo base_url();?>main/upgradeLayanan" class="btn btn-default btn-form-negative">Batal</a>
                	<button type="submit" name="sbmUpgrade" value="ok" class="btn btn-primary btn-form-positif">Upgrade Layanan</button>
              	</div>
            </div>
          </div>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	$(function() {
    	$('.required-icon').tooltip({
        	placement: 'left',
        	title: 'harus diisi'
        });

        $('.required-date').tooltip({
        	placemet: 'left',
        	title : 'dd/mm/yyyy'
        });
        $('#ttlForm').datetimepicker({
          useCurrent: true,
          ignoreReadonly: true,
          format: "DD/MM/YYYY"
        });
});
</script>