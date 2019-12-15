<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preadmission extends Admin_Controller {
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
        $this->load->model("preadmission_m");
        $this->load->model("student_m");
		$this->load->model("parents_m");
		$this->load->model("section_m");
		$this->load->model("classes_m");
		$this->load->model("setting_m");
		$this->load->model('studentrelation_m');
		$this->load->model('studentgroup_m');
		$this->load->model('studentextend_m');
		$this->load->model('subject_m');
		$this->load->model('routine_m');
		$this->load->model('teacher_m');
		$this->load->model('subjectattendance_m');
		$this->load->model('sattendance_m');
		$this->load->model('invoice_m');
		$this->load->model('payment_m');
		$this->load->model('weaverandfine_m');
		$this->load->model('feetypes_m');
		$this->load->model('exam_m');
		$this->load->model('grade_m');
		$this->load->model('markpercentage_m');
		$this->load->model('markrelation_m');
		$this->load->model('mark_m');
		$this->load->model('document_m');
		$this->load->model('leaveapplication_m');

		$this->load->model('studentrelation_m');
		$this->load->model('studentgroup_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('preadmission', $language);	
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'prospectus_no', 
				'rules' => 'trim|required|max_length[12]'
			), 
			array(
				'field' => 'pre_admission_date', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'student_name', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'father_name', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'mother_name', 
				'rules' => 'trim|required|xss_clean|max_length[10]'
			), 
			array(
				'field' => 'address', 
				'rules' => 'trim|required|xss_clean'
            ), 
			array(
				'field' => 'nationality', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'religion', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'city', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'state', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'pincode', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'gender', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'dob', 
				'rules' => 'trim|required'
            ), 
			array(
				'field' => 'birth_place', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'category', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'fee_category', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'source', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'marks_score', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'curriculum_followed', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'personal_contact', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'land_line', 
				'rules' => 'trim'
            ), 
			array(
				'field' => 'father_mobile', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'mother_mobile', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'email_id', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'reference', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'previous_school', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'class_year', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'remark', 
				'rules' => 'trim'
            ), 
			array(
				'field' => 'class', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'subject', 
				'rules' => 'trim'
            ),
            array(
                'field' => 'optionalSubjectID',
                'rules' => 'trim|max_length[11]|xss_clean|numeric'
            ),
		);
		return $rules;
	}

	public function index() { 
		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		$this->data['set'] = $id;
		if($id == '') {
			$this->data['preadmission'] = $this->preadmission_m->get_preadmission();
			$this->data['set'] = $this->data['siteinfos']->school_type;
			$this->data["subview"] = "preadmission/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}	
	}

	public function preadmission_list() {
		$preadmissionId = $this->input->post('preadmissionId');
		if($preadmissionId) {
			$string = base_url("preadmission/index/$preadmissionId");
			echo $string;
		} else {
			redirect(base_url("preadmission/index"));
		}
	}

	public function add() {
		
		$this->data['headerassets'] = array(
			'css' => array(
                'assets/timepicker/timepicker.css',
                'assets/datepicker/datepicker.css'
			),
			'js' => array(
                'assets/timepicker/timepicker.js',
                'assets/datepicker/datepicker.js'
			)
        );
        
        $this->data['parents'] = $this->parents_m->get_parents();
        $this->data['classes'] = $this->classes_m->get_classes();
        $this->data['sections'] = $this->section_m->general_get_section();
        $this->data['studentgroups'] = $this->studentgroup_m->get_studentgroup();

        $classesID = $this->input->post("class");

        if($classesID > 0) {
            $this->data['sections'] = $this->section_m->general_get_order_by_section(array("classesID" =>$classesID));
            $this->data['optionalSubjects'] = $this->subject_m->general_get_order_by_subject(array("classesID" =>$classesID, 'type' => 0));
        } else {
            $this->data['sections'] = [];
            $this->data['optionalSubjects'] = [];
        }

        if($this->input->post('optionalSubjectID')) {
            $this->data['optionalSubjectID'] = $this->input->post('optionalSubjectID');
        } else {
            $this->data['optionalSubjectID'] = 0;
        }


		if($_POST) {

			$rules = $this->rules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() == FALSE) { 
				$this->data["subview"] = "preadmission/add";
				$this->load->view('_layout_main', $this->data);			
			} else {
				$array = array(
					"prospectus_no" => $this->input->post('prospectus_no'),
					"pre_admission_date"  => $this->input->post("pre_admission_date"),
					"student_name" 	  => $this->input->post("student_name"),
					"father_name" 	  => $this->input->post("father_name"),
					"mother_name" 	  => $this->input->post("mother_name"),
					"address" 	  => $this->input->post("address"),
					"nationality" 	  => $this->input->post("nationality"),
					"religion" 	  => $this->input->post("religion"),
					"city" 	  => $this->input->post("city"),
					"state" 	  => $this->input->post("state"),
					"pincode" 	  => $this->input->post("pincode"),
					"gender" 	  => $this->input->post("gender"),
					"dob" 	  => $this->input->post("dob"),
                    "birth_place" 	  => $this->input->post("birth_place"),
                    "category" 	  => $this->input->post("category"),
                    "fee_category" 	  => $this->input->post("fee_category"),
                    "source" 	  => $this->input->post("source"),
                    "marks_score" 	  => $this->input->post("marks_score"),
                    "curriculum_followed" 	  => $this->input->post("curriculum_followed"),
                    "personal_contact" 	  => $this->input->post("personal_contact"),
                    "land_line" 	  => $this->input->post("land_line"),
                    "father_mobile" 	  => $this->input->post("father_mobile"),
                    "mother_mobile" 	  => $this->input->post("mother_mobile"),
                    "email_id" 	  => $this->input->post("email_id"),
                    "reference" 	  => $this->input->post("reference"),
                    "previous_school" 	  => $this->input->post("previous_school"),
                    "class_year" 	  => $this->input->post("class_year"),
                    "remark" 	  => $this->input->post("remark"),
                    "class" 	  => $this->input->post("class"),
					"subject" 	  => $this->input->post("subject"),
					"active" 	  => 1
				);

				$this->preadmission_m->insert_preadmission($array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("preadmission/index"));
			}
		} else {
			$this->data["subview"] = "preadmission/add";
			$this->load->view('_layout_main', $this->data);
		}	
	}

	public function edit() {

		$this->data['headerassets'] = array(
			'css' => array(
				'assets/timepicker/timepicker.css'
			),
			'js' => array(
				'assets/timepicker/timepicker.js'
			)
		);

		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$this->data['preadmission'] = $this->preadmission_m->get_preadmission($id);
			if($this->data['preadmission']) {
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["subview"] = "preadmission/edit";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$array = array(
							"preadmission_title" => $this->input->post('preadmission_title'),
							"start_time"  => $this->input->post("start_time"),
							"end_time" 	  => $this->input->post("end_time"),
							"short_name" 	  => $this->input->post("short_name"),
							"brk1_starttime" 	  => $this->input->post("brk1_starttime"),
							"brk1_endtime" 	  => $this->input->post("brk1_endtime"),
							"brk2_starttime" 	  => $this->input->post("brk2_starttime"),
							"brk2_endtime" 	  => $this->input->post("brk2_endtime"),
							"punch_before" 	  => $this->input->post("punch_before"),
							"punch_after" 	  => $this->input->post("punch_after"),
							"grace_time" 	  => $this->input->post("grace_time"),
							"partial_day" 	  => $this->input->post("partial_day"),
							"p_begins" 	  => $this->input->post("p_begins"),
							"p_end" 	  => $this->input->post("p_end"),
						);

						
						$this->preadmission_m->update_preadmission($array, $id);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("preadmission/index"));
					}
				} else {
					$this->data["subview"] = "preadmission/edit";
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
		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$preadmissionid = $this->preadmission_m->get_preadmission1($id);
			if($preadmissionid) {
				if($preadmissionid->preadmissionId != 1) {
					$this->preadmission_m->delete_preadmission($id);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("preadmission/index"));
				} else {
					redirect(base_url("preadmission/index"));
				}
			} else {
				redirect(base_url("preadmission/index"));
			}
		} else {
			redirect(base_url("preadmission/index"));
		}
	}


	public function view(){
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/timepicker/timepicker.css'
			),
			'js' => array(
				'assets/timepicker/timepicker.js'
			)
		);

		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$this->data['preadmission'] = $this->preadmission_m->get_preadmission($id);
			if($this->data['preadmission']) {
				$this->data["subview"] = "preadmission/view";
				$this->load->view('_layout_main', $this->data);
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

    public function validate_time(){

        $x = substr_replace($this->input->post('start_time'),"",-3);
        $starttime = str_replace(':', '', $x);

        $y =   substr_replace($this->input->post('end_time'),"",-3);
        $endtime = str_replace(':', '', $y);
         
        if($starttime == $endtime){
          $this->form_validation->set_message("validate_time", "Start and end time cannot be same");
          return FALSE;
        }

         return TRUE;
    }


    public function followup() {
           $this->data["subview"] = "followup/edit";
					$this->load->view('_layout_main', $this->data);
    }

	

}

/* End of file class.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/class.php */