<?php $photo_default = $user->gender == 'M' ? 'profile-m.jpg' : 'profile.png'; ?>
<?php echo form_open_multipart('', array('id' => 'form-photo'));?>
<figure class="photo-user">
	<?php if ($photo != "") : ?>
		<img src="<?php echo base_url('assets/files/users') . '/'.$photo ?>" alt="user image"class="img-responsive"/>
	<?php else: ?>
		<img src="<?php echo base_url('assets/img/' . $photo_default) ?>" class="img-responsive"/>
	<?php endif ?>
		<figcaption>
			<span class="btn btn-primary fileinput-button">
				<span><i class="glyphicon glyphicon-camera"></i> <?php echo lang('select_image') ?>...</span>
				<input type="file" name="photo" id="photo" size="20">
			</span>
			<div class="clear"></div>
			<button type="button" class="btn btn-danger<?php echo $photo == "" ? ' hide': '' ?>" id="delete-photo"><i class="glyphicon glyphicon-trash"></i> <?php echo lang('delete') ?>...</button>
		</figcaption>
</figure>
<?php echo form_close(); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#photo').on('change', function (event) {
	    	event.preventDefault();
	    	$('#form-photo').submit();
	    });

	    $('#form-photo').on('submit', function (event) {
	    	var form = this;
            event.preventDefault();
            show_loading('Subiendo foto...')
            $.ajaxFileUpload({
				url           : _base_url + 'admin/profile/upload_photo/<?php echo $user->id_user ?>',
				secureuri     : false,
				fileElementId : 'photo',
				dataType      : 'json',
				data          : {},
				success  : function (response) {
               		if (response.status == 'error') {
               			message_error(response.msg)
               		}
               		var filename = response.filename;
               		show_loading('Actualizando foto');
               		$.get(_base_url + 'admin/profile/load_add_photo', function(response) {
               			hide_loading();
               			$('#photo-user-menu').css('backgroundImage', 'url("'+_base_url + 'assets/files/users/' + filename + '")');
               			$('#container-photo').html(response);
               		});
                }
            });
        });

	    var $delete_photo = $('#delete-photo');
	    $delete_photo.on('click', function () {
	    	if (confirm('Se borrará su imagen de perfil.')) {
	    		show_loading('Eliminando foto');
				$.post(_base_url + 'admin/profile/delete_photo/<?php echo $user->id_user ?>', function () {
					hide_loading();
					message_ok('Delete photo!');

					$delete_photo.addClass('hide');
					$('.photo-user > img').prop('src', _base_url + 'assets/img/<?php echo $photo_default ?>');
					$('#photo-user-menu').css({
						backgroundImage : 'url("'+_base_url + 'assets/img/<?php echo $photo_default ?>")',
						backgroundColor : '#ffffff'
					});
	   			});
			};	
	    });
	});
</script>