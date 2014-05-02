<!-- Nav tabs -->
<ul class="nav nav-tabs" id="pages-tab">
	<li class="active"><a href="#cms" data-toggle="tab"><?php echo lang('cms') ?></a></li>
	<li><a href="#app" data-toggle="tab"><?php echo lang('app') ?></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content cms">
	<div class="tab-pane fade in active" id="cms">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo lang('pages_cms') ?></strong></div>
			<div class="list-group page-list">
				<?php echo get_list_sortable($pages_cms) ?>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="app">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo lang('pages_app') ?></strong></div>
			<div class="list-group page-list">
				<?php echo get_list_sortable($pages_app) ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div',
            maxLevels: 2
        });

        $('#pages-tab a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		});
    });
</script>