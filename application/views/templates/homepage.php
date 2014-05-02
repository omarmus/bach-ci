<div id="carousel">
	<div class="row">
		<!-- Carousel  -->
		<div class="col-md-6 hidden-xs">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
				<img class="img-logo" src="<?php echo base_url() ?>assets/img/titulo-sub.png">
				<?php $c = 0; ?>
					<?php foreach ($photos as $photo) : ?>
					<div class="item <?php echo $c++ ? '' : 'active' ?>">
						
						<img src="<?php echo base_url() . 'assets/files/pages/photos/' . $photo->filename;?>" alt="First slide">
						<div class="carousel-caption">
							<h3><?php echo $photo->description ?></h3>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
		<div class="col-md-6 hidden-sm hidden-xs">
			<div id="myCarousel-umsa" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<img class="img-logo logo-right" src="<?php echo base_url() ?>assets/img/titulo-sub.png">
			<?php
				$dir = base_url('assets/img/umsa');
				$directorio = opendir('assets/img/umsa'); //ruta actual

				$array = array();
				while ($archivo = readdir($directorio)) {
					if (!is_dir($archivo) && strpos($archivo, '.JPG') !== FALSE)//verificamos si es o no un directorio
					{
						$array[] = $archivo;
					}
				}

				$c = 0;
				$max = 4;
				$num = count($array);
				$random = array();
				while ($c < $num && $c < $max) {
					$pos = rand(0, $num-1);
					if (empty($random[$pos])) {
						$random[$pos] = $array[$pos];
						$c++;
					}
				}

				$c = 0;
				foreach ($random as $img) { ?>
					<div class="item <?php echo $c++ ? '' : 'active' ?>">
						<img src="<?php echo $dir . '/' . $img;?>" alt="First slide">
						<!-- <div class="carousel-caption title-right">
							<h3>Imágen de la UMSA 2014</h3>
						</div> -->
					</div>
					<?php
				} ?>
				</div>
				<a class="left carousel-control" href="#myCarousel-umsa" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#myCarousel-umsa" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>	
	</div>
</div><!--Final Carousel-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="section"><?php echo $page->body ?></div>
		</div>
	</div>
</div>
<div class="container">
	<h2>Atractivos turísticos</h2>
	<div id="masonry" class="row"></div>
	<div class="loading text-center"><img src="<?php echo base_url() ?>assets/img/spinner.gif"></div>
	<input type="hidden" id="pks" value="">
</div>
<script type="text/javascript">
 	var processing = true,
 		$tmpl_article = null,
 		$container = null,
 		$pks = null,
 		$loading = null;

	$(document).ready(function() {
		$tmpl_article = $('#article-tmpl').html(),
 		$container = $('#masonry'),
 		$pks = $('#pks'),
 		$loading = $('.loading');

		get_articles();

		$(window).on('scroll', function(event) {
			event.preventDefault();
			if (processing && $(window).scrollTop() >= ($(document).height() - $(window).height())*.9){
				processing = false;
			    get_articles();
			}
		});
	});

	function get_articles () {
		$loading.show();
		$.post(base_url_ + 'article/get_articles', {pks : $pks.val()}, function(data) {
			$loading.hide();
	    	processing = data.articles.length ? true : false;
	    	var elements = '';
	    	var articles = data.articles;
	    	for (var i = 0; i < articles.length; i++) {
	    		var article = {
		    		id_article : articles[i].id_article,
		    		photo : articles[i].photo,
		    		body : articles[i].body
		    	};
		    	elements += nano($tmpl_article, article);
	    	};
	    	var $elements = $( elements );
	    	set_event_articles($elements);
	        $container.append( $elements );
	        $pks.val() == '' ? $container.masonry() : $container.masonry( 'appended' , $elements );
	        console.log($pks.val(), data.pks, $pks.val() + data.pks);
	    	$pks.val($pks.val() + data.pks);
		}, 'json');
	}
</script>