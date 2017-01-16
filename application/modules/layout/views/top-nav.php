<!-- top navigation -->
<?php //echo $id; ?>
<?php //echo $account_type; ?>
<?php //pre($list_request_by_me);?>
<?php $list_request_by_me = $this->CI->get_my_request();?>
<?php $list_order_for_me = $this->CI->get_my_order();?>
<?php //pre($list_request_by_me);?>
<?php //echo time_elapsed_string('2013-05-01 00:22:35'); ?>
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo admin_theme('');?>/production/images/img.jpg" alt="">
            <?php echo $username; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="<?php echo base_url('home/home/edit_profile/'.$id)?>"> Thông tin cá nhân</a></li>
            <li><a href="<?php echo base_url('home/home/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Thoát ra</a></li>
          </ul>
        </li>

        <?php if($account_type == 4 || $account_type == 3) {?>
        <li role="presentation" class="dropdown" style="padding-top: 5px;">
          <a href="javascript:;" class="dropdown-toggle info-number btn btn-app" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bullhorn"></i>Thông báo
            <span class="badge bg-green"><?php echo count($list_request_by_me) ?></span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
          <?php if(count($list_request_by_me)==0){
            echo '<p style="text-align:center"><strong>Không có thông báo nào</strong></p>';
          } ?>
            <?php $i=0;?>
            <?php foreach ($list_request_by_me as $key => $value) { ?>
            <?php if ($i<5) {?>
            <?php 
            $type = $value->type;
            $create_time = strtotime($value->create_time);
            $newformat_create_time = date('Y-m-d H:i:s',$create_time);
            //echo $newformat_create_time; echo time();
            ?>
            <li>
              <a>
                <span class="image"><img src="<?php echo admin_theme('');?>/production/images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>Tôi- <strong><?php echo type_of_request($type) ?></strong></span>
                  <span class="time"><?php echo time_elapsed_string($create_time); ?></span>
                </span>
                <span class="message">
                  <?php echo $value->note ?>
                </span>
              </a>
            </li>
            <?php $i++;} ?>
            <?php } ?>
            <li>
              <div class="text-center">
                <a>
                  <strong>Xem tất cả</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
        <?php }?>

        <?php if($account_type == 3 || $account_type == 2 || $account_type == 1) {?>
        <li role="presentation" class="dropdown" style="padding-top: 5px;padding-right: 10px">
          <a href="javascript:;" class="dropdown-toggle info-number btn btn-app" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-inbox"></i>Yêu cầu
            <span class="badge bg-orange"><?php echo count($list_order_for_me) ?></span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
          <?php if(count($list_order_for_me)==0){
            echo '<p style="text-align:center"><strong>Không có thông báo nào</strong></p>';
          } ?>

          <?php if(count($list_order_for_me)>10){$max = 10;}?>
          <?php if(count($list_order_for_me)<=10){$max = count($list_order_for_me);}?>
          <?php $i=0;?>
          <?php foreach ($list_order_for_me as $key => $value) { ?>
          <?php if ($i<5) {?>
            <?php 
            $type = $value->type;
            $create_time = strtotime($value->create_time);
            $newformat_create_time = date('Y-m-d H:i:s',$create_time);
            $code  = $value->code;
            //echo $newformat_create_time; echo time();
            ?>
            <li>
              <a href="<?php echo base_url(link_of_request($type).'/'.$type.'/'.$code) ?>">
                <span class="image"><img src="<?php echo admin_theme('');?>/production/images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span><?php echo $value->creater_name ?> <p><strong><?php echo type_of_request($type) ?></strong></p></span>
                  <span class="time"><?php echo time_elapsed_string($create_time); ?></span>
                </span>
                <span class="message">
                  <?php echo $value->note ?>
                </span>
              </a>
            </li>
            <?php $i++;} ?>
            <?php } ?>
            <li>
              <div class="text-center">
                <a>
                  <strong>Xem tất cả</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
        <?php }?>
      </ul>
    </nav>
  </div>
</div>
        <!-- /top navigation -->