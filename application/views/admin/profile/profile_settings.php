<div class="form-group">
	<label for="">Language</label>
	<select name="LangCode" class="form-control">
		<option value="english" <?php echo set_value('LangCode', $user['LangCode']) == 'english' ? 'selected' : '' ?>>English</option>
		<option value="spanish" <?php echo set_value('LangCode', $user['LangCode']) == 'spanish' ? 'selected' : '' ?>>Spanish</option>
	</select>
</div>

<hr>
<button class="btn btn-primary" type="submit">Guardar</button>
