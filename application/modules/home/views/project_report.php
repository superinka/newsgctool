<div class="row">
<?php //pre($list_project); ?>

<?php foreach ($list_project as $key => $value) { ?>
<?php 
$start_date = strtotime($value->start_date);
$end_date = strtotime($value->end_date);
$today_date = strtotime(date_create('now')->format('Y-m-d'));
$department_info = $this->department_model->get_info($value->department_id);
$department_name = $department_info->name;
$create_name = $this->home_model->get_fullname_employee($value->create_by);
$create_name = $create_name[0]->fullname;   

switch ($department_name) {
    case 'Trung Tâm Vận Hành Và Khai Thác':
        $department_name = 'Vận Hành & Khai Thác';
        break;
    case 'Trung Tâm Nghiên Cứu Và Phát Triển':
        $department_name = 'Nghiên Cứu & Phát Triển';
        break;
    case 'Kế Toán Và Hành Chính Nhân Sự':
        $room_name = 'Kế Toán & HCNS';
        break;

    default:
        # code...
        break;
}
//echo $create_name;
//pre($create_name);
?>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel tile fixed_height_420">
                <div class="x_title">
                  <h2><a href="<?php echo base_url('project/mission/index/'.$value->id) ?>"><?php echo $value->project_name ?></a></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="quick-list">
                    <?php $l = array(); ?>
                    <?php foreach ($value->emp as $r) { ?>
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
                        <?php }?>
                    <?php }?>
                        <li><i class="fa fa-user"></i><a href="#">Số người tham dự : <?php echo count($l); ?></a></li>
                        <li><i class="fa fa-calendar-o"></i><a href="#">Ngày bắt đầu : <?php echo $value->start_date; ?></a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">Ngày kết thúc : <?php echo $value->end_date; ?></a></li>
                        <li><i class="fa fa-edit"></i><a href="#">bởi: <?php echo $create_name ?></a></li>
                        <li><i class="fa fa-users"></i><a href="#"><?php echo $department_name; ?></a></li>
                    </ul>

                    <div class="sidebar-widget">
                      <h4>Tiến dộ dự án</h4>
                        <span class="chart" data-percent="<?php echo $value->progress ?>">
                        <span class="percent"></span>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    <!-- gauge.js -->
    <!--<script>
      var y;
	  y= <?php echo json_encode($value->id); ?>;
      z= <?php echo json_encode($value->progress); ?>;

      x = "foo_" + y;
      console.log(x);
      var target = document.getElementById(x),
          gauge = new Gauge(target).setOptions(opts);
      g = "gauge_text_" + y; 
      console.log(g);
      gauge.maxValue = 100;
      gauge.animationSpeed = 12;
      gauge.set(z);
      gauge.setTextField(document.getElementById(g));
    </script>-->
    <!-- /gauge.js -->
<?php }?>
</div>

