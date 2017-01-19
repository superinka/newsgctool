<div class="row">
<div class="col-md-12 col-sm-12">
<?php $final = $this->CI->get_report_by_room($type = 1); ?>
<?php $final_non_leader = $this->CI->get_report_by_room_non_leader(); ?>
<?php $final_me_uncheck = $this->CI->list_report_by_me($type =0); ?>
<?php $final_me_checked = $this->CI->list_report_by_me($type =1); ?>
<?php //pre($final_me_uncheck);?>
<?php //pre($final_me_checked);?>
<?php //pre($final_non_leader);?>
<?php //pre($list_room_manager);?>
<!-- <div class="row">
<?php //pre($list_room_manager);?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<h3>Báo cáo cần duyệt hôm nay</h3>
<?php foreach ($list_room_manager as $key => $value) { ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo $value['department_name'];  ?> 
          <small>
          <?php if(array_key_exists('project',$value)==false) { ?>
            <strong>Không có dữ liệu</strong>
          <?php }?>
          </small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if(array_key_exists('list_miss',$value)==true) { ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Desciption</th>
              <th>Nhân viên</th>
              <th>Dự án</th>
              <th>Nhiệm vụ</th>
              <th>Thời gian tạo</th>
              <th>Số giờ làm</th>
              <th>Tình trạng</th>
              <th>Duyệt bởi</th>
              <th>Tình trạng duyệt</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_miss'] as $k => $v) { ?>
            <?php if(array_key_exists('task',$v)==true) { ?>
              <?php foreach ($v->task as $a => $b) { ?>
                <?php if(array_key_exists('list_report',$b)==true) { ?>
                <?php foreach ($b->list_report as $c => $d) { ?>

                	  
                	  <?php 
                	    $create_time = strtotime($d->create_time);
          						$newformat_create_time = date('Y-m-d H:i:s',$create_time);
          						$pm = ($this->my_report_model->get_fullname_employee($d->review_by));
                      $pj = $this->project_model->get_info($v->project_id);
                      $project_name = $pj->project_name;
          					  ?>
	                  <tr>
	                    <th scope="row"></th>
	                    <td><?php echo $d->description ?></td>
	                    <td><?php echo $v->mission_for ?></td>
	                    <td><?php echo $project_name ?></td>
	                    <td><?php echo $b->name?></td>
	                    <td><?php echo $newformat_create_time ?></td>
	                    <td><?php echo $d->time_spend ?></td>
	                    <td><?php echo check_progress_report($d->progress)?></td>
	                    <td><?php echo $pm[0]->fullname ?></td>
	                    <td><?php echo check_status_report($d->review_status); ?></td>
	                    <td>
	                    	<?php if($d->review_status==0) { ?>
	                    	<a href="<?php echo base_url('my_report/check/'.$d->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
	                    	<?php }?>
	                    	<?php if($d->review_status==1) { ?>
	                    	<a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$d->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
	                    	<?php }?>
	                    </td>
	                  </tr>
	                 
	             
                <?php } ?>
                <?php } ?>
              <?php }?>
            <?php }?>
          <?php } ?>
          </tbody>
        </table>
      <?php } ?>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>
<?php } ?>
<div class="ln_solid"></div>
</div> -->

<!-- <div class="row">
<h3>Báo cáo đã duyệt hôm nay</h3>
<?php if ($list_report_checked_today==null) {?>
<strong>Không có dữ liệu</strong>
<?php }?>
<?php if ($list_report_checked_today!=null) {?>
<?php foreach ($list_report_checked_today as $key => $value) { ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo $value['department_name'];  ?> 
          <small>
          <?php if(array_key_exists('project',$value)==false) { ?>
            <strong>Không có dữ liệu</strong>
          <?php }?>
          </small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if(array_key_exists('list_miss',$value)==true) { ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Desciption</th>
              <th>Nhân viên</th>
              <th>Dự án</th>
              <th>Nhiệm vụ</th>
              <th>Thời gian tạo</th>
              <th>Số giờ làm</th>
              <th>Tình trạng</th>
              <th>Duyệt bởi</th>
              <th>Tình trạng duyệt</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_miss'] as $k => $v) { ?>
            <?php if(array_key_exists('task',$v)==true) { ?>
              <?php foreach ($v->task as $a => $b) { ?>
                <?php if(array_key_exists('list_report',$b)==true) { ?>
                <?php foreach ($b->list_report as $c => $d) { ?>

                    
                    <?php 
                      $create_time = strtotime($d->create_time);
                      $newformat_create_time = date('Y-m-d H:i:s',$create_time);
                      $pm = ($this->my_report_model->get_fullname_employee($d->review_by));
                      $pj = $this->project_model->get_info($v->project_id);
                      $project_name = $pj->project_name;
                      ?>
                    <tr>
                      <th scope="row"></th>
                      <td><?php echo $d->description ?></td>
                      <td><?php echo $v->mission_for ?></td>
                      <td><?php echo $project_name ?></td>
                      <td><?php echo $b->name?></td>
                      <td><?php echo $newformat_create_time ?></td>
                      <td><?php echo $d->time_spend ?></td>
                      <td><?php echo check_progress_report($d->progress)?></td>
                      <td><?php echo $pm[0]->fullname ?></td>
                      <td><?php echo check_status_report($d->review_status); ?></td>
                      <td>
                        <?php if($d->review_status==0) { ?>
                        <a href="<?php echo base_url('my_report/check/'.$d->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
                        <?php }?>
                        <?php if($d->review_status==1) { ?>
                        <a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$d->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
                        <?php }?>
                      </td>
                    </tr>
                   
               
                <?php } ?>
                <?php } ?>
              <?php }?>
            <?php }?>
          <?php } ?>
          </tbody>
        </table>
      <?php } ?>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>
<?php } ?>
<?php } ?>
</div> -->
<?php if ($final_me_uncheck==null) {
  $c = 0;
} ?>
<?php if ($final_me_uncheck!=null) {
  //$c = count()

} ?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<div class="row">
<h3>Báo cáo cần duyệt <span class="badge badge-success"><?php //echo //count($final_non_leader); ?></span></h3>
<?php if ($final_me_uncheck==null) {?>
<strong>Không có dữ liệu</strong>
<?php }?>
<?php if ($final_me_uncheck!=null) {?>
<?php foreach ($final_me_uncheck as $key => $value) { ?>
<?php if ($value['department_name'] !='Công việc phát sinh') {?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo $value['department_name'];  ?> 
          <small>
          <?php if(array_key_exists('project',$value)==false) { ?>
            <strong></strong>
          <?php }?>
          </small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if(array_key_exists('list_report',$value)==true) { ?>
        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th>#</th>
              <th style="width: 30%">Nội Dung Báo Cáo</th>
              <th>Thông tin</th>
              <th>Thời gian</th>
              <th>Tình trạng</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_report'] as $k => $v) { ?>


                    
                    <?php 
                      $create_time = strtotime($v->create_time);
                      $newformat_create_time = date('Y-m-d H:i:s',$create_time);
                      $pm = ($this->my_report_model->get_fullname_employee($v->review_by));
                      $ac = $this->acc_model->get_info_rule($where = array('id'=>$v->create_by));
                      $ac = $ac->account_type;
                      $newformat_create_time2 = date('Y-m-d', $create_time);
                      if($newformat_create_time2 == $today){
                        $x = 'Hôm nay';
                      }
                      else {
                        $x = $newformat_create_time;
                      }
                      ?>
                      <?php if($ac == 4) {?>
                    <tr>
                      <th scope="row"></th>
                      <td>
                      <p><?php echo $v->description ?></p>
                      <small><i class="fa fa-angle-double-right"></i> <?php echo $v->note?></small>
                      </td>
                      <td>
                      <small>
                        <p><i class="fa fa-user"></i> <?php echo $v->create_name ?></p>
                        <p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo $v->project_name ?></p> 
                        <p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo $v->mission_name?></p>
                      </small>                        
                      </td>

                      <td>
                      <small>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $x ?></p>
                        <p>Thời gian làm : <?php echo $v->time_spend ?> giờ</p>
                      </small>
                      </td>
                      <td>
                          <small>
                          <p><i class="fa fa-rss"></i> <?php echo check_progress_report($v->progress)?></p>
                          <?php if($ac==4) { ?>
                            <p><i class="fa fa-user-md"></i> <strong style="color:blue"><?php echo $pm[0]->fullname ?></strong></p>
                          <?php }?>

                          <p><i class="fa fa-arrow-circle-right"></i> <?php echo check_status_report($v->review_status); ?></p>
                          </small>                      
                      
                        
                      </td>
                      <td>
                      <?php if($ac==4) { ?>
                        <?php if($v->review_status==0) { ?>
                        <a href="<?php echo base_url('my_report/check/'.$v->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
                        <?php }?>
                        <?php if($v->review_status==1) { ?>
                        <a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$v->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
                        <?php }?>
                      <?php }?>
                      </td>
                    </tr>
                    <?php }?>
                   
               

          <?php } ?>
          </tbody>
        </table>
      <?php } ?>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>
<?php }?>

<?php if (array_key_exists('list_report_bonus',$value)==true) {?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo 'Phát sinh'  ?> 
          <small>
          <?php //if(array_key_exists('project',$value)==false) { ?>
            <strong></strong>
          <?php //}?>
          </small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if(array_key_exists('list_report_bonus',$value)==true) { ?>
        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th>#</th>
              <th style="width: 30%">Nội Dung</th>
              <th>Thông tin</th>
              <th>Thời gian</th>
              <th>Tình trạng</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_report_bonus'] as $ka => $va) { ?>
            <?php foreach ($va as $k => $v) { ?>

                    
                    <?php 
                      $create_time = strtotime($v->create_time);
                      $newformat_create_time = date('Y-m-d H:i:s',$create_time);
                      $pm = ($this->my_report_model->get_fullname_employee($v->review_by));
                      $ac = $this->acc_model->get_info_rule($where = array('id'=>$v->create_by));
                      $for = $this->home_model->get_info_rule($where = array('user_id'=>$v->create_by));
                      $ac = $ac->account_type;
                      $mission_for = $for->fullname;
                      //$pj = $this->project_model->get_info($v->project_id);
                      //$project_name = $pj->project_name;
                      $newformat_create_time2 = date('Y-m-d', $create_time);
                      if($newformat_create_time2 == $today){
                        $x = 'Hôm nay';
                      }
                      else {
                        $x = $newformat_create_time;
                      }

                      ?>
                    <?php if($ac == 4) {?>
                    <tr>
                      <th scope="row"><?php echo $v->id ?></th>
                      <td>
                      <p><?php echo $v->description ?></p>
                      <small><i class="fa fa-angle-double-right"></i> <?php echo $v->note?></small>
                      </td>
                      <td>
                      <small>
                        <p><i class="fa fa-user"></i> <?php echo $mission_for ?></p>
                        <p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo 'Phát sinh'; ?></p> 
                        <p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo 'Phát sinh'; ?></p>
                      </small>                        
                      </td>

                      <td>
                      <small>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $x ?></p>
                        <p>Thời gian làm : <?php echo $v->time_spend ?> giờ</p>
                      </small>
                      </td>
                      <td>
                          <small>
                          <p><i class="fa fa-rss"></i> <?php echo check_progress_report($v->progress)?></p>
                          <?php if($ac==4) { ?>
                            <p><i class="fa fa-user-md"></i> <strong style="color:blue"><?php echo $pm[0]->fullname ?></strong></p>
                          <?php }?>

                          <p><i class="fa fa-arrow-circle-right"></i> <?php echo check_status_report($v->review_status); ?></p>
                          </small>                      
                      
                        
                      </td>
                      <td>
                      <?php if($ac==4) { ?>
                        <?php if($v->review_status==0) { ?>
                        <a href="<?php echo base_url('my_report/check/'.$v->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
                        <?php }?>
                        <?php if($v->review_status==1) { ?>
                        <a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$v->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
                        <?php }?>
                      <?php }?>
                      </td>
                    </tr>
                    <?php }?>
                   
               
          <?php }?>
          <?php } ?>
          </tbody>
        </table>
      <?php } ?>
    

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>
<?php }?>
<?php } ?>
<?php } ?>
</div>

<div class="row">
<h3>Báo cáo đã duyệt  <span class="badge badge-success"><?php //echo count($final); ?></span></h3>
<?php if ($final_me_checked==null) {?>
<strong>Không có dữ liệu</strong>
<?php }?>
<?php if ($final_me_checked!=null) {?>
<?php foreach ($final_me_checked as $key => $value) { ?>
<?php if ($value['department_name'] !='Công việc phát sinh') {?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo $value['department_name'];  ?> 
          <small>
          <?php if(array_key_exists('project',$value)==false) { ?>
            <strong></strong>
          <?php }?>
          </small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if(array_key_exists('list_report',$value)==true) { ?>
         <table id="datatable-checkbox2" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th>#</th>
              <th style="width: 30%">Nội Dung</th>
              <th>Thông tin</th>
              <th>Thời gian</th>
              <th>Tình trạng</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_report'] as $k => $v) { ?>


                    
                    <?php 
                      $create_time = strtotime($v->create_time);
                      $newformat_create_time = date('Y-m-d H:i:s',$create_time);
                      $pm = ($this->my_report_model->get_fullname_employee($v->review_by));

                      $ac = $this->acc_model->get_info_rule($where = array('id'=>$v->create_by));
                      $ac = $ac->account_type;
                      $newformat_create_time2 = date('Y-m-d', $create_time);
                      if($newformat_create_time2 == $today){
                        $x = 'Hôm nay';
                      }
                      else {
                        $x = $newformat_create_time;
                      }
                      ?>
                    <?php //if($ac == 4) {?>
                    <tr>
                      <th scope="row"><?php echo $v->id?></th>
                      <td>
                      <p><?php echo $v->description ?></p>
                      <small><i class="fa fa-angle-double-right"></i> <?php echo $v->note?></small>
                      </td>
                      <td>
                      <small>
                        <p><i class="fa fa-user"></i> <?php echo $v->create_name ?></p>
                        <p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo $v->project_name ?></p> 
                        <p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo $v->mission_name?></p>
                      </small>                        
                      </td>

                      <td>
                      <small>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $x ?></p>
                        <p>Thời gian làm : <?php echo $v->time_spend ?> giờ</p>
                      </small>
                      </td>
                      <td>
                          <small>
                          <p><i class="fa fa-rss"></i> <?php echo check_progress_report($v->progress)?></p>
                          <?php if($ac==4) { ?>
                            <p><i class="fa fa-user-md"></i> <strong style="color:blue"><?php echo $pm[0]->fullname ?></strong></p>
                          <?php }?>

                          <p><i class="fa fa-arrow-circle-right"></i> <?php echo check_status_report($v->review_status); ?></p>
                          </small>                      
                      
                        
                      </td>
                      <td>
                      <?php if($ac==4) { ?>
                        <?php if($v->review_status==0) { ?>
                        <a href="<?php echo base_url('my_report/check/'.$v->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
                        <?php }?>
                        <?php if($v->review_status==1) { ?>
                        <a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$v->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
                        <?php }?>
                        <?php }?>
                      </td>
                    </tr>
                    <?php //}?>
                   
               

          <?php } ?>
          </tbody>
        </table>
      <?php } ?>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>
<?php }?>

<?php if (array_key_exists('list_report_bonus',$value)==true) {?>
<?php //pre($value['report']); ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo 'Phát sinh';  ?> 
          <small>
          </small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if(array_key_exists('list_report_bonus',$value)==true) { ?>
        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th>#</th>
              <th style="width: 30%">Nội Dung</th>
              <th>Thông tin</th>
              <th>Thời gian</th>
              <th>Tình trạng</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_report_bonus'] as $ka => $va) { ?>
            <?php foreach ($va as $k => $v) { ?>


                    
                    <?php 
                      $create_time = strtotime($v->create_time);
                      $newformat_create_time = date('Y-m-d H:i:s',$create_time);
                      $pm = ($this->my_report_model->get_fullname_employee($v->review_by));
                      $ac = $this->acc_model->get_info_rule($where = array('id'=>$v->create_by));
                      $for = $this->home_model->get_info_rule($where = array('user_id'=>$v->create_by));
                      $ac = $ac->account_type;
                      $mission_for = $for->fullname;
                      //$pj = $this->project_model->get_info($v->project_id);
                      //$project_name = $pj->project_name;
                      $newformat_create_time2 = date('Y-m-d', $create_time);
                      if($newformat_create_time2 == $today){
                        $x = 'Hôm nay';
                      }
                      else {
                        $x = $newformat_create_time;
                      }

                      ?>
                    <tr>
                      <th scope="row"><?php echo $v->id ?></th>
                      <td>
                      <p><?php echo $v->description ?></p>
                      <small><i class="fa fa-angle-double-right"></i> <?php echo $v->note?></small>
                      </td>
                      <td>
                      <small>
                        <p><i class="fa fa-user"></i> <?php echo $mission_for ?></p>
                        <p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo 'Phát sinh'; ?></p> 
                        <p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo 'Phát sinh';?></p>
                      </small>                        
                      </td>

                      <td>
                      <small>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $x ?></p>
                        <p>Thời gian làm : <?php echo $v->time_spend ?> giờ</p>
                      </small>
                      </td>
                      <td>
                          <small>
                          <p><i class="fa fa-rss"></i> <?php echo check_progress_report($v->progress)?></p>
                          <?php if($ac==4) { ?>
                            <p><i class="fa fa-user-md"></i> <strong style="color:blue"><?php echo $pm[0]->fullname ?></strong></p>
                          <?php }?>

                          <p><i class="fa fa-arrow-circle-right"></i> <?php echo check_status_report($v->review_status); ?></p>
                          </small>                      
                      
                        
                      </td>
                      <td>
                      <?php if($ac==4) { ?>
                        <?php if($v->review_status==0) { ?>
                        <a href="<?php echo base_url('my_report/check/'.$v->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
                        <?php }?>
                        <?php if($v->review_status==1) { ?>
                        <a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$v->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
                        <?php }?>
                      <?php }?>
                      </td>
                    </tr>
                   
               
          <?php }?>
          <?php } ?>
          </tbody>
        </table>
      <?php } ?>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>
<?php }?>
<?php } ?>
<?php } ?>
</div>

</div>
</div>