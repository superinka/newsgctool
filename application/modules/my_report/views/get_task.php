<?php //pre($list_task_active); ?>
<select class="select3_single form-control"  required="required" name="task" tabindex="-1">
	<option value="0">Công việc phát sinh</option>
	<?php foreach ($list_task_active as $key => $value) { ?>
	<option value="<?php $value->id ?>"><?php echo $value->name ?></option>
	<?php } ?>
</select>
