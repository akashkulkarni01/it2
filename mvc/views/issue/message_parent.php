

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-issue"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_issue')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <h5 class="page-header">
                    <?php if(permissionChecker('issue_add')) { ?>
                        <a href="<?php echo base_url('issue/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    <?php } ?>

                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                        <?php
                            $array = array("0" => $this->lang->line("issue_select_student"));
                            if($students) {
                                foreach ($students as $student) {
                                    $array[$student->studentID] = $student->name;
                                }
                            }
                            echo form_dropdown("studentID", $array, set_value("studentID", $set), "id='studentID' class='form-control select2'");
                        ?>
                    </div>

                </h5>

                <div class="col-sm-12">
                    <?php echo "<h2><center>".  $this->lang->line("issue_message") ."</center></h2>"; ?>
                </div>                

            </div> <!-- col-sm-12 -->
            
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
<script type="text/javascript">
    $('.select2').select2();
    $('#studentID').change(function() {
        var studentID = $(this).val();
        if(studentID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('issue/student_list')?>",
                data: "id=" + studentID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>