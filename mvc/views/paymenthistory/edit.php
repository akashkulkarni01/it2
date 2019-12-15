
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-payment"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("paymenthistory/index")?>"><?=$this->lang->line('menu_paymenthistory')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_paymenthistory')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">
                    <?php 
                        if(form_error('amount')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="amount" class="col-sm-2 control-label">
                            <?=$this->lang->line("paymenthistory_amount")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount" name="amount" value="<?=set_value('amount', $payment->paymentamount)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('amount'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('payment_method')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="payment_method" class="col-sm-2 control-label">
                            <?=$this->lang->line("paymenthistory_paymentmethod")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = $array = array('0' => $this->lang->line("paymenthistory_select_paymentmethod"));
                                $array['Cash'] = $this->lang->line('Cash');
                                $array['Cheque'] = $this->lang->line('Cheque');
                                echo form_dropdown("payment_method", $array, set_value("payment_method", $payment->paymenttype), "id='payment_method' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('payment_method'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_payment")?>" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('.select2').select2();
</script>