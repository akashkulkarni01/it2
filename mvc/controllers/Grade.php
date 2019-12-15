<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grade extends Admin_Controller {
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
		$this->load->model("grade_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('grade', $language);	
	}

	public function index() {
		$this->data['grades'] = $this->grade_m->get_order_by_grade();
		$this->data["subview"] = "grade/index";
		$this->load->view('_layout_main', $this->data);
	}

	protected function rules() {
		$rules = array(
				array(
					'field' => 'grade', 
					'label' => $this->lang->line("grade_name"), 
					'rules' => 'trim|required|xss_clean|max_length[60]|callback_unique_grade'
				), 
				array(
					'field' => 'point', 
					'label' => $this->lang->line("grade_point"),
					'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_unique_point'
				), 
				array(
					'field' => 'gradefrom', 
					'label' => $this->lang->line("grade_gradefrom"),
					'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_unique_gradefrom|callback_gradefrom_grater'
				),
				array(
					'field' => 'gradeupto', 
					'label' => $this->lang->line("grade_gradeupto"),
					'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_unique_gradeupto|callback_gradeupto_grater'
				), 
				array(
					'field' => 'note', 
					'label' => $this->lang->line("grade_note"), 
					'rules' => 'trim|max_length[200]|xss_clean'
				)
			);
		return $rules;
	}

	public function add() {
		if($_POST) {
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data["subview"] = "grade/add";
				$this->load->view('_layout_main', $this->data);			
			} else {
				$array = array(
					"grade" => $this->input->post("grade"),
					"point" => $this->input->post("point"),
					"gradefrom" => $this->input->post("gradefrom"),
					"gradeupto" => $this->input->post("gradeupto"),
					"note" => $this->input->post("note")
				);

				$this->grade_m->insert_grade($array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("grade/index"));
			}
		} else {
			$this->data["subview"] = "grade/add";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function edit() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$this->data['grade'] = $this->grade_m->get_grade($id);
			if($this->data['grade']) {
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["subview"] = "grade/edit";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$array = array(
							"grade" => $this->input->post("grade"),
							"point" => $this->input->post("point"),
							"gradefrom" => $this->input->post("gradefrom"),
							"gradeupto" => $this->input->post("gradeupto"),
							"note" => $this->input->post("note")
						);

						$this->grade_m->update_grade($array, $id);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("grade/index"));
					}
				} else {
					$this->data["subview"] = "grade/edit";
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
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$this->grade_m->delete_grade($id);
			$this->session->set_flashdata('success', $this->lang->line('menu_success'));
			redirect(base_url("grade/index"));
		} else {
			redirect(base_url("grade/index"));
		}	
	}

	public function unique_grade() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$grade = $this->grade_m->get_order_by_grade(array("grade" => $this->input->post("grade"), "gradeID !=" => $id));
			if(count($grade)) {
				$this->form_validation->set_message("unique_grade", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$grade = $this->grade_m->get_order_by_grade(array("grade" => $this->input->post("grade")));

			if(count($grade)) {
				$this->form_validation->set_message("unique_grade", "%s already exists");
				return FALSE;
			}
			return TRUE;
		}	
	}

	public function unique_point() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$grade = $this->grade_m->get_order_by_grade(array("point" => $this->input->post("point"), "gradeID !=" => $id));
			if(count($grade)) {
				$this->form_validation->set_message("unique_point", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$grade = $this->grade_m->get_order_by_grade(array("point" => $this->input->post("point")));

			if(count($grade)) {
				$this->form_validation->set_message("unique_point", "%s already exists");
				return FALSE;
			}
			return TRUE;
		}	
	}

	public function unique_gradefrom() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			if($this->input->post("gradefrom") != '') {
				$grade = $this->grade_m->get_order_by_grade(array("gradefrom" => $this->input->post("gradefrom"), "gradeID !=" => $id));
				if(count($grade)) {
					$this->form_validation->set_message("unique_gradefrom", "%s already exists");
					return FALSE;
				}
				return TRUE;
			} else {
				$this->form_validation->set_message("unique_gradefrom", "The %s field is required.");
				return FALSE;
			}
		} else {
			if($this->input->post("gradefrom") != '') {
				$grade = $this->grade_m->get_order_by_grade(array("gradefrom" => $this->input->post("gradefrom")));
				if(count($grade)) {
					$this->form_validation->set_message("unique_gradefrom", "%s already exists");
					return FALSE;
				}
				return TRUE;
			} else {
				$this->form_validation->set_message("unique_gradefrom", "The %s field is required.");
				return FALSE;
			}
		}	
	}

	public function unique_gradeupto() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			if($this->input->post("gradeupto") != '') {
				$grade = $this->grade_m->get_order_by_grade(array("gradeupto" => $this->input->post("gradeupto"), "gradeID !=" => $id));
				if(count($grade)) {
					$this->form_validation->set_message("unique_gradeupto", "%s already exists");
					return FALSE;
				}
				return TRUE;
			} else {
				$this->form_validation->set_message("unique_gradeupto", "The %s field is required.");
				return FALSE;
			}
		} else {
			if($this->input->post("gradeupto") != '') {
				$grade = $this->grade_m->get_order_by_grade(array("gradeupto" => $this->input->post("gradeupto")));
				if(count($grade)) {
					$this->form_validation->set_message("unique_gradeupto", "%s already exists");
					return FALSE;
				}
				return TRUE;
			} else {
				$this->form_validation->set_message("unique_gradeupto", "The %s field is required.");
				return FALSE;
			}
		}	
	}

	public function gradefrom_grater() {
		if($this->input->post("gradefrom") != '' && $this->input->post("gradeupto") != '') {
			if($this->input->post("gradefrom") > $this->input->post("gradeupto")) {
				$this->form_validation->set_message("gradefrom_grater", "The %s field can not bigger to mark upto field.");
				return FALSE;
			}
		}
		return TRUE;
	}

	public function gradeupto_grater() {
		if($this->input->post("gradefrom") != '' && $this->input->post("gradeupto") != '') {
			if($this->input->post("gradefrom") > $this->input->post("gradeupto")) {
				$this->form_validation->set_message("gradeupto_grater", "The %s field can not smallest to mark from field.");
				return FALSE;
			}
		}
		return TRUE;
	}
}

/* End of file grade.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/grade.php */