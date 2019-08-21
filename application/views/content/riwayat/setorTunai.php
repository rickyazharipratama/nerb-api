<div class="container">
    <h3 class="section-heading text-tengah header-phylosoper home-header">Riwayat Setor Tunai</h3>
    <hr class="border-blue"/>

    <div class="row clearfix gray-wrap-content">
        <div class="col-md-4 col-sm-5 col-xs-12">
            <div class="form-group required-field-block">
                    <label for="fromDate" class="w_normal text-gray">Dari Tanggal :</label>
                    <div class="input-group">
                        <span class="input-group-addon icon-login">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input id="fromDate" type="text" class="form-control" name="fromDate" value="" readonly="readonly" placeholder="" required/>
                    </div>
                </div>
        </div>
        <div class="col-md-4 col-sm-5 col-xs-12">
            <div class="form-group required-field-block">
                    <label for="endDate" class="w_normal text-gray">Sampai Tanggal :</label>
                    <div class="input-group">
                        <span class="input-group-addon icon-login">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input id="endDate" type="text" class="form-control" name="endDate" value="" readonly="readonly" placeholder="" required/>
                    </div>
                </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
            <button type="button" name="setorKonf" value="ok" id="cariBtn" class="btn btn-header text-menu search-button bg-white">
                <span>Cari</span>
            </button>
        </div>
    </div>
    <div class="row clearfix">
        <div id="history-wrapper">
            <ul class="timeline" id="setorTunaiList">
                
            </ul>
            <hr class="history-border"/>
            <div id="action-timeline" class="text-tengah action-wrapper">
                <button id="nextBtn" class="bounce"><i class="fa fa-angle-double-down"></i></button>
                <div class="loading-container" id="nextLoad">
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
         $('#cariBtn,#fromDate,#endDate').prop('disabled',true);
         $('#fromDate,#endDate').datetimepicker({
          useCurrent: true,
          ignoreReadonly: true,
          format: "DD/MM/YYYY"
        });

        $('#nextBtn').tooltip({
            placement: 'top',
            title: 'Lihat Selanjutnya'
        });

        $.ajax({
            type:'POST',
            url : "<?php echo $historyEndpoint;?>",
            data :{
                id:"<?php echo $user['agen'];?>",
                token:"<?php echo $user['token']?>",
                current: ""+curr+"",
                account:"<?php echo ACCOUNT_ID_AGENT;?>",
                typeId: "<?php echo TRANS_TYPE_ID_SETOR_TUNAI;?>"
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
                        var history =  resp.accountHistoryDetails;
                        $('#setorTunaiList').empty();
                        var nextHistory = "";
                        var isCantMarg = false;
                        for(var i = 0; i < history.length;i++){
                            nextHistory = getFormattedHistoryDate(history[i].transactionDate);
                            if(currHistory != nextHistory){
                                currHistory = nextHistory;
                                console.log(currHistory);
                                $("#setorTunaiList").append(
                                    "<li class='timeline-hist page-scroll'><div class='timeline-history-time'>"+currHistory+"</div></li>"
                                );
                                isCantMarg = true;
                            }
                            if(isCantMarg){
                                if(i % 2 == 0){
                                    $("#setorTunaiList").append(
                                        "<li class='page-scroll'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+ StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                    );
                                    isMod = true;
                                }else{
                                    $("#setorTunaiList").append(
                                    "<li class='timeline-inverted page-scroll'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                    );
                                    isMod = false;
                                }
                                isCantMarg = false;
                            }else{
                                if(i % 2 == 0){
                                    $("#setorTunaiList").append(
                                        "<li class='page-scroll timeline-marg'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+ StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                    );
                                    isMod = true;
                                }else{
                                    $("#setorTunaiList").append(
                                    "<li class='timeline-inverted page-scroll timeline-marg'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
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
        $('#fromDate').on('dp.change',function(e){
            $('#endDate').data('DateTimePicker').minDate(e.date);
            var endDateMoment = moment(e.date);
            endDateMoment.add(3,'months');
            $('#endDate').data('DateTimePicker').maxDate(endDateMoment);
            var ed = $('#endDate').val();
            if(ed != "" || typeof ed != 'undefined'){
                edParts = ed.split('/');
                endDate = new Date(edParts[2],edParts[1]-1,edParts[0]);
                diff = endDateMoment.toDate().getTime() - endDate.getTime();
                if(diff < 0){
                    $('#endDate').val(endDateMoment);
                }
            }
        });

        $('#cariBtn').click(function(){
            var sd = $('#fromDate').val();
            var ed = $('#endDate').val();
            if(sd == "" || typeof sd == 'undefined'){
                $('#fromDate').tooltip({
                    placement: 'top',
                    trigger:'focus',
                    title: 'Dari tanggal harus diisi'
                });
                $('#fromDate').focus();
            }else if(ed == "" || typeof ed == 'undefined'){
                $('#endDate').tooltip({
                    placement: 'top',
                    trigger:'focus',
                    title: 'Sampai tanggal harus diisi'
                });
                $('#endDate').focus();
            }else{
                $('#cariBtn,#fromDate,#endDate').prop('disabled',true);
                if(state == 1){
                    $('#history-wrapper').fadeOut('500',function(){
                        $('#open-load').fadeIn('500');                      
                    });
                }else if(state == 2){
                    $('#history-error').fadeOut('500',function(){
                        $('#open-load').fadeIn('500');                      
                    });
                }else{

                }
                curr = 0;
                $.ajax({
                    type:'POST',
                    url : "<?php echo $historyEndpoint;?>",
                    data :{
                        id:"<?php echo $user['agen'];?>",
                        token:"<?php echo $user['token']?>",
                        current: curr,
                        typeId: '<?php echo TRANS_TYPE_ID_SETOR_TUNAI;?>',
                        account:"<?php echo ACCOUNT_ID_AGENT;?>",
                        startDate:sd,
                        endDate : ed
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
                                var history =  resp.accountHistoryDetails;
                                $('#setorTunaiList').empty();
                                var nextHistory = "";
                                var isCantMarg = false;
                                for(var i = 0; i < history.length;i++){
                                    nextHistory = getFormattedHistoryDate(history[i].transactionDate);
                                    if(currHistory != nextHistory){
                                        currHistory = nextHistory;
                                        console.log(currHistory);
                                        $("#setorTunaiList").append(
                                            "<li class='timeline-hist page-scroll'><div class='timeline-history-time'>"+currHistory+"</div></li>"
                                        );
                                        isCantMarg = true;
                                    }

                                    if(isCantMarg){
                                        if(i % 2 == 0){
                                            $("#setorTunaiList").append(
                                                "<li class='page-scroll'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+ StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                            );
                                            isMod = true;
                                        }else{
                                            $("#setorTunaiList").append(
                                                "<li class='timeline-inverted page-scroll'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                            );
                                            isMod = false;
                                        }
                                        isCantMarg = false;
                                    }else{
                                        if(i % 2 == 0){
                                            $("#setorTunaiList").append(
                                                "<li class='page-scroll timeline-marg'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+ StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                            );
                                            isMod = true;
                                        }else{
                                            $("#setorTunaiList").append(
                                                "<li class='timeline-inverted page-scroll timeline-marg'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                            );
                                            isMod = false;
                                        }
                                    }
                                }
                                $('#open-load').fadeOut('500',function(){
                                    $('#cariBtn,#fromDate,#endDate').prop('disabled',false);
                                    $('#history-wrapper').fadeIn('500');
                                    state=1;
                                    cariState = 1;
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
            }
        });
    
        $('#nextBtn').click(function(){
            var fd="";
            var ed = "";
            if(cariState == 1){
                fd = $('#fromDate').val();
                ed = $('#endDate').val();
            }else{
                fd = "01/01/1990";
                ed = moment(new Date()).format("DD/MM/YYYY");;
            }
            $('#cariBtn,#fromDate,#endDate').prop('disabled',true);
            $("#nextBtn").fadeOut('500',function(){
                $('#nextLoad').fadeIn('500');
                $.ajax({
                    type:'POST',
                    url : "<?php echo $historyEndpoint;?>",
                    data :{
                        id:"<?php echo $user['agen'];?>",
                        token:"<?php echo $user['token']?>",
                        current: curr,
                        typeId: '<?php echo TRANS_TYPE_ID_SETOR_TUNAI;?>',
                        account:"<?php echo ACCOUNT_ID_AGENT;?>",
                        startDate:fd,
                        endDate : ed
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
                                var history =  resp.accountHistoryDetails;
                                var nextHistory = "";
                                var isCantMarg = false;
                                for(var i = 0; i < history.length;i++){
                                    nextHistory = getFormattedHistoryDate(history[i].transactionDate);
                                    if(currHistory != nextHistory){
                                        currHistory = nextHistory;
                                        console.log(currHistory);
                                        $("#setorTunaiList").append(
                                            "<li class='timeline-hist page-scroll'><div class='timeline-history-time'>"+currHistory+"</div></li>"
                                        );
                                        isCantMarg = true;
                                    }
                                    if(isCantMarg){
                                        if(!isMod){
                                            $("#setorTunaiList").append(
                                                "<li class='page-scroll'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+ StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                            );
                                            isMod = true;
                                        }else{
                                            $("#setorTunaiList").append(
                                                "<li class='timeline-inverted page-scroll'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                            );
                                            isMod = false;
                                        }
                                        isCantMarg = false;
                                    }else{
                                        if(!isMod){
                                            $("#setorTunaiList").append(
                                                "<li class='page-scroll timeline-marg'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-clock-o'></i> "+ StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount color-red'>"+history[i].amount+"</span></div></div></li>"
                                            );
                                            isMod = true;
                                        }else{
                                            $("#setorTunaiList").append(
                                                "<li class='timeline-inverted page-scroll timeline-marg'><div class='timeline-badge'><img src='<?php echo base_url();?>images/setormini.png' alt=''/></div><div class='timeline-panel'><div class='timeline-heading'><h4 class='timeline-title'>"+history[i].username+" - "+history[i].name+"</h4><p class='no-marg'><small class='text-muted rise-size'><i class='fa fa-file-o'></i> "+ history[i].transactionNumber+"</small></p><p class='no-marg'><small class='text-muted rise-size color-red'><i class='fa fa-clock-o'></i> "+StringDate(history[i].transactionDate)+"</small></p></div><div class='timeline-body'><span class='timeline-amount'>"+history[i].amount+"</span></div></div></li>"
                                            );
                                            isMod = false;
                                        }
                                    }
                                }
                                $('#nextLoad').fadeOut('500',function(){
                                    $('#cariBtn,#fromDate,#endDate').prop('disabled',false);
                                    $('#nextBtn').fadeIn('500');
                                    state=1;
                                    curr++;
                                });
                            }else if(resp.status == "<?php echo STATUS_NO_TRANSACTION?>"){
                                $('#nextLoad').fadeOut('500',function(){
                                    $('#cariBtn,#fromDate,#endDate').prop('disabled',false);
                                    state = 1;
                                });
                            }else{
                                $('#nextLoad').fadeOut('500',function(){
                                    $('#nextBtn').fadeIn('500',function(){
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
        });
    });
</script>