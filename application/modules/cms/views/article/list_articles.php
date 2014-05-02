<h3>
	<?php if (isset($title_page)): ?>
		<span class="label label-default"><?php echo $title_page ?></span>
	<?php endif ?>
	<?php if (isset($filter)): ?>
		<span class="label label-default"><?php echo lang('filter_results') ?></span>
	<?php endif ?>
</h3>
<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit"><?php echo lang('edit') ?></th>
			<th class="edit"><?php echo lang('multimedia') ?></th>
			<th><?php echo lang('name') ?></th>
			<th><?php echo lang('date') ?></th>
		<?php if (isset($filter)): ?>
			<th><?php echo lang('page') ?></th>
		<?php endif ?>
			<th class="state"><?php echo lang('active') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($articles)): foreach ($articles as $article): ?>
			<tr>
				<td><?php echo $article->id_article ?></td>
				<td class="edit"><?php echo button_edit('cms/article/edit/' . $article->id_article) ?></td>
				<td class="edit">
					<div class="file-buttons">
						<?php echo button_modal('' ,'cms/article/get_files/' . $article->id_article . '/PHOTO', 'glyphicon-picture', '', 'UPDATE', array('title' => lang('photos'), 'orientation' => 'bottom')) ?>
						<?php echo button_modal('' ,'cms/article/videos/' . $article->id_article, 'glyphicon-facetime-video', '', 'UPDATE', array('title' => lang('videos'), 'orientation' => 'bottom')) ?>
						<?php echo button_modal('' ,'cms/article/get_files/' . $article->id_article . '/AUDIO', 'glyphicon-headphones', '', 'UPDATE', array('title' => lang('audios'), 'orientation' => 'bottom')) ?>
						<?php echo button_modal('' ,'cms/article/get_files/' . $article->id_article . '/DOCUMENT', 'glyphicon-folder-open', '', 'UPDATE', array('title' => lang('documents'), 'orientation' => 'bottom')) ?>
					</div>
				</td>
				<td><?php echo $article->title; ?></td>
				<td><?php echo $article->pubdate ?></td>
			<?php if (isset($filter)): ?>
				<td><?php echo $article->page ?></td>
			<?php endif ?>
				<td class="edit"><?php echo button_on_off($article->state, 'cms/article/set_on_off/'. $article->id_article) ?></td>
			</tr>
		<?php endforeach; endif ?>
	</tbody>
</table>
<script type="text/javascript">
	oTable = $('#main-table').dataTable({
		"aoColumnDefs" : [
			{"bVisible": false, "aTargets": [ 0 ]}, 
			{"bSortable": false, "aTargets": [ 1, 2, <?php echo isset($filter) ? '6' : '5' ?> ]}
		]
	});

	$('.file-buttons > button').tooltip();

</script>