<?php //pre($report_uncheck); ?>
<?php foreach ($report_uncheck as $key => $value) { ?>
<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><?php echo $value['department_name'] ?> <small>Báo cáo chưa duyệt</small></h2>
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
    <?php if(array_key_exists('list_report',$value)==true) { ?>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($value['list_report'] as $k => $v) { ?>
          <tr>
            <th scope="row">1</th>
            <td><?php echo $v->create_name ?></td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
        <?php }?>
        </tbody>
      </table>
    <?php }?>

    </div>
  </div>
</div>
<?php }?>