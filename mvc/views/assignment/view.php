
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-assignment"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("assignment/index/".$viewclass)?>"></i> <?=$this->lang->line('menu_assignment')?></a></li>
            <li class="active">
            	<?=$this->lang->line('menu_assignment').' '.$this->lang->line('assignment_ans_list')?>
            </li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
        	<div class="col-lg-12">
				<div id="hide-table">
	                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
	                    <thead>
	                        <tr>
	                            <th><?=$this->lang->line('slno')?></th>
	                            <th><?=$this->lang->line('assignment_photo')?></th>
	                            <th><?=$this->lang->line('assignment_student')?></th>
	                            <th><?=$this->lang->line('assignment_roll')?></th>
	                            <th><?=$this->lang->line('assignment_section')?></th>
	                            <th><?=$this->lang->line('assignment_submission')?></th>
	                            <th><?=$this->lang->line('action')?></th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php if(count($assignmentanswers)) {$i = 1; foreach($assignmentanswers as $assignmentanswer) { ?>
	                            <tr>
	                                <td data-title="<?=$this->lang->line('slno')?>">
	                                    <?=$i?>
	                                </td>
	                                <td data-title="<?=$this->lang->line('assignment_photo')?>">
	                                    <?=profileimage($assignmentanswer->photo)?>
	                                </td>
	                                <td data-title="<?=$this->lang->line('assignment_student')?>">
	                                    <?=$assignmentanswer->srname?>
	                                </td>
	                                <td data-title="<?=$this->lang->line('assignment_roll')?>">
	                                    <?=$assignmentanswer->srroll?>
	                                </td>
	                                <td data-title="<?=$this->lang->line('assignment_section')?>">
	                                    <?=$assignmentanswer->section?>
	                                </td>
	                                <td data-title="<?=$this->lang->line('assignment_submission')?>">
	                                    <?=date('d M Y', strtotime($assignmentanswer->answerdate))?>
	                                </td>
	                                <td data-title="<?=$this->lang->line('action')?>">
	                                    <?=btn_download('assignment/answerdownload/'.$assignmentanswer->assignmentanswerID, $this->lang->line('download'))?>
	                                </td>
	                            </tr>
	                        <?php $i++; }} ?>
	                    </tbody>
	                </table>
	            </div>
        	</div>
        </div>
    </div>
</div>
