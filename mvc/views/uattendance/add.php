
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-user-secret"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("uattendance/index")?>"><?=$this->lang->line('menu_uattendance')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_uattendance')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="<?php echo form_error('date') ? 'form-group has-error' : 'form-group'; ?>" >
                                        <label for="date" class="control-label">
                                            <?=$this->lang->line('uattendance_date')?> <span class="text-red">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="date" id="date" value="<?=set_value("date", $date)?>" >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-success" style="margin-top:20px" value="<?=$this->lang->line("add_attendance")?>" >
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php if(count($dateinfo)) { ?>
                    <div class="col-sm-4 col-sm-offset-4 box-layout-fame">
                        <?php 
                            echo '<h5><center>'.$this->lang->line('uattendance_details').'</center></h5>';
                            echo '<h5><center>'.$this->lang->line('uattendance_day').' : '. $dateinfo['day'].'</center></h5>';
                            echo '<h5><center>'.$this->lang->line('uattendance_date').' : '. $dateinfo['date'].'</center></h5>';
                        ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-12">
                <?php if(count($users)) { ?>
                    <div id="hide-table">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                    <th class="col-sm-1"><?=$this->lang->line('uattendance_photo')?></th>
                                    <th class="col-sm-2"><?=$this->lang->line('uattendance_name')?></th>
                                    <th class="col-sm-2"><?=$this->lang->line('uattendance_email')?></th>
                                    <th class="col-sm-1"><?=$this->lang->line('uattendance_role')?></th>
                                    <th class="col-sm-5"><?=$this->lang->line('uattendance_attendance')?></th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <?php if(count($users)) {$i = 1; foreach($users as $user) { if(isset($uattendances[$user->userID])) { ?>
                                    <tr>
                                        <td data-title="<?=$this->lang->line('slno')?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('uattendance_photo')?>">
                                            <?=profileproimage($user->photo);?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('uattendance_name')?>">
                                            <?php echo $user->name; ?>
                                        </td>

                                        <td data-title="<?=$this->lang->line('uattendance_email')?>">
                                            <?php echo $user->email; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('uattendance_role')?>">
                                            <?php echo $user->usertype; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('uattendance_attendance')?>">
                                            <?php
                                                $aday = "a".abs($day);
                                                if(isset($uattendances[$user->userID])) {
                                                    if ($monthyear == $uattendances[$user->userID]->monthyear && $uattendances[$user->userID]->userID == $user->userID) {
                                                        $pmethod = '';
                                                        $lemethod = '';
                                                        $lmethod = '';
                                                        $amethod = '';

                                                        if($uattendances[$user->userID]->flag == "TI") {
                                                            $pmethod = "checked";
                                                        } elseif($uattendances[$user->userID]->flag == "TO") {
                                                            $lemethod = "checked";
                                                        } elseif($uattendances[$user->userID]->$aday == "L") {
                                                            $lmethod = "checked";
                                                        } elseif($uattendances[$user->userID]->$aday == "A") {
                                                            $amethod = "checked";
                                                        }

                                                         $attendanceId = $uattendances[$user->userID]->uattendanceID;

if($uattendances[$user->userID]->check_in_time == NULL){
echo "<input type='radio' onClick='checkIn($attendanceId)' $pmethod id='checkin$attendanceId' class='attendance btn btn-warning present' name='attendance$attendanceId'> Time In &nbsp;";
}



else if($uattendances[$user->userID]->check_out_time ){
  echo "Time In:".$uattendances[$user->userID]->check_in_time;

                                                         echo str_repeat("&nbsp;", 5)."<input type='radio'  onClick='checkOut($attendanceId)' $lemethod id='checkout$attendanceId' class='attendance btn btn-warning present' name='attendance$attendanceId'> Time Out &nbsp;";
}


                                                         

                                                         
                      
                                                         echo "".$uattendances[$user->userID]->check_out_time;

                                                    }
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php $i++; }}} ?>

                            </tbody>
                        </table>
                    </div>

                    <span style="margin-top: 20px;" class="btn btn-success pull-right save_attendance"><?=$this->lang->line('uattendance_submit')?></span>

                    <script type="text/javascript">
                        window.addEventListener('load', function() {
                            setTimeout(lazyLoad, 1000);
                        });

                        var attendanceArray =[];

                        function lazyLoad() {
                            var card_images = document.querySelectorAll('.card-image');
                            card_images.forEach(function(card_image) {
                                var image_url = card_image.getAttribute('data-image-full');
                                var content_image = card_image.querySelector('img');
                                content_image.src = image_url;
                                content_image.addEventListener('load', function() {
                                    card_image.style.backgroundImage = 'url(' + image_url + ')';
                                    card_image.className = card_image.className + ' is-loaded';
                                });
                            });
                        }




                       function checkIn(id){
                               
                              var attendance = {};
                              var d =    new Date();
                              var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                              var day = "<?=$day?>";
                              var monthyear = "<?=$monthyear?>";
                              attendance['uattendanceID']=id;
                              attendance['check_in_time']=time;
                              attendance['a'+day]='P';
                              attendance['flag']='TI';
                              attendanceArray.push(attendance);
                           

                       }
                        


                       function checkOut(id){

                              var attendance = {};
                               var x = {};
                              var d =    new Date();
                              var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                              var day = "<?=$day?>";
                              var monthyear = "<?=$monthyear?>";

                              attendance['uattendanceID']=id;
                              attendance['check_out_time']=time;
                              attendance['a'+day]='P';
                              attendance['flag']='TO';
                              attendanceArray.push(attendance);
                              
                             

                       }
                        
                       




                        $('.save_attendance').click(function(){

                            console.log(attendanceArray)


                            var day = "<?=$day?>";
                            var monthyear = "<?=$monthyear?>";
                            
                            $.ajax({
                                type: 'POST',
                                url: "<?=base_url('uattendance/save_attendace')?>",
                                data: {"day" : day, "monthyear" : monthyear , "attendance" :attendanceArray},
                                dataType: "html",
                                success: function(data) {
                                    var response = JSON.parse(data);
                                    if(response.status == true) {
                                        toastr["success"](response.message)
                                        toastr.options = {
                                          "closeButton": true,
                                          "debug": false,
                                          "newestOnTop": false,
                                          "progressBar": false,
                                          "positionClass": "toast-top-right",
                                          "preventDuplicates": false,
                                          "onclick": null,
                                          "showDuration": "500",
                                          "hideDuration": "500",
                                          "timeOut": "5000",
                                          "extendedTimeOut": "1000",
                                          "showEasing": "swing",
                                          "hideEasing": "linear",
                                          "showMethod": "fadeIn",
                                          "hideMethod": "fadeOut"
                                        }
                                    } else {
                                        $.each(response, function(index, value) {
                                            if(index != 'status') {
                                                toastr["error"](value)
                                                toastr.options = {
                                                  "closeButton": true,
                                                  "debug": false,
                                                  "newestOnTop": false,
                                                  "progressBar": false,
                                                  "positionClass": "toast-top-right",
                                                  "preventDuplicates": false,
                                                  "onclick": null,
                                                  "showDuration": "500",
                                                  "hideDuration": "500",
                                                  "timeOut": "5000",
                                                  "extendedTimeOut": "1000",
                                                  "showEasing": "swing",
                                                  "hideEasing": "linear",
                                                  "showMethod": "fadeIn",
                                                  "hideMethod": "fadeOut"
                                                }
                                            }
                                        })
                                    }
                                }
                            });

                        });
                    </script>
                <?php } ?>
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
<script type="text/javascript">
    $('#date').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate:'<?=$schoolyearsessionobj->startingdate?>',
        endDate:'<?=$schoolyearsessionobj->endingdate?>',
        daysOfWeekDisabled: "<?=$siteinfos->weekends?>",
        datesDisabled: ["<?=$get_all_holidays;?>"],       
    });
</script>


