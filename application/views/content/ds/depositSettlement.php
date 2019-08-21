<div class="container">
	<h3 class="section-heading text-tengah header-phylosoper home-header">Deposit Settlement</h3>
	<hr class="border-blue"/>
	
	<div class="row clearfix gray-wrap-content">
		<div class="text-tengah m-t-5-b-20">
			<img src="<?php echo base_url();?>images/menuTransaksiGrey.png" class="img-header-content"/>
		</div>
		<div id="setor-form">
			<div class="col-xs-12 col-sm-6 m_t_b_10">
				<div class="form-group required-field-block">
					<label for="moEcash" class="w_normal text-gray">Rekening Tujuan :</label>
					<div class="input-group">
                   		<span class="input-group-addon icon-login">
                    	   	<i class="fa fa-bank"></i>
                   		</span>
                   		<input id="rekTujuan" type="text" class="form-control" minlength="16" maxlength="20" name="ecash" value="<?php echo $user['rekSettlement'];?>" placeholder="" disabled/>
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
                		<button id="reqOtp" class="btn btn-primary btn-form-positif">Lanjut</button>
              		</div>
              	</div>
            </div>
		</div>

		<div id="konfirmasiSetor">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content left-notifikasi">
					<p class="notifikasi-content-header">Rekening Tujuan :</p>
					<p class="notifikasi-content-value" id="konfEcash"></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="notifikasi-content">
					<p class="notifikasi-content-header">Nominal :</p>
					<p class="notifikasi-content-value" id="konfNominal"></p>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="notifikasi-content notifikasi-content-center">
					<p class="notifikasi-content-header">Keterangan :</p>
					<p class="notifikasi-content-value" id="konfKeterangan"></p>
				</div>
			</div>
			<form action="<?php echo $settlementEndpoint;?>" method="post" role='form' class="form-center">
					<input type="hidden" id='amountForm' name="amount" value=""/>
          <button type="submit" name="setorKonf" value="ok" class="btn btn-header text-menu m_t_10 bg-white">
             	<span>Lanjut</span>
          </button>
				</form>
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

        
        $("#rekTujuan,#amount,#otpForm").keydown(function (e) {
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
        })

    	$('#reqOtp').click(function(){
    		//$('#noEcash,#amount').tooltip("disable");
       		var msisdn = $("#rekTujuan").val();
       		var amount = Math.floor($("#amount").val());
       		var keterangan = $("#keterangan").val();
       		if(typeof msisdn == 'undefined' || msisdn === ""){
       			$('#rekTujuan').tooltip({
       				'disabled' : false,
        			'trigger':'focus',
        			'title': 'Harap no. rekening diisi dengan benar'
  		      	});
       			$("#rekTujuan").focus();
       		}else if(amount ==="" || isNaN(amount)){
       			$('#amount').tooltip({
        			'trigger':'focus',
        			'title': 'Harap nominal diisi dengan benar. cth:10000'
        		});
        		$('#amount').focus();
       		}else if(amount >5000000){
       			$('#amount').tooltip({
        			'trigger':'focus',
        			'title': 'Nominal melebihi limit maximum yaitu 5.000.000'
        		});
        		$('#amount').focus();
       		}else if(amount <= 0){
       			$('#amount').tooltip({
        			'trigger':'focus',
        			'title': 'Harap nominal diisi dengan benar'
        		});
        		$('#amount').focus();
       		}else{
       			$('#konfEcash').text(msisdn);
       			$('#rekTujuanForm').val(msisdn);
       			$('#konfNominal').text("Rp. "+formatMoney(amount,0,',','.')+",-");
       			$('#amountForm').val(amount);
       			if(keterangan === ""){
       				$("#konfKeterangan").text("-");
       				$('#keteranganForm').val("-");
       			}else{
       				$("#konfKeterangan").text(keterangan);
       				$('#keteranganForm').val(keterangan);
       			}
       			$('#setor-form').fadeOut('500',function(){
       				$('#konfirmasiSetor').fadeIn('500');
       			});
       		}
    	});
    });
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