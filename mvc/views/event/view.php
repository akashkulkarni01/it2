
<div class="well">
    <div class="row">
        <div class="col-sm-6">
            <button class="btn-cs btn-sm-cs" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> <?=$this->lang->line('print')?> </button>
            <?php
             echo btn_add_pdf('event/print_preview/'.$event->eventID."/", $this->lang->line('pdf_preview'))
            ?>
            <?php if((($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1))) { ?>
                <?php if(permissionChecker('event_edit')) { ?>
                    <?php echo btn_sm_edit('event/edit/'.$event->eventID, $this->lang->line('edit'))
                    ?>
                <?php } ?>
            <?php } ?>
            <button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#mail"><span class="fa fa-envelope-o"></span> <?=$this->lang->line('mail')?></button>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li><a href="<?=base_url("event/index/")?>"><?=$this->lang->line('menu_event')?></a></li>
                <li class="active"><?=$this->lang->line('view')?></li>
            </ol>
        </div>
    </div>

</div>


<div id="printablediv">
    <section class="panel">
        <div class="profile-view-head-cover" style="background-image: url(<?=base_url('uploads/images/'.$event->photo)?>);">
          <h1 class="img-thumbnail picture-left"><?=date("d M", strtotime($event->fdate))?></h1>
          <?php if($event->fdate!=$event->tdate) { ?>
          <h1 class="img-thumbnail picture-right"><?=date("d M", strtotime($event->tdate))?></h1>
          <?php } ?>
        </div>

        <br/>
        <br/>
        <br/>
        <div class="text-center">
          <div class="btn-group">
              <button id="going" style="background-color:#004B98" class="btn btn-bitbucket" type="button"><?=$this->lang->line('going')?></button>
              <button style="background-color:#0A75AF" class="btn btn-facebook" data-toggle="modal" data-target="#goings" type="button"><?=count($goings)?></button>
          </div>
          <div class="btn-group">
              <button style="background-color:#B00303" class="btn btn-bitbucket" data-toggle="modal" data-target="#ignores"  type="button"><?=count($ignores)?></button>
              <button id="ignore" style="background-color:#C23321" class="btn btn-facebook" type="button"><?=$this->lang->line('ignore')?></button>
          </div>
        </div>
        <br/>
        <div class="panel-body profile-view-dis">
          <div class="text-center">
            <h1><?=$event->title?></h1>
            <h4>
              <?=date("d M Y", strtotime($event->fdate))?>
              <?php echo " at ".date("h:i A", strtotime($event->ftime));
                if($event->fdate!=$event->tdate) {
                  echo " <b>to</b> ".date("d M Y", strtotime($event->tdate))." at ";
                } else {
                  echo " - ";
                }
                echo date("h:i A", strtotime($event->ttime));
              ?>
            </h4>
          </div>
          <br/>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <?=$event->details?>
            </div>
          </div>

        </div>
    </section>
</div>

<!-- going modal starts here -->
<div class="modal fade" id="goings">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"><?=$this->lang->line('going')?> (<?=count($goings)?>)</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td><?=$this->lang->line('slno')?></td>
                <td><?=$this->lang->line('event_photo')?></td>
                <td><?=$this->lang->line('event_name')?></td>
                <td><?=$this->lang->line('event_user')?></td>
              </tr>
            </thead>
            <?php if(count($goings)) { $i=1; foreach ($goings as $going) { ?>
              <thead>
                <tr>
                  <td><?=$i?></td>
                  <td><img alt="" class="img-thumbnail" style="border-color:green; widht:50px;height:50px;" src="<?=base_url('uploads/images/'.$going->photo)?>"></td>
                  <td><?=$going->name?></td>
                  <td><?=$going->type?></td>
                </tr>
              </thead>
            <?php $i++;  }} ?>
          </table>
          <br/>
          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" style="margin-bottom:0px;" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<!-- going end here -->

<!-- ignore modal starts here -->
<div class="modal fade" id="ignores">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"><?=$this->lang->line('ignore')?> (<?=count($ignores)?>)</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td><?=$this->lang->line('slno')?></td>
                <td><?=$this->lang->line('event_photo')?></td>
                <td><?=$this->lang->line('event_name')?></td>
                <td><?=$this->lang->line('event_user')?></td>
              </tr>
            </thead>
            <?php if(count($ignores)) { $i=1; foreach ($ignores as $ignore) { ?>
              <thead>
                <tr>
                  <td><?=$i?></td>
                  <td><img alt="" class="img-thumbnail" style="border-color:green; widht:50px;height:50px;" src="<?=base_url('uploads/images/'.$ignore->photo)?>"></td>
                  <td><?=$ignore->name?></td>
                  <td><?=$ignore->type?></td>
                </tr>
              </thead>
            <?php $i++;  }} ?>
          </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" style="margin-bottom:0px;" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<!-- ignore end here -->
<!-- send mail modal start here -->
<!-- email modal starts here -->
<form class="form-horizontal" role="form" action="<?=base_url('event/send_mail');?>" method="post">
    <div class="modal fade" id="mail">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><?=$this->lang->line('mail')?></h4>
            </div>
            <div class="modal-body">

                <?php
                    if(form_error('to'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                ?>
                    <label for="to" class="col-sm-2 control-label">
                        <?=$this->lang->line("to")?> <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="to" name="to" value="<?=set_value('to')?>" >
                    </div>
                    <span class="col-sm-4 control-label" id="to_error">
                    </span>
                </div>

                <?php
                    if(form_error('subject'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                ?>
                    <label for="subject" class="col-sm-2 control-label">
                        <?=$this->lang->line("subject")?> <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="subject" name="subject" value="<?=set_value('subject')?>" >
                    </div>
                    <span class="col-sm-4 control-label" id="subject_error">
                    </span>

                </div>

                <?php
                    if(form_error('message'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                ?>
                    <label for="message" class="col-sm-2 control-label">
                        <?=$this->lang->line("message")?>
                    </label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="message" style="resize: vertical;" name="message" value="<?=set_value('message')?>" ></textarea>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"><?=$this->lang->line('close')?></button>
                <input type="button" id="send_pdf" class="btn btn-success" value="<?=$this->lang->line("send")?>" />
            </div>
        </div>
      </div>
    </div>
</form>
<!-- email end here -->
<!-- send mail modal end -->

<?php if((($siteinfos->school_year == $this->session->userdata('defaultschoolyearID') || $this->session->userdata('usertypeID') == 1))) { ?>
    <script type="text/javascript">
        $("#going").click(function(){
            var id = "<?=$id;?>";
            $.ajax({
                type: 'POST',
                url: "<?=base_url('event/eventcounter')?>",
                data: 'id='+id+'&status=1',
                success: function(data) {
                    location.reload();
                }
            });
        });

        $("#ignore").click(function(){
            var id = "<?=$id;?>";
            $.ajax({
                type: 'POST',
                url: "<?=base_url('event/eventcounter')?>",
                data: 'id='+id+'&status=0',
                success: function(data) {
                    location.reload();
                }
            });
        });
    </script>
<?php } ?>

<script type="text/javascript">

  function printDiv(divID) {
      //Get the HTML of div
      var divElements = document.getElementById(divID).innerHTML;
      //Get the HTML of whole page
      var oldPage = document.body.innerHTML;

      //Reset the page's HTML with div's HTML only
      document.body.innerHTML =
        "<html><head><title></title></head><body>" +
        divElements + "</body>";

      //Print Page
      window.print();

      //Restore orignal HTML
      document.body.innerHTML = oldPage;
      window.location.reload();
  }
  function closeWindow() {
      location.reload();
  }


  function check_email(email) {
      var status = false;
      var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
      if (email.search(emailRegEx) == -1) {
          $("#to_error").html('');
          $("#to_error").html("<?=$this->lang->line('mail_valid')?>").css("text-align", "left").css("color", 'red');
      } else {
          status = true;
      }
      return status;
  }


  $("#send_pdf").click(function(){
      var to = $('#to').val();
      var subject = $('#subject').val();
      var message = $('#message').val();
      var id = "<?=$event->eventID;?>";
      var error = 0;

      $("#to_error").html("");
      if(to == "" || to == null) {
          error++;
          $("#to_error").html("");
          $("#to_error").html("<?=$this->lang->line('mail_to')?>").css("text-align", "left").css("color", 'red');
      } else {
          if(check_email(to) == false) {
              error++
          }
      }

      if(subject == "" || subject == null) {
          error++;
          $("#subject_error").html("");
          $("#subject_error").html("<?=$this->lang->line('mail_subject')?>").css("text-align", "left").css("color", 'red');
      } else {
          $("#subject_error").html("");
      }

      if(error == 0) {
            $('#send_pdf').attr('disabled','disabled');
          $.ajax({
              type: 'POST',
              url: "<?=base_url('event/send_mail')?>",
              data: 'to='+ to + '&subject=' + subject + "&eventID=" + id+ "&message=" + message,
              dataType: "html",
              success: function(data) {
                var response = JSON.parse(data);
                if (response.status == false) {
                  $('#send_pdf').removeAttr('disabled');
                  $.each(response, function(index, value) {
                      if(index != 'status') {
                          toastr["error"](value)
                          toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "500",
                            "hideDuration": "500",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                          }
                      }
                  });
                } else {
                    location.reload();
                }
            }
          });
      }
  });
</script>
