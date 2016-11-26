<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Fajar Suryanto">

    <title>Zeto Aryo Susetyo</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/zetoas/img/zeto.jpg" />

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/zetoas/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/zetoas/css/stylish-portfolio.css" rel="stylesheet">

    <!-- DDMENU -->
    <link href="<?php echo base_url(); ?>assets/zetoas/css/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/zetoas/js/ddmenu.js" type="text/javascript"></script>


    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/zetoas/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



    <!-- Header -->
    <header id="top" class="header">
        <div class="carousel slide carousel-fade" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active" style="background: url(<?php echo base_url(); ?>assets/zetoas/img/s1.jpeg) no-repeat center center fixed;">
                </div>
                <div class="item" style="background: url(<?php echo base_url(); ?>assets/zetoas/img/s2.jpg) no-repeat center center fixed;">
                </div>
                <div class="item" style="background: url(<?php echo base_url(); ?>assets/zetoas/img/s3.jpg) no-repeat center center fixed;">
                </div>
            </div>
        </div>
        <div class="text-vertical-center">
            <h1><?php echo $user_det['name']; ?></h1>
            <h3><?php echo $about['welcome']; ?></h3>
            
            <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>&nbsp;</strong>
                    </h4>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:<?php echo $user_det['email']; ?>"><?php echo $user_det['email']; ?></a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="<?php echo $about['facebook']; ?>"><i class="fa fa-facebook fa-fw fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $about['twitter']; ?>"><i class="fa fa-twitter fa-fw fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $about['instagram']; ?>"><i class="fa fa-instagram fa-fw fa-2x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <nav id="ddmenu">
                        <div class="menu-icon"></div>
                        <ul>
                            <?php
                                foreach($menu as $rmenu){
                            ?>
                            <li class="no-sub"><a class="top-heading" href="<?php echo base_url().$rmenu['url']; ?>.aspx"><?php echo $rmenu['title']?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <p>Copyright &copy; ZetoAS <?php echo date('Y'); ?></p>
                </div>
        </div>
    </header>

    <footer class="footer"><p>Powered by&nbsp; <a href="http://fajarsuryanto.com"><img height="20px" src="<?php echo base_url(); ?>assets/zetoas/img/sl_blk.png"></a>&nbsp;</p></footer>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/zetoas/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/zetoas/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
        $('.carousel').carousel();
    </script>

</body>

</html>
