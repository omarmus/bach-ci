<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css');?>">
        <link href="//fonts.googleapis.com/css?family=Arizonia" rel="stylesheet" type="text/css">
        <link href='//fonts.googleapis.com/css?family=Fresca' rel='stylesheet' type='text/css'>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/lib/jquery/jquery-1.10.1.min.js');?>"><\/script>')</script>
        <script type="text/javascript">
        var base_url_ = '<?php echo base_url() ?>';
        </script>
        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrap">
            <header>
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo base_url() ?>"><img style="margin: -6px 0 0; width:130px;" src="<?php echo base_url() ?>assets/img/titulo.png"></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <?php echo get_menu_cms($menu); ?>
                            <!-- <form class="navbar-form navbar-right">
                                <button type="submit" class="btn btn-success">Log in</button>
                            </form> -->
                            <div class="navbar-form navbar-right">
                                <form action="<?php echo base_url() ?>search" class="search pull-right" method="post">
                                    <span class="glyphicon glyphicon-search"></span><input type="search" class="form-control" value="<?php echo $this->input->post('filter') ?>" name="filter" placeholder="Buscar atractivo turístico">
                                </form>
                                <div class="hidden-sm fb-like facebook-like pull-right" data-colorscheme="dark" data-href="https://www.facebook.com/pages/Turismo-Virtual-y-Digital-La-Paz/537487096370206?ref=hl" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"> </div>    
                            </div>
                        </div><!--/.navbar-collapse -->
                    </div>
                </nav>
            </header>
            