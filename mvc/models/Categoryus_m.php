<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "Classes_m.php";

class Categoryus_m extends MY_Model {

	protected $_table_name = 'categoryus';
	protected $_primary_key = 'catid';
	protected $_primary_filter = 'intval';
	protected $_order_by = "catid asc";

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

	public function get_categoryus($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	public function get_single_categoryus($id = NULL) {
		$query = parent::get_single($id);
		return $query;
	}

	public function insert_categoryus($array) {
		$id = parent::insert($array);
		return $id;
	}

	public function update_categoryus($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_categoryus($id){
		parent::delete($id);
	}

	public function get_categoryu(){
		$this->db->select('*');
		$this->db->from('categoryus');		
		$query = $this->db->get();	  
		return $query->result();
	}
        
    	public function get_categoryus1($id){

                $this->db->select('*');
				$this->db->from('categoryus');
				$this->db->where('catid', $id);
				
                $query = $this->db->get();
			  
		return $query->result();

		}
}
