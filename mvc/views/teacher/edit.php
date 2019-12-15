
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-teacher"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("teacher/index")?>"><?=$this->lang->line('menu_teacher')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_teacher')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                   
                    <?php 
                        if(form_error('name')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacher_name" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name', $teacher->name)?>" >

                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('designation')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="designation" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_designation")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="designation" name="designation" value="<?=set_value('designation', $teacher->designation)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('designation'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('dob')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="dob" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_dob")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob', date("d-m-Y", strtotime($teacher->dob)))?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('dob'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('sex')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="sex" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_sex")?>
                        </label>
                        <div class="col-sm-6">
                            <?php 
                                echo form_dropdown("sex", array($this->lang->line('teacher_sex_male') => $this->lang->line('teacher_sex_male'), $this->lang->line('teacher_sex_female') => $this->lang->line('teacher_sex_female')), set_value("sex", $teacher->sex), "id='sex' class='form-control'"); 
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sex'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('shift'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="shift" class="col-sm-2 control-label">
                            <?=$this->lang->line("shift")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                
                                foreach ($shifts as $key => $shift) {
                                       
                                    $array_shift[$shift->shift_id] = $shift->shift_title;
                                        
                                }
                                
                                echo form_dropdown("shift", $array_shift,
                                    set_value("shift",$shift->shift_id), "id='shift' class='form-control'"
                                );
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('shift'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('categoryus'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="categoryus" class="col-sm-2 control-label">
                            <?=$this->lang->line("category")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                               
                                foreach ($categories as $key => $categoryus) {
                                                                       
                                    $array_cat[$categoryus->catid] = $categoryus->cat_title;
                                        
                                }
                                echo form_dropdown("categoryus", $array_cat,
                                    set_value("categoryus",$categoryus->catid), "id='categoryus' class='form-control'"
                                );
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('categoryus'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('religion')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="religion" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_religion")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="religion" name="religion" value="<?=set_value('religion', $teacher->religion)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('religion'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('email')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="email" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_email")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', $teacher->email)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('phone')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="phone" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', $teacher->phone)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('phone'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('address')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="address" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_address")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address', $teacher->address)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('address'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('jod')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="jod" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_jod")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="jod" name="jod" value="<?=set_value('jod', date("d-m-Y", strtotime($teacher->jod)))?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('jod'); ?>
                        </span>
                    </div>

                     <!-- Pen number -->
                     <?php
                        if(form_error('pen'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="pen" class="col-sm-2 control-label">
                            Pen Number <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="pen" name="pen" value="<?=set_value('pen')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('pen'); ?>
                        </span>
                    </div>

                    <!-- aadhar number -->
                    <?php
                        if(form_error('aadhar'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="aadhar" class="col-sm-2 control-label">
                            Aadhar Number <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="aadhar" name="aadhar" value="<?=set_value('aadhar')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('aadhar'); ?>
                        </span>
                    </div>

                    <!-- esic number -->
                    <?php
                        if(form_error('esic'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="esic" class="col-sm-2 control-label">
                            Esic Number
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="esic" name="esic" value="<?=set_value('esic')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('esic'); ?>
                        </span>
                    </div>

                    <!-- pfno number -->
                    <?php
                        if(form_error('pfno'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="esic" class="col-sm-2 control-label">
                            Pf Number
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="pfno" name="pfno" value="<?=set_value('pfno')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('pfno'); ?>
                        </span>
                    </div>

                     <!-- Bank Name -->
                     <?php
                        if(form_error('bankname'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="bankname" class="col-sm-2 control-label">
                            Bank name
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="bankname" name="bankname" value="<?=set_value('bankname')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('bankname'); ?>
                        </span>
                    </div>

                     <!-- Branch Name -->
                     <?php
                        if(form_error('branch'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="branch" class="col-sm-2 control-label">
                            Branch Name
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="branch" name="branch" value="<?=set_value('branch')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('branch'); ?>
                        </span>
                    </div>

                     <!-- Account number -->
                     <?php
                        if(form_error('accountno'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="accountno" class="col-sm-2 control-label">
                            Account Number
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="accountno" name="accountno" value="<?=set_value('accountno')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('accountno'); ?>
                        </span>
                    </div>

                     <!-- IFSC number -->
                     <?php
                        if(form_error('ifsc'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ifsc" class="col-sm-2 control-label">
                            Ifsc Number
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ifsc" name="ifsc" value="<?=set_value('ifsc')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ifsc'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('photo'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="photo" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_photo")?>
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('teacher_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('teacher_file_browse')?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="col-sm-4">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('username')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="username" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_username")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username', $teacher->username)?>" >
                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('username'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_teacher")?>" >
                        </div>
                    </div>

                </form>
            </div><!-- col-sm-8 --> 
        </div>
    </div>
</div>


<script type="text/javascript">
$('#username').keyup(function() {
    $(this).val($(this).val().replace(/\s/g, ''));
});

$('#dob').datepicker({ startView: 2 });
$('#jod').datepicker();

$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview

    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '120px');
        }, 
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("<?=$this->lang->line('teacher_file_browse')?>");
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("<?=$this->lang->line('teacher_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '120px');
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
