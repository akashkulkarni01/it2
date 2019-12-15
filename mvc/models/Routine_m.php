<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "Classes_m.php";

class Routine_m extends MY_Model {

	protected $_table_name = 'routine';
	protected $_primary_key = 'routineID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "classesID asc";

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

	public function get_routine_with_teacher_class_section_subject($array,$fromDate,$toDate) {
		

                 
                $array = $this->prefixLoad($array);
		$this->db->select('*');
		$this->db->from('routine');
		$this->db->join('teacher', 'teacher.teacherID = routine.teacherID', 'LEFT');
		$this->db->join('classes', 'classes.classesID = routine.classesID', 'LEFT');
		$this->db->join('section', 'section.sectionID = routine.sectionID', 'LEFT');
		$this->db->join('subject', 'subject.subjectID = routine.subjectID AND subject.classesID = routine.classesID', 'LEFT');
		$this->db->where($array);
                //$this->db->where('date BETWEEN "'. ('date('.$fromDate.')'). '" and "'. ('date('.$toDate.')'));
                 $this->db->where('date >= date("'.$fromDate.'")');
                 $this->db->where('date <= date("'.$toDate.'")');
              
                $this->db->order_by("date", "asc");
		$query = $this->db->get();
                //echo $this->db->last_query(); 
                //exit();
		return $query->result();
	}

	public function get_routine($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	public function get_single_routine($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	public function get_order_by_routine($array=NULL) {

		$query = parent::get_order_by($array);
		return $query;
	}

	//unique teacher	
	public function get_order_by_teacher($test=NULL) {		

		if(is_array($test)) {
			if(count($test)) {
				foreach ($test as $arkey =>  $ar) {
					$test[$this->_table_name.'.'.$arkey] = $ar;
					unset($test[$arkey]);
				}
			}
		}

		$classid = $test['routine.classesID'];
		$day = $test['routine.day'];
		$start_time = $test['routine.start_time'];
		$end_time = $test['routine.end_time'];


		//$sectionID = $test['routine.sectionID'];
		$schoolyearID = $test['routine.schoolyearID'];
		$teacherID = $test['routine.teacherID'];
		$date = $test['routine.date'];


		$this->db->select('*');
		$this->db->from('routine');
		$this->db->where('teacherID', $teacherID);
		$this->db->where('date', $date);
		//$this->db->where('start_time BETWEEN "'. $start_time. '" and "'.$end_time.'"');
		$this->db->where('end_time BETWEEN "'. $start_time. '" and "'.$end_time.'"');
		//$this->db->order_by("date", "asc");
		
		
		$query = $this->db->get();
		
		return $query->result();
	}


	public function insert_routine($array) {
		$id = parent::insert($array);
		return $id;
	}

	public function update_routine($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_routine($id){
		parent::delete($id);
	}
        
        public function get_routines($teacherID , $date){

                $this->db->select('*');
		$this->db->from('routine');
                $this->db->where('date = date("'.$date.'")');
                $this->db->where('teacherID', $teacherID);
                $query = $this->db->get();
               // echo $this->db->last_query(); 
               // exit();
		return $query->result();

        }
}