<div class="row">
<div style="color:red; font-weight:600"><?php echo validation_errors(); ?></div>
<?php
//pre($list_report_today);
//pre($list_task_active);
//pre($my_room);

$a = $my_room[0];


?>
	<?php if ($list_report_today==null) { ?>
		<?php echo '<p>Bạn chưa có report nào hôm nay !</p>'; ?>
	<?php }?>
	<?php  if ($list_report_today!=null) {?>
	<p>Bạn đã báo cáo <strong><?php echo count($list_report_today); ?></strong> lần hôm nay - 
	<?php echo $today ?>
	</p>
	<?php }?>
	<form class="form-horizontal form-label-left input_mask"  method="post" action="" enctype="multipart/form-data">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Viết báo cáo <small>hôm nay <?php echo $today ?> </small></h2>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên báo cáo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="description" value="<?php echo set_value("description")?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nội Dung <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<textarea id="message" required="required" class="form-control" value="<?php echo set_value("description")?>" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tình trạng</label>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                          Hoàn thành:
                          <input type="radio" class="flat" name="progress" id="status1" value="100"  /> 
                          Chưa Hoàn thành:
                          <input type="radio" class="flat" name="progress" id="status2" value="0" checked="" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Thời gian làm</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" required="required" name="time_spend" tabindex="-1">
                            <option></option>
                            <option value="1">1 giờ</option>
                            <option value="2">2 giờ</option>
                            <option value="3">3 giờ</option>
                            <option value="4">4 giờ</option>
                            <option value="5">5 giờ</option>
                            <option value="6">6 giờ</option>
                            <option value="7">7 giờ</option>
                            <option value="8">8 giờ</option>
                            <option value="9">9 giờ</option>
                            <option value="10">10 giờ</option>
                            <option value="11">11 giờ</option>
                            <option value="12">12 giờ</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Phòng ban</label>
                        <div class="col-md-3 col-xs-12">
                          <select id ="getProducts" name="my_department" class="form-control">
                          <?php foreach ($my_room as $key => $value) { ?>
                            <option value="<?php echo $value ?>"><?php echo $my_department[$key]; ?></option>
                          <?php } ?>
                            
                          </select>

                        </div>                      
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn công việc báo cáo</label>
                        <div id="list_task" class="col-md-3 col-sm-3 col-xs-12">

                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">Tiến độ</label>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <input type="number" id="out_pro" name="pro" min="100" max ="100" value="100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File đính kèm</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="file" name="userfile" id="userfile" size="20" />
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
	</form>
</div>
<div class="display" id ="display">
</div>
<script src="<?php echo admin_theme('');?>/vendors/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function()
{  
 // function to get all records from table
 function getAll(){


  
  $.ajax
  ({
   url: "<?php echo base_url(); ?>" + "my_report/get_task/",
   type:'POST',
   dataType: 'html',
   data: "type=" + "<?php echo $a ?>",
   cache: false,
   success: function(r)
   {
    //alert('ok');
    $("#list_task").html(r);
   }
  });   
 }
 
 // function to get all records from table
  getAll();
 
 // code to get all records from table via select box
 $("#getProducts").change(function()
 {    
  var id = $(this).find(":selected").val();

  var dataString = id;

  console.log(id);
    
  $.ajax
  ({
   url:  "<?php echo base_url(); ?>" + "my_report/get_task/",
   type:'POST',
   dataType: 'html',
   data: "type="+ id,
   cache: false,
   success: function(r)
   {
    $("#list_task").html(r);
   } 
  });
 })
 // code to get all records from table via select box
});
</script>
<script type="text/javascript">
$( document ).ready(function() {
  // Handler for .ready() called.

 var select = document.getElementById('list_task');
 var input = document.getElementById('out_pro');
 //console.log(select);


  select.onchange = function() {
    var b = document.getElementById("gg");
    var x = b.options[b.selectedIndex].getAttribute('completion');
    console.log(x);
    input.value = b.options[b.selectedIndex].getAttribute("completion");
    var att = document.createAttribute("min");
    var m = b.options[b.selectedIndex].getAttribute('completion');
    att.value = m;
    input.setAttributeNode(att);
    //   b.onchange= function(){
    //   var m = this.options[this.selectedIndex].getAttribute('completion');
    //   //console.log(m);
    //   input.value = this.options[this.selectedIndex].getAttribute("completion");
    //   var att = document.createAttribute("min");
    //   att.value = m;   
    //   input.setAttributeNode(att);  
    // }
      // console.log(select);
      // console.log('ok');

      // var a  = document.getElementById('gg');
      // //console.log(a);
      // var y = a.selectedIndex.getAttribute("completion");
      // console.log(y);
      // var x = this.options[this.selectedIndex].getAttribute("completion");
      // console.log('ok2');
      // input.value = this.options[this.selectedIndex].getAttribute("completion");
      // var att = document.createAttribute("min");
      // att.value = x;                           // Set the value of the class attribute
      // input.setAttributeNode(att);   
  


 

  } 

});
</script>
