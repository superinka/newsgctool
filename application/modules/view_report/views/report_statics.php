
<div class="row">
	<h2>Thống kê báo cáo</h2>
	<p><i class="fa fa-angle-double-right"></i> Hôm nay có <strong><?php echo count($list_report_today); ?></strong> báo cáo</p>
	<p><i class="fa fa-angle-double-right"></i> Hôm nay có <strong><?php echo count($list_report_today_uncheck); ?></strong> báo cáo chưa được duyệt</p>
	<p><i class="fa fa-angle-double-right"></i> Hôm nay có <strong><?php echo count($list_report_today_checked); ?></strong> báo cáo đã được duyệt</p>
	<p><i class="fa fa-angle-double-right"></i> Hôm nay có tất cả <strong><?php echo count($list_emp); ?></strong> nhân viên phải báo cáo</p>
	<div class="" style="color:blue">
		<p><i class="fa fa-check-square"></i></i> <strong><?php echo count($list_emp_reported) ?></strong> nhân viên đã báo cáo : </p>
		<div>
			<i class="fa fa-angle-double-right"></i>
			<i class="fa fa-angle-double-right"></i>
			<?php foreach ($list_emp_reported as $key => $value) {
				echo '<strong>'.$value->fullname.'</strong>';
			} ?>
		</div>
	</div>
	<div class="" style="color:red">
		<p><i class="fa fa-warning"></i></i> <strong><?php echo count($list_emp_unreport) ?></strong> nhân viên chưa báo cáo : </p>
		<div>
			<i class="fa fa-angle-double-right"></i>
			<i class="fa fa-angle-double-right"></i>
			<?php foreach ($list_emp_unreport as $key => $value) {
				echo '<i class="fa fa-circle"></i> <strong>'.$value->fullname.'</strong> ';
			} ?>
		</div>
	</div>
</div>
<br>
<br>

<script src="<?php echo admin_theme('');?>/vendors/jquery/dist/jquery.min.js"></script>
<?php 
	$c = array();
	if(count($list_emp_unreport) == 0){
		$c = array(100,0);
	}
	if(count($list_emp_reported) == 0){
		$c = array(0,100);
	}
	if(count($list_emp_unreport)!=0 && count($list_emp_reported)!=0) {
		$c1 = round(count($list_emp_reported) / (count($list_emp_unreport) + count($list_emp_reported)),2) * 100;
		$c2 = 100- $c1;
		$c[0] = $c1; $c[1] = $c2;
	}

	$d = array();
	if(count($list_report_today_uncheck) == 0){
		$d = array(100,0);
	}
	if(count($list_report_today_checked) == 0){
		$d = array(0,100);
	}
	if(count($list_report_today_checked)!=0 && count($list_report_today_uncheck)!=0) {
		$d1 = round(count($list_report_today_checked) / (count($list_report_today_uncheck) + count($list_report_today_checked)),2) * 100;
		$d2 = 100- $d1;
		$d[0] = $d1; $d[1] = $d2;
	}
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
        <div class="x_title">
          <h2>Thống kê nhân viên báo cáo</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="" style="width:100%">
            <tr>
              <th style="width:37%;">
              </th>
              <th>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                  <p class="">Kiểu</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                  <p class="">Phần trăm</p>
                </div>
              </th>
            </tr>
            <tr>
              <td>
                <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
              </td>
              <td>
                <table class="tile_info">
                  <tr>
                    <td>
                      <p><i class="fa fa-square blue"></i>Đã báo cáo </p>
                    </td>
                    <td><?php echo $c[0] ?>%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square red"></i>Chưa báo cáo </p>
                    </td>
                    <td><?php echo $c[1] ?>%</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
        <div class="x_title">
          <h2>Thống kê tình trạng duyệt</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="" style="width:100%">
            <tr>
              <th style="width:37%;">
              </th>
              <th>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                  <p class="">Kiểu</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                  <p class="">Phần trăm</p>
                </div>
              </th>
            </tr>
            <tr>
              <td>
                <canvas id="canvas2" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
              </td>
              <td>
                <table class="tile_info">
                  <tr>
                    <td>
                      <p><i class="fa fa-square blue"></i>Đã duyệt </p>
                    </td>
                    <td><?php echo $d[0] ?>%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square red"></i>Chưa duyệt </p>
                    </td>
                    <td><?php echo $d[1] ?>%</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
</div>

<div class="row">
	<div class="row x_title">
	  <div class="col-md-6">
	    <h3>Thống kê báo cáo theo trung tâm <small></small></h3>
	  </div>
	</div>
	<div class="row">

<?php

	$room = array(2,3,4,5);

	foreach ($room as $x => $y) { ?>
		
	
	<?php 

	$room = $this->department_model->get_info($y);
	$room_name = $room->name;

	switch ($room_name) {
    case 'Trung Tâm Vận Hành Và Khai Thác':
        $room_name = 'Vận Hành & Khai Thác';
        break;
    case 'Trung Tâm Nghiên Cứu Và Phát Triển':
        $room_name = 'Nghiên Cứu & Phát Triển';
        break;
    case 'Kế Toán Và Hành Chính Nhân Sự':
        $room_name = 'Kế Toán & HCNS';
        break;
    default:
        # code...
        break;
}
	$center1 = $this->CI->list_member_by_room($y);
	//pre($center1);
	$center1_unreport = $center1_reported = 0;
	if(!$center1){
		$center1_unreport = $center1_reported = 0;
		$c1[0] = 0; $c1[1] = 100;
	}
	else {
		foreach ($center1 as $key => $value) {
			if($value->check ==1){
				$center1_reported++;
			}
			if($value->check ==0){
				$center1_unreport++;
			}
		}

		$c1 = array();
		if($center1_unreport == 0){
			$c1 = array(100,0);
		}
		if($center1_reported == 0){
			$c1 = array(0,100);
		}
		if($center1_reported!=0 && $center1_unreport!=0) {
			$a = round($center1_reported / ($center1_unreport + $center1_reported),2) * 100;
			$b = 100- $a;
			$c1[0] = $a; $c1[1] = $b;
		}		
	}


	?>



		<div class="col-md-3 col-sm-3 col-xs-12">
	      <div class="x_panel tile fixed_height_320 overflow_hidden">
	        <div class="x_title">
	          <p><?php echo $room_name ?>: <?php echo count($center1) ?> <i class="fa fa-child"></i></p><span></span>
	          <div class="clearfix"></div>
	        </div>
	        <div class="x_content">
	          <table class="" style="width:100%">
	            <tr>
	              <th style="width:37%;">
	              </th>
	              <th>
	                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
	                  <p class="">Kiểu</p>
	                </div>
	                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
	                  <p class="">Phần trăm</p>
	                </div>
	              </th>
	            </tr>
	            <tr>
	              <td>
	                <canvas id="canvas_<?php echo $y ?>" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
	              </td>
	              <td>
	                <table class="tile_info">
	                  <tr>
	                    <td>
	                      <p><i class="fa fa-square blue"></i>Đã báo cáo </p>
	                    </td>
	                    <td><?php echo $c1[0] ?>%</td>
	                  </tr>
	                  <tr>
	                    <td>
	                      <p><i class="fa fa-square red"></i>Chưa báo cáo </p>
	                    </td>
	                    <td><?php echo $c1[1] ?>%</td>
	                  </tr>
	                </table>
	              </td>
	            </tr>
	          </table>
	        </div>
	      </div>
	    </div>
        <!-- Doughnut Chart -->
	    <script>
	      $(document).ready(function(){
	        var options = {
	          legend: false,
	          responsive: false
	        };

	        var dt4=[];
	        dt4= <?php echo json_encode($c1); ?>;
	        console.log(dt4);
	        var y;
	        y= <?php echo json_encode($y); ?>;
	        g = "canvas_" + y;

	        new Chart(document.getElementById(g), {
	          type: 'doughnut',
	          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
	          data: {
	            labels: [
	              "Đã báo cáo",
	              "Chưa báo cáo"
	            ],
	            datasets: [{
	              data: dt4,
	              backgroundColor: [
	                "#3498DB",
	                "#E74C3C"
	              ],
	              hoverBackgroundColor: [
	                "#3498DB",
	                "#E74C3C"
	              ]
	            }]
	          },
	          options: options
	        });
	      });
	    </script>
	    <!-- /Doughnut Chart -->	    
	    <?php }?>
	</div>
</div>




    <!-- Doughnut Chart -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        var dt=[];
        dt = <?php echo json_encode($c); ?>;

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Đã báo cáo",
              "Chưa báo cáo"
            ],
            datasets: [{
              data: dt,
              backgroundColor: [
                "#3498DB",
                "#E74C3C"
              ],
              hoverBackgroundColor: [
                "#3498DB",
                "#E74C3C"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->

    <!-- Doughnut Chart -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        var dt2=[];
        dt2 = <?php echo json_encode($d); ?>;
        console.log(dt2);

        new Chart(document.getElementById("canvas2"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Đã duyệt",
              "Chưa duyệt"
            ],
            datasets: [{
              data: dt2,
              backgroundColor: [
                "#3498DB",
                "#E74C3C"
              ],
              hoverBackgroundColor: [
                "#3498DB",
                "#E74C3C"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->
