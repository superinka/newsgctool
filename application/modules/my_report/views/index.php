<?php //pre($list_room_by_me) ?>
<?php //pre($all_report_by_me) ?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<div class="row">

	<div class="col-md-12">
	<?php foreach ($list_room_by_me['department'] as $key => $value) { ?>
		
	
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Công việc cần báo cáo hôm nay <small><?php echo $value['name'] ?></small></h2>
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

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tên công việc</th>
                          <th>Thời gian</th>
                          <th>Tiến độ</th>
                          <th>Tình trạng</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(array_key_exists('list_miss',$value)==true) {?>
                      	<?php  foreach ($value['list_miss'] as $k => $v) { //pre($v)?>
                      		<?php if(array_key_exists('list_task',$v)==true) { ?>
	                      		<?php  foreach ($v->list_task as $x => $y) { ?>
	                      		<?php 
	                      		$start_date = strtotime($y->start_date);
	                      		$newformat_start_date = date('m-d-Y',$start_date);
                 				$end_date = strtotime($y->end_date);
                 				$newformat_end_date = date('m-d-Y',$end_date);

	                      		if(array_key_exists('list_un_report_today',$y)==false && array_key_exists('list_reported_today',$y)==false) {$st ='<strong>Chưa báo cáo</strong><a href="'.(base_url('my_report/add_report_now/'.$y->id)).'">'.' <strong style="color:red"><i class="fa fa-warning"></i> Báo cáo ngay</strong> </a>';}
	                      		if(array_key_exists('list_un_report_today',$y)==true || array_key_exists('list_reported_today',$y)==true) {$st ='<strong>Có báo cáo</strong>';}
	                      		?>
		                        <tr>
		                          <th scope="row"></th>
		                          <td style="padding-top: 0px;"><a href="" title="Tên dự án : <?php echo $v->project_name  ?> - Tên nhiệm vụ : <?php echo $v->name  ?>"><?php echo $y->name  ?></a></td>
		                          <td>
		                          	<p>Thời gian : <?php echo $newformat_start_date ?> <i class="fa fa-arrow-right"></i> <?php echo $newformat_end_date ?></p>
		                          	<?php
					                  $color = 'green';
					                  if($y->completion>70) {
					                    $color = 'green';
					                  }

					                  if ($y->completion<25){
					                    $color = '#red';
					                  }
							                          	?>
<!-- 							         Tiến độ
		                          	 <div class="progress progress_sm">

					                    <div class="progress-bar bg-<?php echo $color;?>" role="progressbar" data-transitiongoal="<?php echo $y->completion ?>">
					                    </div>
					                 </div> -->
		                          </td>
		                          <td>
									<?php echo $y->completion ?>%
		                          </td>
		                          <td style="padding-top: 0px;"><?php echo $st  ?></td>
		                        </tr>
		                        <?php } ?>
	                        <?php }?>
                        <?php }?>
                      <?php }?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>		
		</div>

	<?php } ?>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="x_panel">
	              <div class="x_title">
	                <h2>Tổng hợp báo cáo hôm nay<small></small></h2>
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

	                <table class="table table-bordered">
	                  <thead>
			            <tr>
			              <th>#</th>
			              <th  style="width: 30%">Nội Dung Báo Cáo</th>
			              <th>Thông tin</th>
			              <th>Thời gian</th>
			              <th>Tình trạng</th>
			              <th>Sửa</th>
			            </tr>
	                  </thead>
	                  <tbody>
	                  <?php foreach ($list_room_by_me['department'] as $key => $value) { ?>
		                  <?php if(array_key_exists('list_miss',$value)==true) {?>
		                  	<?php  foreach ($value['list_miss'] as $k => $v) { //pre($v)?>
		                  		<?php if(array_key_exists('list_task',$v)==true) { ?>
		                      		<?php  foreach ($v->list_task as $x => $y) { ?>
		                      		<?php 

		                      		if(array_key_exists('list_un_report_today',$y)==false && array_key_exists('list_reported_today',$y)==false) {$st ='<strong>Chưa báo cáo</strong><a href="'.(base_url('my_report/add_report')).'">'.' <strong style="color:red"><i class="fa fa-warning"></i> Báo cáo ngay</strong> </a>';}
		                      		if(array_key_exists('list_un_report_today',$y)==true || array_key_exists('list_reported_today',$y)==true) {$st ='<strong>Có báo cáo</strong>';}
		                      		if (array_key_exists('list_report_today',$y)==true ) {

		                      		?>
		                      		<?php  foreach ($y->list_report_today as $m => $n) { //pre($n)?>
		                      		<?php 
		                      		$create_time = strtotime($n->create_time);
	          						$newformat_create_time = date('Y-m-d H:i:s',$create_time);
	          						$pm = ($this->my_report_model->get_fullname_employee($n->review_by));
		                      		?>
							          <tr>
							          	<td></td>
							          	<td  style="width: 30%">
							          	<p><?php echo $n->description ?></p>
							          	<small><i class="fa fa-angle-double-right"></i> <?php echo $n->note?></small>
							          		
							          	</td>
							          	<td>
							          	<small>
							          		<p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo $y->name?></p>
							          		<p><i class="fa fa-cube" aria-hidden="true"></i> <strong style="color:blue"><?php echo $value['name']; ?></strong></p>
							          		<p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo $v->project_name?></p>
							          		<?php if($n->file_att!=null) {?>
							          		<p><i class="fa fa-file-text" aria-hidden="true"></i> <a href="<?php echo base_url('public/upload/report/'.$n->file_att) ?>"><span style="color:green">File Đính kèm</span></a></p>
							          		<?php }?>
							          	</small>
							          	
							          	</td>

							          	<td>
							          	<small>
								          	<p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $newformat_create_time ?></p>
								          	<p>Thời gian làm : <?php echo $n->time_spend ?> giờ</p>
							          	</small>
							          	</td>
							          	
							          	<td>
							          	<small>
							          	<p><i class="fa fa-rss"></i> <?php echo check_progress_report($n->progress)?></p>
							          	<p><i class="fa fa-user-md"></i> <strong style="color:blue"><?php echo $pm[0]->fullname ?></strong></p>
							          	<p><i class="fa fa-arrow-circle-right"></i> <?php echo check_status_report($n->review_status); ?></p>
							          	</small>
							          	</td>
					                    <td>
					                    <?php if($account_type == 4){?>
					                    <?php if($n->review_status==0){ ?>
					                    	<a href="<?php echo base_url('my_report/edit/'.$n->id) ?>"><i class="fa fa-lock" aria-hidden="true"></i></a>

					                    <?php }?>
					                    <?php }?>
					                    <?php if($account_type == 3){?>
					 
					                    	<a href="<?php echo base_url('my_report/edit/'.$n->id) ?>"><i class="fa fa-lock" aria-hidden="true"></i></a>

					              
					                    <?php }?>					                    	
					                    </td>
							          </tr>
							          <?php }?>
						          	<?php }?>
			                        <?php } ?>
		                        <?php }?>
		                    <?php }?>
		                  <?php }?>
	                  <?php }?>
	                  </tbody>
	                </table>

	              </div>
	            </div>
	          </div>		
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Lịch sử báo cáo<small></small></h2>
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

            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
              <thead>
	            <tr>
	              <th>ID</th>
	              <th style="width: 30%">Nội Dung Báo Cáo</th>
	              <th>Thông tin</th>
	              <th>Thời gian</th>
	              <th>Tình trạng</th>
	            </tr>
              </thead>
              <tbody>
              <?php foreach ($all_report_by_me as $key => $value) { ?>
              <?php 
				$create_time = strtotime($value->create_time);
	          	$newformat_create_time = date('Y-m-d H:i:s',$create_time);
	          	$pm = ($this->my_report_model->get_fullname_employee($value->review_by));
              ?>

		          <tr>
		          	<td><?php echo $value->id ?></td>
		          	<td style="width: 30%">
		          	<p><?php echo $value->description ?></p>
		          	<small><i class="fa fa-angle-double-right"></i> <?php echo $value->note ?></small>
		          		
		          	</td>
		          	<td>
  						<small>
			          		<p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo $value->task_name?></p>
			          		<p><i class="fa fa-cube" aria-hidden="true"></i> <strong style="color:blue"><?php echo $value->department_name; ?></strong></p>
			          		<p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo $value->project_name?></p>
			          		<p>
			          			<?php if($value->file_att!=null) {?>
								<i class="fa fa-file-text" aria-hidden="true"></i> <a href="<?php echo base_url('public/upload/report/'.$value->file_att) ?>"><span style="color:green">File Đính kèm</span></a>
			          			<?php }?>
			          		</p>
			          	</small>
			        </td>
		          	<td>
  						<small>
				          	<p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $newformat_create_time ?></p>
				          	<p>Thời gian làm : <?php echo $value->time_spend ?> giờ</p>
			          	</small>
		          	
		          	</td>
		          	<td>
			          	<small>
			          	<p><i class="fa fa-rss"></i> <?php echo check_progress_report($value->progress)?></p>
			          	<p><i class="fa fa-user-md"></i> <strong style="color:blue"><?php echo $pm[0]->fullname ?></strong></p>
			          	<p><i class="fa fa-arrow-circle-right"></i> <?php echo check_status_report($value->review_status); ?></p>
			          	</small>		          	    	
		          		
		          	</td>
		          </tr>

              <?php }?>
              </tbody>
            </table>

          </div>
        </div>
      </div>		
</div>