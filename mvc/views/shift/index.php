
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-calendar-plus-o"></i> 
            Shift
        </h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active">Shift</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                
                    <h5 class="page-header">
                        <?php
                            $usertype = $this->session->userdata("usertype");
                            if(permissionChecker('shift_add')) {
                        ?>
                            <a href="<?php echo base_url('shift/add') ?>">
                                <i class="fa fa-plus"></i>
                                <?=$this->lang->line('add_title')?>
                            </a>
                        <?php } ?>
                    </h5>
                

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-2">Sr no</th>
                                <th class="col-sm-2">Shift title</th>
                                <th class="col-sm-2">Start time</th>
                                <th class="col-sm-2">End Time</th>                               
    
                                <?php if(permissionChecker('shift_edit') || permissionChecker('shift_delete')) {
                                ?>
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($shift)) {$i = 1; foreach($shift as $shifts) { ?>
                                <tr>
                                    <td data-title="Sno">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="Shift Title">
                                        <?php echo $shifts->shift_title; ?>
                                    </td>
                                    <td data-title="Start time">
                                        <?php echo $shifts->start_time; ?>
                                    </td>
                                    <td data-title="End Time">
                                        <?php echo $shifts->end_time; ?>
                                    </td>                                    
                                   
                                    <?php if(permissionChecker('shift_edit') || permissionChecker('shift_delete')) {
                                    ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <a href="<?php echo 'view/'.$shifts->shift_id ?>" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-check-square-o"></i></a>
                                        <?php echo btn_edit('shift/edit/'.$shifts->shift_id, 'Edit') ?>                                        
                                        <?php if($shifts->shift_id != 0) { echo btn_delete('shift/delete/'.$shifts->shift_id, 'Delete'); }?>
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