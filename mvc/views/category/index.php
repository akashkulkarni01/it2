<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-leaf"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_category')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if(permissionChecker('category_add')) { ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('category/add') ?>">
                            <i class="fa fa-plus"></i> 
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h5>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('category_hname')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('category_class_type')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('category_hbalance')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('category_note')?></th>
                                <?php if(permissionChecker('category_edit') || permissionChecker('category_delete')) { ?>
                                    <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($categorys)) {$i = 1; foreach($categorys as $category) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('category_hname')?>">
                                        <?php echo $category->name; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('category_class_type')?>">
                                        <?php echo $category->class_type; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('category_hbalance')?>">
                                        <?php echo $category->hbalance; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('category_note')?>">
                                        <?php echo $category->categorynote; ?>
                                    </td>

                                    <?php if(permissionChecker('category_edit') || permissionChecker('category_delete')) { ?>
                                        <td data-title="<?=$this->lang->line('action')?>">
                                            <?php echo btn_edit('category/edit/'.$category->categoryID, $this->lang->line('edit')) ?>
                                            <?php echo btn_delete('category/delete/'.$category->categoryID, $this->lang->line('delete')) ?>
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

