<div class="row">
<?php 
$my_center_id = $this->CI->get_my_center_id();
?>

<ol class="breadcrumb" style="border-bottom: 2px solid #E6E9ED;">
  <li class="breadcrumb-item">
    <i class="fa fa-home"></i>
    <a href="<?php echo base_url('project/index') ?>">Dự án</a>
		
  </li>
	 <li class="breadcrumb-item active">
	 <a href="<?php echo base_url('project/edit/'.$info_project->id) ?>">Dự án</a>
	 </li>
</ol>
<h1>Sửa dự án <b><?php echo $info_project->project_name ?></b></h1>
<?php //pre($list_department_employee);  ?>
<?php //pre($list_emp);  ?>
<div class="row">
	<div class="col-md-9">
		<p style="color:red; font-weight:600"><?php echo validation_errors(); ?></p>
		<form class="form-horizontal form-label-left input_mask"  method="post" action="">

		  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
		    <input type="text" required="required" class="form-control has-feedback-left" name="project_name" id="project_name" value="<?php echo $info_project->project_name ?>" placeholder="Tên dự án">
		    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
		    <input type="text" class="form-control" id="description" name="description" value="<?php echo $info_project->description ?>" placeholder="Description">
		    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên viết tắt <span class="required">*</span>
		    </label>
		    <div class="col-md-4 col-sm-4 col-xs-12">
		      <input id="short_name" name="short_name" value="<?php echo $info_project->short_name?>" class="form-control col-md-7 col-xs-12" required="required" type="text">
		    </div>
		  </div>
		  <?php 
		    $start_date = strtotime($info_project->start_date);
	  		$newformat_start_date = date('m-d-Y',$start_date);
	  		$end_date = strtotime($info_project->end_date);
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
	      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tình trạng</label>
		  <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:8px">
		    Đang chạy:
		    <input type="radio" class="flat" name="status" id="status1" value="1" <?php if ($info_project->status ==1) echo 'checked=""'; ?> required /> 
		    Hoàn thành:
		    <input type="radio" class="flat" name="status" id="status2" value="2" <?php if ($info_project->status ==2) echo 'checked=""'; ?> />
		   	Hủy Bỏ:
		    <input type="radio" class="flat" name="status" id="status3" value="3" <?php if ($info_project->status ==3) echo 'checked=""'; ?> />
		  </div>
	      </div>
	      <div class="form-group">
	      <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiến độ</label>
		  <div class="col-md-4 col-sm-4 col-xs-12">
			<input id="progress" name="progress" value="<?php echo $info_project->progress ?>" class="form-control col-md-7 col-xs-12" required="required" type="text">
		  </div>
	      </div>
	      <?php 
	  	  //pre($list_emp);
	  	  $c= array();
	  	  if ($list_emp !=null) {
	      	for ($i=0; $i < count($list_emp) ; $i++) { 
	      		# code...
	      		$a_emp[$i] = $list_emp[$i]->emp_name;
	      		$b_emp[$i] = $list_emp[$i]->department_id;
	      		$c[] =  $list_emp[$i]->user_id.'/'.$list_emp[$i]->department_id;

	      	}
	      }


	      ?>
	      <div class="form-group">
	      <label class="control-label col-md-2 col-sm-2 col-xs-12">Thêm người vào dự án</label>
		  <div class="col-md-6 col-sm-6 col-xs-12">
			<select class="select2_multiple form-control" multiple="multiple" name="project_users[]">
			  <?php 

		        foreach ($list_department_employee as $r) {
		          ?>
		          <?php //echo count($r->child_room) ?>
		          <optgroup label="<?php echo $r->department_name; ?>">
		            <?php if(array_key_exists('emp', $r)){ ?>
		            <?php foreach ($r->emp as $x) { ?>
			            <?php if ($list_emp !=null) { ?>
			            <?php $value = $x->user_id.'/'.$r->department_id; ?>
			            <option value="<?php echo $value ?>" <?php if(in_array($value, $c)) { echo "selected";}   ?> ><?php echo $x->fullname?></option>
			            <?php }?>
			        	<?php if ($list_emp ==null) { ?>
			        	<option value="<?php echo $x->user_id.'/'.$r->department_id ?>" ><?php echo $x->fullname; ?></option>
			        	<?php }?>
		            <?php } ?>
		            <?php }?>
		          </optgroup>

		          <?php

		        }
		      ?>
			</select>
		  </div>
	      </div>
			<div class="form-group">
					<label class="control-label col-md-2 col-sm-2 col-xs-12">Trung tâm chính</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control" name="center">
					<?php foreach ($my_center_id as $key => $value) {
						$info_center = $this->department_model->get_info($value);
				  ?>
						<option value="<?php echo $value ?>"><?php echo $info_center->name ?></option>
						<?php }?>
					</select>
					</div>

			</div>
		  <div class="ln_solid"></div>
		  <div class="form-group">
		    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
		      <button type="reset" class="btn btn-primary">Reset</button>
		      <button type="submit" class="btn btn-success">Sửa</button>
		    </div>
		  </div>

		</form>
	</div>
</div>

</div>