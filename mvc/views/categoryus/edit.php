
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar-plus-o"></i>Category</h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("categoryus/index")?>">Category</a></li>
            <li class="active"><?=$this->lang->line('add_categoryus')?></li>
        </ol>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">

                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <?php 
                        if(form_error('cat_title')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="cat_title" class="col-sm-4 control-label">
                            <?=$this->lang->line('cat_title')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="cat_title" name="cat_title" value="<?=set_value('cat_title', $categoryus->cat_title)?>" >
                        </div>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('cat_title'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('short_name')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="short_name" class="col-sm-4 control-label">
                        <?=$this->lang->line('short_name')?>
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="short_name" name="short_name" value="<?=set_value('short_name', $categoryus->short_name)?>" >
                        </div>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('short_name'); ?>
                        </span>
                    </div>
                    
                    <?php 
                        if(form_error('ot_formula')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="ot_formula" class="col-sm-4 control-label">
                        <?=$this->lang->line('ot_formula')?>
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ot_formula" name="ot_formula" value="<?=set_value('ot_formula', $categoryus->ot_formula)?>" >
                        </div>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('ot_formula'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('min_ot')) 
                            echo "<div class='form-group has-error col-md-3' >";
                        else     
                            echo "<div class='form-group col-md-3' >";
                    ?>
                        <label for="min_ot" class="col-sm-6 control-label">
                            <?=$this->lang->line('min_ot')?><span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="min_ot" name="min_ot" value="<?=set_value('min_ot', $categoryus->min_ot)?>" >
                        </div>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('min_ot'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('max_ot')) 
                            echo "<div class='form-group has-error col-md-3' >";
                        else     
                            echo "<div class='form-group col-md-3' >";
                    ?>
                        <label for="max_ot" class="col-sm-6 control-label">
                        <label><input type="checkbox" id="maxot"></label> 
                            <?=$this->lang->line('max_ot')?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="max_ot" name="max_ot" value="<?=set_value('max_ot', $categoryus->max_ot)?>" >
                        </div>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('max_ot'); ?>
                        </span>
                    </div>

        
                    <div class='form-group col-md-6' >
                        <div class="checkbox" style="margin-left: 15px;">
                            <label><input type="checkbox" id="consider_punch"><span style="color: #707478; padding-left: 10px"> Consider Only First and Last Punch in At Calculations</span></label>
                        </div>
                    </div>

                    <?php 
                        if(form_error('gracetime_late')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="gracetime_late" class="col-sm-7 control-label">
                            <?=$this->lang->line('gracetime_late')?><span class="text-red">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="gracetime_late" name="gracetime_late" value="<?=set_value('gracetime_late', $categoryus->gracetime_late)?>" >
                        </div>
                        <label for="gracetime_late" class="col-sm-1 control-label">
                            Min
                        </label>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('gracetime_late'); ?>
                        </span>
                    </div>

                    <div class='form-group col-md-6' >
                        <div class="checkbox" style="margin-left: 15px;">
                            <label><input type="checkbox" id="neglect_last"><span style="color: #707478; padding-left: 10px"> Neglect Last In Punch(For missed out punch)</span></label>
                        </div>
                    </div>

                    <?php 
                        if(form_error('gracetime_early')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="gracetime_early" class="col-sm-7 control-label">
                            <?=$this->lang->line('gracetime_early')?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="gracetime_early" name="gracetime_early" value="<?=set_value('gracetime_early', $categoryus->gracetime_early)?>" >
                        </div>
                        <label for="gracetime_early" class="col-sm-1 control-label">
                            Min
                        </label>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('gracetime_early'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('weekoff1')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label class="col-md-4 control-label">
                            <input type="checkbox" id="weekoff1chk"><span style="padding-left: 10px">Week off 1</span>
                        </label> 

                        <div class="col-sm-6">
                            <input type="text" id="weekoff1" name="weekoff1" class="form-control dropdown" value="<?=set_value('weekoff1', $categoryus->weekoff1)?>">
                        </div>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('weekoff1'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('weekoff2')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label class="col-md-4 control-label">
                            <input type="checkbox" id="weekoff2chk"><span style="padding-left: 10px">Week off 2</span>
                        </label> 

                        <div class="col-sm-6">
                        <input type="text" id="weekoff2" name="weekoff2" class="form-control dropdown" value="<?=set_value('weekoff2', $categoryus->weekoff2)?>">
                        </div>
                        <span class="col-sm-12 control-label">
                            <?php echo form_error('weekoff2'); ?>
                        </span>
                    </div>

                    <div class='form-group col-md-6' >
                        <div class="checkbox" style="margin-left: 15px;">
                            <label><input type="checkbox" id="consider_early_come"><span style="color: #707478; padding-left: 10px"> Consider Early coming punch</span></label>
                        </div>
                    </div>

                    <div class='form-group col-md-6' >
                        <div class="checkbox" style="margin-left: 15px;">
                            <label><input type="checkbox" id="consider_late_going"><span style="color: #707478; padding-left: 10px"> Consider Late going punch</span></label>
                        </div>
                    </div>

                    <div class='form-group col-md-6' >
                        <div class="checkbox" style="margin-left: 15px;">
                            <label><input type="checkbox" id="deduct_break_hour"><span style="color: #707478; padding-left: 10px"> Deduct break hours from work duration</span></label>
                        </div>
                    </div>



                    <?php 
                        if(form_error('halfday_calculation')) 
                            echo "<div class='form-group has-error col-md-12' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-5 control-label">
                            <input type="checkbox" id="halfday_calculationchk"><span style="padding-left: 10px">Calculate half day if work duration is less than</span>
                        </label> 

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="halfday_calculation" name="halfday_calculation" value="<?=set_value('halfday_calculation', $categoryus->halfday_calculation)?>" >
                        </div>

                        <label class="col-sm-1 control-label">
                            Min
                        </label> 

                        <span class="col-sm-4 control-label">
                            <?php echo form_error('halfday_calculation'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('absent_calculation')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-5 control-label">
                            <input type="checkbox" id="absent_calculationchk"><span style="padding-left: 10px">Calculate absent if work duration is less than</span>
                        </label> 

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="absent_calculation" name="absent_calculation" value="<?=set_value('absent_calculation', $categoryus->absent_calculation)?>" >
                        </div>

                        <label class="col-sm-1 control-label">
                            Min
                        </label> 

                        <span class="col-sm-12 control-label">
                            <?php echo form_error('absent_calculation'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('partialday_half_calculation')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-7 control-label">
                            <input type="checkbox" id="partialday_half_calculationchk"><span style="padding-left: 10px">On Partial Day Calculate Half Day if work duration is less than</span>
                        </label> 

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="partialday_half_calculation" name="partialday_half_calculation" value="<?=set_value('partialday_half_calculation', $categoryus->partialday_half_calculation)?>" >
                        </div>

                        <label class="col-sm-1 control-label">
                            Min
                        </label> 

                        <span class="col-sm-12 control-label">
                            <?php echo form_error('partialday_half_calculation'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('partialday_absent_calculation')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-7 control-label">
                            <input type="checkbox" id="partialday_absent_calculationchk"><span style="padding-left: 10px">On Partial Day Calculate Absent if work duration is less than</span>
                        </label> 

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="partialday_absent_calculation" name="partialday_absent_calculation" value="<?=set_value('partialday_absent_calculation', $categoryus->partialday_absent_calculation)?>" >
                        </div>

                        <label class="col-sm-1 control-label">
                            Min
                        </label> 

                        <span class="col-sm-12 control-label">
                            <?php echo form_error('partialday_absent_calculation'); ?>
                        </span>
                    </div>


                    <?php 
                        if(form_error('mark_weekoff_prefixday_absent')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-7 control-label">
                            <input type="checkbox" id="mark_weekoff_prefixday_absent"><span style="padding-left: 10px">Mark weekly off and holiday as Absent If prefix day is absent </span>
                        </label> 

                    </div>

                    <?php 
                        if(form_error('mark_weekoff_suffixday_absent')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-7 control-label">
                            <input type="checkbox" id="mark_weekoff_suffixday_absent"><span style="padding-left: 10px">Mark weekly off and holiday as Absent If suffix day is absent </span>
                        </label> 

                    </div>

                    <?php 
                        if(form_error('mark_weekoff_suffixday_absent')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-7 control-label">
                            <input type="checkbox" id="mark_weekoff_suffixday_absent"><span style="padding-left: 10px">Mark weekly off and holiday as Absent If suffix day is absent </span>
                        </label> 

                    </div>


                    <?php 
                        if(form_error('mark_weekoff_prefix_suffixday_absent')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-8  control-label">
                            <input type="checkbox" id="mark_weekoff_prefix_suffixday_absent"><span style="padding-left: 10px">Mark weekly off and holiday as Absent If Both Prefix and Suffix Day is absent </span>
                        </label>
                    </div>

                    <?php 
                        if(form_error('halfday_absent')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-2 control-label">
                            <input type="checkbox" id="halfday_absentchk"><span style="padding-left: 10px">Mark</span>
                        </label> 

                        <div class="col-sm-2">
                            <select id="day" name="day" class="form-control dropdown">
                                <option value="<?php echo $categoryus->day; ?>" selected> <?php print_r($categoryus->day); ?> </option>
                                <option value="half">Half Day</option>
                                <option value="full">Full Day</option>
                            </select>
                        </div>

                        <label class="col-sm-3 control-label">
                            Absent when Late for 
                        </label> 

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="halfday_absent" name="halfday_absent" value="<?=set_value('halfday_absent', $categoryus->halfday_absent)?>" >
                        </div>

                        <label class="col-sm-1 control-label">
                            Days 
                        </label>

                        <span class="col-sm-4 control-label">
                            <?php echo form_error('halfday_absent'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('halfday_lateby')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-7 control-label">
                            <input type="checkbox" id="halfday_latebychk"><span style="padding-left: 10px">Mark Half Day if late by</span>
                        </label> 

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="halfday_lateby" name="halfday_lateby" value="<?=set_value('halfday_lateby', $categoryus->halfday_lateby)?>" >
                        </div>

                        <label class="col-sm-1 control-label">
                            Min
                        </label> 

                        <span class="col-sm-4 control-label">
                            <?php echo form_error('halfday_lateby'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('halfday_goingby')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group col-md-12' >";
                    ?>
                        <label class="col-md-7 control-label">
                            <input type="checkbox" id="halfday_goingbychk"><span style="padding-left: 10px">Mark Half Day if late by</span>
                        </label> 

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="halfday_goingby" name="halfday_goingby" value="<?=set_value('halfday_goingby', $categoryus->halfday_goingby)?>" >
                        </div>

                        <label class="col-sm-1 control-label">
                            Min
                        </label> 

                        <span class="col-sm-4 control-label">
                            <?php echo form_error('halfday_goingby'); ?>
                        </span>
                    </div>
                  

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Add Category" >
                        </div>
                    </div>

                </form>

            </div><!-- /col-sm-8 -->
        </div>
    </div>
</div>

<script type="text/javascript">
$('#start_time').timepicker();
$('#end_time').timepicker();
$('#brk1_starttime').timepicker();
$('#brk1_endtime').timepicker();
$('#brk2_starttime').timepicker();
$('#brk2_endtime').timepicker();
$('#p_begins').timepicker();
$('#p_end').timepicker();

$(document).ready(function(){
    $('#brk2_starttime').attr("disabled", true);
    $('#brk2_endtime').attr("disabled", true);
    $('#punch_before').attr("disabled", true);
    $('#punch_after').attr("disabled", true);
    $('#grace_time').attr("disabled", true);
    $('#partial_day').attr("disabled", true);
    $('#p_begins').attr("disabled", true);
    $('#p_end').attr("disabled", true);

    $('#brk2').click(function(){
        if($(this).prop("checked") == true){
            $('#brk2_starttime').attr("disabled", false);
            $('#brk2_endtime').attr("disabled", false);
        }
        else if($(this).prop("checked") == false){
            $('#brk2_starttime').attr("disabled", true);
            $('#brk2_endtime').attr("disabled", true);
        }
    });


    $('#punch_before_chk').click(function(){
        if($(this).prop("checked") == true){
            $('#punch_before').attr("disabled", false);
        }
        else if($(this).prop("checked") == false){
            $('#punch_before').attr("disabled", true);
        }
    });

    $('#punch_after_chk').click(function(){
        if($(this).prop("checked") == true){
            $('#punch_after').attr("disabled", false);
        }
        else if($(this).prop("checked") == false){
            $('#punch_after').attr("disabled", true);
        }
    });

    $('#grace_time_chk').click(function(){
        if($(this).prop("checked") == true){
            $('#grace_time').attr("disabled", false);
        }
        else if($(this).prop("checked") == false){
            $('#grace_time').attr("disabled", true);
        }
    });

    $('#partial_day_chk').click(function(){
        if($(this).prop("checked") == true){
            $('#partial_day').attr("disabled", false);
            $('#p_begins').attr("disabled", false);
            $('#p_end').attr("disabled", false);

        }
        else if($(this).prop("checked") == false){
            $('#partial_day').attr("disabled", true);
            $('#p_begins').attr("disabled", true);
            $('#p_end').attr("disabled", true);
        }
    });
})

</script>