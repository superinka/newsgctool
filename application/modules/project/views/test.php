
<!--               <div class="col-md-4" style="padding-top: 0px;">

              <div class="row">
                <div class="col-md-10">
                <p style="margin-bottom: 3px;">Tiến độ</p>
                <!-- Ion.RangeSlider -->
                <?php 
                $range_min_max =array();
                $class = 'range_min_max'.$i;
                $range = 'range_'.$i;
                $id_range = '#range_'.$i;
                $cd = '.range_min_max' .$i;
                //echo json_encode($c);

                $min = $value->completion;

                $getValues = '#getValues'.$i;
                $getValues_id = 'getValues'.$i;
                $result = '#result'.$i;
                $result_id = 'result'.$i;
                $base_url = base_url('project/mission/update_completion/');
                $task_id = $value->id;
                $project_id = $project_id;
                $mission_view_id = $mission_view_id;
                ?>
                <script>
                  $(document).ready(function() {
                    var id_range = <?php echo json_encode($id_range) ?>;
                    var min = <?php echo json_encode($min) ?>;
                    var getValues = <?php echo json_encode($getValues) ?>;
                    var result = <?php echo json_encode($result) ?>;
                    var base_url = <?php echo json_encode($base_url) ?>;
                    var task_id = <?php echo json_encode($task_id) ?>;
                    var project_id = <?php echo json_encode($project_id) ?>;
                    var mission_view_id = <?php echo json_encode($mission_view_id) ?>;

                    $(id_range).ionRangeSlider({
                      type: "double",
                      min: 0,
                      max: 100,
                      from: min,
                      to: 100,
                      from_fixed: true
                    });
                    var slider = $(id_range).data("ionRangeSlider");

                    $(getValues).click(function (e) {
                            e.preventDefault();
                                
                            var from = slider.result.from
                            var to = slider.result.to
                            window.location.href = base_url + project_id+'/'+mission_view_id+ '/'+ task_id +'/'+to;
                    });

                  });

                </script>
                <!-- /Ion.RangeSlider -->
                <input type="text" id="<?php echo $range ?>" value="" name="range" />
                </div>
                <div class="col-md-2" style="padding-top: 40px;">
                  <a href="">
                    <i id="<?php  echo $getValues_id ?>" class="fa fa-check-circle"></i>
                  </a>
                </div>
              </div>
              </div> -->