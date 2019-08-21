<div class="container">
	<h3 class="section-heading text-tengah header-phylosoper home-header">Tarik Tunai</h3>
	<hr class="border-blue"/>
	
	<div class="row clearfix gray-wrap-content">
		<div class="text-tengah m-t-5-b-20">
			<img src="<?php echo base_url();?>images/tarikTunaiGrey.png" class="img-header-content"/>
		</div>
		<div id="setor-form">
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="moEcash" class="w_normal text-gray">No. e-cash :</label>
					<div class="input-group">
                   		<span class="input-group-addon icon-login">
                    	   	<i class="fa fa-bank"></i>
                   		</span>
                   		<input id="noEcash" type="text" class="form-control" minlength="10" maxlength="15" name="ecash" value="" placeholder=""/>
                   		<div class="required-icon" id="ecashToolTip">
                    		<div class="text">*</div>
                    	</div>
                	</div>
            	</div>
            	<div class="form-group required-field-block">
					<label for="moEcash" class="w_normal text-gray">Nominal :</label>
					<div class="input-group">
                	   	<span class="input-group-addon icon-login">
                	       	<i class="fa fa-money"></i>
                	   	</span>
                	   	<input id="amount" type="text" class="form-control" name="amount" value="" placeholder=""/>
                	   	<div class="required-icon">
                	    	<div class="text">*</div>
                	    </div>
                	</div>
            	</div>
			</div>
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group">
					<label for="alamat" class="w_normal text-gray">Keterangan :</label>
            	    <div class="input-group">
            	      	<span class="input-group-addon icon-login">
            	           	<i class="fa fa-commenting"></i>
            	       	</span>
            	       	<textarea id="keterangan" required class="fixed-area setor-area form-control" name="alamat"></textarea>	
            	    </div>
            	</div>
			</div>
			<div class="col-xs-12 col-sm-12 m_t_b_10">
				<div class="form-group">
              		<div class="button-right">
                		<button id="reqOtp" class="btn btn-primary btn-form-positif">Meminta OTP</button>
              		</div>
              	</div>
            </div>
		</div>

		<div id="konfirmasiSetor">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content left-notifikasi">
					<p class="notifikasi-content-header">No. e-cash :</p>
					<p class="notifikasi-content-value" id="konfEcash"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content">
					<p class="notifikasi-content-header">Nama :</p>
					<p class="notifikasi-content-value" id="konfNama">Idola Manurung</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content left-notifikasi">
					<p class="notifikasi-content-header">Nominal :</p>
					<p class="notifikasi-content-value" id="konfNominal"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content">
					<p class="notifikasi-content-header">Keterangan :</p>
					<p class="notifikasi-content-value" id="konfKeterangan"></p>
				</div>
			</div>
			<form action="<?php echo $cashoutEndpoint;?>" method="post" role='form' class="form-center">
					<input type="hidden" id='msisdnForm' name="msisdn" value=""/>
					<input type="hidden" id='amountForm' name="amount" value=""/>
					<input type="hidden" id='keteranganForm' name="keterangan" value=""/>
					<div class="input-group pin-wrap">
                        <span class="input-group-addon icon-login">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input id="otpForm" type="password" class="form-control" name="otp" minlength="6" maxlength="6" value="" placeholder="OTP" required/>
                    </div>
                    <button type="submit" name="setorKonf" value="ok" class="btn btn-header text-menu m_t_10 bg-white">
                    	<span>Lanjut</span>
                    </button>
				</form>
				<div class="form-center">
					<button id="repeatOtp" class="btn btn-default m_t_10 otp-rep">Meminta Ulang OTP</button>
				</div>
		</div>
    <div id="loading" class="text-tengah">
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
	$(function() {
    	$('.required-icon').tooltip({
        	placement: 'left',
        	title: 'harus diisi'
        });

        
        $("#noEcash,#amount,#otpForm").keydown(function (e) {
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

    	$('#reqOtp').click(function(){
    		var msisdn = $("#noEcash").val();
          var amt = Math.floor($("#amount").val());
          var keterangan = $("#keterangan").val();
          if(typeof msisdn == 'undefined' || msisdn === ""){
            $('#noEcash').tooltip({
              'disabled' : false,
              'trigger':'focus',
              'title': 'Harap no. ecash diisi dengan benar'
              });
            $("#noEcash").focus();
          }else if(checkProvider(msisdn) == false){
            $('#noEcash').tooltip({
              'disabled' : false,
              'trigger':'focus',
              'title': 'Harap no. ecash diisi dengan benar regex'
              });
            $("#noEcash").focus();
          }else if(amt ==="" || isNaN(amt)){
            $('#amount').tooltip({
              'trigger':'focus',
              'title': 'Harap nominal diisi dengan benar. cth:10000'
            });
            $('#amount').focus();
          }else if(amt >5000000){
            $('#amount').tooltip({
              'trigger':'focus',
              'title': 'Nominal melebihi limit maximum yaitu 5.000.000'
            });
            $('#amount').focus();
          }else if(amt <= 0){
            $('#amount').tooltip({
              'trigger':'focus',
              'title': 'Harap nominal diisi dengan benar'
            });
            $('#amount').focus();
          }else{
            $('#setor-form').fadeOut('500',function(){
              $('#loading').fadeIn('500');
              $.ajax({
                type:'POST',
                url : "<?php echo $inquiryEndpoint;?>",
                data :{
                  id:"<?php echo $user['agen'];?>",
                  token:"<?php echo $user['token']?>",
                  msisdn: msisdn,
                  amount: amt
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
                    $.cookie("error",strResp,{
                      expires : 1440,
                      path : '/'
                    });
                    self.location="<?php echo base_url().LOGOUT_REVERSE;?>";
                  }else{
                    if(resp.status=="<?php echo STATUS_PROCESSED;?>"){
                      $('#konfEcash').text(msisdn);
                      $('#msisdnForm').val(msisdn);
                      $('#konfNominal').text("Rp. "+formatMoney(amt,0,',','.')+",-");
                      $('#amountForm').val(amt);
                      if(keterangan === ""){
                        $("#konfKeterangan").text("-");
                        $('#keteranganForm').val("-");
                      }else{
                        $("#konfKeterangan").text(keterangan);
                        $('#keteranganForm').val(keterangan);
                      }
                      $('#loading').fadeOut('500',function(){
                        $('#konfirmasiSetor').fadeIn('500');
                      });
                    }else{
                      $('#loading').fadeOut('500',function(){
                        $('#modal-content').html("<div class='container'><button role='btn' class='close-alert' id='close-btn'  onclick='exitToggle()'><i class='fa fa-close text-white'></i></button><div class='header-alert'><h2>"+resp.status+"</h2></div><h4>"+resp.description+"</h4></div>");
                        $('#setor-form').fadeIn('800',function(){
                            $("#alertModal").modal('show');
                        });
                      });
                    }
                  }
                },
                error:function(data){
                  console.log(data);
                  $('#setor-form').fadeIn('500');
                }
              });
            });
          }
      });

      $("#repeatOtp").click(function(){
          var msisdn = $('#msisdnForm').val();
          var amt = $('#amountForm').val();
          var keterangan = $('#konfKeterangan').html();
          $("#konfirmasiSetor").fadeOut('500',function(){
          $("#loading").fadeIn('500');
          $.ajax({
            type:'POST',
            url : "<?php echo $inquiryEndpoint;?>",
            data :{
              id:"<?php echo $user['agen'];?>",
              token:"<?php echo $user['token']?>",
              msisdn: msisdn,
              amount: amt
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
                $.cookie("error",strResp,{
                  expires : 1440,
                  path : '/'
                });
                self.location="<?php echo base_url().LOGOUT_REVERSE;?>";
              }else{
                if(resp.status=="<?php echo STATUS_PROCESSED;?>"){
                  $('#konfEcash').text(resp.msisdn);
                  $('#msisdnForm').val(resp.msisdn);
                  $('#konfNominal').text("Rp. "+formatMoney(resp.amount,0,',','.')+",-");
                  $('#amountForm').val(resp.amount);
                  if(keterangan === ""){
                    $("#konfKeterangan").text("-");
                    $('#keteranganForm').val("-");
                  }else{
                    $("#konfKeterangan").text(keterangan);
                    $('#keteranganForm').val(keterangan);
                  }
                  $('#loading').fadeOut('500',function(){
                    $('#konfirmasiSetor').fadeIn('500');
                  });
                }else{
                  $('#loading').fadeOut('500',function(){
                    $('#modal-content').html("<div class='container'><button role='btn' class='close-alert' id='close-btn'  onclick='exitToggle()'><i class='fa fa-close text-white'></i></button><div class='header-alert'><h2>"+resp.status+"</h2></div><h4>"+resp.description+"</h4></div>");
                    $('#setor-form').fadeIn('800',function(){
                      $("#alertModal").modal('show');
                    });
                  });
                }
              }
            },
            error:function(data){
              console.log(data);
              $('#loading').fadeOut('500',function(){
                $('#konfirmasiSetor').fadeIn('500');
              });
            }
          });
        });
      });
    });
    function exitToggle(){
          $("#alertModal").modal('toggle');
    }
</script>
<?php if($error){?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#alertModal").modal('show');

        $("#close-btn").click(function(){
          $("#alertModal").modal('toggle');
        });
    });
</script>
<?php }?>