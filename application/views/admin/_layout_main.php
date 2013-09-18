<?php $this->load->view('admin/components/header'); ?>
<body>
    <?php if ($this->uri->segment(2) != 'dashboard' && $permissions_[$this->uri->segment(2)]['UPDATE'] == 'NO'): ?>
        <style type="text/css">
            .table th.edit, .table td.edit, .table th.state {display: none;}
        </style>
    <?php endif ?>
    <div class="spinner"></div>
    <div id="loading-ajax">
        <img src="<?php echo base_url() ?>/img/loader.gif">
        <label>Loading...</label>
    </div>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="wrap">
        <?php $this->load->view('admin/components/nav_main'); ?>
        <?php $this->load->view('admin/components/nav_lateral'); ?>
        <ul class="breadcrumb">
        <?php if (count($page_)) : ?>
            <li><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>
        <?php endif ?>
            <li class="active"><?php echo $title_ ?></li>
        </ul>
        <div class="container">
            <?php $this->load->view($subview); // Cargando la sub vista ?>
        </div>
    <?php $this->load->view('admin/components/footer'); ?>