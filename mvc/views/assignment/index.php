
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-assignment"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i><?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_assignment')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if((($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1)) || ($this->session->userdata('usertypeID') != 3)) { ?>
                    <h5 class="page-header">
                        <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1)) { ?>
                            <?php if(permissionChecker('assignment_add')) { ?>
                                <a href="<?php echo base_url('assignment/add') ?>">
                                    <i class="fa fa-plus"></i> 
                                    <?=$this->lang->line('add_title')?>
                                </a>
                            <?php } ?>
                        <?php } ?>
                        <?php if($this->session->userdata('usertypeID') != 3) { ?>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                                <?php
                                    $array = array("0" => $this->lang->line("assignment_select_classes"));
                                    if(count($classes)) {
                                        foreach ($classes as $classa) {
                                            $array[$classa->classesID] = $classa->classes;
                                        }
                                    }
                                    echo form_dropdown("classesID", $array, set_value("classesID", $set), "id='classesID' class='form-control select2'");
                                ?>
                            </div>
                        <?php } ?>
                    </h5>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('assignment_title')?></th>
                                <th class="col-lg-3"><?=$this->lang->line('assignment_description')?></th>
                                <th><?=$this->lang->line('assignment_deadlinedate')?></th>
                                <th><?=$this->lang->line('assignment_section')?></th>
                                <th><?=$this->lang->line('assignment_uploder')?></th>
                                <th><?=$this->lang->line('assignment_file')?></th>
                                <?php if(permissionChecker('assignment_edit') || permissionChecker('assignment_delete') || permissionChecker('assignment_view')) { ?>
                                <th><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($assignments)) {$i = 1; foreach($assignments as $assignment) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('assignment_title')?>">
                                        <?php echo $assignment->title; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('assignment_description')?>">
                                        <?php echo namesorting($assignment->description, 130); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('assignment_deadlinedate')?>">
                                        <?php echo date('d M Y', strtotime($assignment->deadlinedate)); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('assignment_section')?>">
                                        <?php  
                                        if($assignment->sectionID == 'false') {
                                            if(count($sections)) foreach ($sections as $sectionkey => $section) {
                                                echo $this->lang->line('assignment_section').' '.$section.'<br>';
                                            }
                                        } else {
                                            $dbSections = json_decode($assignment->sectionID);
                                            if(count($dbSections)) foreach ($dbSections as $dbSectionkey => $dbSection) {
                                                echo $this->lang->line('assignment_section').' '. $sections[$dbSection].'<br>';
                                            } 
                                        }
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('assignment_uploder')?>">
                                        <?php echo getNameByUsertypeIDAndUserID($assignment->usertypeID, $assignment->userID); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('assignment_file')?>">
                                        <?php 
                                            if($assignment->originalfile) { echo btn_download_file('assignment/download/'.$assignment->assignmentID, namesorting($assignment->originalfile), $this->lang->line('download')); 
                                            }
                                        ?>
                                    </td>
                                    <?php if(permissionChecker('assignment_edit') || permissionChecker('assignment_delete') || permissionChecker('assignment_view')) { ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php if($this->session->userdata('usertypeID') == 3) { ?> 
                                            <?php if($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) { ?>
                                                <?php echo btn_upload('assignment/assignmentanswer/'.$assignment->assignmentID.'/'.$set, $this->lang->line('upload')); ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php echo btn_view('assignment/view/'.$assignment->assignmentID.'/'.$set, $this->lang->line('view')) ?>
                                        <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1)) { ?>
                                            <?php echo btn_edit('assignment/edit/'.$assignment->assignmentID.'/'.$set, $this->lang->line('edit')) ?>
                                            <?php echo btn_delete('assignment/delete/'.$assignment->assignmentID.'/'.$set, $this->lang->line('delete')) ?>
                                        <?php } ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".select2").select2();
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#hide-table').hide();
            $('.nav-tabs-custom').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('assignment/student_list')?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
