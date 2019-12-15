
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("exam_type/index")?>"><?=$this->lang->line('panel_title')?></a></li>
            <li class="active"><?=$this->lang->line('exam_type_add')?> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" method="post">
                    <?php
                    if(form_error('title'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                    ?>
                        <label for="title" class="col-sm-1 control-label">
                            <?=$this->lang->line("exam_type_title")?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="title" name="title" value="<?=set_value('title', $exam_type->title)?>" placeholder="<?=$this->lang->line("exam_type_title")?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('title'); ?>
                        </span>
                    </div>

                    <?php
                    if(form_error('typeNumber'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                    ?>
                        <label for="typeNumber" class="col-sm-1 control-label">
                            <?=$this->lang->line("exam_type_typeNumber")?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="typeNumber" name="typeNumber" value="<?=set_value('typeNumber', $exam_type->examTypeNumber)?>" placeholder="<?=$this->lang->line("exam_type_typeNumber")?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('typeNumber'); ?>
                        </span>
                    </div>

                    <?php
                    if(form_error('status'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                    ?>
                        <label for="status" class="col-sm-1 control-label">
                            <?=$this->lang->line("exam_type_status")?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="status" name="status" value="<?=set_value('status', $exam_type->status)?>" placeholder="<?=$this->lang->line("exam_type_status")?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('status'); ?>
                        </span>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_class")?>" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
