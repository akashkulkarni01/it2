
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-wheelchair"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("childcare/index")?>"></i> <?=$this->lang->line('menu_childcare')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_childcare')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" method="post">
                        <?php
                            if(form_error('classesID'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="classesID" class="col-sm-2 control-label">
                                <?=$this->lang->line("classesID")?> <span class="text-red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <?php
                                    $array = array(0 => $this->lang->line("select_class"));
                                    foreach ($classes as $classa) {
                                        $array[$classa->classesID] = $classa->classes;
                                    }
                                    echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control select2'");
                                ?>

                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('classesID'); ?>
                            </span>
                        </div>

                        <?php
                            if(form_error('userID'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="userID" class="col-sm-2 control-label">
                                <?=$this->lang->line("userID")?> <span class="text-red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <?php
                                    $studentArray = array(0 => $this->lang->line("select_student"));

                                    if(count($students)) {
                                            foreach ($students as $student) {
                                                $studentArray[$student->studentID] = $student->name;
                                            }
                                        }

                                    echo form_dropdown("userID", $studentArray, set_value("userID"), "id='userID' class='form-control select2'");

                                    ?>

                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('userID'); ?>
                            </span>
                        </div>

                        <?php
                            if(form_error('receiver_name'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="receiver_name" class="col-sm-2 control-label">
                                <?=$this->lang->line("receiver_name")?> <span class="text-red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="receiver_name" name="receiver_name" value="<?=set_value('receiver_name')?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('receiver_name'); ?>
                            </span>
                        </div>

                        <?php
                            if(form_error('phone'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="phone" class="col-sm-2 control-label">
                                <?=$this->lang->line("phone")?> <span class="text-red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone')?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('phone'); ?>
                            </span>
                        </div>

                        <!-- <?php
                            if(form_error('drop_date') || form_error('drop_time'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="add_drop_time" class="col-sm-2 control-label">
                                <?=$this->lang->line("add_drop_time")?> <span class="text-red">*</span>
                            </label>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="drop_date" name="drop_date" value="<?=set_value('drop_date')?>" >
                            </div>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="drop_time" name="drop_time" value="<?=set_value('drop_time')?>" >
                            </div>

                            <span class="col-sm-4 control-label">
                                <?php echo form_error('drop_date').'<br>'; ?>
                                <?php echo form_error('drop_time'); ?>
                            </span>
                        </div> -->

                        <?php
                            if(form_error('drop_date') || form_error('drop_time'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="add_drop_time" class="col-sm-2 control-label">
                                <?=$this->lang->line("add_drop_time")?> <span class="text-red">*</span>
                            </label>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="drop_date" name="drop_date" value="<?=set_value('drop_date')?>" >
                            </div>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="drop_time" name="drop_time" value="<?=set_value('drop_time')?>" >
                            </div>

                            <span class="col-sm-4 control-label">
                                <?php echo form_error('drop_date').'<br>'; ?>
                                <?php echo form_error('drop_time'); ?>
                            </span>
                        </div>



                        <?php
                            if(form_error('receive_date') || form_error('receive_time'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="add_receive_time" class="col-sm-2 control-label">
                                <?=$this->lang->line("add_receive_time")?>
                            </label>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="receive_date" name="receive_date" value="<?=set_value('receive_date')?>" >
                            </div>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="receive_time" name="receive_time" value="<?=set_value('receive_time')?>" >
                            </div>

                            <span class="col-sm-4 control-label">
                                <?php echo form_error('receive_date').'<br>'; ?>
                                <?php echo form_error('receive_time'); ?>
                            </span>
                        </div>


                        <?php
                            if(form_error('comment'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="comment" class="col-sm-2 control-label">
                                <?=$this->lang->line("comment")?>
                            </label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="comment" name="comment"><?=set_value('comment')?></textarea>
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('comment'); ?>
                            </span>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-1">
                                <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_childcare")?>" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.select2').select2();
    $( document ).ready(function() {
        $("#drop_date").datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy',
            startDate:'<?=$schoolyearsessionobj->startingdate?>',
            endDate:'<?=$schoolyearsessionobj->endingdate?>',
        }); 

        $("#receive_date").datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy',
            startDate:'<?=$schoolyearsessionobj->startingdate?>',
            endDate:'<?=$schoolyearsessionobj->endingdate?>',
        });

        $('#drop_time, #receive_time').timepicker({
            minuteStep: 5,
            defaultTime: false,
        });

        $('#classesID').change(function() {
            var classes = $(this).val();
            if(classes != 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('childcare/all_student')?>",
                    data: "&classes=" + classes,
                    dataType: "html",
                    success: function(data) {
                        $('#userID').html(data);
                    }
                });
            }
        });
    });
</script>