<?php $new = ! isset($article->id_article); ?>
<?php echo modal_header($new ? lang('add_article') : lang('edit_article') . ' ' . $article->title) ?>
<form onsubmit="return validate(this, '<?php echo base_url('cms/article/edit'. ( $new ? '' : '/' . $article->id_article )) ?>', set_events, load_articles)">
	<div class="modal-body">
		<div class="form-group">
	    	<label for=""><?php echo lang('title') ?> <strong>*</strong></label> 
			<?php echo form_input('title', set_value('title', $article->title), 'class="form-control" id="title-article"'); ?>
			<?php echo form_error('title'); ?>
		</div>
		<div class="form-group">
			<label for=""><?php echo lang('uri') ?> <strong>*</strong></label>
			<?php echo form_input('slug', set_value('slug', $article->slug), 'class="form-control" id="uri-article"'); ?>
			<?php echo form_error('slug'); ?>
		</div>
		<div class="form-group" style="width: 20%;"> 
			<label for=""><?php echo lang('type') ?></label> 
			<?php echo form_dropdown('type', array('CMS' => 'CMS', 'APP' => 'APP'), set_value('type', $article->type), 'class="form-control" id="page-type"'); ?>
			<?php echo form_error('type'); ?>
		</div>
		<div class="form-group" style="width: 40%;"> 
			<label for=""><?php echo lang('page') ?> <strong>*</strong></label> 
			<?php echo form_dropdown('id_page', $new || $article->type == 'CMS' ? get_pages_array($page_cms) : get_pages_array($page_app), set_value('id_page', $article->id_page), 'class="form-control" id="select-page"'); ?>
			<?php echo form_error('id_page'); ?>
		</div>
		<div class="form-group" style="width: 40%;">
	    	<label for=""><?php echo lang('publication_date') ?> <strong>*</strong></label> 
			<div class="input-group date" data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd">
				<input class="form-control" name="pubdate" type="text" readonly="readonly" value="<?php echo set_value('pubdate', $article->pubdate) ?>">
				<span class="input-group-addon glyphicon glyphicon-calendar"></span>
			</div>
			<?php echo form_error('pubdate'); ?>
		</div>
		<div class="form-group" style="width: 100%; margin: 0;">
			<label for=""><?php echo lang('body') ?> <strong>*</strong></label>
			<textarea name="body" id="body" class="form-control"><?php echo set_value('body', $article->body) ?></textarea>
			<?php echo form_error('body'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
<script type="text/js-tmpl" id="page-cms">
	<?php echo get_options_group(get_pages_array($page_cms)) ?>
</script>
<script type="text/js-tmpl" id="page-app">
	<?php echo get_options_group(get_pages_array($page_app)) ?>
</script>