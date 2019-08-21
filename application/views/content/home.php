<div class="container">
	<h3 class="section-heading text-tengah header-phylosoper home-header">Nasabah e-cash</h3>
	<hr class="border-blue"/>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 p_l_r_10 p_t_b_10">
		<!--<a href="#" class="input-group btn btn-header text-menu">
			<span>
				<i class="fa fa-history" aria-hidden="true"></i>
			</span>
			<span>
				Riwayat Upgrade Layanan
			</span>
		</a>-->
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 p_l_r_10 p_t_b_10">
			<div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control" id="upgrade-text" minlength="10" placeholder="No. e-cash" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button" id="upgrade-search">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="text-tengah gray-wrap-content">
			<span class="fa fa-user-circle-o logo-icon"></span>

			<!--form upgrade-->
			<div class="p_t_b_10" id="form-upgrade">
				<p class="" id="upgrade-data">
				 	
				</p>
        <div id="upg-member">

        </div>
			</div>
			<!--end form data-->

			<!--Upgrade init-->
			<div class="p_t_b_10" id="init_upgrade">
				 <h4 class="text-gray">Silahkan melakukan pencarian no ecash untuk melihat informasi nasabah.</h4>
			</div>
			<div id="loading">
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
<div id="alertModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" id="modal-content">
                    <?php if($error){
                        echo "<div class='container'>";
                        echo "<button role='btn' class='close-alert' id='close-btn'><i class='fa fa-close text-white'></i></button>";
                        echo "<div class='header-alert'>";
                        echo ("<h2>".$errorMessage['head']."</h2>");
                        echo "</div>";
                        echo "<h4>".$errorMessage['desc']."</h4>";
                        echo "</div>";               
                    } ?>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url();?>js/engine/provider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/engine/util.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var state= 0;

		$("#upgrade-text").keydown(function (e) {
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 return;
          }
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
          }
        });

		$("#upgrade-text").change(function(){
			$('#upgrade-text').tooltip('dispose');
		});        

		$('#upgrade-search').click(function(){
			var search = $("#upgrade-text").val();
			if(search == "" || typeof search == "undefined"){
				 $('#upgrade-text').tooltip({
              		'disabled' : false,
              		'trigger':'focus',
              		'title': 'Harap no. ecash diisi dengan benar'
              	 });
              	 $("#upgrade-text").focus();
			}else if(checkProvider(search) == false){
				$('#upgrade-text').tooltip({
              		'disabled' : false,
              		'trigger':'focus',
              		'title': 'Harap no. ecash diisi dengan benar x'
              	 });
              	 $("#upgrade-text").focus();
			}else{
				if(state  == 0){
					$('#init_upgrade').fadeOut('500',function(){
						$('#loading').fadeIn('500',function(){
							$.ajax({
								type:'POST',
            					url : "<?php echo $searchMemberEndpoint;?>",
            					data :{
                					id:"<?php echo $user['agen'];?>",
                					token:"<?php echo $user['token']?>",
                					msisdn: search
            					},
            					success:function(data){
            						console.log(data);
            						var resp = jQuery.parseJSON(data);
            						if(resp.status == "<?php echo STATUS_PROCESSED;?>"){
										$("#upgrade-data").html(resp.msisdn +" - "+resp.name);
                    if(resp.groupId == "<?php echo $registered ?>" || resp.groupId == "<?php echo $pendingRegister;?>" || resp.groupId == "<?php echo $pendingRegisterAgent;?>" || resp.groupId == "<?php echo $registeredAgent;?>"){
                      $('#upg-member').html("<p>Nasabah telah melakukan upgrade layanan atau menunggu persetujuan upgrade layanan.</p>");
                    }else{
                      $('#upg-member').html('<form action="<?php echo $profileInqEndpoint;?>" method="post" role="form" class="form-center"><input type="hidden" id="msisdn" name="msisdn" value="'+resp.msisdn+'"/><div class="input-group pin-wrap"><span class="input-group-addon icon-login"><i class="glyphicon glyphicon-lock"></i></span><input id="pin" type="password" class="form-control" name="pin" minlength="6" maxlength="6" value="" placeholder="PIN" required/></div><button type="submit" name="sbm_upgrade" class="btn btn-header text-menu m_t_10 bg-white"><span>Upgrade Layanan</span></button></form>');
                    }
										$('#loading').fadeOut('500',function(){
											$('#form-upgrade').fadeIn('500');
										});
										state= 1;
									}else{
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
                    						state= 0;
                    						self.location="<?php echo base_url().LOGOUT_REVERSE;?>";
										}else{
											state=0;
											$('#loading').fadeOut('500',function(){
                        						$('#modal-content').html("<div class='container'><button role='btn' class='close-alert' id='close-btn'  onclick='exitToggle()'><i class='fa fa-close text-white'></i></button><div class='header-alert'><h2>"+resp.status+"</h2></div><h4>"+resp.description+"</h4></div>");
                        						$('#init_upgrade').fadeIn('800',function(){
                            						$("#alertModal").modal('show');
                        						});
                      						});
										}
									}
            					},
            					error:function(data){
            						console.log(data);
            						$('#loading').fadeOut('500',function(){
                        				$('#modal-content').html("<div class='container'><button role='btn' class='close-alert' id='close-btn'  onclick='exitToggle()'><i class='fa fa-close text-white'></i></button><div class='header-alert'><h2>Terjadi Kesalahan</h2></div><h4><?php echo MESSAGE_GENERAL_ERROR;?></h4></div>");
                        				$('#init_upgrade').fadeIn('800',function(){
                            				$("#alertModal").modal('show');
                        				});
                      				});
            					}
							});
						});
					});
				}else{
					$('#form-upgrade').fadeOut('500',function(){
						$('#loading').fadeIn('500',function(){
							$.ajax({
								type:'POST',
            					url : "<?php echo $searchMemberEndpoint;?>",
            					data :{
                					id:"<?php echo $user['agen'];?>",
                					token:"<?php echo $user['token']?>",
                					msisdn: search
            					},
            					success:function(data){
            						console.log(data);
            						var resp = jQuery.parseJSON(data);
            						if(resp.status == "<?php echo STATUS_PROCESSED;?>"){
            							$("#upgrade-data").html(resp.msisdn +" - "+resp.name);
                          if(resp.groupId == "<?php echo $registered ?>" || resp.groupId == "<?php echo $pendingRegister;?>" || resp.groupId == "<?php echo $pendingRegisterAgent;?>" || resp.groupId == "<?php echo $registeredAgent;?>"){
                            $('#upg-member').html("<p>Nasabah telah melakukan upgrade layanan atau menunggu persetujuan upgrade layanan.</p>");
                          }else{
                            $('#upg-member').html('<form action="<?php echo $profileInqEndpoint;?>" method="post" role="form" class="form-center"><input type="hidden" id="msisdn" name="msisdn" value="'+resp.msisdn+'"/><div class="input-group pin-wrap"><span class="input-group-addon icon-login"><i class="glyphicon glyphicon-lock"></i></span><input id="pin" type="password" class="form-control" name="pin" minlength="6" maxlength="6" value="" placeholder="PIN" required/></div><button type="submit" name="sbm_upgrade" class="btn btn-header text-menu m_t_10 bg-white"><span>Upgrade Layanan</span></button></form>');
                          }
										$("#msisdn").val(resp.msisdn);
										$('#loading').fadeOut('500',function(){
											$('#form-upgrade').fadeIn('500');
										});
										state= 1;
									}else{
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
                    						state = 0;
                    						self.location="<?php echo base_url().LOGOUT_REVERSE;?>";
										}else{
											state = 0;
											$('#loading').fadeOut('500',function(){
                        						$('#modal-content').html("<div class='container'><button role='btn' class='close-alert' id='close-btn'  onclick='exitToggle()'><i class='fa fa-close text-white'></i></button><div class='header-alert'><h2>"+resp.status+"</h2></div><h4>"+resp.description+"</h4></div>");
                        						$('#init_upgrade').fadeIn('800',function(){
                            						$("#alertModal").modal('show');
                        						});
                      						});
										}
									}
            					},
            					error:function(data){
            						console.log(data);
            						$('#loading').fadeOut('500',function(){
                        				$('#modal-content').html("<div class='container'><button role='btn' class='close-alert' id='close-btn'  onclick='exitToggle()'><i class='fa fa-close text-white'></i></button><div class='header-alert'><h2>Terjadi Kesalahan</h2></div><h4><?php echo MESSAGE_GENERAL_ERROR;?></h4></div>");
                        				$('#init_upgrade').fadeIn('800',function(){
                            				$("#alertModal").modal('show');
                        				});
                      				});
            					}
							});
						});
					});
				}
			}
		});
	});

	function exitToggle(){
        $("#alertModal").modal('toggle');
    }
</script>