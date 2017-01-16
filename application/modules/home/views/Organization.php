<div class="row">

<div class="col-md-12">
  <div class="content-new">
  <h1>Sơ đồ công ty</h1>
<div class="tree">
	<ul>
		<li>
			<a href="#">Ban lãnh đạo</a>
			<ul>
			<?php foreach ($list_center as $key => $value) { ?>
				<li>
					<a href="#"><?php echo $value->name ?></a>
					<ul>
					
						<?php if(array_key_exists('list_child',$value)==true) { ?>
							<?php foreach ($value->list_child as $x => $y) { ?>
							<li>
								<?php if (in_array($y->id, $list_room_id)) {?>
								<a style="background-color: #5cb75c;color:#fff" href="#"><?php echo $y->name; ?></a>
								<?php }?>
								<?php if (in_array($y->id, $list_room_id)==false) {?>
								<a style="" href="#"><?php echo $y->name ?></a>
								<?php }?>
							</li>
								
							<?php }?>
						<?php }?>
					

					</ul>
				</li>
			<?php } ?>

			</ul>
		</li>
	</ul>
</div>
</div>
</div>
</div>