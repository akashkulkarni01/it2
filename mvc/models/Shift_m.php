<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "Classes_m.php";

class Shift_m extends MY_Model {

	protected $_table_name = 'shift';
	protected $_primary_key = 'shift_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "shift_id asc";

	function __construct() {
		parent::__construct();
	}

	private function prefixLoad($array) {
		if(is_array($array)) {
			if(count($array)) {
				foreach ($array as $arkey =>  $ar) {
					$array[$this->_table_name.'.'.$arkey] = $ar;
					unset($array[$arkey]);
				}
			}
		}
		return $array;
	}

	public function get_shift($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	public function get_single_shift($id = NULL) {
		$query = parent::get_single($id);
		return $query;
	}

	public function insert_shift($array) {
		$id = parent::insert($array);
		return $id;
	}

	public function update_shift($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_shift($id){
		parent::delete($id);
	}

	public function get_shifts(){

		$this->db->select('*');
		$this->db->from('shift');		
		$query = $this->db->get();	  
		return $query->result();
	}
        
    	public function get_shift1($id){

                $this->db->select('*');
				$this->db->from('shift');
				$this->db->where('shift_id', $id);
				
                $query = $this->db->get();
			  
		return $query->result();

		}
}
