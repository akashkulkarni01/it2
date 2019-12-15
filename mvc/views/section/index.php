
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_section')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-header">
                    <?php if(permissionChecker('section_add')) { ?>
                        <a href="<?php echo base_url('section/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    <?php } ?>
                    <?php if($this->session->userdata('usertypeID') != 3) { ?>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                            <?php
                                $array = array("0" => $this->lang->line("section_select_class")); 
                                if(count($classes)) {
                                    foreach ($classes as $classa) {
                                        $array[$classa->classesID] = $classa->classes;
                                    }
                                }
                                echo form_dropdown("classesID", $array, set_value("classesID", $set), "id='classesID' class='pull-right form-control select2'");
                            ?>
                        </div>
                    <?php } ?>
                </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('section_name')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('section_category')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('section_capacity')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('section_teacher_name')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('section_note')?></th>
                                <?php if(permissionChecker('section_edit') || permissionChecker('section_delete')) { ?>
                                <th class="col-lg-1"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($sections)) {$i = 1; foreach($sections as $section) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('section_name')?>">
                                        <?php echo $section->section; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('section_category')?>">
                                        <?php echo $section->category; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('section_capacity')?>">
                                        <?php echo $section->capacity; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('section_teacher_name')?>">
                                        <?=isset($teachers[$section->teacherID]) ? $teachers[$section->teacherID] : ''?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('section_note')?>">
                                        <?php echo $section->note; ?>
                                    </td>
                                    <?php if(permissionChecker('section_edit') || permissionChecker('section_delete')) { ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_edit('section/edit/'.$section->sectionID.'/'.$set, $this->lang->line('edit')) ?>
                                        <?php echo btn_delete('section/delete/'.$section->sectionID.'/'.$set, $this->lang->line('delete')) ?>
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
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('section/section_list')?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>

<script>
$( ".select2" ).select2( { placeholder: "", maximumSelectionSize: 6 } );
</script>
