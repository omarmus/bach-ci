<?php $this->load->view('admin/components/header'); ?>
<body>
    <?php //$this->load->view('admin/components/chat'); ?>
    <?php if ($this->uri->segment(1) != 'dashboard' && $permissions_[$uri_]['UPDATE'] == 'NO'): ?>
        <style type="text/css">
            .table th.edit, .table td.edit, .table th.state {display: none;}
        </style>
    <?php endif ?>
    <div class="spinner"></div>
    <div id="loading-ajax">
        <img src="<?php echo base_url() ?>assets/img/loader.gif">
        <label>Loading...</label>
    </div>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="wrap">
        <?php $this->load->view('admin/components/nav_main'); ?>
        <?php $this->load->view('admin/components/nav_lateral'); ?>
        <ul class="breadcrumb">
        <?php if (count($page_) && !is_null($title_module_)) : ?>
            <li class="active"><?php echo lang(strtolower(str_replace(' ', '_', $title_module_))) ?></li>
        <?php endif ?>
        <?php if (isset($breadcrumb)): ?>
            <?php for ($i = 0; $i < count($breadcrumb) - 1; $i++) : ?>
                <li><a href="<?php echo base_url() . $breadcrumb[$i]['link'] ?>"><?php echo $breadcrumb[$i]['text'] ?></a></li>
            <?php endfor ?>
            <li class="active"><?php echo $breadcrumb[count($breadcrumb) - 1]['text'] ?></li>
        <?php else: ?>
            <li class="active"><?php echo lang(strtolower(str_replace(' ', '_', $title_))) ?></li>    
        <?php endif ?>
        </ul>
        <div class="container">
            <?php $this->load->view($subview); // Cargando la sub vista ?>
        </div>
    <?php $this->load->view('admin/components/footer'); ?>