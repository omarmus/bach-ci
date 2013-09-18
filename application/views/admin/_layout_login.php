<?php $this->load->view('admin/components/header'); ?>
<body class="body-login">
    <div class="spinner"></div>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="wrap">
		<!-- <div class="border-red"></div> -->
		<div class="container">
		    <?php $this->load->view($subview) //Subview in set in controller ?>
		</div>
<?php $this->load->view('admin/components/footer'); ?>
        