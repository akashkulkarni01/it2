<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section extends Admin_Controller {
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
		$this->load->model("section_m");
		$this->load->model('classes_m');
		$this->load->model('teacher_m');
		$this->load->model('studentrelation_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('section', $language);
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'section',
				'label' => $this->lang->line("section_name"),
				'rules' => 'trim|required|xss_clean|max_length[60]|callback_unique_section'
			),
			array(
				'field' => 'category',
				'label' => $this->lang->line("section_category"),
				'rules' => 'trim|required|max_length[128]|xss_clean'
			),
			array(
				'field' => 'capacity',
				'label' => $this->lang->line("section_capacity"),
				'rules' => 'trim|required|max_length[11]|xss_clean|numeric|callback_valid_number'
			),
			array(
				'field' => 'classesID',
				'label' => $this->lang->line("section_classes"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_unique_classes'
			),
			array(
				'field' => 'teacherID',
				'label' => $this->lang->line("section_teacher_name"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_unique_teacher'
			),
			array(
				'field' => 'note',
				'label' => $this->lang->line("section_note"),
				'rules' => 'trim|max_length[200]|xss_clean'
			)
		);
		return $rules;
	}

	public function index() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/select2/select2.js'
			)
		);

		if($this->session->userdata('usertypeID') == 3) {
			$id = $this->data['myclass'];
		} else {
			$id = htmlentities(escapeString($this->uri->segment(3)));
		}

		if((int)$id) {
			$this->data['set'] = $id;
			$this->data['classes'] = $this->classes_m->get_classes();
			$fetchClass = pluck($this->data['classes'], 'classesID', 'classesID');
			if(isset($fetchClass[$id])) {
				$this->data['teachers'] = pluck($this->teacher_m->general_get_teacher(), 'name', 'teacherID');
				$this->data['sections'] = $this->section_m->general_get_order_by_section(array('classesID' => $id));
			} else {
				$this->data['teacher'] = [];
				$this->data['sections'] = [];
			}
			$this->data["subview"] = "section/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data['set'] = 0;
			$this->data['classes'] = $this->classes_m->get_classes();
			$this->data['sections'] = [];
			$this->data["subview"] = "section/index";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function add() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/select2/select2.js'
			)
		);
		$this->data['classes'] = $this->classes_m->get_classes();
		$this->data['teachers'] = $this->teacher_m->general_get_teacher();
		if($_POST) {
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data["subview"] = "section/add";
				$this->load->view('_layout_main', $this->data);
			} else {
				$array = array(
					"section" => $this->input->post("section"),
					"category" => $this->input->post("category"),
					"capacity" => $this->input->post("capacity"),
					"classesID" => $this->input->post("classesID"),
					"teacherID" => $this->input->post("teacherID"),
					"note" => $this->input->post("note"),
					"create_date" => date("Y-m-d h:i:s"),
					"modify_date" => date("Y-m-d h:i:s"),
					"create_userID" => $this->session->userdata('loginuserID'),
					"create_username" => $this->session->userdata('username'),
					"create_usertype" => $this->session->userdata('usertype')
				);

				$this->section_m->insert_section($array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("section/index/".$this->input->post('classesID')));
			}
		} else {
			$this->data["subview"] = "section/add";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function edit() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/select2/select2.js'
			)
		);

		$id = htmlentities(escapeString($this->uri->segment(3)));
		$url = htmlentities(escapeString($this->uri->segment(4)));
		if((int)$id && (int)$url) {
			$this->data['teachers'] = $this->teacher_m->general_get_teacher();
			$this->data['classes'] = $this->classes_m->get_classes();
			$this->data['section'] = $this->section_m->general_get_single_section(array('sectionID' => $id, 'classesID' => $url));
			$fetchClass = pluck($this->data['classes'], 'classesID', 'classesID');
			if(isset($fetchClass[$url])) {
				if(count($this->data['section'])) {
					$this->data['set'] = $url;
					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "section/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$array = array(
								"section" => $this->input->post("section"),
								"category" => $this->input->post("category"),
								"capacity" => $this->input->post("capacity"),
								"classesID" => $this->input->post("classesID"),
								"teacherID" => $this->input->post("teacherID"),
								"note" => $this->input->post("note"),
								"modify_date" => date("Y-m-d h:i:s")
							);

							$this->studentrelation_m->update_studentrelation_with_multicondition(array('srsection' => $this->input->post("section")), array('srsectionID' => $id));

							$this->section_m->update_section($array, $id);
							$this->session->set_flashdata('success', $this->lang->line('menu_success'));
							redirect(base_url("section/index/$url"));
						}
					} else {
						$this->data["subview"] = "section/edit";
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
		$id = htmlentities(escapeString($this->uri->segment(3)));
		$url = htmlentities(escapeString($this->uri->segment(4)));
		if((int)$id && (int)$url) {
			$section = $this->section_m->get_single_section(array('sectionID' => $id));
			$classes = $this->classes_m->get_single_classes(array('classesID' => $url));
			if(count($section) && count($classes)) {
				$this->section_m->delete_section($id);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("section/index/$url"));
			} else {
				redirect(base_url("section/index"));
			}
		} else {
			redirect(base_url("section/index"));
		}
	}

	public function valid_number() {
		if($this->input->post('capacity') < 0) {
			$this->form_validation->set_message("valid_number", "%s is invalid number");
			return FALSE;
		}
		return TRUE;
	}

	public function unique_classes() {
		if($this->input->post('classesID') == 0) {
			$this->form_validation->set_message("unique_classes", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	public function unique_teacher() {
		if($this->input->post('teacherID') == 0) {
			$this->form_validation->set_message("unique_teacher", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	public function section_list() {
		$classID = $this->input->post('id');
		if((int)$classID) {
			$string = base_url("section/index/$classID");
			echo $string;
		} else {
			redirect(base_url("section/index"));
		}
	}

	public function unique_section() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$section = $this->section_m->general_get_order_by_section(array("classesID" => $this->input->post("classesID"), "section" => $this->input->post('section'), "sectionID !=" => $id));
			if(count($section)) {
				$this->form_validation->set_message("unique_section", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$section = $this->section_m->general_get_order_by_section(array("classesID" => $this->input->post("classesID"), "section" => $this->input->post('section')));

			if(count($section)) {
				$this->form_validation->set_message("unique_section", "%s already exists");
				return FALSE;
			}
			return TRUE;
		}
	}
}