
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar-plus-o"></i> Follow Up</h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("preadmission/index")?>">Pre Admission</a></li>
            <li class="active"><?=$this->lang->line('add_followup')?></li>
        </ol>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">

                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                    <?php 
                        if(form_error('student_fullname')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="student_fullname" class="col-sm-4 control-label">
                        <?=$this->lang->line('student_fullname')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="student_fullname" name="student_fullname" value="<?=set_value('student_fullname')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('student_fullname'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('classesID'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="classesID" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_classes")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $classArray = array(0 => $this->lang->line("student_select_class"));
                                foreach ($classes as $classa) {
                                    $classArray[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("classesID", $classArray, set_value("classesID"), "id='classesID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classesID'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="submit" class="btn btn-success" value="go" >
                        </div>
                    </div>

                    
                    
                    
                </form>

            </div><!-- /col-sm-8 -->
        </div>
    </div>
</div>

<script type="text/javascript">
$('#pre_admission_date').datepicker({ startView: 2 });
$('#dob').datepicker({ startView: 2 });
</script>