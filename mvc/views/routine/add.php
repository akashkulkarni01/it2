
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-routine"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("routine/index")?>"><?=$this->lang->line('menu_routine')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_routine')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">
                    <?php 
                        if(form_error('schoolyearID'))
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="schoolyearID" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_schoolyear")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $arrayschoolyear = array();
                                $arrayschoolyear[0] = $this->lang->line("routine_select_schoolyear");
                                $defaultschoolyear = $siteinfos->school_year;

                                foreach ($schoolyears as $schoolyear) {
                                    if($schoolyear->schooltype == 'classbase') {
                                        if($siteinfos->school_year == $schoolyear->schoolyearID) {
                                            $arrayschoolyear[$schoolyear->schoolyearID] = $schoolyear->schoolyear . $this->lang->line('default');
                                        } else {
                                            $arrayschoolyear[$schoolyear->schoolyearID] = $schoolyear->schoolyear;
                                        }
                                    }
                                }
                                echo form_dropdown("schoolyearID", $arrayschoolyear, set_value("schoolyearID", $defaultschoolyear), "id='schoolyearID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('schoolyearID'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('classesID'))
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="classesID" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_classes")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $arrayclass[0] = $this->lang->line("routine_select_classes");
                                if(count($classes)) {
                                    foreach ($classes as $classa) {
                                        $arrayclass[$classa->classesID] = $classa->classes;
                                    }
                                }
                                echo form_dropdown("classesID", $arrayclass, set_value("classesID"), "id='classesID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classesID'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('sectionID'))
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="sectionID" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_section")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $arraysection[0] = $this->lang->line("routine_select_section");
                                if(count($sections)) {
                                    foreach ($sections as $section) {
                                        $arraysection[$section->sectionID] = $section->section;
                                    }
                                }
                                echo form_dropdown("sectionID", $arraysection, set_value("sectionID"), "id='sectionID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sectionID'); ?>
                        </span>

                    </div>

                    <?php 
                        if(form_error('subjectID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subjectID" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_subject")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $arraysubject = array('0' => $this->lang->line("routine_subject_select"));
                                if(count($subjects)) {
                                    foreach ($subjects as $subject) {
                                        $arraysubject[$subject->subjectID] = $subject->subject;
                                    }
                                }
                                echo form_dropdown("subjectID", $arraysubject, set_value("subjectID"), "id='subjectID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subjectID'); ?>
                        </span>
                    </div>


                    
                    <?php 
                        if(form_error('date')) 
                            echo "<div class='form-group has-error'>";
                        else     
                            echo "<div class='form-group'>";
                    ?>
                        <label for="date" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_date")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Select Date" id="date" name="date" value="<?=set_value('date')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('date'); ?>
                        </span>
                    </div>



                    <?php 
                        if(form_error('day')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="day" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_day")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">

                                <input type="text" class="form-control" placeholder="Day" id="day" name="day" value="<?=set_value('day')?>" >
                         
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('day'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('teacherID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacherID" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_teacher")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                             <?php
                                $arrayteacher[0] = $this->lang->line('routine_select_teacher');
                                if(count($teachers)) {
                                    foreach ($teachers as $key => $teacher) {
                                        $arrayteacher[$teacher->teacherID] = $teacher->name;
                                    }
                                }
                                echo form_dropdown("teacherID", $arrayteacher, set_value("teacherID"), "id='teacherID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacherID'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('start_time')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="start_time" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_start_time")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" data-format="HH:mm:ss" class="form-control" id="start_time" name="start_time" value="<?=set_value('start_time')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('start_time'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('end_time')) 
                            echo "<div class='form-group has-error'>";
                        else     
                            echo "<div class='form-group'>";
                    ?>
                        <label for="end_time" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_end_time")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="end_time" name="end_time" value="<?=set_value('end_time')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('end_time'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('room')) 
                            echo "<div class='form-group has-error'>";
                        else     
                            echo "<div class='form-group'>";
                    ?>
                        <label for="room" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_room")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="room" name="room" value="<?=set_value('room')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('room'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_routine")?>" >
                        </div>
                    </div>
                </form>
            <?php if ($siteinfos->note==1) { ?>
                <div class="callout callout-danger">
                    <p><b>Note:</b> Make teacher, class, subject & section before you add routine</p>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('.select2').select2();
$('#classesID').change(function() {
    var classesID = $(this).val();
    if(classesID == 0) {
        $('#sectionID').val(0);
        $('#subjectID').val(0);
    } else {
        $.ajax({
            type: 'POST',
            url: "<?=base_url('routine/subjectcall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#subjectID').html(data)
            }
        });

        $.ajax({
            type: 'POST',
            url: "<?=base_url('routine/sectioncall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#sectionID').html(data)
            }
        });
    }
});

$(document).on('change', '#subjectID', function() {
    var subjectID = $(this).val();
    if(subjectID == 0) {
        $('#teacherID').val(0);
    } else {
        $.ajax({
            type: 'POST',
            url: "<?=base_url('routine/teachercall')?>",
            data: { 'subjectID' : subjectID},
            dataType: "html",
            success: function(data) {
               $('#teacherID').html(data);
            }
        });
    }
});



  $( function() {
   
  $("#date").datepicker({
    
    onSelect: function(dateText) {
      alert(dateText)
      console.log("Selected date: " + dateText + ", Current Selected Value= " + this.value);
     // $(this).change();
    }
  }).on("change", function() {
         
    var days = ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];
    var datearray =  $("#date").val();
   // var datearray = tmpArray[2]+"-"+tmpArray[1]+"-"+tmpArray[0];
    $("#date").val(datearray);
    var d = new Date(datearray);     
    var day = days[d.getDay()];  
    console.log(day)   
    $("#day").val(day);
    

  });

  });



$('#start_time').timepicker();
$('#end_time').timepicker();
sessionStorage.setItem("fromdate","");
sessionStorage.setItem("todate","");

</script>