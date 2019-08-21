<div class="container">
	<h3 class="section-heading text-tengah header-phylosoper home-header">Ubah Sandi</h3>
	<hr class="border-blue"/>
	
	<div class="row clearfix gray-wrap-content">
		<div class="text-tengah m-t-5-b-20">
			<span class="glyphicon glyphicon-lock logo-icon"></span>
		</div>

		<div class="col-md-6 col-md-offset-3 col-xs-12">
			<form action="<?php echo $resetCredEndpoint;?>" method="post" role="form" id="sandi-form">
				<input type="hidden" name="agentId" value=""/>
				<div class="form-group required-field-block">
					<label for="moEcash" class="w_normal text-gray">Sandi Lama :</label>
					<div class="input-group">
                   		<span class="input-group-addon icon-login">
                       		<i class="glyphicon glyphicon-lock"></i>
                   		</span>
                   		<input id="oldPass" type="password" class="form-control" onchange="try{setCustomValidity('')}catch(e){}" minlength="6" maxlength="16" name="oldPass" value="" placeholder="" required/>
                   		<div class="required-icon" id="ecashToolTip">
                    		<div class="text">*</div>
                    	</div>
                	</div>
            	</div>

            	<div class="form-group required-field-block">
					<label for="moEcash" class="w_normal text-gray">Sandi Baru :</label>
					<div class="input-group">
                   		<span class="input-group-addon icon-login">
                       		<i class="glyphicon glyphicon-lock"></i>
                   		</span>
                   		<input id="newPass" type="password" class="form-control" onchange="try{setCustomValidity('')}catch(e){}" minlength="6" maxlength="16" name="newPass" value="" placeholder="" required/>
                   		<div class="required-icon" id="ecashToolTip">
                    		<div class="text">*</div>
                    	</div>
                	</div>
            	</div>

            	<div class="form-group required-field-block">
					<label for="moEcash" class="w_normal text-gray">Konfirmasi Sandi Baru :</label>
					<div class="input-group">
                   		<span class="input-group-addon icon-login">
                       		<i class="glyphicon glyphicon-lock"></i>
                   		</span>
                   		<input id="konfPass" type="password" class="form-control" onchange="try{setCustomValidity('')}catch(e){}" minlength="6" maxlength="16" name="konfPass" value="" placeholder="" required/>
                   		<div class="required-icon" id="ecashToolTip">
                    		<div class="text">*</div>
                    	</div>
                	</div>
            	</div>
            	<div class="form-center">
            		<button type="submit" name="setorKonf" value="ok" class="btn btn-header text-menu m_t_10 bg-white">
                	   	<span>Lanjut</span>
                	</button>
                </div>
			</form>
		</div>
	</div>
</div>
<?php
  if($error){
  ?>
<div id="alertModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" id="modal-content">
                    <button role='btn' class='close-alert' id='close-btn'><i class='fa fa-close text-white'></i></button>
                      <div class='container'>
                        <button role='btn' class='close-alert' id='close-btn'><i class='fa fa-close text-white'></i></button>
                        <div class='header-alert'>
                          <h2 id="alertHead"><?php echo $msg['head'];?></h2>
                        </div>
                        <h4 id="alertContent"><?php echo $msg['desc'];?></h4>
                      </div>               
                </div>
            </div>
        </div>
</div>
<?php } ?>

<?php
 if($success){
?>
<div id="successModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body green-bg" id="modal-content">
                    <button role='btn' class='close-alert' id='success-close-btn'><i class='fa fa-close text-white'></i></button>
                      <div class='container'>
                        <button role='btn' class='close-alert' id='close-btn'><i class='fa fa-close text-white'></i></button>
                        <div class='header-alert'>
                          <h2 id="alertHead"><?php echo $msg['head'];?></h2>
                        </div>
                        <h4 id="alertContent"><?php echo $msg['desc'];?></h4>
                      </div>               
                </div>
            </div>
        </div>
</div>
<?php }?>
<script type="text/javascript">
  $(function() {

      $("#close-btn").click(function(){
          $('#alertModal').modal("toggle");
      });

      $("#success-close-btn").click(function(){
          $('#successModal').modal("toggle");
      });

      $("#oldPass").on('invalid',function(event){
          var tmp = $('#oldPass').val();
          if(tmp == ""){
            $('#oldPass')[0].setCustomValidity('Silahkan masukan sandi lama terlebih dahulu');
          }else if(tmp.length < 6){
            $('#oldPass')[0].setCustomValidity('Panjang sandi minimal 6 karakter');
          }else{
            $('#oldPass')[0].setCustomValidity('Periksan masukan sandi lama Anda');
          }
      });

      $("#newPass").on('invalid',function(){
        var tmp = $('#newPass').val();
        if(tmp == ""){
          $('#newPass')[0].setCustomValidity('Silahkan masukan sandi baru terlebih dahulu');
        }else if(tmp.length < 6){
          $('#newPass')[0].setCustomValidity('Panjang sandi minimal 6 karakter');
        }else{
          $('#newPass')[0].setCustomValidity('Periksan masukan sandi lama Anda');
        }
      });

      $("#konfPass").on('invalid',function(){
        var tmp = $('#konfPass').val();
        if(tmp == ""){
          $('#konfPass')[0].setCustomValidity('Silahkan masukan sandi baru terlebih dahulu');
        }else if(tmp.length < 6){
          $('#konfPass')[0].setCustomValidity('Panjang sandi minimal 6 karakter');
        }else{
          $('#konfPass')[0].setCustomValidity('Periksan masukan sandi lama Anda');
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
<?php } ?>
<?php if($success){?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#successModal").modal('show');

        $("#close-btn").click(function(){
          $("#successModal").modal('toggle');
        });
    });
</script>
<?php } ?>
