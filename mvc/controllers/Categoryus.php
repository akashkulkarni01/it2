<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoryus extends Admin_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	INILABS SCHOOL MANAGEMENT SYSTEM categoryus
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
		$this->load->model("categoryus_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('categoryus', $language);	
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'cat_title', 
				'rules' => 'trim|required|max_length[128]'
			), 
			array(
				'field' => 'short_name', 
				'rules' => 'trim|required|xss_clean|max_length[10]'
			), 
			array(
				'field' => 'ot_formula', 
				'rules' => 'trim|required|xss_clean|max_length[10]'
			), 
			array(
				'field' => 'min_ot', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'max_ot', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'week_off1', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'week_off2', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'consider_punch', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'gracetime_late', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'gracetime_early', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'neglect_last', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'weekoff1', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'weekoff2', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'consider_early_come', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'consider_late_going', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'deduct_break_hour', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'halfday_calculation', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'absent_calculation', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'partialday_half_calculation', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'partialday_absent_calculation', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'mark_weekoff_prefixday_absent', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'mark_weekoff_suffixday_absent', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'halfday_absent', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'halfday_lateby', 
				'rules' => 'trim'
			), 
			array(
				'field' => 'halfday_goingby', 
				'rules' => 'trim'
			)
		);
		return $rules;
	}

	public function index() { 
		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		$this->data['set'] = $id;
		if($id == '') {
			$this->data['categoryus'] = $this->categoryus_m->get_categoryu();
			$this->data['set'] = $this->data['siteinfos']->school_type;
			$this->data["subview"] = "categoryus/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
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

		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$this->data['categoryus'] = $this->categoryus_m->get_categoryus($id);
			if($this->data['categoryus']) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "categoryus/view";
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
}

	public function categoryus_list() {
		$catid = $this->input->post('catid');
		if($catid) {
			$string = base_url("categoryus/index/$catid");
			echo $string;
		} else {
			redirect(base_url("categoryus/index"));
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
				$this->data["subview"] = "categoryus/add";
				$this->load->view('_layout_main', $this->data);			
			} else {
				$array = array(
					"cat_title" => $this->input->post('cat_title'),
					"short_name"  => $this->input->post("short_name"),
					"ot_formula" 	  => $this->input->post("ot_formula"),
					"short_name" 	  => $this->input->post("short_name"),
					"min_ot" 	  => $this->input->post("min_ot"),
					"max_ot" 	  => $this->input->post("max_ot"),
					"week_off1" 	  => $this->input->post("week_off1"),
					"week_off2" 	  => $this->input->post("week_off2"),
					"consider_punch" 	  => $this->input->post("consider_punch"),
					"gracetime_late" 	  => $this->input->post("gracetime_late"),
					"gracetime_early" 	  => $this->input->post("gracetime_early"),
					"weekoff1" 	  => $this->input->post("weekoff1"),
					"weekoff2" 	  => $this->input->post("weekoff2"),
                    "consider_early_come" 	  => $this->input->post("consider_early_come"),
                    "consider_late_going" 	  => $this->input->post("consider_late_going"),
                    "deduct_break_hour" 	  => $this->input->post("deduct_break_hour"),
                    "halfday_calculation" 	  => $this->input->post("halfday_calculation"),
                    "absent_calculation" 	  => $this->input->post("absent_calculation"),
                    "partialday_half_calculation" 	  => $this->input->post("partialday_half_calculation"),
                    "partialday_absent_calculation" 	  => $this->input->post("partialday_absent_calculation"),
                    "mark_weekoff_prefixday_absent" 	  => $this->input->post("mark_weekoff_prefixday_absent"),
                    "mark_weekoff_suffixday_absent" 	  => $this->input->post("mark_weekoff_suffixday_absent"),
                    "halfday_absent" 	  => $this->input->post("halfday_absent"),
                    "halfday_lateby" 	  => $this->input->post("halfday_lateby"),
                    "halfday_goingby" 	  => $this->input->post("halfday_goingby")
				);

				$this->categoryus_m->insert_categoryus($array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("categoryus/index"));
			}
		} else {
			$this->data["subview"] = "categoryus/add";
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
			$this->data['categoryus'] = $this->categoryus_m->get_categoryus($id);
			if($this->data['categoryus']) {
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["subview"] = "categoryus/edit";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$array = array(
							"cat_title" => $this->input->post('cat_title'),
                            "short_name"  => $this->input->post("short_name"),
                            "ot_formula" 	  => $this->input->post("ot_formula"),
                            "short_name" 	  => $this->input->post("short_name"),
                            "min_ot" 	  => $this->input->post("min_ot"),
                            "max_ot" 	  => $this->input->post("max_ot"),
                            "week_off1" 	  => $this->input->post("week_off1"),
                            "week_off2" 	  => $this->input->post("week_off2"),
                            "consider_punch" 	  => $this->input->post("consider_punch"),
                            "gracetime_late" 	  => $this->input->post("gracetime_late"),
                            "gracetime_early" 	  => $this->input->post("gracetime_early"),
                            "weekoff1" 	  => $this->input->post("weekoff1"),
                            "weekoff2" 	  => $this->input->post("weekoff2"),
                            "consider_early_come" 	  => $this->input->post("consider_early_come"),
                            "consider_late_going" 	  => $this->input->post("consider_late_going"),
                            "deduct_break_hour" 	  => $this->input->post("deduct_break_hour"),
                            "halfday_calculation" 	  => $this->input->post("halfday_calculation"),
                            "absent_calculation" 	  => $this->input->post("absent_calculation"),
                            "partialday_half_calculation" 	  => $this->input->post("partialday_half_calculation"),
                            "partialday_absent_calculation" 	  => $this->input->post("partialday_absent_calculation"),
                            "mark_weekoff_prefixday_absent" 	  => $this->input->post("mark_weekoff_prefixday_absent"),
                            "mark_weekoff_suffixday_absent" 	  => $this->input->post("mark_weekoff_suffixday_absent"),
                            "halfday_absent" 	  => $this->input->post("halfday_absent"),
                            "halfday_lateby" 	  => $this->input->post("halfday_lateby"),
                            "halfday_goingby" 	  => $this->input->post("halfday_goingby")
						);

						
						$this->categoryus_m->update_categoryus($array, $id);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("categoryus/index"));
					}
				} else {
					$this->data["subview"] = "categoryus/edit";
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
			$catid = $this->categoryus_m->get_categoryus1($id);
			if($catid) {
				if($catid->catid != 1) {
					$this->categoryus_m->delete_categoryus($id);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("categoryus/index"));
				} else {
					redirect(base_url("categoryus/index"));
				}
			} else {
				redirect(base_url("categoryus/index"));
			}
		} else {
			redirect(base_url("categoryus/index"));
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