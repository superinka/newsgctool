<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    $this->load->view('head');
    if ($this->uri->segment(2)=='Organization' || $this->uri->segment(2)=='organization') { ?>
        <link href="<?php echo admin_theme('');?>/organ.css" rel="stylesheet">
    <?php }
    ?>

  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>SGC logo!</span></a>
            </div>

            <div class="clearfix"></div>

            <?php 
              $my_name = $this->CI->get_my_fullname();
              //pre($my_name);
            ?>
            <?php $my_avatar = $this->CI->get_my_avatar();?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
<!--                 <img src="<?php echo admin_theme('');?>/production/images/img.jpg" alt="..." class="img-circle profile_img"> -->
                <?php if ($my_avatar == null) {?>
                <img src="<?php echo admin_theme('');?>/production/images/img.jpg" alt="..." class="img-circle profile_img">
                <?php }?>
                <?php if($my_avatar!=null){?>
                <img src="<?php echo base_url('public/upload/avatar/'.$my_avatar) ;?>" alt="..." class=" img-circle profile_img img-responsive">
                <?php }?>
              </div>
              <div class="profile_info">
                <span>Xin chào !,</span>
                <h2><?php echo $my_name; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php $this->load->view('left-menu'); ?>            

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <?php $this->load->view('top-nav'); ?>
        <!-- page content -->
        <div class="right_col" role="main">

          <?php $this->load->view($temp, $this->data_layout);?> 

        </div>
      </div>
      </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
        <?php $this->load->view('footer');?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php $this->load->view('js');?>
    <?php //echo $this->uri->segment(2); ?>
    <?php 
      if ($this->uri->segment(2)=='mission' && $this->uri->segment(1)=='project') {
        $this->load->view('js-mission');
      }
      if ($this->uri->segment(1)=='my_report') {
        $this->load->view('js-report');
      }
      if ($this->uri->segment(1)=='view_report' ) {
        $this->load->view('js-view_report');
      }
      if ($this->uri->segment(1)=='request') {
        $this->load->view('js-report');
      }
      if ($this->uri->segment(1)=='report') {
        $this->load->view('js-report');
      }
      if ($this->uri->segment(1)=='project') {
        $this->load->view('js-project');
      }
      if ($this->uri->segment(2)=='employee') {
        $this->load->view('js-employee');
      }
      if ($this->uri->segment(2)=='acc') {
        $this->load->view('js-acc');
      }

      if ($this->uri->segment(2)=='edit') {
        $this->load->view('js-acc');
      }
      if ($this->uri->segment(3)=='edit_profile') {
        $this->load->view('js-home');
      }
       if ($this->uri->segment(1)=='home') {
        $this->load->view('js-home');
      }     
    ?>
    
  </body>
</html>
