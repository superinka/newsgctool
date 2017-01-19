<?php //pre($this->uri->segment(3)); ?>
<?php $r = ($this->uri->segment(3)); ?>

<div class="row">
<form class="form-horizontal form-label-left">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Mời chọn</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<select id="getProducts" class="form-control">
		<option value="<?php echo $r; ?>" selected="selected">Tất cả</option>
		<?php foreach ($my_room as $key => $value) { ?>
		
		<option value="<?php echo $key ?>" ><?php echo $value ?></option>

	<?php } ?>
	</select>
	</div>
</div>
</form>

<div class="" id="display">
   <!-- Records will be displayed here -->
</div>



<script src="<?php echo admin_theme('');?>/vendors/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function()
{  
 // function to get all records from table
 function getAll(){


  
  $.ajax
  ({
   url: "<?php echo base_url(); ?>" + "view_report/get_report/",
   type:'POST',
   dataType: 'html',
   data: "type=" + "<?php echo $r; ?>",
   cache: false,
   success: function(r)
   {
    //alert('ok');
    $("#display").html(r);
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
   url:  "<?php echo base_url(); ?>" + "view_report/get_report/",
   type:'POST',
   dataType: 'html',
   data: "type="+ id,
   cache: false,
   success: function(r)
   {
    $("#display").html(r);
   } 
  });
 })
 // code to get all records from table via select box
});
</script>
</div>