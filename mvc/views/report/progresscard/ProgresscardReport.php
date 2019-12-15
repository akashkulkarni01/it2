<div class="row">
    <div class="col-sm-12" style="margin:10px 0px">
        <?php
            $pdf_preview_uri = base_url('progresscardreport/pdf/'.$classesID.'/'.$sectionID.'/'.$studentID);
            echo btn_printReport('progresscardreport', $this->lang->line('report_print'), 'printablediv');
            echo btn_pdfPreviewReport('progresscardreport',$pdf_preview_uri, $this->lang->line('report_pdf_preview'));
            echo btn_sentToMailReport('progresscardreport', $this->lang->line('report_send_pdf_to_mail'));
        ?>
    </div>
</div>
<div class="box">
    <div class="box-header bg-gray">
        <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> 
        <?=$this->lang->line('progresscardreport_report_for')?> - <?=$this->lang->line('progresscardreport_progresscard')?></h3>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <style type="text/css">
            .mainprogresscardreport{
                margin: 0px;
                overflow: hidden;
                border:1px solid #ddd;
                max-width:794px;
                margin: 0px auto;
                margin-bottom: 10px;
                padding:30px;
            }

            .progresscard-headers{
                border-bottom: 1px solid #ddd;
                overflow: hidden;
                padding-bottom: 10px;
                vertical-align: middle;
                margin-bottom: 4px;
            }

            .progresscard-logo {
                float: left;
            }

            .progresscard-headers img{
                width: 60px;
                height: 60px;
            }

            .school-name h2{
                float: left;
                padding-left: 20px;
                padding-top: 7px;
                font-weight: bold;
            }

            .progresscard-infos {
                width: 100%;
                overflow: hidden;
            }

            .progresscard-infos h3{
                padding: 2px 0px;
                margin: 0px;
            }

            .progresscard-infos p{
                margin-bottom: 3px;
                font-size: 15px;
            }

            .school-address{
                float: left;
                width: 40%;
            }

            .student-profile {
                float: left;
                width: 40%;

            }

            .student-profile-img {
                float: left;
                width: 20%;
                text-align: right;
            }

            .student-profile-img img {
                width: 120px;
                height: 120px;
                border: 1px solid #ddd;
                margin-top: 5px;
                margin-right: 2px;
            }

             @media screen and (max-width: 480px) {
                .school-name h2{
                    padding-left: 0px;
                    float: none;
                }

                .school-address {
                    width: 100%;
                }

                .student-profile {
                    width: 100%;
                } 

                .student-profile-img  {
                    margin-top: 10px;
                    width: 100%;
                }

                .student-profile-img img {
                    width: 100%;
                    height: 100%;
                    margin: 10px 0px;
                }
            }

            .progresscard-contents {
                width: 100%;
                overflow: hidden;
                margin-top: 10px;
            }

            .progresscard-contents table {
                width: 100%;
            }

            .progresscard-contents table tr,.progresscard-contents table td,.progresscard-contents table th {
                border:1px solid #ddd;
                padding: 8px 1px;
                font-size: 14px;
                text-align: center;
            }

            @media print {
                .mainprogresscardreport{
                    border:0px solid #ddd;
                    padding: 0px 20px;
                }

                .student-profile-img img {
                    margin-right: 5px !important;
                }

                .progresscard-contents table td,.progresscard-contents table th {
                    font-size: 12px;
                }
            }
        </style>
        <div class="box-body" style="margin-bottom: 50px;">
            <div class="row">
                <div class="col-sm-12">
                <?php if(count($students)) { foreach($students as $student) { ?>
                    <div class="mainprogresscardreport">
                        <div class="progresscard-headers">
                            <div class="progresscard-logo">
                                <img src="<?=base_url("uploads/images/$siteinfos->photo")?>" alt="">
                            </div>
                            <div class="school-name">
                                <h2><?=$siteinfos->sname?></h2>
                            </div>
                        </div>
                        <div class="progresscard-infos">
                            <div class="school-address">
                                <h4><b><?=$siteinfos->sname?></b></h4>
                                <p><?=$siteinfos->address?></p>
                                <p><?=$this->lang->line('progresscardreport_phone')?> : <?=$siteinfos->phone?></p>
                                <p><?=$this->lang->line('progresscardreport_email')?> : <?=$siteinfos->email?></p>
                            </div>
                            <div class="student-profile">
                                <h4><b><?=$student->srname?></b></h4>
                                <p><?=$this->lang->line('progresscardreport_academic_year')?> : <b><?=$schoolyearsessionobj->schoolyear;?></b>
                                <p><?=$this->lang->line('progresscardreport_reg_no')?> : <b><?=$student->srregisterNO?></b>, <?=$this->lang->line('progresscardreport_class')?> : <b><?=isset($classes[$student->srclassesID]) ? $classes[$student->srclassesID] : ''?></b></p>
                                <p><?=$this->lang->line('progresscardreport_section')?> : <b><?=isset($sections[$student->srsectionID]) ? $sections[$student->srsectionID] : ''?></b>, <?=$this->lang->line('progresscardreport_roll_no')?> : <b><?=$student->srroll?></b></p>  
                                <p><?=$this->lang->line('progresscardreport_group')?> : <b><?=isset($groups[$student->srstudentgroupID]) ? $groups[$student->srstudentgroupID] : ''?></b></p> 
                            </div>
                            <div class="student-profile-img">
                                <img src="<?=imagelink($student->photo)?>" alt="">
                            </div>
                        </div>
                        <div class="progresscard-contents progresscardreporttable">
                            <table>
                                <thead>
                                    <tr>
                                        <th rowspan="2"><?=$this->lang->line('progresscardreport_subjects')?></th>
                                        <?php if(count($exams)) { foreach($exams as $exam) { ?>
                                            <th colspan="<?=count($markpercentages)?>"><?=$exam?></th>
                                        <?php } } ?>
                                        <th rowspan="2"><?=$this->lang->line('progresscardreport_total')?></th>
                                        <th rowspan="2"><?=$this->lang->line('progresscardreport_grade')?></th>
                                        <th rowspan="2"><?=$this->lang->line('progresscardreport_point')?></th>
                                    </tr>
                                    <tr>
                                        <?php if(count($exams)) { foreach($exams as $exam) {
                                            if(count($markpercentages)) { foreach($markpercentages as $markpercentage) { ?>
                                                <th><?=substr($markpercentage->markpercentagetype, 0, 2)?></th>
                                            <?php } } } } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $totalsemisterCol = (((count($exams) - 1) * count($markpercentages)) + 3); 
                                $totalAllSubjectMark = 0;
                                if(count($exams)) {
                                    if(count($mandatorySubjects)) { foreach($mandatorySubjects  as $mandatorySubject) {
                                        $totalSubjectMark = 0; ?>
                                        <tr>
                                            <td><?=$mandatorySubject->subject?></td>
                                            <?php if(count($exams)) { foreach($exams as $examID => $exam) { 
                                                if(count($markpercentages)) { foreach($markpercentages as $markpercentage) { ?>
                                                <td>
                                                    <?php
                                                        if(isset($markArray[$examID][$student->srstudentID]['markpercentageMark'][$mandatorySubject->subjectID][$markpercentage->markpercentageID])) {
                                                            $mark = $markArray[$examID][$student->srstudentID]['markpercentageMark'][$mandatorySubject->subjectID][$markpercentage->markpercentageID];
                                                        } else {
                                                            $mark = 0;
                                                        }

                                                        echo $mark;
                                                        $totalSubjectMark += $mark;
                                                    ?>
                                                </td>
                                            <?php } } } } ?>
                                            <td><?=$totalSubjectMark?></td>
                                            <?php
                                            $totalAllSubjectMark += $totalSubjectMark;
                                            $subjectGradeMark = floor($totalSubjectMark / count($exams));
                                            if(count($grades)) { foreach($grades as $grade) { 
                                                if(($grade->gradefrom <= $subjectGradeMark) && ($grade->gradeupto >= $subjectGradeMark)) { ?>
                                                    <td><?=$grade->grade?></td>
                                                    <td><?=$grade->point?></td>
                                            <?php } } } ?>
                                        </tr>
                                    <?php } } 
                                    if($student->sroptionalsubjectID > 0) { $totalSubjectMark = 0;?>
                                        <tr>
                                            <td><?=isset($optionalSubjects[$student->sroptionalsubjectID]) ? $optionalSubjects[$student->sroptionalsubjectID] : ''?></td>
                                            <?php if(count($exams)) { foreach($exams as $examID => $exam) { 
                                                if(count($markpercentages)) { foreach($markpercentages as $markpercentage) { ?>
                                                <td>
                                                    <?php
                                                        if(isset($markArray[$examID][$student->srstudentID]['markpercentageMark'][$student->sroptionalsubjectID][$markpercentage->markpercentageID])) {
                                                            $mark = $markArray[$examID][$student->srstudentID]['markpercentageMark'][$student->sroptionalsubjectID][$markpercentage->markpercentageID];
                                                        } else {
                                                            $mark = 0;
                                                        }
                                                        echo $mark;
                                                        $totalSubjectMark += $mark;
                                                    ?>
                                                </td>
                                            <?php } } } } ?>
                                            <td><?=$totalSubjectMark?></td>
                                            <?php
                                            $totalAllSubjectMark += $totalSubjectMark;
                                            $subjectGradeMark = floor($totalSubjectMark / count($exams));
                                            if(count($grades)) { foreach($grades as $grade) { 
                                                if(($grade->gradefrom <= $subjectGradeMark) && ($grade->gradeupto >= $subjectGradeMark)) { ?>
                                                    <td><?=$grade->grade?></td>
                                                    <td><?=$grade->point?></td>
                                            <?php } } } ?>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="<?=(count($markpercentages) + 1)?>"><?=$this->lang->line('progresscardreport_total_mark')?> </td>
                                        <td colspan="<?=$totalsemisterCol?>"><b><?=$totalAllSubjectMark?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="<?=(count($markpercentages) + 1)?>"><?=$this->lang->line('progresscardreport_average_mark')?> </td>
                                        <td colspan="<?=$totalsemisterCol?>">
                                            <b>
                                                <?php
                                                    $tSubject = $totalSubject;
                                                    if($student->sroptionalsubjectID > 0) {
                                                        $tSubject = $tSubject + 1;
                                                    }
                                                    $totalAllSubject = $tSubject * count($exams);
                                                    echo number_format($totalAllSubjectMark / $totalAllSubject,2);
                                                    $totalAllSubjectGrade = floor($totalAllSubjectMark / $totalAllSubject);
                                                ?>
                                            </b>
                                        </td>
                                    </tr>
                                    <?php
                                    if(count($grades)) { foreach($grades as $grade) { 
                                        if(($grade->gradefrom <= $totalAllSubjectGrade) && ($grade->gradeupto >= $totalAllSubjectGrade)) { ?>
                                        <tr>
                                            <td colspan="<?=(count($markpercentages) + 1)?>"><?=$this->lang->line('progresscardreport_point')?> </td>
                                            <td colspan="<?=$totalsemisterCol?>"><b><?=$grade->point?></b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="<?=(count($markpercentages) + 1)?>"><?=$this->lang->line('progresscardreport_grade')?></td>
                                            <td colspan="<?=$totalsemisterCol?>"><b><?=$grade->grade?></b></td>
                                        </tr>
                                    <?php } } } } ?>

                                    <tr>
                                        <td colspan="<?=(count($markpercentages) + 1)?>"><?=$this->lang->line('progresscardreport_from_teacher_remarks')?></td>
                                        <td colspan="<?=$totalsemisterCol?>"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="<?=(count($markpercentages) + 1)?>"><?=$this->lang->line('progresscardreport_house_teacher_remarks')?></td>
                                        <td colspan="<?=$totalsemisterCol?>"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="<?=(count($markpercentages) + 1)?>"><?=$this->lang->line('progresscardreport_principal_remarks')?></td>
                                        <td colspan="<?=$totalsemisterCol?>"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="<?=((count($markpercentages) + 1) + ($totalsemisterCol))?>">
                                            <?=$this->lang->line('progresscardreport_interpretation')?> :
                                            <b>
                                                <?php if(count($grades)) { $i = 1; foreach($grades as $grade) { 
                                                    if(count($grades) == $i) {
                                                        echo $grade->gradefrom.'-'.$grade->gradeupto." = ".$grade->point." [".$grade->grade."]";
                                                    } else {
                                                        echo $grade->gradefrom.'-'.$grade->gradeupto." = ".$grade->point." [".$grade->grade."], ";
                                                    }
                                                    $i++;
                                                }}?>
                                            </b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p style="page-break-after: always;">&nbsp;</p>
                <?php } } else { ?>
                    <div class="callout callout-danger">
                        <p><b class="text-info"><?=$this->lang->line('progresscardreport_data_not_found')?></b></p>
                    </div>
                <?php } ?>
                </div>
            </div><!-- row -->
        </div><!-- Body -->
    </div>
</div>


<!-- email modal starts here -->
<form class="form-horizontal" role="form" action="<?=base_url('progresscardreport/send_pdf_to_mail');?>" method="post">
    <div class="modal fade" id="mail">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?=$this->lang->line('progresscardreport_close')?></span></button>
                <h4 class="modal-title"><?=$this->lang->line('progresscardreport_mail')?></h4>
            </div>
            <div class="modal-body">

                <?php
                    if(form_error('to'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                ?>
                    <label for="to" class="col-sm-2 control-label">
                        <?=$this->lang->line("progresscardreport_to")?> <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="to" name="to" value="<?=set_value('to')?>" >
                    </div>
                    <span class="col-sm-4 control-label" id="to_error">
                    </span>
                </div>

                <?php
                    if(form_error('subject'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                ?>
                    <label for="subject" class="col-sm-2 control-label">
                        <?=$this->lang->line("progresscardreport_subject")?> <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="subject" name="subject" value="<?=set_value('subject')?>" >
                    </div>
                    <span class="col-sm-4 control-label" id="subject_error">
                    </span>

                </div>

                <?php
                    if(form_error('message'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                ?>
                    <label for="message" class="col-sm-2 control-label">
                        <?=$this->lang->line("progresscardreport_message")?>
                    </label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="message" style="resize: vertical;" name="message" value="<?=set_value('message')?>" ></textarea>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"><?=$this->lang->line('close')?></button>
                <input type="button" id="send_pdf" class="btn btn-success" value="<?=$this->lang->line("progresscardreport_send")?>" />
            </div>
        </div>
      </div>
    </div>
</form>
<!-- email end here -->

<script type="text/javascript">

    $('.progresscardreporttable').mCustomScrollbar({
        axis:"x"
    });
    
    function check_email(email) {
        var status = false;
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (email.search(emailRegEx) == -1) {
            $("#to_error").html('');
            $("#to_error").html("<?=$this->lang->line('progresscardreport_mail_valid')?>").css("text-align", "left").css("color", 'red');
        } else {
            status = true;
        }
        return status;
    }


    $('#send_pdf').click(function() {
        var field = {
            'to'         : $('#to').val(), 
            'subject'    : $('#subject').val(), 
            'message'    : $('#message').val(),
            'classesID'  : '<?=$classesID?>',
            'sectionID'  : '<?=$sectionID?>',
            'studentID'  : '<?=$studentID?>',
        };

        var to = $('#to').val();
        var subject = $('#subject').val();
        var error = 0;

        $("#to_error").html("");
        $("#subject_error").html("");

        if(to == "" || to == null) {
            error++;
            $("#to_error").html("<?=$this->lang->line('progresscardreport_mail_to')?>").css("text-align", "left").css("color", 'red');
        } else {
            if(check_email(to) == false) {
                error++
            }
        }

        if(subject == "" || subject == null) {
            error++;
            $("#subject_error").html("<?=$this->lang->line('progresscardreport_mail_subject')?>").css("text-align", "left").css("color", 'red');
        } else {
            $("#subject_error").html("");
        }

        if(error == 0) {
            $('#send_pdf').attr('disabled','disabled');
            $.ajax({
                type: 'POST',
                url: "<?=base_url('progresscardreport/send_pdf_to_mail')?>",
                data: field,
                dataType: "html",
                success: function(data) {
                    var response = JSON.parse(data);
                    if (response.status == false) {
                        $('#send_pdf').removeAttr('disabled');
                        if( response.to) {
                            $("#to_error").html("<?=$this->lang->line('progresscardreport_mail_to')?>").css("text-align", "left").css("color", 'red');
                        }

                        if( response.subject) {
                            $("#subject_error").html("<?=$this->lang->line('progresscardreport_mail_subject')?>").css("text-align", "left").css("color", 'red');
                        }
                        
                        if(response.message) {
                            toastr["error"](response.message)
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
                    } else {
                        location.reload();
                    }
                }
            });
        }
    });
</script>