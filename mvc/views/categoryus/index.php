
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-calendar-plus-o"></i> 
            Category
        </h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active">Category</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                
                    <h5 class="page-header">
                        <?php
                            $usertype = $this->session->userdata("usertype");
                            if(permissionChecker('categoryus_add')) {
                        ?>
                            <a href="<?php echo base_url('categoryus/add') ?>">
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
                                <th class="col-sm-2">Category title</th>
                                <th class="col-sm-2">Short name</th> 
                                <th class="col-sm-2">Min OT</th> 
                                <th class="col-sm-2">Max Ot</th>                             
    
                                <?php if(permissionChecker('categoryus_edit') || permissionChecker('categoryus_delete')) {
                                ?>
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($categoryus)) {$i = 1; foreach($categoryus as $categoryuss) { ?>
                                <tr>
                                    <td data-title="Sno">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="Category title">
                                        <?php echo $categoryuss->cat_title; ?>
                                    </td>
                                    <td data-title="Short name">
                                        <?php echo $categoryuss->short_name; ?>
                                    </td>
                                    <td data-title="Min OT">
                                        <?php echo $categoryuss->min_ot; ?>
                                    </td> 
                                    <td data-title="Max Ot">
                                        <?php echo $categoryuss->max_ot; ?>
                                    </td>                                    
                                   
                                    <?php if(permissionChecker('categoryus_edit') || permissionChecker('categoryus_delete')) {
                                    ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                    <a href="<?php echo 'view/'.$categoryuss->catid ?>" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-check-square-o"></i></a>    
                                    <?php echo btn_edit('categoryus/edit/'.$categoryuss->catid, 'Edit') ?>
                                        <?php if($categoryuss->catid != 0) { echo btn_delete('categoryus/delete/'.$categoryuss->catid, 'Delete'); }?>
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