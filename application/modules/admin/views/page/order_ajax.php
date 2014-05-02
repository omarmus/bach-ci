<?php echo get_list_sortable($pages); ?>

<script type="text/javascript">
	$(document).ready(function(){

        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div',
            maxLevels: 3
        });

        hide_loading();
    });
</script>