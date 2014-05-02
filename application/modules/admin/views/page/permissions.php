<?php $id_page = $page->id_page ?>
<?php $title = 'Agregar permisos a <em><strong>' . $page->title . '</strong> (' . ($page->id_module == 0 ? 'Module' : ( $page->id_section == 0 ? 'Section' : 'Subsection')) . ')</em>' ?>
<?php echo modal_header($title) ?>
<div class="modal-body">
	<div class="alert alert-info">Si quita los permisos de <strong>lectura</strong> de <em><strong><?php echo $page->title ?></strong></em> esté se inhabilitará para dicho rol.</div>
    <?php if ($page->id_module == 0): ?>
        <div class="alert alert-warning">Si quita los permisos de <strong>lectura</strong> al módulo <em><strong><?php echo $page->title ?></strong></em>, las secciones del mismo ya no se mostrarán en el menú principal.</div>
    <?php endif ?>
    <table id="main-table" class="table table-striped table-bordered margin-zero">
    	<thead>
    		<tr>
    			<th>Rol</th>
    			<th>Read</th>
    			<th>Create</th>
    			<th>Update</th>
    			<th>Delete</th>
    		</tr>
    	</thead>
    	<tbody>
    	<?php if (count($permissions)): ?>
    		<?php foreach ($permissions as $permission): ?>
    			<?php $id_rol = $permission->id_rol ?>
    		<tr>
    			<td><?php echo $permission->name ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->read, 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/read') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->create, 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/create') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->update, 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/update') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->delete, 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/delete') ?></td>
    		</tr>
    		<?php endforeach ?>
		<?php endif ?>
		</tbody>
	</table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
</div>
