<div class="container">
	<h3 class="section-heading text-tengah header-phylosoper home-header">Profil</h3>
	<hr class="border-blue"/>
	
	<div class="row clearfix gray-wrap-content">
		<div class="text-tengah m-t-5-b-20">
			<span class="fa fa-user-circle-o logo-icon"></span>
		</div>
		<div id="close-load">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content left-notifikasi">
					<p class="notifikasi-content-header">ID Agen / ID Nasabah : </p>
					<p class="notifikasi-content-value" id="agentId"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content">
					<p class="notifikasi-content-header">Nama Lengkap:</p>
					<p class="notifikasi-content-value" id="agentName"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content left-notifikasi">
					<p class="notifikasi-content-header">Email :</p>
					<p class="notifikasi-content-value" id="agentEmail"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content">
					<p class="notifikasi-content-header">Nomor HP :</p>
					<p class="notifikasi-content-value" id="agentHp"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content left-notifikasi">
					<p class="notifikasi-content-header">Alamat : </p>
					<p class="notifikasi-content-value" id="agentAlamat"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content">
					<p class="notifikasi-content-header">Rekening Settlement :</p>
					<p class="notifikasi-content-value" id="agentRekSettlement"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content left-notifikasi">
					<p class="notifikasi-content-header">Nama Pemilik Rekening :</p>
					<p class="notifikasi-content-value" id="agentNameRek"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content">
					<p class="notifikasi-content-header">Nama UPLK :</p>
					<p class="notifikasi-content-value" id="agentNameUplk"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content left-notifikasi">
					<p class="notifikasi-content-header">No. Registrasi UPLK (BI) :</p>
					<p class="notifikasi-content-value" id="agentRegUplk"></p>
				</div>
			</div>
		</div>
		<div id="open-load">
			<div class="loading-container">
					<div class="abs-container container1">
						<div class="bubblingG">
							<span id="bubblingG_1">
							</span>
							<span id="bubblingG_2">
							</span>
							<span id="bubblingG_3">
							</span>
						</div>
					</div>
					<div class="abs-container container2">
						<p class="msg-loading">
							Sedang memuat, silahkan tunggu.
						</p>
					</div>
					<div class="abs-container container3">
						<img src="<?php echo base_url();?>images/loading_img.png" alt=""/>
					</div>
					<div class="abs-container container4">
						<p class="msg-loading">
							Sedang memuat, silahkan tunggu.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
		$.ajax({
			type:'POST',
            url : "<?php echo $profileEndpoint;?>",
            data :{
            	id:"<?php echo $user['agen'];?>",
            	token:"<?php echo $user['token']?>",
        		},
        	success:function(data){
        		console.log(data);
        		var resp = jQuery.parseJSON(data);
        		if(resp.status == "<?php echo STATUS_TOKEN_EXPIRED;?>"){
                    <?php
                      $msg = array();
                      $msg['head']= HEAD_TOKEN_EXPIRED;
                      $msg['desc']= DESC_TOKEN_EXPIRED;
                    ?>
                    var strResp = '<?php echo serialize($msg);?>';
                    console.log(strResp);
                    $.cookie("<?php echo $prefixCookie.'error';?>",strResp,{
                      expires : 1440,
                      path : "<?php echo $pathCookie;?>",
                      domain:"<?php echo $domainCookie;?>",
                      <?php 
                        if($secureCookie){
                            echo "secure : true";
                        }else{
                            echo "secure : false";
                        }
                      ?>
                    });
                    self.location="<?php echo base_url().LOGOUT_REVERSE;?>";
                }else if(resp.status == "<?php echo STATUS_PROCESSED;?>"){
                	$("#agentId").html(resp.agentID);
                	$('#agentName').html(resp.name);
                	$('#agentEmail').html(resp.email);
                	$('#agentHp').html(resp.mobilePhone);
                	$('#agentAlamat').html(resp.address);
                	$('#agentRekSettlement').html(resp.rekSettlement);
                	$('#agentNameRek').html(resp.rekName);
                	$('#agentNameUplk').html(resp.agentUplk);
                	$('#agentRegUplk').html(resp.rekUplk);
        			$('#open-load').fadeOut('500',function(){
        				$('#close-load').fadeIn('500');
        			});
        		}else{
        			console.log(data.status);
        			<?php
        				$msg = array();
        				$msg['head'] = "TERJADI KESALAHAN";
        				$msg['desc'] = MESSAGE_GENERAL_ERROR;
        			?>
        			var msg = '<?php echo serialize($msg);?>';
        			$.cookie("<?php echo $prefixCookie.'error';?>",strResp,{
                      expires : 1440,
                      path : "<?php echo $pathCookie;?>",
                      domain:"<?php echo $domainCookie;?>",
                      <?php 
                        if($secureCookie){
                            echo "secure : true";
                        }else{
                            echo "secure : false";
                        }
                      ?>
                    });
                	//self.location.href='<?php echo base_url()."main";?>';
        		}
        	},
        	error:function(data){
        		console.log(data);
        	}
		});
		
	});
</script>