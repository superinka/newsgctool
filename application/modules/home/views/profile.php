<?php //pre($info_employee); ?>
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thông tin cá nhân <small><?php echo $info_employee->fullname; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php if($info_employee->avatar == null) {?>
                          <img class="img-responsive avatar-view" src="<?php echo admin_theme('');?>/production/images/default-avatar.jpg" alt="Avatar" title="Change the avatar">
                          <?php }?>
                          <?php if($info_employee->avatar != null) {?>
                          <img class="img-responsive avatar-view" src="<?php echo base_url('public/upload/avatar/'.$info_employee->avatar);?>" alt="Avatar" title="Change the avatar">
                          <?php }?>
                        </div>
                      </div>
                      <span class="label label-success pull-right"><?php echo action_acc_type($info_user->account_type) ?></span>
                      <h4><?php echo $info_employee->fullname; ?></h4>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $info_employee->address; ?>
                        </li>

                        <li>
                          <i class="fa fa-user"></i> Tài khoản đăng nhập : <?php echo $info_user->username; ?>
                        </li>

                        <li>
                          <i class="fa fa-calendar"></i> Ngày tham gia : <?php echo $info_user->create_date ?>
                        </li>

                        <li>
                          <i class="fa fa-birthday-cake"></i> Sinh nhật : <?php echo $info_employee->birthday; ?>
                        </li>

                        <li>
                          <i class="fa fa-toggle-on"></i> Trạng thái tài khoản : <?php echo action_status($info_user->status) ?>
                        </li>

                        <li class="m-top-xs">
                        </li>
                      </ul>

                      <?php if (($account_type==1) || ($user_id==$now_id)) {
                        # code...
                        $link = base_url('home/home/edit_profile/'.$now_id);
                        //pre($link);
                        echo '<a href="'.$link.'" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Sửa thông tin</a>';
                      } ?>

                      
                      <br />


                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <!-- start skills -->
                      <h4>Liên hệ</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p><i class="fa fa-phone"></i> <?php echo $info_employee->phone ?></p>
                        </li>
                        <li>
                          <p><i class="fa fa-skype"></i> <?php echo $info_employee->skype ?></p>
                        </li>
                        <li>
                        <li>
                          <p><i class="fa fa-envelope-o"></i> <?php echo $info_employee->email ?></p>
                        </li>
                        <li>
                          <p><i class="fa fa-facebook-square"></i> <?php echo $info_employee->facebook ?></p>
                        </li>
                      </ul>
                      <!-- end of skills -->

                      <h4>Phòng ban</h4>
                      <ul style="list-style:none;padding-left:10px">
                        <?php foreach ($list_room as $r) {

                          ?>
                          <li><i class="fa fa-space-shuttle"></i>  <?php echo $r->department_name; ?></li>
                          <?php

                        } ?>
                        
                      </ul>
                    </div>
              </div>
            </div>