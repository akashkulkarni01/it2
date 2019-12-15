<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feetypes extends Admin_Controller {
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
		$this->load->model("feetypes_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('feetypes', $language);	
	}

	public function index() {
		$this->data['feetypes'] = $this->feetypes_m->get_feetypes();
		$this->data["subview"] = "feetypes/index";
		$this->load->view('_layout_main', $this->data);
	}

	protected function rules() {
		$rules = array(
				array(
					'field' => 'feetypes', 
					'label' => $this->lang->line("feetypes_name"), 
					'rules' => 'trim|required|xss_clean|max_length[60]|callback_unique_feetypes'
				),
				array(
					'field' => 'note', 
					'label' => $this->lang->line("feetypes_note"), 
					'rules' => 'trim|xss_clean|max_length[200]'
				),
				array(
                	'field' => 'monthly',
                	'label' => $this->lang->line("feetypes_monthly"),
                	'rules' => 'trim|xss_clean|max_length[11]|numeric',
            	)
			);
		return $rules;
	}

	public function add() {
		if($_POST) {
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data["subview"] = "feetypes/add";
				$this->load->view('_layout_main', $this->data);			
			} else {
				$monthly = $this->input->post('monthly');
                if($monthly) {  
                    for($i = 1; $i<=12; $i++) {
                        $month = date('M', mktime(0, 0, 0, $i));
                        $array = [
                            'feetypes' => $this->input->post('feetypes'). ' ['.$month.']',
                            "note"     => $this->input->post("note"),
                        ];
                        $this->feetypes_m->insert_feetypes($array);
                    }
                } else {
                    $array = [
                        "feetypes" => $this->input->post("feetypes"),
                        "note"     => $this->input->post("note"),
                    ];

                    $this->feetypes_m->insert_feetypes($array);
                }

				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("feetypes/index"));
			}
		} else {
			$this->data["subview"] = "feetypes/add";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function edit() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$this->data['feetypes'] = $this->feetypes_m->get_feetypes($id);
			if($this->data['feetypes']) {
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["subview"] = "feetypes/edit";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$array = array(
							"feetypes" => $this->input->post("feetypes"),
							"note" => $this->input->post("note")
						);

						$this->feetypes_m->update_feetypes($array, $id);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("feetypes/index"));
					}
				} else {
					$this->data["subview"] = "feetypes/edit";
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
			$this->feetypes_m->delete_feetypes($id);
			$this->session->set_flashdata('success', $this->lang->line('menu_success'));
			redirect(base_url("feetypes/index"));
		} else {
			redirect(base_url("feetypes/index"));
		}
	}

	public function unique_feetypes() {
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$feetypes = $this->feetypes_m->get_order_by_feetypes(array("feetypes" => $this->input->post("feetypes"), "feetypesID !=" => $id));
			if(count($feetypes)) {
				$this->form_validation->set_message("unique_feetypes", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$monthly = $this->input->post('monthly');
			if($monthly) {
				for($i = 1; $i<=12; $i++) {
                    $month = date('M', mktime(0, 0, 0, $i));
                    $array = [
                        'feetypes' => $this->input->post('feetypes'). ' ['.$month.']'
                    ];
					$feetypes = $this->feetypes_m->get_order_by_feetypes($array);

					if(count($feetypes)) {
						$this->form_validation->set_message("unique_feetypes", "The ".$this->input->post('feetypes'). ' ['.$month.']' ." already exists");
						return FALSE;
					}
                }
				return TRUE;
			} else {
				$feetypes = $this->feetypes_m->get_order_by_feetypes(array("feetypes" => $this->input->post("feetypes")));
				if(count($feetypes)) {
					$this->form_validation->set_message("unique_feetypes", "%s already exists");
					return FALSE;
				}
				return TRUE;
			}
		}	
	}
}
