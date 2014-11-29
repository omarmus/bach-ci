<form class="filter" id="form-filter-articles"method="post">
	<div>
		<label><?php echo lang('name') ?>/<?php echo lang('uri') ?></label>
		<input type="text" name="title" value="" class="form-control">
	</div>
	<div>
    	<label for=""><?php echo lang('publication_date') ?></label> 
		<div class="input-group date" data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd">
			<input class="form-control" name="pubdate" type="text" readonly="readonly" value="">
			<span class="input-group-addon glyphicon glyphicon-calendar"></span>
		</div>
	</div>
	<div class="hide"> 
		<label for=""><?php echo lang('page') ?></label> 
		<select name="id_page" class="form-control">
			<option value="0"><?php echo lang('all') ?></option>
			<?php echo get_options($list_pages, FALSE) ?>
		</select>
	</div>
	<?php echo button_filter() ?>
	
	<button class="btn btn-default" type="reset" id="button-filter" style="display: none">
        <span class="glyphicon glyphicon-ban-circle"></span> <?php echo lang('search_end') ?>
    </button>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add(lang('add_article'), 'cms/article/edit'); ?>
	<?php echo button_delete('cms/article/delete_selected'); ?>
</div>
<div class="row">
	<div class="col-md-3">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="pages-tab">
			<li class="active"><a href="#cms" data-role="CMS" data-toggle="tab"><?php echo lang('cms') ?></a></li>
			<li><a href="#app" data-role="APP" data-toggle="tab"><?php echo lang('app') ?></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content cms">
			<div class="tab-pane fade in active" id="cms">
				<div class="panel panel-default">
					<div class="panel-heading"><strong><?php echo lang('pages_cms') ?></strong></div>
					<div class="list-group page-list">
						<?php echo get_pages($pages_cms) ?>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="app">
				<div class="panel panel-default">
					<div class="panel-heading"><strong><?php echo lang('pages_app') ?></strong></div>
					<div class="list-group page-list">
						<?php echo get_pages($pages_app) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-9" id="articles-container"></div>
</div>
<input type="hidden" id="tab-selected" value="CMS">
<script type="text/javascript">
	var $page_list = $('.page-list'),
		$list = $page_list.find('.page'),
		$parents = $page_list.find('.parent'),
		$button_filter = $('#button-filter');

	$(document).ready(function() {
		$(".date").datepicker({ autoclose: true, todayHighlight: true });

		var $first = $($list[0]),
			id_page = $first.data('role');

		$first.addClass('active');
		get_articles(id_page);

		$list.on('click', function (event) {
			event.preventDefault();
			var $this = $(this);
			$page_list.find('.active').removeClass('active');
			$this.addClass('active');
			get_articles($this.data('role'));
		});

		$parents.on('click', function(event) {
			event.preventDefault();
			var $this = $(this);
			$this.next().slideToggle();
			$this.children('span').toggleClass('caret-left');
		});

		$('#main-modal').on('show.bs.modal', function () {
			set_events();
		});

		$('#form-filter-articles').on('submit', function(event) {
			event.preventDefault();
			$page_list.find('.active').removeClass('active');
			get_articles(null, this);
		});

		$button_filter.on('click', function(event) {
			get_articles($($list[0]).data('role'));
			$($list[0]).addClass('active');
			$button_filter.hide();
		});

		$('#pages-tab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
			$('#tab-selected').val($(this).data('role'));
		});
	});	

	function set_events () {
		var id_page = $page_list.find('.active').data('role');
		
		setEditor('#body');
		var uri = document.getElementById('uri-article');
		$('#title-article').on('keyup', function() {
			uri.value = normalize(this.value);
		});
		$(".date").datepicker({ autoclose: true, todayHighlight: true });

		var $page_cms = $('#page-cms').html(),
		$page_app = $('#page-app').html(),
		$select_parent = $('#select-page'),
		$type = $('#page-type');

		$type.on('change', function() {
			$select_parent.html(this.value == 'CMS' ? $page_cms : $page_app);	
		});

		if (id_page) {
			var selected = $('#tab-selected').val();
			$select_parent.html(selected == 'CMS' ? $page_cms : $page_app).val(id_page);
			$type.val(selected);
		}
	}

	function load_articles () {
		hide_modal();
		var id_page = $('#select-page').val();
		console.log(id_page);
		$page_list.find('.active').removeClass('active');
		$list.each(function(index, val) {
			var $this = $(this);
			if ($this.data('role') == id_page) {
				$this.addClass('active');
			};
		});
		get_articles(id_page);
	}

	function get_articles (id_page, form) {
		if (form) {
			form = $(form).serialize();
		}
		show_loading(id_page ? '<?php echo lang('loading_articles') ?>' : '<?php echo lang('search_articles') ?>');
		$.post(base_url + 'cms/article/list_articles/' + id_page || '', form, function(data) {
			hide_loading();
			$('#articles-container').html(data);
			if (id_page == null) {
				$button_filter.show();
			}
		});
	}
</script>
<style type="text/css">
	.child {text-indent: 20px; background: #D9EDF7;}
	.list-group.page-list > div {margin-top: 1px;}
</style>