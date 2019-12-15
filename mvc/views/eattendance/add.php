
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-eattendance"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("eattendance/index")?>"><?=$this->lang->line('menu_eattendance')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_eattendance')?></li>
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
                                <div class="col-md-3">
                                    <div class="<?php echo form_error('examID') ? 'form-group has-error' : 'form-group'; ?>">
                                        <label for="examID" class="control-label">
                                            <?=$this->lang->line('eattendance_exam')?> <span class="text-red">*</span>
                                        </label>
                                        <?php
                                            $examArray = array("0" => $this->lang->line("eattendance_select_exam"));
                                            foreach ($exams as $exam) {
                                                $examArray[$exam->examID] = $exam->exam;
                                            }
                                            echo form_dropdown("examID", $examArray, set_value("examID"), "id='examID' class='form-control select2'");
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="<?php echo form_error('classesID') ? 'form-group has-error' : 'form-group'; ?>" >
                                        <label for="classesID" class="control-label">
                                            <?=$this->lang->line('eattendance_classes')?> <span class="text-red">*</span>
                                        </label>
                                        <?php
                                            $classArray = array("0" => $this->lang->line("eattendance_select_classes"));
                                            foreach ($classes as $classa) {
                                                $classArray[$classa->classesID] = $classa->classes;
                                            }
                                            echo form_dropdown("classesID", $classArray, set_value("classesID"), "id='classesID' class='form-control select2'");
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="<?php echo form_error('sectionID') ? 'form-group has-error' : 'form-group'; ?>" >
                                        <label for="sectionID" class="control-label">
                                            <?=$this->lang->line('eattendance_section')?> <span class="text-red">*</span>
                                        </label>
                                        <?php
                                            $sectionArray = array('0' => $this->lang->line("eattendance_select_section"));
                                            if(count($sections)) {
                                                foreach ($sections as $section) {
                                                    $sectionArray[$section->sectionID] = $section->section;
                                                }
                                            }
                                            echo form_dropdown("sectionID", $sectionArray, set_value("sectionID"), "id='sectionID' class='form-control select2'");
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="<?php echo form_error('subjectID') ? 'form-group has-error' : 'form-group'; ?>">
                                        <label for="subjectID" class="control-label">
                                            <?=$this->lang->line("eattendance_subject")?> <span class="text-red">*</span>
                                        </label>
                               
                                        <?php
                                            $subjectArray = array('0' => $this->lang->line("eattendance_select_subject"));
                                            if(count($subjects)) {
                                                foreach ($subjects as $subject) {
                                                    $subjectArray[$subject->subjectID] = $subject->subject;
                                                }
                                            }
                                            echo form_dropdown("subjectID", $subjectArray, set_value("subjectID"), "id='subjectID' class='form-control select2'");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" >
                                        <input type="submit" class="btn btn-success col-md-12" style="margin-top:20px" value="<?=$this->lang->line("add_attendance")?>" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php if(count($eattendanceinfo)) { ?>
                    <div class="col-sm-4 col-sm-offset-4 box-layout-fame">
                        <?php 
                            echo '<h5><center>'.$this->lang->line('eattendance_details').'</center></h5>';
                            echo '<h5><center>'.$this->lang->line('eattendance_exam').' : '. $eattendanceinfo['exam']->exam.'</center></h5>';
                            echo '<h5><center>'.$this->lang->line('eattendance_classes').' : '. $eattendanceinfo['class']->classes.'</center></h5>';
                            echo '<h5><center>'.$this->lang->line('eattendance_section').' : '. $eattendanceinfo['section']->section.'</center></h5>';
                            echo '<h5><center>'.$this->lang->line('eattendance_subject').' : '. $eattendanceinfo['subject']->subject.'</center></h5>';
                        ?>
                    </div>
                <?php } ?>

                <?php if(count($students)) { ?>
                    <div id="hide-table">
                        <table class="table table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                    <th class="col-sm-2"><?=$this->lang->line('eattendance_photo')?></th>
                                    <th class="col-sm-2"><?=$this->lang->line('eattendance_name')?></th>
                                    <th class="col-sm-2"><?=$this->lang->line('eattendance_section')?></th>
                                    <th class="col-sm-2"><?=$this->lang->line('eattendance_email')?></th>
                                    <th class="col-sm-2"><?=$this->lang->line('eattendance_roll')?></th>
                                    <th class="col-sm-1"><?=btn_attendance('', '', 'all_attendance', $this->lang->line('add_all_attendance')).$this->lang->line('action')?></th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <?php if(count($students)) {$i = 1; foreach($students as $student) { ?>
                                    <tr>
                                        <td data-title="<?=$this->lang->line('slno')?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('eattendance_photo')?>">
                                            <?=profileproimage($student->photo)?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('eattendance_name')?>">
                                            <?php echo $student->name; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('eattendance_section')?>">
                                            <?php echo $student->srsection; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('eattendance_email')?>">
                                            <?php echo $student->email; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('eattendance_roll')?>">
                                            <?php echo $student->srroll; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('action')?>">
                                            <?php
                                                if(isset($eattendances[$student->studentID])) {
                                                    $method = '';
                                                    if($eattendances[$student->studentID]->eattendance == "Present") { $method = "checked"; }
                                                    echo btn_attendance($student->studentID, $method, 'attendance btn btn-warning', $this->lang->line('add_title'));
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php $i++; }} ?>
                            </tbody>
                        </table>
                    </div>

                    <script type="text/javascript">
                        window.addEventListener('load', function() {
                            setTimeout(lazyLoad, 1000);
                        });

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

                        $('.attendance').click(function() {
                            var examID = "<?=$examID?>";
                            var classesID = "<?=$classesID?>";
                            var sectionID = "<?=$sectionID?>";
                            var subjectID = "<?=$subjectID?>";
                            var studentID = $(this).attr('id');
                            var status = "";

                            if($(this).prop('checked')) {
                                status = "checked";
                            } else {
                                status = "unchecked";
                            }

                            if(parseInt(examID) && parseInt(classesID) && parseInt(subjectID)) {
                                $.ajax({
                                    type: 'POST',
                                    url: "<?=base_url('eattendance/single_add')?>",
                                    data: {"examID" : examID, "classesID" : classesID, 'sectionID' : sectionID, "subjectID" : subjectID, "studentID" : studentID , "status" : status },
                                    dataType: "html",
                                    success: function(data) {
                                        toastr["success"](data)
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
                                });
                            }
                        });


                        $('.all_attendance').click(function() {
                            var examID = "<?=$examID?>";
                            var classesID = "<?=$classesID?>";
                            var sectionID = "<?=$sectionID?>";
                            var subjectID = "<?=$subjectID?>";
                            var status = "";

                            if($(".all_attendance").prop('checked')) {
                                status = "checked";
                                $('.attendance').prop("checked", true);
                            } else {
                                status = "unchecked";
                                $('.attendance').prop("checked", false);
                            }

                            if(parseInt(examID) && parseInt(classesID) && parseInt(subjectID)) {
                                $.ajax({
                                    type: 'POST',
                                    url: "<?=base_url('eattendance/all_add')?>",
                                    data: {"examID" : examID, "classesID" : classesID, 'sectionID' : sectionID, "subjectID" : subjectID , "status" : status },
                                    dataType: "html",
                                    success: function(data) {
                                        toastr["success"](data)
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
                                });
                            }
                        });
                    </script>
                <?php } ?>
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
$('.select2').select2();
$('#classesID').change(function(event) {
    var classesID = $(this).val();
    if(classesID === '0') {
        $('#subjectID').val(0);
    } else {
        $.ajax({
            type: 'POST',
            url: "<?=base_url('eattendance/subjectcall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#subjectID').html(data);
            }
        });

        $.ajax({
            type: 'POST',
            url: "<?=base_url('eattendance/sectioncall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#sectionID').html(data);
            }
        });
    }
});
</script>
