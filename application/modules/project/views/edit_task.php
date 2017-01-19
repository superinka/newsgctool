<h1>Trạng sửa công việc</h1>
<?php //pre($info_project); ?>
<h3>Dự án : <?php echo $info_project->project_name; ?></h3>
<h4>Nhiệm vụ : <?php echo $info_mission->name ?></h4>
<div class="row">
	<div class="col-md-9">
		<p style="color:red; font-weight:600"><?php echo validation_errors(); ?></p>
		<form class="form-horizontal form-label-left input_mask"  method="post" action="">

		  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
		    <input type="text" required="required" class="form-control has-feedback-left" name="task_name" id="task_name" value="<?php echo $info_task->name?>" placeholder="Tên công việc">
		    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
		    <input type="text" class="form-control" id="description" name="description" value="<?php echo $info_task->description?>" placeholder="Description">
		    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		  </div>
		  <?php 
		    $start_date = strtotime($info_task->start_date);
	  		$newformat_start_date = date('m-d-Y',$start_date);
	  		$end_date = strtotime($info_task->end_date);
	  		$newformat_end_date = date('m-d-Y',$end_date);
		  ?>
		  <div class="form-group">
		    <label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày bắt đầu <span class="required">*</span>
		    </label>
		    <div class="col-md-4 col-sm-4 col-xs-12">
		      <input id="start_date" name="start_date" value="<?php echo $newformat_start_date ?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
		    </div>
		   	<label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày kết thúc <span class="required">*</span>
		    </label>
		    <div class="col-md-4 col-sm-4 col-xs-12">
		      <input id="end_date" name="end_date" value="<?php echo $newformat_end_date ?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
		    </div>
		  </div>
		  <div class="form-group">
		      <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiến độ</label>
			  <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top: 8px">
			    Chưa Hoàn thành:
			    <input type="radio" class="flat" name="status" id="status2" checked value="0" />
			   	Hoàn thành:
			    <input type="radio" class="flat" name="status" id="status1" checked value="100" />
			  </div>
	      </div>
	      <?php 
	      $code_task = md5(uniqid(generateRandomString(12), TRUE));
	      $code_task = $info_project->id . $info_mission->id .$code_task;
	      ?>
	      <div class="form-group">
	      <label class="control-label col-md-2 col-sm-2 col-xs-12">Code</label>
	      <input type="text" class="form-control" readonly="readonly" placeholder="<?php echo $code_task ?>" value="<?php echo $info_task->code ?>" name="code_task">
	      </div>
		  <div class="ln_solid"></div>
		  <div class="form-group">
		    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
		      <button type="submit" class="btn btn-success">OK</button>
		    </div>
		  </div>

		</form>
	</div>
</div>