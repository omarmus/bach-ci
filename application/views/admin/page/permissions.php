<?php $id_page = $page->getIdPage() ?>
<?php $title = 'Agregar permisos a <em><strong>' . $page->getTitle() . '</strong> (' . ($page->getIdModule() == 0 ? 'Module' : ( $page->getIdSection() == 0 ? 'Section' : 'Subsection')) . ')</em>' ?>
<?php echo modal_header($title) ?>
<div class="modal-body">
	<div class="alert alert-info">Si quita los permisos de <strong>lectura</strong> de <em><strong><?php echo $page->getTitle() ?></strong></em> esté se inhabilitará para dicho rol.</div>
    <?php if ($page->getIdModule() == 0): ?>
        <div class="alert alert-warning">Si quita los permisos de <strong>lectura</strong> al módulo <em><strong><?php echo $page->getTitle() ?></strong></em>, las secciones del mismo ya no se mostrarán en el menú principal.</div>
    <?php else : ?>
        <?php if ($page->getIdSection() == 0): ?>
            <div class="alert alert-warning">Si quita los permisos de <strong>lectura</strong> a la sección <em><strong><?php echo $page->getTitle() ?></strong></em>, las sub-secciones del mismo ya no se mostrarán en el menú principal.</div>
        <?php endif ?>
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
    			<?php $id_rol = $permission->getIdRol() ?>
    		<tr>
    			<td><?php echo $permission->getSysRoles()->getName() ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->getRead(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Read') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->getCreate(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Create') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->getUpdate(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Update') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->getDelete(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Delete') ?></td>
    		</tr>
    		<?php endforeach ?>
		<?php endif ?>
		</tbody>
	</table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
</div>
