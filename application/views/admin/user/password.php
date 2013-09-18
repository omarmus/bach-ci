<?php echo modal_header('Resetear password para <em>' . $user['FirstName'] . ' ' . $user['LastName'] . '</em>') ?>
<div class="modal-body">
	<div class="alert alert-info">Se enviará la nueva contraseña a su cuenta de correo: <em><strong><?php echo $user['Email'] ?></strong></em></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    <button type="button" class="btn btn-primary" onclick="reset_password(<?php echo $user['IdUser'] ?>)"><span class="glyphicon glyphicon-repeat"></span> Reset password</button>
</div>
