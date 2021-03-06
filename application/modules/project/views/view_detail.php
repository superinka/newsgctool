<?php //pre($info_mission); ?>
<?php //pre($info_project); ?>
<?php //pre($list_task);?>
<?php 
$data = array('progress'=>$final_progress);
if ($info_mission->progress!= $final_progress){
    $this->mission_model->update($mission_view_id,$data);
}
?>
<script src="<?php echo admin_theme('');?>/vendors/jquery/dist/jquery.min.js"></script>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<style type="text/css">
  ul.task-request li a i {padding-right: 15px;}
</style>
<ol class="breadcrumb" style="border-bottom: 2px solid #E6E9ED;">
  <li class="breadcrumb-item">
    <i class="fa fa-home"></i>
    <a href="<?php echo base_url('project/index') ?>">Tổng quan</a>
		
  </li>
	 <li class="breadcrumb-item">
	 <a href="<?php echo base_url('project/mission/index/'.$info_project->id) ?>">Dự án</a>
	 </li>
   <li class="breadcrumb-item">
	 <a href="<?php echo base_url('project/mission/index/'.$info_project->id.'/'.$mission_view_id) ?>">Nhiệm vụ</a>
	 </li>
   <li class="breadcrumb-item active">
	 Công việc
	 </li>
</ol>
<div class="row">
  <div class="col-md-12 col-xs-12 widget widget_tally_box">
    <div class="row">
      <div class="x_panel ui-ribbon-container fixed_height_490">
        <div class="ui-ribbon-wrapper">
          <div class="ui-ribbon">
            <?php echo check_status_mission($info_mission->status) ?>
          </div>
        </div>
        <div class="x_title">
          <h2>Nhiệm vụ</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div style="text-align: center; margin-bottom: 17px">
            <span class="chart" data-percent="<?php echo $final_progress ?>">
            <span class="percent"></span>
            </span>
          </div>
          <!--<?php  if ($account_type == 2 || $account_type == 3 || $account_type == 1) {?>
          <p>
            <a href="<?php echo base_url('project/mission/update_progress/'.$project_id.'/'.$mission_view_id .'/' .$final_progress) ?>">
              <i class="fa fa-repeat"></i> Cập nhật
            </a>
          </p>
          
          <?php } ?>-->
          <h3 class="name_title"><?php echo $info_mission->name ?></h3>
          <p><?php echo $info_mission->description ?></p>

          <div class="divider"></div>

          <p>Ngày tạo : <?php echo $info_mission->create_date  ?></p>
          <p>Ngày bắt đầu : <?php echo $info_mission->start_date  ?></p>
          <p>Ngày kết thúc : <?php echo $info_mission->end_date  ?></p>
          <p>Dự án : <strong><a href="<?php echo base_url('project/mission/index/'.$project_id) ?>"><?php echo $info_project->project_name;?></a></strong></p>
          <p>Giao cho : <strong><?php echo $info_mission->mission_user_name ?></strong></p>

        </div>
      </div>
    </div>

  </div>
	<div class="col-md-8 col-sm-8 col-xs-12">
  <div class="row">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Danh sách công việc: <small>Có <?php echo $count_task; ?> công việc</small></h2>
	        <?php if ($list_task==null) { ?>
		        <?php if($now_user_id==$info_mission->mission_user_id) {?>
		        <a href="<?php echo base_url('project/mission/add_task/'.$project_id.'/'.$mission_view_id) ?>" class="btn btn-primary btn-xs navbar-right"><i class="fa fa-folder"></i> Thêm </a>
		        <?php }?>
	        <?php } ?>
          <?php if ($list_task!=null) { ?>
            <?php if($now_user_id==$info_mission->mission_user_id) {?>
            <a href="<?php echo base_url('project/mission/add_task/'.$project_id.'/'.$mission_view_id) ?>" class="btn btn-primary btn-xs navbar-right"><i class="fa fa-folder"></i> Thêm </a>
            <?php }?>
          <?php } ?>
	        <div class="clearfix"></div>
	      </div>
	      <?php
	      	if($list_task==null) {
	      		?>
	      		<p>Không có dữ liệu</p>

	      		<?php
	      	}
	      	else if ($list_task!=null) {
            if(($account_type==4)&&($now_user_id!=$info_mission->mission_user_id)) {
              ?>
              <p><strong style="color:red">Đây không phải là nhiệm vụ của bạn, bạn không thể xem mục này !</strong></p>

              <?php
            }
            if(($account_type < 4) || ($now_user_id==$info_mission->mission_user_id)) {
              ?>
              

              <?php
              $i = 0;
              foreach ($list_task as $key => $value) {
                if ($value->status==0) {$c = 'danger'; $t = 'Chưa Hoàn Thành';} else {$c = 'success'; $t = 'Hoàn Thành';}
                if($value->lock == 1) {$cl = '#5cb85c';$lo = '<i class="fa fa-unlock" aria-hidden="true"></i>';} else {$cl = '#d9534f';$lo ='<i class="fa fa-lock" aria-hidden="true"></i>';}
                ?>
                <div class="row">
                <div class="col-md-7">
                <div class="row">
                  <div>
                    <p style="color:<?php echo $cl ?>">
                    <i class="fa fa-angle-double-right"></i> 
                    <?php $link=null;?>
                    <?php if($account_type>=3){$link = base_url('project/mission/edit_task/'.$project_id.'/'.$mission_view_id.'/'.$value->id);} ?>
                    <strong>
                      <a style="color:<?php echo $cl ?>" title ="bởi <?php echo $value->create_by_name ?>" href="<?php echo $link ?>"><?php echo $value->name ?> <?php echo ''.$lo.'' ?></a>
                    </strong>
                    </p>

                  </div>
                </div>
                <?php 
                  $start_date = strtotime($value->start_date);
                  $end_date = strtotime($value->end_date);
                  $today_date = strtotime(date_create('now')->format('Y-m-d'));
                  $nwd = networkdays($start_date, $end_date, $holidays);
                  //$nwd = $nwd+1;
                  $percent_day = 0;

                  $date1 = strtotime($value->start_date);
                  $date2 = strtotime($value->end_date);
                  $total_day = ($date2 - $date1) / (60 * 60 * 24);
                  $total_day = $total_day + 1;
                  $pass_day = ($today_date - $date1) / (60 * 60 * 24);
                  $pass_day = $pass_day + 1 ;

                  //pre($pass_day);

                  $percent_day = percent_day($pass_day, $total_day);

                  $color = 'green';
                  if($percent_day>70) {
                    $color = 'red';
                  }

                  if ($percent_day<25){
                    $color = '#5cb85c';
                  }
                ?>
                <div class="row">
                  <div class="col-md-11">
                    <small>
                    <?php echo 'Tổng :' .$total_day.' Ngày - ';
                    if($percent_day > 100 ) {
                      echo "Quá hạn : ".$value->start_date .' --> ' .$value->end_date;;
                    }
                    else if($percent_day < 0 ){
                      echo "Chưa bắt đầu : ".$value->start_date .' --> ' .$value->end_date;;
                    }
                    else {
                      echo $value->start_date .' --> ' .$value->end_date;
                    }
                    

                    ?></small>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-<?php echo $color;?>" role="progressbar" data-transitiongoal="<?php echo $percent_day ?>">
                      </div>
                    </div>            
                  </div>
                </div>
                </div>
               <div class="col-md-2">
                <div class="row">
                  <div>
                    <p style="color:<?php echo $cl ?>">
                      Tiến độ
                    </p>

                  </div>
                </div>
                <?php 
                  $color2 = 'green';
                  if($value->completion<70) {
                    $color = 'red';
                  }

                  if ($value->completion<25){
                    $color = 'red';
                  }
                ?>
                <div class="row">
                  <div class="col-md-11">
                    <small>
                      <?php echo $value->completion ?>%
                    </small>
                    <div class="progress progress_sm" style="width:100%">
                      <div class="progress-bar bg-<?php echo $color2;?>" role="progressbar" data-transitiongoal="<?php echo $value->completion ?>">
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              <div class="col-md-3" style="padding-top: 45px;">
              <div class="row">
                <div class="col-md-6">
                  <span class="label label-<?php echo $c; ?> pull-right"><?php  echo $t?></span>
                </div>
                <div class="col-md-6">
                <ul style="list-style: none; display: inline-flex; padding-left: 0px;" class="task_request">
                <?php if ($account_type==4) {?>
                  <li style="padding-right: 5px;"><a title="Xin sửa thời gian" href="<?php echo base_url('request/request_time_task/'.'c101-'.$value->code) ?>"><i class="fa fa-clock-o" aria-hidden="true"></i></a></li>
                  <!--<li style="padding-right: 5px;"><a title="Xin sửa tên" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>-->
                  <li style="padding-right: 5px;"><a title="Xin sửa tiến độ" href="<?php echo base_url('request/request_progress_task/'.'c201-'.$value->code) ?>"><i class="fa fa-battery-full" aria-hidden="true"></i></a></li>
                  <?php   if($percent_day <= 100 && $percent_day >= 0 && $date2>=$today_date) { ?>
                  <li><a title="Báo cáo ngay cho công việc này" href="<?php echo base_url('my_report/add_report_now/'.$value->id) ?>" style="color:red"><i class="fa fa-fighter-jet"></i></a></li>
                  <?php }?>
                <?php }?>
                <?php if ($account_type==3) {?>
                <?php   if($percent_day <= 100 && $percent_day >= 0 && $date2>=$today_date) { ?>
                <li><a title="Báo cáo ngay cho công việc này" href="<?php echo base_url('my_report/add_report_now/'.$value->id) ?>" style="color:red"><i class="fa fa-fighter-jet"></i></a></li> 
                <?php }?>               
                <?php }?>
                </ul>
                
                </div>
              </div>

              </div>
<!--               <div class="col-md-2">
                <span class="label label-<?php echo $c; ?> pull-right"><?php  echo $t?></span>
              </div>
              <div class="col-md-2">
              <ul style="list-style: none; display: inline-flex; padding-left: 0px;" class="task_request">
              <?php if ($account_type==4) {?>
                <li style="padding-right: 5px;"><a title="Xin sửa thời gian" href="<?php echo base_url('request/request_time_task/'.'c101-'.$value->code) ?>"><i class="fa fa-clock-o" aria-hidden="true"></i></a></li>
                <li style="padding-right: 5px;"><a title="Xin sửa tên" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
                <li><a title="Xin sửa tiến độ" href="<?php echo base_url('request/request_progress_task/'.'c201-'.$value->code) ?>"><i class="fa fa-battery-full" aria-hidden="true"></i></a></li>
              <?php }?>
              </ul>
              
              </div> -->
              </div>
              <?php
              $i++;
              }

              ?>
              </div>
              <?php
              
            }

	      	}
	      ?>
	      
	    </div>
	</div>
</div>
</div>

<div class="row">

</div>

