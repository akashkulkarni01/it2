<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam_m extends MY_Model {

	protected $_table_name = 'exam';
	protected $_primary_key = 'examID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "exam asc";

	public function __construct() {
		parent::__construct();
	}

	public function get_exam($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	public function get_single_exam($array) {
		$query = parent::get_single($array);
		return $query;
	}

	public function get_order_by_exam($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	public function insert_exam($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	public function update_exam($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_exam($id){
		parent::delete($id);
	}
}

/* End of file exam_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/exam_m.php */