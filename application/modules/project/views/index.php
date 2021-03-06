<?php //pre($list_project); ?>
<!-- top tiles -->

<ol class="breadcrumb" style="border-bottom: 2px solid #E6E9ED;">
  <li class="breadcrumb-item active">
    <i class="fa fa-home"></i>
    <a href="<?php echo base_url('project/index') ?>">Tổng quan</a>
  </li>
</ol>

<div class="row tile_count">
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> Tổng số dự án</span>
  <div class="count"><?php echo $total; ?></div>
</div>
<!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> dự án của bạn : </span>
  <div class="count green"><?php echo $numberproject;   ?></div>
</div> -->
</div>
<!-- /top tiles -->
<div class="row">
	<div class="col-md-12">
	<?php 
		if($account_type < 4 ) {
			?>
			<a href="<?php echo base_url('project/add'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm Dự Án</button></a>
			<?php
		}
	?>
	</div>
</div>

<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Danh sách dự án</h2>
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

        <p></p>

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Tên dự án</th>
              <th style="width: 20%">Thành viên</th>
              <th>Thời gian</th>
              <th>Status</th>
              <th>Tiến độ</th>
              <th style="width: 10%">#Edit</th>
            </tr>
          </thead>
          <tbody>
          	<?php 
          	foreach ($list_project as $row){  
	      		$start_date = strtotime($row->start_date);
	      		$end_date = strtotime($row->end_date);
	      		$today_date = strtotime(date_create('now')->format('Y-m-d'));
	      		$nwd = networkdays($start_date, $end_date, $holidays);
	      		//$nwd = $nwd+1;
	      		$percent_day = 0;
            
            $department_name = null;

            $department_info = $this->department_model->get_info($row->department_id);
            if($department_info!=null){
                $department_name = $department_info->name;
            }
            

    				$date1 = strtotime($row->start_date);
    				$date2 = strtotime($row->end_date);
    				$total_day = ($date2 - $date1) / (60 * 60 * 24);
    				$total_day = $total_day + 1;
    				$pass_day = ($today_date - $date1) / (60 * 60 * 24);
    				$pass_day = $pass_day + 1 ;

    				$percent_day = percent_day($pass_day, $total_day);

    				$color = 'green';
    				if($percent_day>70) {
    					$color = 'red';
    				}

    				if ($percent_day<25){
    					$color = '#5cb85c';
    				}

    				$c = $row->status;

    				//echo $c;

    				$status_bg;

            // $l = array();
            // foreach ($row->emp as $r) {
            //   if(in_array($r->user_id, $l)==false){
            //     $l[]->emp_name;
            //   }
            // }

				if ($c==1) {$status_bg = 'info';}
				else if ($c==2) {$status_bg = 'success';}
				else if ($c==3) {$status_bg = 'danger';}

        $create_name = $this->home_model->get_fullname_employee($row->create_by);
        $create_name = $create_name[0]->fullname;          			
          	?>
            <tr>
              <td style="padding-top: 2%;">#</td>
              <td style="padding-top: 2%;">
                <a href="<?php echo base_url('project/mission/index/'.$row->id) ?>"style="color:blue"><?php echo $row->project_name ?></a>
                <br />
                <small>Ngày bắt đầu:  <?php echo $row->start_date ?></small><br>
                <small>Ngày kết thúc:  <?php echo $row->end_date ?></small><br>
                <small>Người tạo:  <?php echo $create_name ?></small><br>
                <small style="color:#d9534f"><?php echo $department_name ?></small>
              </td>
              <td style="padding-top: 4%; width:20%">
                <ul class="list-inline">
                <?php $l = array(); ?>
                <?php foreach ($row->emp as $r) { ?>
                  <?php if(in_array($r->user_id, $l)==false){  ?>
                  <?php $l[] = $r->user_id ?>
                  <?php 
                  $uid = $r->user_id;
                  $info_user = $this->home_model->get_info_rule($where = array('user_id'=>$uid));
                  
                  $ava_link = $info_user->avatar;

                  if($ava_link == null) {
                    $link = admin_theme('').'/production/images/default-avatar.jpg';
                  }
                  else {
                    $link = base_url('public/upload/avatar/'.$ava_link);
                  }
                  ?>
                  <li>
                  <a href="" title="<?php echo $r->emp_name ?>">
                    <img src="<?php echo $link ?>" class="avatar" alt="Avatar">
                  </a>
                  </li>
                  <?php }?>
                <?php } ?>

                </ul>
              </td>
              <td class="project_progress" style="padding-top: 4%;">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-<?php echo $color;?>" role="progressbar" data-transitiongoal="<?php echo $percent_day ?>"></div>
                </div>
                <small><?php echo 'Tổng :' .$total_day.' Ngày'.' - Đã qua  :';printf( "%.2f",  $percent_day ); ?>%</small>
              </td>
              <td style="padding-top: 4%;">
                <button type="button" class="btn btn-<?php echo $status_bg ?> btn-xs"><?php echo check_status_project($c) ?></button>
              </td>
              <td>   
	              <span class="chart" data-percent="<?php echo $row->progress ?>">
	              	<span class="percent"></span>
	              </span>	
              </td>
              <td style="padding-top: 2%;width:10%">

                <?php if($account_type < 4) { ?>
                <a href="<?php echo base_url('project/edit/'.$row->id) ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a></br>
                <?php }?>
                <?php if($account_type < 3) {?>
                <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('project/delete/'.$row->id)?>" class="btn btn-danger btn-xs">
                	<i class="fa fa-trash-o"></i> Delete 
                </a></br>
                <?php }?>
                <a href="<?php echo base_url('project/mission/index/'.$row->id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Xem</a>
              </td>
            </tr>
            <?php }?>
            
          </tbody>
        </table>
        <!-- end project list -->

      </div>
    </div>
  </div>
</div>


