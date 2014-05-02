<?php $this->load->view('admin/components/header'); ?>
<body class="body-login">
    <div class="spinner"></div>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <script type="text/javascript">
		$(document).ready(function() {
			$('#language a').on('click', function (event) {
				event.preventDefault();
				show_loading('Cambiando de idioma...');
				$.get(_base_url + 'ajax/change_language/' + $(this).data('role'), function (response) {
					window.location = '';
				});
			});
		});
	</script>
    <div id="wrap">
		<?php $this->load->view($subview) //Subview in set in controller ?>
		
<?php $this->load->view('admin/components/footer'); ?>
        