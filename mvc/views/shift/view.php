
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar-plus-o"></i> Shift</h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("shift/index")?>">Shift</a></li>
            <li class="active"><?=$this->lang->line('add_shift')?></li>
        </ol>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">

                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <?php 
                        if(form_error('shift_title')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="shift_title" class="col-sm-4 control-label">
                        <?=$this->lang->line('shift_title')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="shift_title" name="shift_title" value="<?=set_value('shift_title', $shift->shift_title)?>" disabled>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('shift_title'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('short_name')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="short_name" class="col-sm-4 control-label">
                        <?=$this->lang->line('short_name')?>
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="short_name" name="short_name" value="<?=set_value('short_name', $shift->short_name)?>"  disabled>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('short_name'); ?>
                        </span>
                    </div>

                    

                    <?php 
                        if(form_error('start_time')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="start_time" class="col-sm-4 control-label">
                            <?=$this->lang->line('start_time')?><span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="start_time" name="start_time" value="<?=set_value('start_time', $shift->start_time)?>" disabled>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('start_time'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('end_time')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="end_time" class="col-sm-4 control-label">
                            <?=$this->lang->line('end_time')?><span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="end_time" name="end_time" value="<?=set_value('end_time', $shift->end_time)?>" disabled>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('end_time'); ?>
                        </span>
                    </div>

                    <!--  Break 1 --->
                    <div class='form-group col-md-10' >
                        <div class="checkbox" style="margin-left: 15px;">
                            <label><input type="checkbox" id="brk1" checked><span style="font-weight: 600; color: #000"><?=$this->lang->line('brk1')?></span></label>
                        </div>
                    </div>


                    <?php 
                        if(form_error('brk1_starttime')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="brk1_starttime" class="col-sm-4 control-label">
                            <?=$this->lang->line('brk1_starttime')?><span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="brk1_starttime" name="brk1_starttime" value="<?=set_value('brk1_starttime', $shift->brk1_starttime)?>" disabled>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('brk1_starttime'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('brk1_endtime')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="brk1_endtime" class="col-sm-4 control-label">
                            <?=$this->lang->line('brk1_endtime')?><span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="brk1_endtime" name="brk1_endtime" value="<?=set_value('brk1_endtime', $shift->brk1_endtime)?>" disabled>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('brk1_endtime'); ?>
                        </span>
                    </div>


                    <!-- Break 2 -->                   
                   <div class='form-group col-md-10' >
                        <div class="checkbox" style="margin-left: 15px;">
                            <label><input type="checkbox" id="brk2"><span style="font-weight: 600; color: #000"><?=$this->lang->line('brk2')?></span></label>
                        </div>
                    </div>

                    <?php 
                        if(form_error('brk2_starttime')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="brk2_starttime" class="col-sm-4 control-label">
                            <?=$this->lang->line('brk2_starttime')?><span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="brk2_starttime" name="brk2_starttime" value="<?=set_value('brk2_starttime', $shift->brk2_starttime)?>" disabled>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('brk2_starttime'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('brk2_endtime')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="brk2_endtime" class="col-sm-4 control-label">
                            <?=$this->lang->line('brk2_endtime')?><span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="brk2_endtime" name="brk2_endtime" value="<?=set_value('brk2_endtime', $shift->brk2_endtime)?>" disabled>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('brk2_endtime'); ?>
                        </span>
                    </div>


                    <!-- Punch before -->                   
                   <div class='form-group col-md-12' >
                        <div class="row" style="margin-left: 0px">
                            <div class="col-md-3">
                                <label><input type="checkbox" id="punch_before_chk"><span style="padding-left: 10px"><?=$this->lang->line('punch_before')?></span></label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="punch_before" name="punch_before" value="<?=set_value('punch_before', $shift->punch_before)?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <span>Min (Default value comes from Master Setting)</span>
                            </div>    
                        </div>
                    </div>

                    <!-- Punch After -->                   
                   <div class='form-group col-md-12' >
                        <div class="row" style="margin-left: 0px">
                            <div class="col-md-3">
                                <label><input type="checkbox" id="punch_after_chk"><span style="padding-left: 10px"><?=$this->lang->line('punch_after')?></span></label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="punch_after" name="punch_after" value="<?=set_value('punch_after', $shift->punch_after)?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <span>Min (Default is Next day shift begin time punch begin duration)</span>
                            </div>    
                        </div>
                    </div>

                    <!-- Grace Time -->                   
                   <div class='form-group col-md-12' >
                        <div class="row" style="margin-left: 0px">
                            <div class="col-md-3">
                                <label><input type="checkbox" id="grace_time_chk"><span style="padding-left: 10px"><?=$this->lang->line('grace_time')?></span></label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="grace_time" name="grace_time" value="<?=set_value('grace_time', $shift->grace_time)?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <span>Min (Default value comes from Employee Category Setting)</span>
                            </div>    
                        </div>
                    </div>

                     <!-- Partial Day -->                   
                   <div class='form-group col-md-12' >
                        <div class="row" style="margin-left: 0px">
                            <div class="col-md-3">
                                <label><input type="checkbox" id="partial_day_chk"><span style="padding-left: 10px"><?=$this->lang->line('partial_day')?></span></label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="partial_day" name="partial_day" value="<?=set_value('partial_day', $shift->partial_day)?>" disabled>
                            </div>
                            <div class="col-md-2">
                              <input type="text" class="form-control" placeholder="Begin At" id="p_begins" name="p_begins" value="<?=set_value('p_begins', $shift->p_begins)?>" disabled>
                            </div>
                            <div class="col-md-2">
                              <input type="text" class="form-control" placeholder="End At" id="p_end" name="p_end" value="<?=set_value('p_end', $shift->p_end)?>" disabled>
                            </div> 
                            <div class="col-md-2">
                                <span>HH:MM 24 hr fmt</span>
                            </div>   
                        </div>
                    </div>
                </form>

            </div><!-- /col-sm-8 -->
        </div>
    </div>
</div>

<script type="text/javascript">
// $('#start_time').timepicker();
// $('#end_time').timepicker();
// $('#brk1_starttime').timepicker();
// $('#brk1_endtime').timepicker();
// $('#brk2_starttime').timepicker();
// $('#brk2_endtime').timepicker();
// $('#p_begins').timepicker();
// $('#p_end').timepicker();

// $(document).ready(function(){
//     $('#brk2_starttime').attr("disabled", true);
//     $('#brk2_endtime').attr("disabled", true);
//     $('#punch_before').attr("disabled", true);
//     $('#punch_after').attr("disabled", true);
//     $('#grace_time').attr("disabled", true);
//     $('#partial_day').attr("disabled", true);
//     $('#p_begins').attr("disabled", true);
//     $('#p_end').attr("disabled", true);

//     $('#brk2').click(function(){
//         if($(this).prop("checked") == true){
//             $('#brk2_starttime').attr("disabled", false);
//             $('#brk2_endtime').attr("disabled", false);
//         }
//         else if($(this).prop("checked") == false){
//             $('#brk2_starttime').attr("disabled", true);
//             $('#brk2_endtime').attr("disabled", true);
//         }
//     });


//     $('#punch_before_chk').click(function(){
//         if($(this).prop("checked") == true){
//             $('#punch_before').attr("disabled", false);
//         }
//         else if($(this).prop("checked") == false){
//             $('#punch_before').attr("disabled", true);
//         }
//     });

//     $('#punch_after_chk').click(function(){
//         if($(this).prop("checked") == true){
//             $('#punch_after').attr("disabled", false);
//         }
//         else if($(this).prop("checked") == false){
//             $('#punch_after').attr("disabled", true);
//         }
//     });

//     $('#grace_time_chk').click(function(){
//         if($(this).prop("checked") == true){
//             $('#grace_time').attr("disabled", false);
//         }
//         else if($(this).prop("checked") == false){
//             $('#grace_time').attr("disabled", true);
//         }
//     });

//     $('#partial_day_chk').click(function(){
//         if($(this).prop("checked") == true){
//             $('#partial_day').attr("disabled", false);
//             $('#p_begins').attr("disabled", false);
//             $('#p_end').attr("disabled", false);

//         }
//         else if($(this).prop("checked") == false){
//             $('#partial_day').attr("disabled", true);
//             $('#p_begins').attr("disabled", true);
//             $('#p_end').attr("disabled", true);
//         }
//     });
// })

</script>