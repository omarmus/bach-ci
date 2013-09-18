
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title><?php echo $meta_title_ ?></title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
        <link rel="stylesheet" href="<?php echo base_url('lib/bootstrap/css/bootstrap.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('lib/bootstrap-glyphicons/css/bootstrap-glyphicons.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('lib/jquery.gritter/css/jquery.gritter.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/main.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/themes/default/style.css') ?>">
        <!-- <link rel="stylesheet" href="<?php echo base_url('lib/bootstrap/css/bootstrap-theme.min.css') ?>"> -->
        <!--[if lt IE 9]>
            <script src="<?php echo base_url('js/html5-3.6-respond-1.1.0.min.js') ?>"></script>
        <![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url('lib/jquery/jquery-1.9.1.min.js') ?>"><\/script>')</script>
        <?php if (isset($sortable) && $sortable == TRUE): ?>
            <script src="<?php echo base_url('lib/jqueryui/jquery-ui-1.10.3.custom.min.js') ?>"></script>
            <script src="<?php echo base_url('lib/jquery.nestedSortable/jquery.mjs.nestedSortable.js') ?>"></script>
        <?php endif; ?>
        <script src="<?php echo base_url('lib/socket.io/socket.io.min.js') ?>"></script>
        <script src="<?php echo base_url('js/socket.js') ?>"></script>
        <script src="<?php echo base_url('js/chat.js') ?>"></script>
        <script type="text/javascript">
            var _base_url = '<?php echo base_url() ?>',
                _uri = '<?php echo $this->uri->uri_string() ?>',
                _my_user = <?php if ($my_user) : ?>JSON.parse('<?php echo $my_user ?>')<?php else : ?>{}<?php endif; ?>;


        </script>
        <?php if ($my_user): ?>
        <?php $this->load->view('admin/components/chat'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                init_chat();
            });
        </script>
    <?php endif ?>
    </head>
            