<?php $list_my_room = $this->CI->get_my_room_id();?>
<?php $my_avatar = $this->CI->get_my_avatar();?>
<?php //pre($list_my_room);?>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Danh mục</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Trang chủ <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url('home/organization'); ?>">Sơ đồ công ty</a></li>
          <!-- <li><a href="<?php echo base_url('home/index'); ?>">Quản lí nhân viên</a></li> -->
          <?php 
            if ($account_type ==1) {
              ?>
              
              <li><a href="<?php echo base_url('home/index'); ?>">Tài khoản</a></li>
              <?php
            }
          ?>
          <?php 
            if ($account_type ==2) {
              ?>
              
              <li><a href="<?php echo base_url('home/project_report'); ?>">Tổng quan dự án</a></li>
              <?php
            }
          ?>         
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Báo cáo<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if ($account_type > 2) { ?>
          <li><a href="<?php echo base_url('my_report/add_report') ?>">Viết báo cáo</a></li>
          <li><a href="<?php echo base_url('my_report/index') ?>">Báo cáo của tôi</a></li>
          <?php }?>
          <?php if ($account_type == 3) { ?>
          <li><a href="<?php echo base_url('my_report/check_report') ?>">Duyệt báo cáo</a></li>
          <?php } ?>
          <?php if ($account_type < 3) { ?>
          <li><a href="<?php echo base_url('view_report/report_statics') ?>">Báo cáo hôm nay</a></li>
          <li><a>Báo cáo bộ phận<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li class="sub_menu"><a href="<?php echo base_url('view_report/view_report_room/2') ?>">Nghiên cứu & Phát Triển</a></li>
              <?php if (in_array('10', $list_my_room)) { ?>
              <li><a href="<?php echo base_url('view_report/view_report_room/3') ?>">Vận Hành & Khai Thác</a></li>
              <?php } ?>
              <li><a href="<?php echo base_url('view_report/view_report_room/4') ?>">Kinh Doanh</a></li>
              <li><a href="<?php echo base_url('view_report/view_report_room/5') ?>">Kế Toán & HCNS</a></li>
            </ul>
          </li>         
          <?php }?>
<!--           <?php if (in_array('10', $list_my_room)) { ?>
          <li><a href="<?php echo base_url('my_report/my_room_report') ?>">Báo cáo phòng</a></li>
          <?php } ?> -->
        </ul>
      </li>
      <?php  if ($account_type !=2) {?>
      <li><a><i class="fa fa-tasks" aria-hidden="true"></i> Nhiệm vụ<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if ($account_type ==4 || $account_type ==3) {?>
          <li><a href="<?php echo base_url('my_mission/index') ?>">Nhiệm vụ của tôi</a></li>
          <?php }?>
        </ul>
      </li>
      <?php }?>
      <li><a><i class="fa fa-product-hunt" aria-hidden="true"></i> Dự án<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if ($account_type < 4) {?>
          <li><a href="<?php echo base_url('project/index') ?>">Tổng quan</a></li>
          <?php }?>
          <li><a href="<?php echo base_url('project/my_project') ?>">Dự án của tôi</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-users" aria-hidden="true"></i> Danh sách nhân viên<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url('home/index'); ?>">Toàn bộ nhân viên</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-check-square-o" aria-hidden="true"></i> Đánh giá<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="#">Đang xây dựng</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>
            <!-- /sidebar menu -->