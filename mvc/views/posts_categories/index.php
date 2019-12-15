
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-anchor"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_posts_categories')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php 
                    $usertype = $this->session->userdata("usertype");
                    if(permissionChecker('posts_categories_add')) {
                ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('posts_categories/add') ?>">
                            <i class="fa fa-plus"></i> 
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h5>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-lg-3"><?=$this->lang->line('posts_categories_name')?></th>
                                <th class="col-lg-5"><?=$this->lang->line('posts_categories_description')?></th>
                                 <?php if(permissionChecker('posts_categories_edit') || permissionChecker('posts_categories_delete')) { ?>
                                <th class="col-lg-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($posts_categories)) {$i = 1; foreach($posts_categories as $posts_categorie) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('posts_categories_name')?>">
                                        <?php echo $posts_categorie->posts_categories; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('posts_categories_description')?>">
                                        <?php echo namesorting($posts_categorie->posts_description, 50); ?>
                                    </td>
                                    <?php if(permissionChecker('classes_edit') || permissionChecker('classes_delete')) { ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_edit('posts_categories/edit/'.$posts_categorie->posts_categoriesID, $this->lang->line('edit')) ?>
                                        <?php echo btn_delete('posts_categories/delete/'.$posts_categorie->posts_categoriesID, $this->lang->line('delete')) ?>
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
