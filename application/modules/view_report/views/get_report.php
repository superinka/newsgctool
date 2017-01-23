<?php //pre($report_uncheck); ?>
<?php //pre($report_checked); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2><i class="fa fa-bars"></i> <small></small></h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
<!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

      });
    </script>

    <div class="" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chưa duyệt</a>
        </li>
        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Đã duyệt</a>
        </li>
      </ul>
      
      <div id="myTabContent" class="tab-content">
        <?php $i=0; ?>
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
			<?php foreach ($report_uncheck as $key => $value) { ?>
			<?php $i++; $list[] = $i; 

			?>
			<script type="text/javascript">

				var i = <?php echo $i ?>;

				var x = "#datatable-checkbox" + i;
				
				var $datatable = $(x);

		        $datatable.dataTable({
		          'order': [[ 1, 'asc' ]],
		          'columnDefs': [
		            { orderable: false, targets: [0] }
		          ]
		        });
		        $datatable.on('draw.dt', function() {
		          $('input').iCheck({
		            checkboxClass: 'icheckbox_flat-green'
		          });
		        });

		        TableManageButtons.init();
			</script>
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2><?php echo $value['department_name'] ?> <small>Báo cáo chưa duyệt</small></h2>
			      <ul class="nav navbar-right panel_toolbox">

			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
			    <?php if(array_key_exists('list_report',$value)==true) { ?>
			      <table id="datatable-checkbox<?php echo $i?>" class="table table-striped table-bordered bulk_action">
			        <thead>
			          <tr>
			            <!--<th>#</th>-->
			            <th style="width: 60%">Nội Dung Báo cáo</th>
			            <th>Thông tin</th>
			          </tr>
			        </thead>
			        <tbody>
			        <?php foreach ($value['list_report'] as $k => $v) { ?>
			        <?php 
			          $create_time = strtotime($v->create_time);
			          $newformat_create_time = date('Y-m-d H:i:s',$create_time);
			          $pm = ($this->my_report_model->get_fullname_employee($v->review_by));
			          $ac = $this->acc_model->get_info_rule($where = array('id'=>$v->create_by));
			          if($ac!=null){
			          	  $ac = $ac->account_type;
				          $newformat_create_time2 = date('Y-m-d', $create_time);
				          if($newformat_create_time2 == $today){
				            $x = 'Hôm nay';
				          }
				          else {
				            $x = $newformat_create_time;
				          }
				          ?>
				          <tr>
				            <!--<th scope="row"><?php echo $v->id ?></th>-->
				            <td>
				            	<p><?php echo $v->description ?></p>
				            	<small>
				            	<p><i class="fa fa-angle-double-right"></i> <?php echo $v->note?></p>
				            	
				            	</small>
				            </td>
				            <td>                      
				              <small>
								<p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $x ?></p>
				                <p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo $v->project_name ?></p> 
				                <p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo $v->mission_name?></p>
				              </small>  
				            </td>
				          </tr>
			          <?php } ?>
			        <?php }?>
			        </tbody>
			      </table>
			    <?php }?>
			    <?php if(array_key_exists('list_report_bonus',$value)==true && count($value['list_report_bonus']) > 0) { ?>
			      <p>Phát sinh </p>
			      <table class="table">
			        <thead>
			          <tr>
			            <!--<th>#</th>-->
			            <th style="width: 60%">Nội Dung Báo Cáo</th>
			            <th>Thông Tin</th>
			          </tr>
			        </thead>
			        <tbody>
			        <?php foreach ($value['list_report_bonus'] as $ka=> $va) { ?>
			        <?php foreach ($va as $k => $v) { ?>
			            <?php 
			              $create_time = strtotime($v->create_time);
			              $newformat_create_time = date('Y-m-d H:i:s',$create_time);
			              $pm = ($this->my_report_model->get_fullname_employee($v->review_by));
			              $ac = $this->acc_model->get_info_rule($where = array('id'=>$v->create_by));
			              $for = $this->home_model->get_info_rule($where = array('user_id'=>$v->create_by));
			              $ac = $ac->account_type;
			              $mission_for = $for->fullname;
			              //$pj = $this->project_model->get_info($v->project_id);
			              //$project_name = $pj->project_name;
			              $newformat_create_time2 = date('Y-m-d', $create_time);
			              if($newformat_create_time2 == $today){
			                $x = 'Hôm nay';
			              }
			              else {
			                $x = $newformat_create_time;
			              }

			              ?>
			          <tr>
			            <!--<th scope="row"><?php echo $v->id ?></th>-->
			            <td>
			            	<p><?php echo $v->description ?></p>
			            	<small>
			            	<p><i class="fa fa-angle-double-right"></i> <?php echo $v->note?></p>

			            	</small>
			            </td>
			            <td>                      
			              <small>
										  <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $x ?></p>
			                <p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo 'Phát Sinh';?></p> 
			                <p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo 'Phát Sinh';?></p>
											<p><i class="fa fa-angle-double-right"></i> bởi : <?php echo $v->create_name ?></p>
			              </small>  
			            </td>
			          </tr>
			        <?php }?>
			        <?php }?>
			        </tbody>
			      </table>
			    <?php }?>

			    </div>
			  </div>
			</div>
			<?php }?>
        </div>
        <?php $j=0; ?>
        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
			<?php foreach ($report_checked as $key => $value) { ?>
			<?php $j++; $list[] = $j; 

			?>
			<script type="text/javascript">

				var j = <?php echo $j ?>;

				var y = "#datatable-checkbox_" + j;
				
				var $datatable = $(y);

		        $datatable.dataTable({
		          'order': [[ 1, 'asc' ]],
		          'columnDefs': [
		            { orderable: false, targets: [0] }
		          ]
		        });
		        $datatable.on('draw.dt', function() {
		          $('input').iCheck({
		            checkboxClass: 'icheckbox_flat-green'
		          });
		        });

		        TableManageButtons.init();
			</script>
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2><?php echo $value['department_name'] ?> <small>Báo cáo đã duyệt</small></h2>
			      <ul class="nav navbar-right panel_toolbox">
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
			    <?php if(array_key_exists('list_report',$value)==true) { ?>
			      <table id="datatable-checkbox_<?php echo $i?>" class="table table-striped table-bordered bulk_action">
			        <thead>
			          <tr>
			            <!--<th>#</th>-->
			            <th style="width: 60%">Nội Dung Báo cáo</th>
			            <th>Thông tin</th>
			          </tr>
			        </thead>
			        <tbody>
			        <?php foreach ($value['list_report'] as $k => $v) { ?>
			        <?php 
			        //pre($v);
			          $create_time = strtotime($v->create_time);
			          $newformat_create_time = date('Y-m-d H:i:s',$create_time);
			          $pm = ($this->my_report_model->get_fullname_employee($v->review_by));
			          $ac = $this->acc_model->get_info_rule($where = array('id'=>$v->create_by));
			          if($ac!=null){
			          	  $ac = $ac->account_type;
				          $newformat_create_time2 = date('Y-m-d', $create_time);
				          if($newformat_create_time2 == $today){
				            $x = 'Hôm nay';
				          }
				          else {
				            $x = $newformat_create_time;
				          }
				          ?>
				          <tr>
				            <!--<th scope="row"><?php echo $v->id ?></th>-->
				            <td style="width: 60%">
				            	<p><?php echo $v->description ?></p>
				            	<small>
				            	<p><i class="fa fa-angle-double-right"></i> <?php echo $v->note?></p>
				            	
				            	</small>
				            </td>
				            <td>                      
				              <small>
								<p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $x ?></p>
				                <p>
				                <i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo $v->project_name ?></p> 
				                <p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo $v->mission_name?></p>
												<p><i class="fa fa-angle-double-right"></i> bởi : <?php echo $v->create_name ?></p>
				              </small>  
				            </td>
				          </tr>
			          <?php } ?>
			        <?php }?>
			        </tbody>
			      </table>
			    <?php }?>
			    <?php if(array_key_exists('list_report_bonus',$value)==true && count($value['list_report_bonus']) > 0) { ?>
			      <p>Phát sinh </p>
			      <table class="table">
			        <thead>
			          <tr>
			            <!--<th>#</th>-->
			            <th style="width: 60%">Nội Dung Báo cáo</th>
			            <th>Thông tin</th>
			          </tr>
			        </thead>
			        <tbody>
			        <?php foreach ($value['list_report_bonus'] as $ka=> $va) { ?>
			        <?php foreach ($va as $k => $v) { ?>
			            <?php 
			              $create_time = strtotime($v->create_time);
			              $newformat_create_time = date('Y-m-d H:i:s',$create_time);
			              $pm = ($this->my_report_model->get_fullname_employee($v->review_by));
			              $ac = $this->acc_model->get_info_rule($where = array('id'=>$v->create_by));
			              $for = $this->home_model->get_info_rule($where = array('user_id'=>$v->create_by));
			              $ac = $ac->account_type;
			              $mission_for = $for->fullname;
			              //$pj = $this->project_model->get_info($v->project_id);
			              //$project_name = $pj->project_name;
			              $newformat_create_time2 = date('Y-m-d', $create_time);
			              if($newformat_create_time2 == $today){
			                $x = 'Hôm nay';
			              }
			              else {
			                $x = $newformat_create_time;
			              }

			              ?>
			          <tr>
			            <!--<th scope="row"><?php echo $v->id ?></th>-->
			            <td style="width: 60%">
			            	<p><?php echo $v->description ?></p>
			            	<small>
			            	<p><i class="fa fa-angle-double-right"></i> <?php echo $v->note?></p>
			            	
			            	</small>
			            </td>
			            <td>                      
			              <small>
											<p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $x ?></p>
			                <p><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo 'Phát sinh'; ?></p> 
			                <p><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo 'Phát sinh';?></p>
											<p><i class="fa fa-angle-double-right"></i> bởi : <?php echo $mission_for ?></p>
			              </small>  
			            </td>
			          </tr>
			        <?php }?>
			        <?php }?>
			        </tbody>
			      </table>
			    <?php }?>

			    </div>
			  </div>
			</div>
			<?php }?>
        </div>
      </div>
    </div>

  </div>
</div>
</div>


    <!-- /Datatables -->