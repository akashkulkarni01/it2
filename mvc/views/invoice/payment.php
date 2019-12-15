
<form role="form" method="post">
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa icon-invoice"></i> <?=$this->lang->line('invoice_payment')?></h3>
            </div>

            <div class="box-body box-profile">
                <center>
                <?=profileviewimage($studentprofile->photo)?>
                </center>

                <h3 class="profile-username text-center"><?=$student->srname?></h3>

                <p class="text-muted text-center"><?=$usertype->usertype?></p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item" style="background-color: #FFF">
                        <b><?=$this->lang->line('invoice_registerno')?></b> <a class="pull-right"><?=$student->srregisterNO?></a>
                    </li>
                    <li class="list-group-item" style="background-color: #FFF">
                        <b><?=$this->lang->line('invoice_roll')?></b> <a class="pull-right"><?=$student->srroll?></a>
                    </li>
                    <li class="list-group-item" style="background-color: #FFF">
                        <b><?=$this->lang->line('invoice_class')?></b> <a class="pull-right"><?=count($class) ? $class->classes : ''?></a>
                    </li>
                    <li class="list-group-item" style="background-color: #FFF">
                        <b><?=$this->lang->line('invoice_section')?></b> <a class="pull-right"><?=count($section) ? $section->section : ''?></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="box" style="margin-bottom:40px">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-money"></i> <?=$this->lang->line('panel_title')?></h3>
            </div>
            <div class="box-body">
                <div class="form-group <?=form_error('paymentmethodID') ? 'has-error' : '' ?>">
                    <label for="paymentmethodID"><?=$this->lang->line('invoice_paymentmethod')?> <span class="text-red">*</span></label>

                    <?php
                        $paymentmethodArray['0'] = $this->lang->line("invoice_select_paymentmethod");

                        if($this->session->userdata('usertypeID') == 1 || $this->session->userdata('usertypeID') == 5) {
                            $paymentmethodArray['Cash'] = $this->lang->line('Cash');
                            $paymentmethodArray['Cheque'] = $this->lang->line('Cheque');
                        }

                        if ($payment_settings['paypal_status'] == true) {
                            $paymentmethodArray['Paypal'] = $this->lang->line('Paypal');
                        }

                        if ($payment_settings['stripe_status'] == true) {
                            $paymentmethodArray['Stripe'] = $this->lang->line('Stripe');
                        }

                        if ($payment_settings['payumoney_status'] == true) {
                            $paymentmethodArray['Payumoney'] = $this->lang->line('PayUMoney');
                        }

                        if ($payment_settings['voguepay_status'] == true) {
                            $paymentmethodArray['Voguepay'] = $this->lang->line('Voguepay');
                        }
						
						if ($payment_settings['ccavenue_status'] == true) {
                            $paymentmethodArray['CCAvenue'] = $this->lang->line('CCAvenue');
                        }
						

                        echo form_dropdown("paymentmethodID", $paymentmethodArray, set_value("paymentmethodID"), "id='paymentmethodID' class='form-control select2' onchange='CheckType()'");
                    ?>
                    <span class="text-red">
                        <?=form_error('paymentmethodID')?>
                    </span>
                </div>
                <!-- Chequ option -->
                <div id ="checkDiv" style='display:none'>
                    <div class="dateDiv form-group <?=form_error('date') ? 'has-error' : '' ?>" >
                        <label for="date">
                            <?=$this->lang->line("check_no")?> <span class="text-red">*</span>
                        </label>
                            <input type="text" class="form-control" id="check_no" name="check_no"  >
                        <span class="text-red">
                            <?php echo form_error('check_no'); ?>
                        </span>
                    </div>


                    <div class="dateDiv form-group <?=form_error('check_date') ? 'has-error' : '' ?>" >
                        <label for="date">
                            <?=$this->lang->line("check_date")?> <span class="text-red">*</span>
                        </label>
                            <input type="text" class="form-control" id="check_date" name="check_date" value="<?=set_value('check_date')?>" >
                        <span class="text-red">
                            <?php echo form_error('check_date'); ?>
                        </span>
                    </div>
                    </div>


                <!-- Card Options fields -->
                <div id="cardOption" style="display: none;">
                    <div class="form-group <?=form_error('card_number') ? 'has-error' : ''; ?>" >
                        <label for="amount"><?=$this->lang->line("card_number")?> <span class="text-red">*</span></label>
                        <input type="text" class="form-control" id="card_number" name="card_number" value="<?=set_value('card_number', null)?>" placeholder="4242 4242 4242 4242">
                    </div>
                    <div class="form-group <?=(form_error('expire_month') || form_error('expire_year')) ? 'has-error' : ''; ?>" >
                        <label for="amount"><?=$this->lang->line("expire")?> <span class="text-red">*</span></label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="expire_month" name="expire_month" value="<?=set_value('expire_month', null)?>" placeholder="mm">
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="expire_year" name="expire_year" value="<?=set_value('expire_year', null)?>" placeholder="yyyy">
                            </div>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('cvv') ? 'has-error' : ''; ?>" >
                        <label for="amount"><?=$this->lang->line("cvv")?> <span class="text-red">*</span></label>
                        <input type="text" class="form-control" id="cvv" name="cvv" value="<?=set_value('cvv', null)?>" placeholder="123">
                    </div>

                </div>
                <!-- Card options end-->
                <!-- PayUOptions Options fields -->
                <div id="payuInputs" style="display: none;">
                    <div class="form-group <?=form_error('first_name') ? 'has-error' : ''; ?>" >
                        <label for="first_name"><?=$this->lang->line("first_name")?></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?=set_value('first_name', null)?>" >
                        <span class="text-red">
                            <?php echo form_error('first_name'); ?>
                        </span>
                    </div>
                    <div class="form-group <?=form_error('email') ? 'has-error' : ''; ?>" >
                        <label for="email"><?=$this->lang->line("email")?></label>
                        <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', null)?>" >
                        <span class="text-red"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="form-group <?=form_error('phone') ? 'has-error' : ''; ?>" >
                        <label for="phone" ><?=$this->lang->line("phone")?></label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', null)?>" >
                        <span class="text-red">
                            <?php echo form_error('phone'); ?>
                        </span>
                    </div>
                </div>
                <!-- PayUOptions options end-->

                <button id="addPaymentButton" type="submit" class="btn btn-success"><?=$this->lang->line('add_payment')?></button>
            </div>
        </div>
    </div>

    <div class="col-sm-9">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa icon-feetypes"></i> <?=$this->lang->line('invoice_feetype_list')?></h3>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                    <li><a href="<?=base_url("invoice/index")?>"><?=$this->lang->line('menu_invoice')?></a></li>
                    <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('invoice_payment')?></li>
                </ol>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered feetype-style" style="font-size: 16px;">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-3"><?=$this->lang->line('invoice_feetype')?></th>
                                <th class="col-sm-1" ><?=$this->lang->line('invoice_amount')?></th>
                                <th class="col-sm-1" ><?=$this->lang->line('invoice_due')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('invoice_paid_amount')?></th>
                                <?php if($this->session->userdata('usertypeID') == 1 || $this->session->userdata('usertypeID') == 5) { ?>
                                    <th class="col-sm-2" ><?=$this->lang->line('invoice_weaver')?></th>
                                    <th class="col-sm-2"><?=$this->lang->line('invoice_fine')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id="feetypeList">
                            <?php 
                                $totalAmount = 0;
                                $totalDue = 0;
                                if(count($invoices)) { 
                                    $i = 1;
                                    foreach ($invoices as $invoice) {
                                        $amount = $invoice->amount;
                                        $due = 0;

                                        if(isset($invoicepaymentandweaver['totalamount'][$invoice->invoiceID])) {
                                            $due = $invoicepaymentandweaver['totalamount'][$invoice->invoiceID]; 

                                            if(isset($invoicepaymentandweaver['totaldiscount'][$invoice->invoiceID])) {
                                                $due =  ($due -$invoicepaymentandweaver['totaldiscount'][$invoice->invoiceID]);
                                            }

                                            if(isset($invoicepaymentandweaver['totalpayment'][$invoice->invoiceID])) {
                                                $due = ($due - $invoicepaymentandweaver['totalpayment'][$invoice->invoiceID]);
                                            } 

                                            if(isset($invoicepaymentandweaver['totalweaver'][$invoice->invoiceID])) {
                                                $due = ($due - $invoicepaymentandweaver['totalweaver'][$invoice->invoiceID]);
                                            }
                                        }

                                        $totalAmount += $amount; 
                                        $totalDue += $due; 
                                        $rand = rand(1, 999999999999999);

                                        echo '<tr id="tr_'.$rand.'">';
                                            echo '<td>';
                                                echo $i; 
                                            echo '</td>';

                                            echo '<td>';
                                                echo isset($feetypes[$invoice->feetypeID]) ? $feetypes[$invoice->feetypeID] : ''; 
                                            echo '</td>';

                                            echo '<td>';
                                                echo $amount; 
                                            echo '</td>';

                                            echo '<td id="due_'.$rand.'">';
                                                echo $due; 
                                            echo '</td>';

                                            echo '<td>';
                                                echo '<input id="paidamount_'.$rand.'" class="form-control change-paidamount '.(form_error('paidamount_'.$invoice->invoiceID) ? 'bordered-red' : '').'" type="text" name="paidamount_'.$invoice->invoiceID.'" value="'.set_value('paidamount_'.$invoice->invoiceID).'" >';
                                            echo '</td>';

                                            if($this->session->userdata('usertypeID') == 1 || $this->session->userdata('usertypeID') == 5) {
                                                echo '<td>';
                                                    echo '<input id="weaver_'.$rand.'" class="form-control change-weaver '.(form_error('weaver_'.$invoice->invoiceID) ? 'bordered-red' : '').'" type="text" name="weaver_'.$invoice->invoiceID.'" value="'.set_value('weaver_'.$invoice->invoiceID).'" >';
                                                echo '</td>';

                                                echo '<td>';
                                                    echo '<input id="fine_'.$rand.'" class="form-control change-fine '.(form_error('fine_'.$invoice->invoiceID) ? 'bordered-red' : '').'" type="text" name="fine_'.$invoice->invoiceID.'" value="'.set_value('fine_'.$invoice->invoiceID).'" >';
                                                echo '</td>';
                                            }
                                        echo '</tr>';
                                        $i++;
                                    } 
                                } 
                            ?>
                        </tbody>
                        <tfoot id="feetypeListFooter">
                            <tr>
                                <td colspan="2" style="font-weight: bold"><?=$this->lang->line('invoice_total')?></td>
                                <td id="totalAmount" style="font-weight: bold"><?=number_format($totalAmount, 2);?></td>
                                <td id="totalDue" style="font-weight: bold"><?=number_format($totalDue, 2);?></td>
                                <td id="totalPaidAmount" style="font-weight: bold">0.00</td>
                                <?php if($this->session->userdata('usertypeID') == 1 || $this->session->userdata('usertypeID') == 5) { ?>
                                    <td id="totalWeaver" style="font-weight: bold">0.00</td>
                                    <td id="totalFine" style="font-weight: bold">0.00</td>
                                <?php } ?>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
    function dd(data) {
        console.log(data);
    }

    $('.select2').select2();

    function getRandomInt() {
      return Math.floor(Math.random() * Math.floor(9999999999999999));
    }

    function toFixedVal(x) {
      if (Math.abs(x) < 1.0) {
        var e = parseFloat(x.toString().split('e-')[1]);
        if (e) {
            x *= Math.pow(10,e-1);
            x = '0.' + (new Array(e)).join('0') + x.toString().substring(2);
        }
      } else {
        var e = parseFloat(x.toString().split('+')[1]);
        if (e > 20) {
            e -= 20;
            x /= Math.pow(10,e);
            x += (new Array(e+1)).join('0');
        }
      }
      return x;
    }

    function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function dotAndNumber(data) {
        var retArray = [];
        var fltFlag = true;
        if(data.length > 0) {
            for(var i = 0; i <= (data.length-1); i++) {
                if(i == 0 && data.charAt(i) == '.') {
                    fltFlag = false;
                    retArray.push(true);
                } else {
                    if(data.charAt(i) == '.' && fltFlag == true) {
                        retArray.push(true);
                        fltFlag = false;
                    } else {
                        if(isNumeric(data.charAt(i))) {
                            retArray.push(true);
                        } else {
                            retArray.push(false);
                        }
                    }

                }
            }
        }

        if(jQuery.inArray(false, retArray) ==  -1) {
            return true;
        }
        return false;
    }

    function floatChecker(value) {
        var val = value;
        if(isNumeric(val)) {
            return true;
        } else {
            return false;
        }
    }

    function lenChecker(data, len) {
        var retdata = 0;
        var lencount = 0;
        data = toFixedVal(data);
        if(data.length > len) {
            lencount = (data.length - len);
            data = data.toString();
            data = data.slice(0, -lencount);
            retdata = parseFloat(data);
        } else {
            retdata = parseFloat(data);
        }

        return toFixedVal(retdata);
    }
    
    function parseSentenceForNumber(sentence) {
        var matches = sentence.replace(/,/g, '').match(/(\+|-)?((\d+(\.\d+)?)|(\.\d+))/);
        return matches && matches[0] || null;
    }

    function currencyConvert(data) {
        return data.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    }

    var globaltotalpaidamount = 0;
    var globaltotalweaver = 0;
    var globaltotalfine = 0;
    function totalInfo() {
        var totalPaidAmount = 0;
        var totalWeaver = 0;
        var totalFine = 0;
        
        $('#feetypeList tr').each(function(index, value) {
            if($(this).children().eq(4).children().val() != '' && $(this).children().eq(4).children().val() != null && $(this).children().eq(4).children().val() != '.') {
                var paidamount = parseFloat($(this).children().eq(4).children().val());
                totalPaidAmount += paidamount;
            }

            if($(this).children().eq(5).children().val() != '' && $(this).children().eq(5).children().val() != null && $(this).children().eq(5).children().val() != '.') {
                var weaver = parseFloat($(this).children().eq(5).children().val());
                totalWeaver += weaver;
            }

            if($(this).children().eq(6).children().val() != '' && $(this).children().eq(6).children().val() != null && $(this).children().eq(6).children().val() != '.') {
                var fine = parseFloat($(this).children().eq(6).children().val());
                totalFine += fine;
            }
        });

        globaltotalpaidamount = totalPaidAmount;
        $('#totalPaidAmount').text(currencyConvert(totalPaidAmount)); 

        globaltotalweaver = totalWeaver;
        $('#totalWeaver').text(currencyConvert(totalWeaver));

        globaltotalfine = totalFine;
        $('#totalFine').text(currencyConvert(totalFine));
    }

    $(document).on('keyup', '.change-paidamount', function() {
        var trID = $(this).parent().parent().attr('id').replace('tr_','');
        var due = $('#due_'+trID).text();
        var paidamount = $('#paidamount_'+trID).val();
        var weaver = $('#weaver_'+trID).val();

        var duestatus = false;
        var dotandnumberstatus = false;
        var paidamountstatus = false;

        if(due != '' && due != null && due > 0) {
            duestatus = true;
        }

        if(duestatus) {
            if(dotAndNumber(paidamount)) {
                dotandnumberstatus = true;
            } else {
                dotandnumberstatus = false;
                $('#paidamount_'+trID).val(parseSentenceForNumber(toFixedVal(paidamount)));
            }
        }

        if(dotandnumberstatus) {
            if(paidamount.length > 15) {
                paidamount = lenChecker(paidamount, 15);
                $('#paidamount_'+trID).val(paidamount);
                paidamountstatus = true;
            } else {
                paidamountstatus = true;
            }
        } else {
            $('#paidamount_'+trID).val('');
        }

        if(paidamountstatus) {
            if(weaver > 0) {
                weaver = parseFloat(weaver);
                paidamount = parseFloat(paidamount);
                due = parseFloat(due);
                if(weaver+paidamount > due) {
                    $('#paidamount_'+trID).val((due-weaver));
                }
            } else {
                paidamount = parseFloat(paidamount);
                due = parseFloat(due);
                if(paidamount > due) {
                    $('#paidamount_'+trID).val(due);
                }
            }

            if(parseFloat($(this).val()) == 0) {
                $('#paidamount_'+trID).val('');
            }
            totalInfo();
        }
    });

    $(document).on('keyup', '.change-weaver', function() {
        var trID = $(this).parent().parent().attr('id').replace('tr_','');
        var due = $('#due_'+trID).text();
        var paidamount = $('#paidamount_'+trID).val();
        var weaver = $('#weaver_'+trID).val();

        var duestatus = false;
        var dotandnumberstatus = false;
        var weaverstatus = false;

        if(due != '' && due != null && due > 0) {
            duestatus = true;
        }

        if(duestatus) {
            if(dotAndNumber(weaver)) {
                dotandnumberstatus = true;
            } else {
                dotandnumberstatus = false;
                $('#weaver_'+trID).val(parseSentenceForNumber(toFixedVal(weaver)));
            }
        } else {
            $('#weaver_'+trID).val('');
        }

        if(dotandnumberstatus) {
            if(weaver.length > 15) {
                weaver = lenChecker(weaver, 15);
                $('#weaver_'+trID).val(weaver);
                weaverstatus = true;
            } else {
                weaverstatus = true;
            }
        }

        if(weaverstatus) {
            if(paidamount > 0) {
                paidamount = parseFloat(paidamount);
                weaver = parseFloat(weaver);
                due = parseFloat(due);
                if(weaver+paidamount > due) {
                    $('#weaver_'+trID).val((due-paidamount));
                }
            } else {
                weaver = parseFloat(weaver);
                due = parseFloat(due);
                if(weaver > due) {
                    $('#weaver_'+trID).val(due);
                }
            }

            if(parseFloat($(this).val()) == 0) {
                $('#weaver_'+trID).val('');
            }
            totalInfo();
        }
    });

    $(document).on('keyup', '.change-fine', function() {
        var fine = $(this).val();

        var dotandnumberstatus = false;
        var finestatus = false;

        if(dotAndNumber(fine)) {
            dotandnumberstatus = true;
        } else {
            dotandnumberstatus = false;
            $(this).val(parseSentenceForNumber(toFixedVal(fine)));
        }

        if(dotandnumberstatus) {
            if(fine.length > 15) {
                fine = lenChecker(fine, 15);
                $(this).val(fine);
                finestatus = true;
            } else {
                finestatus = true;
            }

            totalInfo();
        }
    });

    totalInfo();

    window.onload = function() {
        CheckType();
    };
    function CheckType() {
        var payment_method = $('#paymentmethodID').val();

        if (payment_method=="Stripe") {
            $('#cardOption').show();
            $('#payuInputs').hide();
            $("#checkDiv").hide();
        } else if (payment_method=="Payumoney") {
            $('#payuInputs').show();
            $('#cardOption').hide();
            $("#checkDiv").hide();
        } else if (payment_method=="CCAvenue") {
			$('#payuInputs').show();
            $('#cardOption').hide();
            $("#checkDiv").hide();
        } else if(payment_method == "Cheque"){        
            $("#checkDiv").show();
            $('#cardOption').hide();
            $('#payuInputs').hide();
        }else{
            $('#cardOption').hide();
            $('#payuInputs').hide();
            $("#checkDiv").hide();
        }
    }

    $('#check_date').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate:'<?=$schoolyearsessionobj->startingdate?>',
        endDate:'<?=$schoolyearsessionobj->endingdate?>',
    });
</script>
