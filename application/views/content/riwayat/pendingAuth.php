<div class="container">
    <h3 class="section-heading text-tengah header-phylosoper home-header">Menunggu Otorisasi</h3>
    <hr class="border-blue"/>
    <div class="row clearfix">
        <div id="history-wrapper">
            <hr class="history-border-header"/>
            <ul class="timeline" id="setorTunaiList">
                
            </ul>
            <hr class="history-border"/>
        </div>
        <div id="history-error">
            <div class="text-tengah m-t-5-b-20">
                <img src="<?php echo base_url();?>images/setorTunaiGrey.png" class="img-header-content"/>
                <h4 class="text-gray" id="DescErrorHistory">Belum ada riwayat setor tunai.</h4>
            </div>
        </div>
        <div id="open-load" class="m_t_10">
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
<script type="text/javascript" src="<?php echo base_url();?>js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/engine/util.js"></script>
<script type="text/javascript">
    var state=0;
    var curr = 0;
    var cariState = 0; // 0 for initiate history, 1 for searching done;
    var isMod = false;
    var currHistory = "";
    $(document).ready(function(){
        $.ajax({
            type:'POST',
            url : "<?php echo $historyEndpoint;?>",
            data :{
                id:"<?php echo $user['agen'];?>",
                token:"<?php echo $user['token']?>"
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
                        var history =  resp.members;
                        $('#setorTunaiList').empty();
                        var nextHistory = "";
                        var isCantMarg = true;
                        for(var i = 0; i < history.length;i++){
                            //nextHistory = getFormattedHistoryDate(history[i].transactionDate);
                            //if(currHistory != nextHistory){
                            //    currHistory = nextHistory;
                            //    console.log(currHistory);
                            //    $("#setorTunaiList").append(
                            //        "<li class='timeline-hist page-scroll'><div class='timeline-history-time'>"+currHistory+"</div></li>"
                            //    );
                            //    isCantMarg = true;
                            //}
                            if(isCantMarg){
                                if(i % 2 == 0){
                                    $("#setorTunaiList").append(
                                        "<li class='page-scroll'><div class='timeline-badge'><img src='<?php echo base_url();?>images/upgrademini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-body'><div class='text-center'><span class='fa fa-user-circle-o logo-icon' id='pending-logo'></span><p>"+history[i].username+" - "+history[i].name+"</p></div><span class='timeline-status'>Menunggu Otorisasi cabang</span></div></div></li>"
                                    );
                                    isMod = true;
                                }else{
                                    $("#setorTunaiList").append(
                                    "<li class='timeline-inverted page-scroll'><div class='timeline-badge'><img src='<?php echo base_url();?>images/upgrademini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-body'><div class='text-center'><span class='fa fa-user-circle-o logo-icon' id='pending-logo'></span><p>"+history[i].username+" - "+history[i].name+"</p></div><span class='timeline-status'>Menunggu Otorisasi cabang</span></div></div></li>"
                                    );
                                    isMod = false;
                                }
                                isCantMarg = false;
                            }else{
                                if(i % 2 == 0){
                                    $("#setorTunaiList").append(
                                        "<li class='page-scroll timeline-marg'><div class='timeline-badge'><img src='<?php echo base_url();?>images/upgrademini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-body'><div class='text-center'><span class='fa fa-user-circle-o logo-icon' id='pending-logo'></span><p>"+history[i].username+" - "+history[i].name+"</p></div><span class='timeline-status'>Menunggu Otorisasi cabang</span></div></div></li>"
                                    );
                                    isMod = true;
                                }else{
                                    $("#setorTunaiList").append(
                                    "<li class='timeline-inverted page-scroll timeline-marg'><div class='timeline-badge'><img src='<?php echo base_url();?>images/upgrademini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-body'><div class='text-center'><span class='fa fa-user-circle-o logo-icon' id='pending-logo'></span><p>"+history[i].username+" - "+history[i].name+"</p></div><span class='timeline-status'>Menunggu Otorisasi cabang</span></div></div></li>"
                                    );
                                    isMod = false;
                                }
                            }

                        }
                        $('#open-load').fadeOut('500',function(){
                            $('#cariBtn,#fromDate,#endDate').prop('disabled',false);
                            $('#history-wrapper').fadeIn('500');
                            state=1;
                            curr++;
                        });
                    }else if(resp.status == "<?php echo STATUS_NO_TRANSACTION?>"){
                        $('#open-load').fadeOut('500',function(){
                            $('#DescErrorHistory').html("<?php echo DESC_HISTORY_EMPTY; ?> tarik tunai.");
                            $('#history-error').fadeIn('500',function(){
                                $('#cariBtn,#fromDate,#endDate').prop('disabled',false);
                            });
                            state = 2;
                        });
                    }else{
                        $('#open-load').fadeOut('500',function(){
                            $('#DescErrorHistory').html("<?php echo DESC_HISTORY_EMPTY; ?> tarik tunai.");
                            $('#history-error').fadeIn('500',function(){
                                $('#cariBtn,#fromDate,#endDate').prop('disabled',false);
                            });
                            state = 2;
                        });
                    }
                }
            },
            error:function(data){
                console.log(data);
            }
        });
    });
</script>