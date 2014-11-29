<script type="text/js-tmpl" id="article-tmpl">
    <article class="col-md-6 col-sm-6 col-xs-12" >
        <div>
        	<div class="info-article">
        		<figure class="photo-user-article" style="background-image: url('<?php echo base_url() ?>{photo_user}');"></figure>
        		<p>
        			<strong><a href="<?php echo base_url() ?>admin/profile/{id_user}">{name_user}</a></strong> a publicado un artículo<br>
        			<em><a href="#" title="{date}" onclick="return false;">{date_literal}</a></em> - 
        			<em><a href="#" onclick="return false;" class="number-visits">Visto <span>{number_visits}</span> {label_visits}</a></em>
        		</p>
        		<div class="btn-group">
				  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
				    <i class="glyphicon glyphicon-chevron-down"></i>
				  </button>
				  <ul class="dropdown-menu" role="menu">
				    <li><a href="#" data-role="{id_article}" class="{action_favorite} action-favorite">{label_favorite}</a></li>
				  </ul>
				</div>
				{favorite}
        	</div>
        	<div class="categories"><em>Categoría(s): {categories}</em></div>
            <div class="details-article" data-role="{id_article}">
            	<div>
            	    <h3>{title}</h3>
            	    {body}
            	</div>
            	{image}
            </div>
        </div>  
    </article>
</script>

<script type="text/js-tmpl" id="image-tmpl">
	<img class="img-responsive" src="<?php echo base_url() ?>{photo}" style="height: {height}px">
</script>

<script type="text/js-tmpl" id="video-tmpl">
	<div class="video-youtube">
		<iframe src="{url}?controls=0" width="{width}" height="{height}" frameborder="0" allowfullscreen></iframe>
	</div>
</script>

<script type="text/js-tmpl" id="loading-tmpl">
	<div class="loading text-center"><img src="<?php echo base_url() ?>assets/img/spinner.gif"></div>
</script>

<script type="text/js-tmpl" id="tmpl-tag">
	<a href="#" data-role="{id}"><label class="label label-default">{tag}</label></a>
</script>

<script type="text/tmpl-js" id="tmpl-new-article">
	<div class="list-group-item">
		<a href="#"  class="list-group-item" data-role="{id_article}">
			<span class="glyphicon glyphicon-star-empty" style="color: crimson;"></span> <strong>{title}</strong>
		</a>
		<div>
			<button title="Editar artículo" class="btn btn-default btn-xs" data-role="{id_article}"><span class="glyphicon glyphicon-pencil"></span></button>
			<button title="Eliminar artículo" class="btn btn-danger btn-xs" data-role="{id_article}"><span class="glyphicon glyphicon-trash"></span></button>
		</div>
	</div>
</script>

<script type="text/tmpl-js" id="tmpl-new-new">
	<div class="list-group-item">
		<a href="#"  class="list-group-item" data-role="{id_article}">
			<span class="glyphicon glyphicon-flag" style="color: crimson;"></span> <strong>{title}</strong>
		</a>
		<div>
			<button title="Editar noticia" class="btn btn-default btn-xs" data-role="{id_article}"><span class="glyphicon glyphicon-pencil"></span></button>
			<button title="Eliminar noticia" class="btn btn-danger btn-xs" data-role="{id_article}"><span class="glyphicon glyphicon-trash"></span></button>
		</div>
	</div>
</script>

<script type="text/tmpl-js" id="tmpl-new-favorite">
	<div class="list-group-item">
		<a href="#"  class="list-group-item" data-role="{id_article}">
			<span class="glyphicon glyphicon-star" style="color: #F0AD4E;"></span> <strong>{title}</strong>
		</a>
		<?php if ($profile) : ?>
		<div>
			<button title="Ver favorito" class="btn btn-default btn-xs" data-role="{id_article}"><span class="glyphicon glyphicon-eye-open"></span></button>
			<button title="Eliminar favorito" class="btn btn-danger btn-xs" data-role="{id_article}"><span class="glyphicon glyphicon-trash"></span></button>
		</div>
		<?php endif; ?>
	</div>
</script>