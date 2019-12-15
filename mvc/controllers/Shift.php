<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shift extends Admin_Controller {
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
		$this->load->model("shift_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('shift', $language);	
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'shift_title', 
				'rules' => 'trim|required|max_length[128]'
			), 
			array(
				'field' => 'start_time', 
				'rules' => 'trim|required|xss_clean|max_length[10]'
			), 
			array(
				'field' => 'end_time', 
				'rules' => 'trim|required|xss_clean|max_length[10]|callback_validate_time'
			), 
			array(
				'field' => 'short_name', 
				'rules' => 'trim|required'
			), 
			array(
				'field' => 'brk1_starttime', 
				'rules' => 'trim|required|xss_clean|max_length[10]'
			), 
			array(
				'field' => 'brk1_endtime', 
				'rules' => 'trim|required|xss_clean|max_length[10]'
			)
		);
		return $rules;
	}

	public function index() { 
		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		$this->data['set'] = $id;
		if($id == '') {
			$this->data['shift'] = $this->shift_m->get_shifts();
			$this->data['set'] = $this->data['siteinfos']->school_type;
			$this->data["subview"] = "shift/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}	
	}

	public function shift_list() {
		$shift_id = $this->input->post('shift_id');
		if($shift_id) {
			$string = base_url("shift/index/$shift_id");
			echo $string;
		} else {
			redirect(base_url("shift/index"));
		}
	}

	public function add() {
		
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/timepicker/timepicker.css'
			),
			'js' => array(
				'assets/timepicker/timepicker.js'
			)
		);

		if($_POST) {

			$rules = $this->rules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() == FALSE) { 
				$this->data["subview"] = "shift/add";
				$this->load->view('_layout_main', $this->data);			
			} else {
				$array = array(
					"shift_title" => $this->input->post('shift_title'),
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

				$this->shift_m->insert_shift($array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("shift/index"));
			}
		} else {
			$this->data["subview"] = "shift/add";
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
			$this->data['shift'] = $this->shift_m->get_shift($id);
			if($this->data['shift']) {
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["subview"] = "shift/edit";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$array = array(
							"shift_title" => $this->input->post('shift_title'),
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

						
						$this->shift_m->update_shift($array, $id);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("shift/index"));
					}
				} else {
					$this->data["subview"] = "shift/edit";
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
			$shiftid = $this->shift_m->get_shift1($id);
			if($shiftid) {
				if($shiftid->shift_id != 1) {
					$this->shift_m->delete_shift($id);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("shift/index"));
				} else {
					redirect(base_url("shift/index"));
				}
			} else {
				redirect(base_url("shift/index"));
			}
		} else {
			redirect(base_url("shift/index"));
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
			$this->data['shift'] = $this->shift_m->get_shift($id);
			if($this->data['shift']) {
				$this->data["subview"] = "shift/view";
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



	

}

/* End of file class.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/class.php */