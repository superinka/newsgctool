<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Lịch sử báo cáo phòng vận hành<small></small></h2>
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
              <?php foreach ($all_report_by_room as $k => $v) { ?>

              <?php foreach ($v as $key => $value) { ?>
              <?php 
                $me = ($this->my_report_model->get_fullname_employee($value->create_by));
                      
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
			          		<p>Bởi : <strong style="color:blue"><?php echo $me[0]->fullname ?></strong></p>
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
              <?php }?>
              </tbody>
            </table>

          </div>
        </div>
      </div>		
</div>