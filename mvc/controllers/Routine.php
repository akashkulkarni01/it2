<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routine extends Admin_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	INILABS SCHOOL MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:			INILABS TEAM
| -----------------------------------------------------
| EMAIL:			info@inilabs.net
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY INILABS IT
| -----------------------------------------------------
| WEBSITE:			http://inilabs.net
| -----------------------------------------------------
*/
	function __construct() {
		parent::__construct();
		$this->load->model("routine_m");
		$this->load->model("classes_m");
		$this->load->model("section_m");
		$this->load->model("subject_m");
		$this->load->model('parents_m');
		$this->load->model('student_m');
		$this->load->model('teacher_m');
		$this->load->model('schoolyear_m');
		$this->load->model('subjectteacher_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('routine', $language);
	}

	public function index() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css',
				'assets/custom-scrollbar/jquery.mCustomScrollbar.css',
                                'assets/datepicker/datepickerroutine.css'
			),
			'js' => array(
				'assets/select2/select2.js',
				'assets/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js',
                                'assets/datepicker/datepickerroutine.js'
			)
		);

		if($this->session->userdata('usertypeID') == 3) {
			$id = $this->data['myclass'];
		} else {
			$id = htmlentities(escapeString($this->uri->segment(3)));
                        $fromDate = htmlentities(escapeString($this->uri->segment(4)));
                        $toDate = htmlentities(escapeString($this->uri->segment(5)));
		}
		
		$schoolyearID = $this->session->userdata('defaultschoolyearID');
		if((int)$id) {
                        
			$this->data['set'] = $id;
			$this->data['classes'] = $this->classes_m->get_classes();
			$this->data['routines'] = $this->routine_m->get_routine_with_teacher_class_section_subject(array('classesID' => $id, 'schoolyearID' => $schoolyearID),$fromDate,$toDate);

			$fetchClass = pluck($this->data['classes'], 'classesID', 'classesID');
			if(isset($fetchClass[$id])) {
				if($this->data['routines']) {
					$sections = $this->section_m->general_get_order_by_section(array("classesID" => $id));
					$this->data['sections'] = $sections;
					foreach ($sections as $key => $section) {
						$this->data['allsection'][$section->section] = $this->routine_m->get_routine_with_teacher_class_section_subject(array('classesID' => $id, 'sectionID' => $section->sectionID, 'schoolyearID' => $schoolyearID),$fromDate,$toDate);
					}
				} else {
					$this->data['routines'] = [];
				}

                                if(empty($this->data['routines'])){
                                   echo '<script type="text/javascript">alert("No record found")</script>';
                                 }
				$this->data["subview"] = "routine/index";
				$this->load->view('_layout_main', $this->data);
			} else {
				$this->data['set'] = 0;
				$this->data['routines'] = [];
				$this->data['classes'] = $this->classes_m->get_classes();
				$this->data["subview"] = "routine/index";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data['set'] = 0;
			$this->data['routines'] = [];
			$this->data['classes'] = $this->classes_m->get_classes();
			$this->data["subview"] = "routine/index";
			$this->load->view('_layout_main', $this->data);
		}
	}
	
	protected function rules() {
		$rules = array(
				array(
					'field' => 'schoolyearID', 
					'label' => $this->lang->line("routine_schoolyear"), 
					'rules' => 'trim|required|xss_clean|numeric|max_length[11]|callback_unique_data'
				),
				array(
					'field' => 'classesID', 
					'label' => $this->lang->line("routine_classes"), 
					'rules' => 'trim|required|xss_clean|numeric|max_length[11]|callback_unique_data'
				),
				array(
					'field' => 'sectionID', 
					'label' => $this->lang->line("routine_section"), 
					'rules' => 'trim|required|xss_clean|numeric|max_length[11]|callback_unique_data|callback_unique_section'
				),
				array(
					'field' => 'subjectID', 
					'label' => $this->lang->line("routine_subject"), 
					'rules' => 'trim|required|xss_clean|numeric|max_length[11]|callback_unique_data'
				),
				array(
					'field' => 'teacherID', 
					'label' => $this->lang->line("routine_teacher"), 
					'rules' => 'trim|required|xss_clean|numeric|max_length[11]|callback_unique_data|callback_unique_teacher'
				),
				array(
					'field' => 'day',
					'label' => $this->lang->line("routine_day"), 
					'rules' => 'trim|required|xss_clean|max_length[60]|callback_unique_day'
				),
				array(
					'field' => 'start_time', 
					'label' => $this->lang->line("routine_start_time"), 
					'rules' => 'trim|required|xss_clean|max_length[10]'
				),
				array(
					'field' => 'end_time', 
					'label' => $this->lang->line("routine_end_time"), 
					'rules' => 'trim|required|xss_clean|max_length[10]|callback_validate_time'
				),
				array(
					'field' => 'room', 
					'label' => $this->lang->line("routine_room"), 
					'rules' => 'trim|required|xss_clean|max_length[11]|callback_unique_room'
				)
			);
		return $rules;
	}

	public function add() {
		$this->data['headerassets'] = 
                    array('css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css',
				'assets/custom-scrollbar/jquery.mCustomScrollbar.css',
                                'assets/datepicker/datepicker.css',
                                'assets/timepicker/timepicker.css',

			),
			'js' => array(
				'assets/select2/select2.js',
				'assets/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js',
                                'assets/datepicker/datepickerroutine.js',
                                'assets/timepicker/timepicker.js'
			)
		);
		
		$this->data['schoolyears'] = $this->schoolyear_m->get_schoolyear();
		$this->data['classes'] = $this->classes_m->get_classes();
		$classesID = $this->input->post("classesID");

		if($classesID > 0) {
			$this->data['subjects'] = $this->subject_m->get_order_by_subject(array('classesID' =>$classesID));
			$this->data['sections'] = $this->section_m->get_order_by_section(array("classesID" => $classesID));
			if($this->input->post('subjectID') > 0) {
				$this->data['teachers'] = $this->subjectteacher_m->get_subjectteacher_with_teacher($this->input->post('subjectID'));
			}
		} else {
			$this->data['subjects'] = [];
			$this->data['sections'] = [];
			$this->data['teachers'] = [];
		}
		
		// 12-hour time to 24-hour time 
		$starttime = $this->input->post('start_time');
		$start24 = date("H:i", strtotime($starttime));

		// 12-hour time to 24-hour time 
		$endtime = $this->input->post('end_time');
		$end24  = date("H:i", strtotime($endtime));		

		//Date convertion on yyyy-mm-dd
		$date1 = $this->input->post('date');
		$date = date("Y-m-d", strtotime($date1));

		//print_r($date);
		//die();

		if($_POST) {
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data['form_validation'] = validation_errors(); 
				$this->data["subview"] = "routine/add";
				$this->load->view('_layout_main', $this->data);			
			} else {
				$array = array(
					"classesID" 	=> $this->input->post("classesID"),
					"sectionID" 	=> $this->input->post("sectionID"),
					"subjectID"	 	=> $this->input->post("subjectID"),
					'schoolyearID' 	=> $this->input->post('schoolyearID'),
 					"day" 			=> $this->input->post("day"),
 					'teacherID' 	=> $this->input->post('teacherID'),
					"start_time" 	=> $start24,
					"end_time" 		=> $end24,
					"room" 			=> $this->input->post("room"),
                    "date" 			=> $date

				);
				$this->routine_m->insert_routine($array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("routine/index"));
			}
		} else {
			$this->data["subview"] = "routine/add";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function edit() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css',
				'assets/timepicker/timepicker.css',
                                'assets/datepicker/datepicker.css'
			),
			'js' => array(
				'assets/select2/select2.js',
				'assets/timepicker/timepicker.js',
                                'assets/datepicker/datepickerroutine.js'
			)
		);

		$id = htmlentities(escapeString($this->uri->segment(3)));
		$url = htmlentities(escapeString($this->uri->segment(4)));
		if((int)$id && (int)$url) {
			if(($this->data['siteinfos']->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1)) {
				$schoolyearID = $this->session->userdata('defaultschoolyearID');
				$this->data['routine'] = $this->routine_m->get_single_routine(array('routineID' => $id, 'classesID' => $url, 'schoolyearID' => $schoolyearID));
				if(count($this->data['routine'])) {
					if($this->input->post('classesID') > 0) {
						$classID = $this->input->post('classesID');
						$subjectID = $this->input->post('subjectID');
	 				} else {
						$classID = $this->data['routine']->classesID;
						$subjectID = $this->data['routine']->subjectID;
					}

					$this->data['classes'] = $this->classes_m->get_classes();
					$this->data['schoolyears'] = $this->schoolyear_m->get_schoolyear();
					$this->data['sections'] = $this->section_m->general_get_order_by_section(array("classesID" => $classID));
					$this->data['subjects'] = $this->subject_m->general_get_order_by_subject(array('classesID' => $classID));
					$this->data['teachers'] = $this->subjectteacher_m->get_subjectteacher_with_teacher($subjectID);
					$this->data['set'] = $url;
					$fetchClass = pluck($this->data['classes'], 'classesID', 'classesID');

					// 12-hour time to 24-hour time 
					$starttime = $this->input->post('start_time');
					$start24 = date("H:i", strtotime($starttime));

					// 12-hour time to 24-hour time 
					$endtime = $this->input->post('end_time');
					$end24  = date("H:i", strtotime($endtime));

					if(isset($fetchClass[$url])) {
						if($_POST) {
							$rules = $this->rules();
							$this->form_validation->set_rules($rules);
							if ($this->form_validation->run() == FALSE) {
								$this->data["subview"] = "routine/edit";
								$this->load->view('_layout_main', $this->data);			
							} else {
								$array = array(
									"classesID" 	=> $this->input->post("classesID"),
									"sectionID" 	=> $this->input->post("sectionID"),
									"subjectID"	 	=> $this->input->post("subjectID"),
									'schoolyearID' 	=> $this->input->post('schoolyearID'),
									"day" 			=> $this->input->post("day"),
									'teacherID' 	=> $this->input->post('teacherID'),
									"start_time" 	=> $start24,
									"end_time" 		=> $end24,
									"room" 			=> $this->input->post("room"),
									"date" 			=> $this->input->post("date")
								);

								$this->routine_m->update_routine($array, $id);
								$this->session->set_flashdata('success', $this->lang->line('menu_success'));
								redirect(base_url("routine/index/$url"));
							}
						} else {
							$this->data["subview"] = "routine/edit";
							$this->load->view('_layout_main', $this->data);
						}
					} else {
						$this->data["subview"] = "error";
						$this->load->view('_layout_main', $this->data);	
					}
				} else {
					$this->data["subview"] = "error";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}	
	}

	public function delete() {
		$routineID = htmlentities(escapeString($this->uri->segment(3)));
		$classesID = htmlentities(escapeString($this->uri->segment(4)));
		if((int)$routineID && (int)$classesID) {
			if(($this->data['siteinfos']->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1)) {
				$schoolyearID = $this->session->userdata('defaultschoolyearID');
				$fetchClass = pluck($this->classes_m->get_classes(), 'classesID', 'classesID');
				if(isset($fetchClass[$classesID])) {
					$routine = $this->routine_m->get_order_by_routine(array('routineID' => $routineID, 'classesID' => $classesID, 'schoolyearID' => $schoolyearID));
					if(count($routine)) {
						$this->routine_m->delete_routine($routineID);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("routine/index/$classesID"));
					} else {
						redirect(base_url("routine/index"));
					}
				} else {
					redirect(base_url("routine/index"));
				}
			} else {
				redirect(base_url('routine/index'));
			}
		} else {
			redirect(base_url("routine/index"));
		}
	}

	
	public function routine_list() {
		$classID = $this->input->post('id');
                $fromDate = $this->input->post('fromDate');
                $toDate = $this->input->post('toDate');
       		if((int)$classID) {
			$string = base_url("routine/index/$classID/$fromDate/$toDate");
			echo $string;
		} else {
			redirect(base_url("routine/index"));
		}
	}

	public function unique_teacher() {

		$id = htmlentities(escapeString($this->uri->segment(3)));

		// 12-hour time to 24-hour time 
		$starttime = $this->input->post('start_time');
		$start24 = date("H:i", strtotime($starttime));

		// 12-hour time to 24-hour time 
		$endtime = $this->input->post('end_time');
		$end24  = date("H:i", strtotime($endtime));

		//Date convertion on yyyy-mm-dd
		$date1 = $this->input->post('date');
		$date = date("Y-m-d", strtotime($date1));

		if((int)$id) {
			$routine = $this->routine_m->get_order_by_teacher(array('day' => $this->input->post('day'), 'start_time' => $start24, 'end_time' => $end24, 'schoolyearID' => $this->input->post('schoolyearID'), 'teacherID' => $this->input->post('teacherID'), 'date' => $date, 'classesID' => $this->input->post('classesID'), 'routineID !=' => $id));
			if(count($routine)) {
				$this->form_validation->set_message("unique_teacher", "%s already assign another schedule in this time.");
				return FALSE;
			}
			return TRUE;

		} else {

			$routine = $this->routine_m->get_order_by_teacher(array('day' => $this->input->post('day'), 'start_time' => $start24, 'end_time' => $end24, 'teacherID' => $this->input->post('teacherID'), 'schoolyearID' => $this->input->post('schoolyearID'), 'date' => $date, 'classesID' => $this->input->post('classesID')));
			if(count($routine)) {
				$this->form_validation->set_message("unique_teacher", "%s already assign another schedule in this time.");
				return FALSE;
			}
			return TRUE;
		}
	}

	public function unique_data($data) {
		if($data == 0) {
			$this->form_validation->set_message("unique_data", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	public function teachercall() {
		$subjectID = $this->input->post('subjectID');
		echo "<option value='0'>", $this->lang->line("routine_select_teacher"),"</option>";
		if((int)$subjectID) {
			$teachers = $this->subjectteacher_m->get_subjectteacher_with_teacher($subjectID);
			if(count($teachers)) {
				foreach ($teachers as $teacher) {
					echo "<option value=\"$teacher->teacherID\">",$teacher->name,"</option>";
				}
			}
		}
	}

	public function subjectcall() {
		$classID = $this->input->post('id');
		if((int)$classID) {
			$allclasses = $this->subject_m->general_get_order_by_subject(array('classesID' => $classID));
			echo "<option value='0'>", $this->lang->line("routine_subject_select"),"</option>";
			foreach ($allclasses as $value) {
				echo "<option value=\"$value->subjectID\">",$value->subject,"</option>";
			}
		} 
	}

	public function sectioncall() {
		$classID = $this->input->post('id');
		if((int)$classID) {
			$allsection = $this->section_m->general_get_order_by_section(array('classesID' => $classID));
			echo "<option value='0'>", $this->lang->line("routine_select_section"),"</option>";
			foreach ($allsection as $value) {
				echo "<option value=\"$value->sectionID\">",$value->section,"</option>";
			}
		} 
	}

	public function unique_room() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$routine = $this->routine_m->get_order_by_routine(array('classesID' => $this->input->post('classesID'), 'day' => $this->input->post('day'), 'start_time' => $this->input->post('start_time'), 'end_time' => $this->input->post('end_time'), 'room' => $this->input->post('room'), 'schoolyearID' => $this->input->post('schoolyearID'), 'routineID !=' => $id ));
			if(count($routine)) {
				$this->form_validation->set_message("unique_room", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$routine = $this->routine_m->get_order_by_routine(array('classesID' => $this->input->post('classesID'), 'day' => $this->input->post('day'), 'start_time' => $this->input->post('start_time'), 'end_time' => $this->input->post('end_time'), 'room' => $this->input->post('room'), 'schoolyearID' => $this->input->post('schoolyearID')));
			if(count($routine)) {
				$this->form_validation->set_message("unique_room", "%s already exists");
				return FALSE;
			}
			return TRUE;
		}
	}

	public function unique_section() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$routine = $this->routine_m->get_order_by_routine(array('classesID' => $this->input->post('classesID'), 'day' => $this->input->post('day'), 'start_time' => $this->input->post('start_time'), 'end_time' => $this->input->post('end_time'), 'sectionID' => $this->input->post('sectionID'), 'schoolyearID' => $this->input->post('schoolyearID'), 'routineID !=' => $id ));
			if(count($routine)) {
				$this->form_validation->set_message("unique_section", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$routine = $this->routine_m->get_order_by_routine(array('classesID' => $this->input->post('classesID'), 'day' => $this->input->post('day'), 'start_time' => $this->input->post('start_time'), 'end_time' => $this->input->post('end_time'), 'sectionID' => $this->input->post('sectionID'), 'schoolyearID' => $this->input->post('schoolyearID')));
			if(count($routine)) {
				$this->form_validation->set_message("unique_section", "%s already exists");
				return FALSE;
			}
			return TRUE;
		}
	}

	public function unique_day() {
		$day = $this->input->post('day');
		if($day == '0') {
			$this->form_validation->set_message("unique_day", "The %s field is required.");
			return FALSE;
		}
		return TRUE;
	}

       public function validate_time(){

           $x = substr_replace($this->input->post('start_time'),"",-3);
           $starttime = str_replace(':', '', $x);

           $y =   substr_replace($this->input->post('end_time'),"",-3);
           $endtime = str_replace(':', '', $y);
          
        //    if($starttime>$endtime){
        //      $this->form_validation->set_message("validate_time", "Start time must be less then end time");
        //      return FALSE;
        //     }

            
           if($starttime == $endtime){
             $this->form_validation->set_message("validate_time", "Start and end time cannot be same");
             return FALSE;
            }

                $teacherID = $this->input->post('teacherID');
                $date      = $this->input->post("date");

                if($teacherID!="" && $date!=""){

                $routines = $this->routine_m->get_routines($teacherID,$date);

                foreach ($routines as $key => $routine) {

                  $a = substr_replace($routine->start_time,"",-3);
                  $b = substr_replace($routine->end_time,"",-3);

                  $st_time = str_replace(':','',$a);
                  $en_time = str_replace(':','',$b);


                   if(($starttime == $st_time && $endtime == $en_time)){
                        $this->form_validation->set_message("validate_time", "Teacher is busy  this time");
                       return FALSE;
                   }
                  
               

                 }

                }

            return TRUE;
       }
}