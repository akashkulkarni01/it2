
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar-plus-o"></i> Pre-Admission</h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("preadmission/index")?>">Pre Admission</a></li>
            <li class="active"><?=$this->lang->line('add_preadmission')?></li>
        </ol>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">

                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <?php 
                        if(form_error('prospectus_no')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="prospectus_no" class="col-sm-4 control-label">
                        <?=$this->lang->line('prospectus_no')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="prospectus_no" name="prospectus_no" value="<?=set_value('prospectus_no')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('prospectus_no'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('pre_admission_date')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="pre_admission_date" class="col-sm-4 control-label">
                        <?=$this->lang->line('pre_admission_date')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pre_admission_date" name="pre_admission_date" value="<?=set_value('pre_admission_date')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('pre_admission_date'); ?>
                        </span>
                    </div>


                    <?php 
                        if(form_error('student_name')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="student_name" class="col-sm-4 control-label">
                        <?=$this->lang->line('student_name')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="student_name" name="student_name" value="<?=set_value('student_name')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('student_name'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('father_name'))
                            echo "<div class='form-group has-error col-md-6' >";
                        else
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="father_name" class="col-sm-4 control-label">
                            <?=$this->lang->line("father_name")?>
                        </label>
                            <div class="col-sm-8">
                                <?php
                                    $array = array('0' => $this->lang->line('father_name'));
                                    foreach ($parents as $parent) {
                                        $parentsemail = '';
                                        if($parent->email) {
                                            $parentsemail = " (" . $parent->email ." )";
                                        }
                                        $array[$parent->parentsID] = $parent->name.$parentsemail;
                                    }
                                    echo form_dropdown("father_name", $array, set_value("father_name"), "id='father_name' class='form-control guargianID select2'");
                                ?>
                            </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('father_name'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('mother_name')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="mother_name" class="col-sm-4 control-label">
                        <?=$this->lang->line('mother_name')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?=set_value('mother_name')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('mother_name'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('address')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="address" class="col-sm-4 control-label">
                        <?=$this->lang->line('address')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('address'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('nationality')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="nationality" class="col-sm-4 control-label">
                        <?=$this->lang->line('nationality')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nationality" name="nationality" value="<?=set_value('nationality')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('nationality'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('religion')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="religion" class="col-sm-4 control-label">
                        <?=$this->lang->line('religion')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="religion" name="religion" value="<?=set_value('religion')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('religion'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('city')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="city" class="col-sm-4 control-label">
                        <?=$this->lang->line('city')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" name="city" value="<?=set_value('city')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('city'); ?>
                        </span>
                    </div>


                    <?php 
                        if(form_error('state')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="state" class="col-sm-4 control-label">
                        <?=$this->lang->line('state')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="state" name="state" value="<?=set_value('state')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('state'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('pincode')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="pincode" class="col-sm-4 control-label">
                        <?=$this->lang->line('pincode')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pincode" name="pincode" value="<?=set_value('pincode')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('pincode'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('gender'))
                            echo "<div class='form-group has-error col-md-6' >";
                        else
                            echo "<div class='form-group col-sm-6' >";
                    ?>
                        <label for="gender" class="col-sm-4 control-label">
                            <?=$this->lang->line("gender")?>
                        </label>
                        <div class="col-sm-8">
                            <?php
                                echo form_dropdown("gender", array($this->lang->line('student_sex_male') => $this->lang->line('student_sex_male'), $this->lang->line('student_sex_female') => $this->lang->line('student_sex_female')), set_value("gender"), "id='gender' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('gender'); ?>
                        </span>
                    </div>


                    <?php 
                        if(form_error('dob')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="dob" class="col-sm-4 control-label">
                        <?=$this->lang->line('dob')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('dob'); ?>
                        </span>
                    </div>


                    <?php 
                        if(form_error('birth_place')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="birth_place" class="col-sm-4 control-label">
                        <?=$this->lang->line('birth_place')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="birth_place" name="birth_place" value="<?=set_value('birth_place')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('birth_place'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('category')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="category" class="col-sm-4 control-label">
                        <?=$this->lang->line('category')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="category" name="category" value="<?=set_value('category')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('category'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('fee_category')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="fee_category" class="col-sm-4 control-label">
                        <?=$this->lang->line('fee_category')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fee_category" name="fee_category" value="<?=set_value('fee_category')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('fee_category'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('class')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="class" class="col-sm-4 control-label">
                        <?=$this->lang->line('class')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <?php
                                $classArray = array(0 => $this->lang->line("class"));
                                foreach ($classes as $classa) {
                                    $classArray[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("class", $classArray, set_value("class"), "id='class' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('class'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('subject')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="subject" class="col-sm-4 control-label">
                        <?=$this->lang->line('subject')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                        <?php
                                $groupArray = array(0 => $this->lang->line("subject"));
                                if(count($studentgroups)) {
                                    foreach ($studentgroups as $studentgroup) {
                                        $groupArray[$studentgroup->studentgroupID] = $studentgroup->group;
                                    }
                                }
                                echo form_dropdown("subject", $groupArray, set_value("subject"), "id='subject' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject'); ?>
                        </span>
                    </div>

                    <div class="form-group <?=form_error('optionalSubjectID') ? ' has-error' : ''  ?> col-md-6">
                        <label for="optionalSubjectID" class="col-sm-4 control-label">
                            <?=$this->lang->line("student_optionalsubject")?>
                        </label>
                        <div class="col-sm-8">
                            <?php
                            $optionalSubjectArray = array(0 => $this->lang->line("student_select_optionalsubject"));
                            if($optionalSubjects != "empty") {
                                foreach ($optionalSubjects as $optionalSubject) {
                                    $optionalSubjectArray[$optionalSubject->subjectID] = $optionalSubject->subject;
                                }
                            }

                            echo form_dropdown("optionalSubjectID", $optionalSubjectArray, set_value("optionalSubjectID", $optionalSubjectID), "id='optionalSubjectID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('optionalSubjectID'); ?>
                        </span>
                    </div>


                    <?php 
                        if(form_error('source')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="source" class="col-sm-4 control-label">
                        <?=$this->lang->line('source')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="source" name="source" value="<?=set_value('source')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('source'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('marks_score')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="marks_score" class="col-sm-4 control-label">
                        <?=$this->lang->line('marks_score')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="marks_score" name="marks_score" value="<?=set_value('marks_score')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('marks_score'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('curriculum_followed')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="curriculum_followed" class="col-sm-4 control-label">
                        <?=$this->lang->line('curriculum_followed')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="curriculum_followed" name="curriculum_followed" value="<?=set_value('curriculum_followed')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('curriculum_followed'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('personal_contact')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="personal_contact" class="col-sm-4 control-label">
                        <?=$this->lang->line('personal_contact')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="personal_contact" name="personal_contact" value="<?=set_value('personal_contact')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('personal_contact'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('land_line')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="land_line" class="col-sm-4 control-label">
                        <?=$this->lang->line('land_line')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="land_line" name="land_line" value="<?=set_value('land_line')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('land_line'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('father_mobile')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="father_mobile" class="col-sm-4 control-label">
                        <?=$this->lang->line('father_mobile')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="father_mobile" name="father_mobile" value="<?=set_value('father_mobile')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('father_mobile'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('mother_mobile')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="mother_mobile" class="col-sm-4 control-label">
                        <?=$this->lang->line('mother_mobile')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mother_mobile" name="mother_mobile" value="<?=set_value('mother_mobile')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('mother_mobile'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('email_id')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="email_id" class="col-sm-4 control-label">
                        <?=$this->lang->line('email_id')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email_id" name="email_id" value="<?=set_value('email_id')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('email_id'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('reference')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="reference" class="col-sm-4 control-label">
                        <?=$this->lang->line('reference')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="reference" name="reference" value="<?=set_value('reference')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('reference'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('previous_school')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="previous_school" class="col-sm-4 control-label">
                        <?=$this->lang->line('previous_school')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="previous_school" name="previous_school" value="<?=set_value('previous_school')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('previous_school'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('class_year')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="class_year" class="col-sm-4 control-label">
                        <?=$this->lang->line('class_year')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="class_year" name="class_year" value="<?=set_value('class_year')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('class_year'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('remark')) 
                            echo "<div class='form-group has-error col-md-6' >";
                        else     
                            echo "<div class='form-group col-md-6' >";
                    ?>
                        <label for="remark" class="col-sm-4 control-label">
                        <?=$this->lang->line('remark')?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="remark" name="remark" value="<?=set_value('remark')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('remark'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('photo'))
                            echo "<div class='form-group has-error col-md-6' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="photo" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_photo")?>
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('student_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('student_file_browse')?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="col-sm-4">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>

                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Add preadmission" >
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