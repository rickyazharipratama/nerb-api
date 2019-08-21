<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>e-bill</title>

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/eLogo.png">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet"/>

    <link href="<?php echo base_url();?>css/ns-default.css" rel="stylesheet"/>
        <link href="<?php echo base_url();?>css/ns-style-bar.css" rel="stylesheet"/>
        <link hreaf="<?php echo base_url();?>css/animate.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'/>

    <!-- Plugin CSS -->
    <link href="<?php echo base_url();?>css/magnific-popup.css" rel="stylesheet"/>

    <!-- Theme CSS -->
    <link href="<?php echo base_url();?>css/creative.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top">
    <header id="home">
        <div class="header-content">
            <div class="header-content-inner">
                <div class="login-logo">
                    <img src="<?php echo base_url();?>images/loading_img.png">
                </div>
                <div class="login-wrapper">
                    <div class="login-header">
                        <div class="line"><h3>Login</h3></div>
                        <div class="outter">
                            <span class="fa fa-user-circle-o login-icon"></span>
                        </div>
                    </div>
                    <div class="login_control">
                        <form role="form" method="post" action="<?php echo base_url();?>api/auth/login">
                            <div class="control">
                                <div class="label">User Agen / Agen Id</div>
                                <input type="text" class="form-control" name="username" id = "username" value="" minlength="6" required />
                            </div>
                            <div class="control">
                                <div class="label">Password</div>
                                    <input type="password" class="form-control" id ="password" name="password" minlength="6" value="" required/>
                                </div>
                                <div align="center">
                                    <button type="submit" name="loginBtn" value="logOk" class="btn btn-orange">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="footer-login">
                        <p>Copyright <span class="color-blue">mandiri e-cash</span>. Version : 0.9.0</p>
                    </div>
                </div>
            </div>
        </div>    
    </header>

    <!--<section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Simple, mudah dan Aman</h2>
                    <hr class="light">
                    <p class="text-faded">E-bill memudahkan pembuatan tagihan pelanggan Anda dengan menggunakan fitur Mandiri Merchant Payment Transfer. Cukup melakukan upload dan konfirmasi data tagihan</p>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Layanan</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Setor Tunai</h3>
                        <p class="text-muted">Agen mandiri e-cash dapat melakukan top-up saldo pengguna mandiri e-cash.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Tarik Tunai</h3>
                        <p class="text-muted">Pengguna mandiri e-cash dapat melakukan tarik tunai melalui agen.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Deposit Settlement</h3>
                        <p class="text-muted">Memungkinkan agen untuk memindahkan saldo agen mandiri e-cash ke rekening.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Upgrade Layanan</h3>
                        <p class="text-muted">Agen dapat melakukan upgrade layanan pengguna mandiri e-cash.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="contact" class="bg-dark" style="background: #545151">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Hubungi Kami</h2>
                    <hr class="primary">
                </div>
                <div class="col-lg-3 col-md-3 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>021-275-10391/92 ext. 105</p>
                </div>
                <div class="col-lg-3 col-md-3 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:cs@mandiriecash.co.id">cs@mandiriecash.co.id</a></p>
                </div>
                <div class="col-lg-3 col-md-3 text-center">
                    <i class="fa fa-building-o fa-3x sr-contact"></i>
                    <p>Jl. Erlangga V No. 15A Selong Kebayoran Baru Jakarta Selatan, Jakarta 12170, Indonesia</p>
                </div>
                <div class="col-lg-3 col-md-3 text-center">
                    <i class="fa fa-link fa-3x sr-contact"></i>
                    <p><a href="https://mandiriecash.co.id">www.mandiriecash.co.id</a></p>
                </div>
            </div>
        </div>
    </div>-->
    <div id="alertModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
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

   <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>js/modernizr.custom.js"></script>
    <script src="<?php echo base_url();?>js/modernizr-2.6.1.min.js"></script>
    <script src="<?php echo base_url();?>js/classie.js"></script>
    <script src="<?php echo base_url();?>js/notificationFx.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>
    <script type="<?php echo base_url();?>js/engine/Api.js"></script>

    <?php
    if($error){
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#alertModal").modal('show');

            $("#close-btn").click(function(){
                $("#alertModal").modal('toggle');
            });
        });



    </script>

    <?php
    }
    ?>
</body>
</html>
