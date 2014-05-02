
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

        <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700"> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/jquery.gritter/css/jquery.gritter.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/datepicker/css/datepicker.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/timepicker/css/bootstrap-timepicker.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/themes/default/style.css') ?>">
        <!-- <link rel="stylesheet" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap-theme.min.css') ?>"> -->
        <!--[if lt IE 9]>
            <script src="<?php echo base_url('assets/js/html5-3.6-respond-1.1.0.min.js') ?>"></script>
        <![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/lib/jquery/jquery-1.10.1.min.js');?>"><\/script>')</script>

        <?php if (isset($sortable) && $sortable): ?>
            <script src="<?php echo base_url('assets/lib/jqueryui/jquery-ui-1.10.3.custom.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/lib/jquery.nestedSortable/jquery.mjs.nestedSortable.js') ?>"></script>
        <?php endif; ?>

        <?php if (isset($editor) && $editor): ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/codemirror/codemirror.min.css') ?>" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/codemirror/monokai.min.css') ?>" />
            <script type="text/javascript" src="<?php echo base_url('assets/lib/codemirror/codemirror.min.js') ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/lib/codemirror/xml.min.js') ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/lib/codemirror/formatting.min.js') ?>"></script>
        <?php endif; ?>

        <?php if ((isset($editor) && $editor) || (isset($simple_editor) && $simple_editor)) : ?>
            <link rel="stylesheet" href="<?php echo base_url('assets/lib/summernote/css/font-awesome.min.css') ?>" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/summernote/summernote.css') ?>" />
            <script src="<?php echo base_url('assets/lib/summernote/summernote.min.js') ?>"></script>
        <?php endif; ?>

        <?php if (isset($upload) && $upload): ?>
            <script src="<?php echo base_url('assets/lib/ajax-file-uploader/ajaxfileupload.js') ?>"></script>
        <?php endif; ?>

        <?php if (isset($mansonry) && $mansonry): ?>
            <script type="text/javascript" src="<?php echo base_url('assets/lib/FitVids.js') ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/lib/masonry.pkgd.min.js');?>"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    _width = $('#width').width();
                });
            </script>
        <?php endif; ?>

        <?php if (isset($audio) && $audio): ?>
            <script src="<?php echo base_url('assets/lib/audiojs/audiojs/audio.min.js') ?>"></script>
        <?php endif; ?>

        <script type="text/javascript">
            var _base_url = '<?php echo base_url() ?>',
                _uri = '<?php echo $this->uri->uri_string() ?>',
                _width = 0;
                // _my_user = <?php if ($my_user) : ?>JSON.parse('<?php echo $my_user ?>')<?php else : ?>{}<?php endif; ?>            
        </script>
        <?php $this->load->view('lang'); ?>
    </head>
            