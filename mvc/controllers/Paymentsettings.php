<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Omnipay\Omnipay;
class Paymentsettings extends Admin_Controller {
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
    function __construct () {
        parent::__construct();
        $this->load->model("payment_settings_m");
        $language = $this->session->userdata('lang');
        $this->lang->load('payment_settings', $language);

        if(config_item('demo')) {
            $this->session->set_flashdata('error', 'In demo payment setting module is disable!');
            redirect(base_url('dashboard/index'));
        }
    }

    protected function rules_paypal() {
        $rules = array(
            array(
                'field' => 'paypal_email',
                'label' => $this->lang->line("paypal_email"),
                'rules' => 'trim|xss_clean|max_length[255]|valid_email|callback_unique_field'
            ),
            array(
                'field' => 'paypal_api_username',
                'label' => $this->lang->line("paypal_api_username"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'paypal_api_password',
                'label' => $this->lang->line("paypal_api_password"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'paypal_api_signature',
                'label' => $this->lang->line("paypal_api_signature"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'paypal_demo',
                'label' => $this->lang->line("paypal_demo"),
                'rules' => 'trim|xss_clean|max_length[255]'
            ),
        );
        return $rules;
    }

    protected function rules_stripe() {
        $rules = array(
            array(
                'field' => 'stripe_secret',
                'label' => $this->lang->line("stripe_secret"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'stripe_demo',
                'label' => $this->lang->line("stripe_demo"),
                'rules' => 'trim|xss_clean|max_length[255]'
            ),
        );
        return $rules;
    }

    protected function rules_payumoney() {
        $rules = array(
            array(
                'field' => 'payumoney_key',
                'label' => $this->lang->line("payumoney_key"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'payumoney_salt',
                'label' => $this->lang->line("payumoney_salt"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'payumoney_demo',
                'label' => $this->lang->line("payumoney_demo"),
                'rules' => 'trim|xss_clean|max_length[255]'
            ),
        );
        return $rules;
    }

    protected function rules_voguepay() {
        $rules = array(
            array(
                'field' => 'voguepay_merchant_id',
                'label' => $this->lang->line("voguepay_merchant_id"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'voguepay_merchant_ref',
                'label' => $this->lang->line("voguepay_merchant_ref"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'voguepay_developer_code',
                'label' => $this->lang->line("voguepay_developer_code"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'voguepay_status',
                'label' => $this->lang->line("voguepay_status"),
                'rules' => 'trim|xss_clean|max_length[255]'
            ),
        );
        return $rules;
    }
	
	protected function rules_ccavenue() {
        $rules = array(
            array(
                'field' => 'ccavenue_merchant_id',
                'label' => $this->lang->line("ccavenue_merchant_id"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'ccavenue_access_code',
                'label' => $this->lang->line("ccavenue_access_code"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'ccavenue_working_key',
                'label' => $this->lang->line("ccavenue_working_key"),
                'rules' => 'trim|xss_clean|max_length[255]|callback_unique_field'
            ),
            array(
                'field' => 'ccavenue_status',
                'label' => $this->lang->line("ccavenue_status"),
                'rules' => 'trim|xss_clean|max_length[255]'
            ),
        );
        return $rules;
    }

    public function unique_field($field) {
        if(($this->input->post('paypal_status') == 1) || 
            ($this->input->post('stripe_status') == 1) || 
            ($this->input->post('payumoney_status') == 1) ||
            ($this->input->post('voguepay_status') == 1) ||
			($this->input->post('ccavenue_status') == 1)
        ) {
            if($field == '') {
                $this->form_validation->set_message("unique_field", "The %s is required.");
                return FALSE;
            }
            return TRUE;
        }
        return TRUE;
    }
	
	public function insert_ccavenue() {
		// First time
		$array = array(
			array(
				'type' => 'ccavenue',
				'config_key' => 'ccavenue_merchant_id',
				'value' => '',
			),
			array(
				'type' => 'ccavenue',
				'config_key' => 'ccavenue_access_code',
				'value' => '',
			),
			array(
				'type' => 'ccavenue',
				'config_key' => 'ccavenue_working_key',
				'value' => '',
			),
			array(
				'type' => 'ccavenue',
				'config_key' => 'ccavenue_status',
				'value' => '1'
			)
		);
					
		$this->db->insert_batch('ini_config', $array); 
	}


    public function index() {
        $bind = array();
        $get_configs = $this->payment_settings_m->get_order_by_config();
        foreach ($get_configs as $key => $get_key) {
            $bind[$get_key->config_key] = $get_key->value;
        }
        $this->data['set_key'] = $bind;
		
		if($_POST) {
            $type = $this->input->post('type');
            if($type == 'paypal') {
                $this->data['paypal'] = 1;
                $this->data['stripe'] = 0;
                $this->data['payumoney'] = 0;
                $this->data['voguepay'] = 0;
				$this->data['ccavenue'] = 0;
                $rules = $this->rules_paypal();
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == FALSE) {
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                } else {
                    $paypal_email = $this->input->post('paypal_email');
                    $paypal_api_username = $this->input->post('paypal_api_username');
                    $paypal_api_password = $this->input->post('paypal_api_password');
                    $paypal_api_signature = $this->input->post('paypal_api_signature');
                    $paypal_status = $this->input->post('paypal_status');
                    if($this->input->post('paypal_demo')){
                        $paypal_demo = "TRUE";
                    } else{
                        $paypal_demo = "FALSE";
                    }

                    $array = array(
                        array(
                            'config_key' => 'paypal_api_username',
                            'value' => $paypal_api_username,
                        ),
                        array(
                            'config_key' => 'paypal_api_password',
                            'value' => $paypal_api_password
                        ),
                        array(
                            'config_key' => 'paypal_api_signature',
                            'value' => $paypal_api_signature
                        ),
                        array(
                            'config_key' => 'paypal_email',
                            'value' => $paypal_email
                        ),
                        array(
                            'config_key' => 'paypal_demo',
                            'value' => $paypal_demo
                        ),
                        array(
                            'config_key' => 'paypal_status',
                            'value' => $paypal_status
                        )
                    );
                    $this->payment_settings_m->update_key($array);
                    $bind = array();
                    $get_configs = $this->payment_settings_m->get_order_by_config();
                    foreach ($get_configs as $key => $get_key) {
                        $bind[$get_key->config_key] = $get_key->value;
                    }
                    $this->data['set_key'] = $bind;
                    $this->session->set_flashdata('success', $this->lang->line('update_success'));
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                }
            } elseif ($type == "stripe") {
                $this->data['paypal'] = 0;
                $this->data['payumoney'] = 0;
                $this->data['stripe'] = 1;
                $this->data['voguepay'] = 0;
				$this->data['ccavenue'] = 0;
                $rules = $this->rules_stripe();
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == FALSE) {
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                } else {
                    $stripe_secrect = $this->input->post('stripe_secret');
                    $stripe_status = $this->input->post('stripe_status');
                    if ($this->input->post('stripe_demo')) {
                        $stripe_demo = "TRUE";
                    } else {
                        $stripe_demo = "FALSE";
                    }

                    $array = array(
                        array(
                            'config_key' => 'stripe_secret',
                            'value' => $stripe_secrect,
                        ),
                        array(
                            'config_key' => 'stripe_demo',
                            'value' => $stripe_demo
                        ),
                        array(
                            'config_key' => 'stripe_status',
                            'value' => $stripe_status
                        )
                    );
                    $this->payment_settings_m->update_key($array);
                    $bind = array();
                    $get_configs = $this->payment_settings_m->get_order_by_config();
                    foreach ($get_configs as $key => $get_key) {
                        $bind[$get_key->config_key] = $get_key->value;
                    }
                    $this->data['set_key'] = $bind;
                    $this->session->set_flashdata('success', $this->lang->line('update_success'));
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                }
            } elseif ($type == "payumoney") {
                $this->data['paypal'] = 0;
                $this->data['payumoney'] = 1;
                $this->data['stripe'] = 0;
                $this->data['voguepay'] = 0;
				$this->data['ccavenue'] = 0;
                $rules = $this->rules_payumoney();
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == FALSE) {
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                } else {
                    $payumoney_key = $this->input->post('payumoney_key');
                    $payumoney_salt = $this->input->post('payumoney_salt');
                    $payumoney_status = $this->input->post('payumoney_status');
                    if ($this->input->post('payumoney_demo')) {
                        $payumoney_demo = "TRUE";
                    } else {
                        $payumoney_demo = "FALSE";
                    }

                    $array = array(
                        array(
                            'config_key' => 'payumoney_key',
                            'value' => $payumoney_key,
                        ),
                        array(
                            'config_key' => 'payumoney_salt',
                            'value' => $payumoney_salt,
                        ),
                        array(
                            'config_key' => 'payumoney_demo',
                            'value' => $payumoney_demo
                        ),
                        array(
                            'config_key' => 'payumoney_status',
                            'value' => $payumoney_status
                        )
                    );
                    $this->payment_settings_m->update_key($array);
                    $bind = array();
                    $get_configs = $this->payment_settings_m->get_order_by_config();
                    foreach ($get_configs as $key => $get_key) {
                        $bind[$get_key->config_key] = $get_key->value;
                    }
                    $this->data['set_key'] = $bind;
                    $this->session->set_flashdata('success', $this->lang->line('update_success'));
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                }
            } elseif ($type == "voguepay") {
                $this->data['paypal'] = 0;
                $this->data['payumoney'] = 0;
                $this->data['voguepay'] = 1;
                $this->data['stripe'] = 0;
				$this->data['ccavenue'] = 0;
                $rules = $this->rules_voguepay();
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == FALSE) {
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                } else {
                    $voguepay_merchant_id = $this->input->post('voguepay_merchant_id');
                    $voguepay_merchant_ref = $this->input->post('voguepay_merchant_ref');
                    $voguepay_developer_code = $this->input->post('voguepay_developer_code');
                    $voguepay_status = $this->input->post('voguepay_status');
                    if ($this->input->post('voguepay_demo')) {
                        $voguepay_demo = "TRUE";
                    } else {
                        $voguepay_demo = "FALSE";
                    }

                    $array = array(
                        array(
                            'config_key' => 'voguepay_merchant_id',
                            'value' => $voguepay_merchant_id,
                        ),
                        array(
                            'config_key' => 'voguepay_merchant_ref',
                            'value' => $voguepay_merchant_ref,
                        ),
                        array(
                            'config_key' => 'voguepay_developer_code',
                            'value' => $voguepay_developer_code,
                        ),
                        array(
                            'config_key' => 'voguepay_demo',
                            'value' => $voguepay_demo
                        ),
                        array(
                            'config_key' => 'voguepay_status',
                            'value' => $voguepay_status
                        )
                    );

                    $this->payment_settings_m->update_key($array);
                    $bind = array();
                    $get_configs = $this->payment_settings_m->get_order_by_config();
                    foreach ($get_configs as $key => $get_key) {
                        $bind[$get_key->config_key] = $get_key->value;
                    }
                    $this->data['set_key'] = $bind;
                    $this->session->set_flashdata('success', $this->lang->line('update_success'));
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                }
            }
			elseif ($type == "ccavenue") {
                $this->data['paypal'] = 0;
                $this->data['payumoney'] = 0;
                $this->data['voguepay'] = 0;
                $this->data['stripe'] = 0;
				$this->data['ccavenue'] = 1;
                $rules = $this->rules_ccavenue();
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == FALSE) {
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                } else {
                    $ccavenue_merchant_id = $this->input->post('ccavenue_merchant_id');
                    $ccavenue_access_code = $this->input->post('ccavenue_access_code');
                    $ccavenue_working_key = $this->input->post('ccavenue_working_key');
                    $ccavenue_status = $this->input->post('ccavenue_status');
					
                    $array = array(
                        array(
                            'config_key' => 'ccavenue_merchant_id',
                            'value' => $ccavenue_merchant_id,
                        ),
                        array(
                            'config_key' => 'ccavenue_access_code',
                            'value' => $ccavenue_access_code,
                        ),
                        array(
                            'config_key' => 'ccavenue_working_key',
                            'value' => $ccavenue_working_key,
                        ),
                        array(
                            'config_key' => 'ccavenue_status',
                            'value' => $ccavenue_status
                        )
                    );

                    $this->payment_settings_m->update_key($array);
                    $bind = array();
                    $get_configs = $this->payment_settings_m->get_order_by_config();
                    foreach ($get_configs as $key => $get_key) {
                        $bind[$get_key->config_key] = $get_key->value;
                    }
                    $this->data['set_key'] = $bind;
                    $this->session->set_flashdata('success', $this->lang->line('update_success'));
                    $this->data["subview"] = "paymentsettings/index";
                    $this->load->view('_layout_main', $this->data);
                }
            }
        } else {
            $this->data['paypal'] = 1;
            $this->data['stripe'] = 0;
            $this->data['payumoney'] = 0;
            $this->data['voguepay'] = 0;
			$this->data['ccavenue'] = 0;
            $this->data["subview"] = "paymentsettings/index";
            $this->load->view('_layout_main', $this->data);
        }
    }
}

/* End of file student.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/student.php */