<label><span class="glyphicon glyphicon-pencil"></span> <?php echo 'Publicar artículo' ?></label>
<input type="text" class="form-control" id="title" name="title" placeholder="<?php echo lang('write_title') ?>" value="<?php echo set_value('title') ?>" autofocus>
<?php echo form_error('title'); ?>
<textarea name="body" id="body" class="form-control" placeholder="<?php echo lang('write_contents') ?>"><?php echo set_value('body', '') ?></textarea>
<?php echo form_error('body'); ?>
<input type="hidden" id="id-article" value="<?php echo isset($id_article) ? $id_article : '' ?>">