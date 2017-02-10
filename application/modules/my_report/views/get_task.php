<?php //pre($list_task_active); ?>
<select id="gg" class="select3_single form-control"  required="required" name="task" tabindex="-1">
	<option completion="100" value="0">Công việc phát sinh</option>
	<?php foreach ($list_task_active as $key => $value) { ?>
	<option completion= "<?php echo $value->completion ?>" value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
	<?php } ?>
</select>
