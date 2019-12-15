
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("question_type/index")?>"><?=$this->lang->line('panel_title')?></a></li>
            <li class="active"><?=$this->lang->line('question_type_add')?> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" method="post">
                    <?php
                    if(form_error('typeNumber'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                    ?>
                    <label for="typeNumber" class="col-sm-2 control-label">
                        <?=$this->lang->line("question_type_number")?>
                    </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="typeNumber" name="typeNumber" value="<?=set_value('typeNumber', $question_type->typeNumber)?>" >
                    </div>
                    <span class="col-sm-4 control-label">
                        <?php echo form_error('typeNumber'); ?>
                    </span>
            </div>
            <?php
            if(form_error('name'))
                echo "<div class='form-group has-error' >";
            else
                echo "<div class='form-group' >";
            ?>
            <label for="name" class="col-sm-2 control-label">
                <?=$this->lang->line("question_type_name")?>
            </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name', $question_type->name)?>" >
            </div>
            <span class="col-sm-4 control-label">
                        <?php echo form_error('name'); ?>
                    </span>
        </div>
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
