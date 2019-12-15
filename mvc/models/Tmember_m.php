<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tmember_m extends MY_Model {

	protected $_table_name = 'tmember';
	protected $_primary_key = 'tmemberID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "tmemberID asc";

	function __construct() {
		parent::__construct();
	}

	public function get_tmember($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	public function get_single_tmember($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	public function get_tmember_lastID() {
		$this->db->select('*')->from('tmember')->order_by('tmemberID desc')->limit(1, 0);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_order_by_tmember($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	public function insert_tmember($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	public function update_tmember($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_tmember($id){
		parent::delete($id);
	}

	public function delete_tmember_sID($id){
		$this->db->where('studentID', $id);
		$this->db->delete("tmember");
		return TRUE;
	}

	public function delete_tmember_tID($id){
		$this->db->where('transportID', $id);
		$this->db->delete("tmember");
		return TRUE;
	}
}