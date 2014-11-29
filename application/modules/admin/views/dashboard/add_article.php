<input type="text" 
	   autocomplete="off" 
	   class="form-control" 
	   id="title" 
	   name="title" 
	   placeholder="<?php echo isset($id_page) && $id_page == 15 ? 'Escribe el título de la noticia aquí' : lang('write_title') ?>" 
	   value="<?php echo set_value('title') ?>" 
	   autofocus>
<?php echo form_error('title'); ?>
<textarea name="body" 
		  id="body" 
		  class="form-control" 
		  placeholder="<?php echo isset($id_page) && $id_page == 15 ? 'Escribe la descripción de la noticia aquí' : lang('write_contents') ?>" 
		  style="margin-bottom: 5px;"><?php echo set_value('body', '') ?></textarea>
<?php echo form_error('body'); ?>
<div <?php echo isset($id_page) && $id_page == 15 ? 'style="display: none;"' : '' ?>>
	<select name="tags[]" 
			id="tags" 
			data-placeholder="Seleccione o escriba una o varias categorías para el artículo" 
			class="form-control chosen-select" 
			multiple="multiple" 
			style="margin-bottom: 5px;">
		<?php foreach ($tags as $tag): ?>
			<option value="<?php echo $tag->id_tag ?>"><?php echo $tag->name ?></option>
		<?php endforeach ?>
	</select>
	<?php echo form_error('tags'); ?>
</div>

<input type="hidden" id="id-article" value="<?php echo isset($id_article) ? $id_article : '' ?>">
<script type="text/javascript">
	$(document).ready(function() {
		$('#body').autoResize({
			limit : 400,
			onResize : set_height_container
		});
		$(".chosen-select").chosen().on('change', function() {
			$('#tags_chosen').next().fadeOut(function() {
				set_height_container();
			});
		});
	});
</script>