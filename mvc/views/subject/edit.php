
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("subject/index/$set")?>"><?=$this->lang->line('menu_subject')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_subject')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">
                    <?php 
                        if(form_error('classesID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="classesID" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_class_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            
                            <?php
                                $array = array();
                                $array[0] = $this->lang->line("subject_select_teacher");
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("classesID", $array, set_value("classesID", $subject->classesID), "id='classesID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classesID'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('teacherID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacherID" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_teacher_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = [];
                                if(count($teachers)) {
                                    foreach ($teachers as $teacher) {
                                        $array[$teacher->teacherID] = $teacher->name;
                                    }
                                } 
                                
                                echo form_multiselect("teacherID[]", $array, set_value("teacherID", $teachersID), "id='teacherID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacherID'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('type')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="type" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_type")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $arraytype['select'] = $this->lang->line("subject_select_type");
                                $arraytype[0] = $this->lang->line("subject_optional");
                                $arraytype[1] = $this->lang->line("subject_mandatory");
                                echo form_dropdown("type", $arraytype, set_value("type", $subject->type), "id='type' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('type'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('passmark')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="passmark" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_passmark")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="passmark" name="passmark" value="<?=set_value('passmark', $subject->passmark)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('passmark'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('finalmark')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="finalmark" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_finalmark")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="finalmark" name="finalmark" value="<?=set_value('finalmark', $subject->finalmark)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('finalmark'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('subject')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subject" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject" name="subject" value="<?=set_value('subject', $subject->subject)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('subject_author')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subject_author" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_author")?> 
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject_author" name="subject_author" value="<?=set_value('subject_author', $subject->subject_author)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject_author'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('subject_code')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subject_code" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_code")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject_code" name="subject_code" value="<?=set_value('subject_code', $subject->subject_code)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject_code'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_subject")?>" >
                        </div>
                    </div>
                </form>

            </div> <!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
    $('.select2').select2();
</script>


