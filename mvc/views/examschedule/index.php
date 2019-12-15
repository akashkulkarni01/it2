
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-puzzle-piece"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_examschedule')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if((($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1)) || ($this->session->userdata('usertypeID') != 3)) { ?>
                    <h5 class="page-header">
                        <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1)) { ?>
                            <?php if(permissionChecker('examschedule_add')) { ?>
                                <a href="<?php echo base_url('examschedule/add') ?>">
                                    <i class="fa fa-plus"></i> 
                                    <?=$this->lang->line('add_title')?>
                                </a>
                            <?php } ?>
                        <?php } ?>

                        <?php if($this->session->userdata('usertypeID') != 3) { ?>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                                <?php
                                    $array = array("0" => $this->lang->line("examschedule_select_classes"));
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

                <?php if(count($examschedules) > 0 ) { ?>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#all" aria-expanded="true"><?=$this->lang->line("examschedule_all_examschedule")?></a></li>
                            <?php foreach ($sections as $key => $section) {
                                echo '<li class=""><a data-toggle="tab" href="#'. $section->sectionID .'" aria-expanded="false">'. $this->lang->line("examschedule_section")." ".$section->section. " ( ". $section->category." )".'</a></li>';
                            } ?>
                        </ul>

                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th><?=$this->lang->line('slno')?></th>
                                                <th><?=$this->lang->line('examschedule_name')?></th>
                                                <th><?=$this->lang->line('examschedule_classes')?></th>
                                                <th><?=$this->lang->line('examschedule_section')?></th>
                                                <th><?=$this->lang->line('examschedule_subject')?></th>
                                                <th><?=$this->lang->line('examschedule_date')?></th>
                                                <th><?=$this->lang->line('examschedule_time')?></th>
                                                <th><?=$this->lang->line('examschedule_room')?></th>
                                                <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1)) { ?>
                                                    <?php if(permissionChecker('examschedule_edit') || permissionChecker('examschedule_delete')) { ?>
                                                        <th><?=$this->lang->line('action')?></th>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($examschedules)) {$i = 1; foreach($examschedules as $examschedule) { ?>
                                                <tr>
                                                    <td data-title="<?=$this->lang->line('slno')?>">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('examschedule_name')?>">
                                                        <?php echo $examschedule->exam; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('examschedule_classes')?>">
                                                        <?php echo $examschedule->classes; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('examschedule_section')?>">
                                                        <?php echo $examschedule->section; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('examschedule_subject')?>">
                                                        <?php echo $examschedule->subject; ?>
                                                    </td>

                                                    <td data-title="<?=$this->lang->line('examschedule_date')?>">
                                                        <?php echo date("d M Y", strtotime($examschedule->edate)); ?>
                                                    </td>

                                                    <td data-title="<?=$this->lang->line('examschedule_time')?>">
                                                        <?php echo $examschedule->examfrom, " - ", $examschedule->examto ; ?>
                                                    </td>

                                                    <td data-title="<?=$this->lang->line('examschedule_room')?>">
                                                        <?php echo $examschedule->room; ?>
                                                    </td>

                                                    <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1)) { ?>
                                                        <?php if(permissionChecker('examschedule_edit') || permissionChecker('examschedule_delete')) { ?>
                                                        <td data-title="<?=$this->lang->line('action')?>">
                                                            <?php echo btn_edit('examschedule/edit/'.$examschedule->examscheduleID."/".$set, $this->lang->line('edit')) ?>
                                                            <?php echo btn_delete('examschedule/delete/'.$examschedule->examscheduleID."/".$set, $this->lang->line('delete')) ?>
                                                        </td>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tr>
                                            <?php $i++; }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <?php foreach ($sections as $key => $section) { ?>
                                    <div id="<?=$section->sectionID?>" class="tab-pane">
                                        
                                        <div id="hide-table">
                                            <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                                <thead>
                                                    <tr>
                                                        <th><?=$this->lang->line('slno')?></th>
                                                        <th><?=$this->lang->line('examschedule_name')?></th>
                                                        <th><?=$this->lang->line('examschedule_classes')?></th>
                                                        <th><?=$this->lang->line('examschedule_subject')?></th>
                                                        <th><?=$this->lang->line('examschedule_date')?></th>
                                                        <th><?=$this->lang->line('examschedule_time')?></th>
                                                        <th><?=$this->lang->line('examschedule_room')?></th>
                                                        <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1)) { ?>
                                                            <?php if(permissionChecker('examschedule_edit') || permissionChecker('examschedule_delete')) { ?>
                                                                <th><?=$this->lang->line('action')?></th>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(count($allsection[$section->section])) {$i = 1; foreach($allsection[$section->section] as $examschedule) { ?>
                                                        <tr>
                                                            <td data-title="<?=$this->lang->line('slno')?>">
                                                                <?php echo $i; ?>
                                                            </td>
                                                            <td data-title="<?=$this->lang->line('examschedule_name')?>">
                                                                <?php echo $examschedule->exam; ?>
                                                            </td>
                                                            <td data-title="<?=$this->lang->line('examschedule_classes')?>">
                                                                <?php echo $examschedule->classes; ?>
                                                            </td>
        
                                                            <td data-title="<?=$this->lang->line('examschedule_subject')?>">
                                                                <?php echo $examschedule->subject; ?>
                                                            </td>

                                                            <td data-title="<?=$this->lang->line('examschedule_date')?>">
                                                                <?php echo date("d M Y", strtotime($examschedule->edate)); ?>
                                                            </td>

                                                            <td data-title="<?=$this->lang->line('examschedule_time')?>">
                                                                <?php echo $examschedule->examfrom, " - ", $examschedule->examto ; ?>
                                                            </td>

                                                            <td data-title="<?=$this->lang->line('examschedule_room')?>">
                                                                <?php echo $examschedule->room; ?>
                                                            </td>

                                                            <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1)) { ?>
                                                                <?php if(permissionChecker('examschedule_edit') || permissionChecker('examschedule_delete')) { ?>
                                                                    <td data-title="<?=$this->lang->line('action')?>">
                                                                        <?php echo btn_edit('examschedule/edit/'.$examschedule->examscheduleID."/".$set, $this->lang->line('edit')) ?>
                                                                        <?php echo btn_delete('examschedule/delete/'.$examschedule->examscheduleID."/".$set, $this->lang->line('delete')) ?>
                                                                    </td>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php $i++; }} ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                            <?php } ?>
                        </div>
                    </div> <!-- nav-tabs-custom -->
                <?php } else { ?>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#all" aria-expanded="true"><?=$this->lang->line("examschedule_all_examschedule")?></a></li>
                        </ul>


                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th><?=$this->lang->line('slno')?></th>
                                                <th><?=$this->lang->line('examschedule_name')?></th>
                                                <th><?=$this->lang->line('examschedule_classes')?></th>
                                                <th><?=$this->lang->line('examschedule_section')?></th>
                                                <th><?=$this->lang->line('examschedule_subject')?></th>
                                                <th><?=$this->lang->line('examschedule_date')?></th>
                                                <th><?=$this->lang->line('examschedule_time')?></th>
                                                <th><?=$this->lang->line('examschedule_room')?></th>
                                                <?php if(permissionChecker('examschedule_edit') || permissionChecker('examschedule_delete')) { ?>
                                                <th><?=$this->lang->line('action')?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($examschedules)) {$i = 1; foreach($examschedules as $examschedule) { ?>
                                                <tr>
                                                    <td data-title="<?=$this->lang->line('slno')?>">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('examschedule_name')?>">
                                                        <?php echo $examschedule->exam; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('examschedule_classes')?>">
                                                        <?php echo $examschedule->classes; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('examschedule_section')?>">
                                                        <?php echo $examschedule->section; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('examschedule_subject')?>">
                                                        <?php echo $examschedule->subject; ?>
                                                    </td>

                                                    <td data-title="<?=$this->lang->line('examschedule_date')?>">
                                                        <?php echo date("d M Y", strtotime($examschedule->edate)); ?>
                                                    </td>

                                                    <td data-title="<?=$this->lang->line('examschedule_time')?>">
                                                        <?php echo $examschedule->examfrom, " - ", $examschedule->examto ; ?>
                                                    </td>

                                                    <td data-title="<?=$this->lang->line('examschedule_room')?>">
                                                        <?php echo $examschedule->room; ?>
                                                    </td>

                                                    <?php if(permissionChecker('examschedule_edit') || permissionChecker('examschedule_delete')) { ?>
                                                    <td data-title="<?=$this->lang->line('action')?>">
                                                        <?php echo btn_edit('examschedule/edit/'.$examschedule->examscheduleID."/".$set, $this->lang->line('edit')) ?>
                                                        <?php echo btn_delete('examschedule/delete/'.$examschedule->examscheduleID."/".$set, $this->lang->line('delete')) ?>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php $i++; }} ?>
                                        </tbody>
                                    </table>
                                </div>    

                            </div>
                        </div>
                    </div> <!-- nav-tabs-custom -->
                <?php } ?>
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

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
                url: "<?=base_url('examschedule/examschedule_list')?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
