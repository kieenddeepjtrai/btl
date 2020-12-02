<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class action_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function addToActionLog($name, $nickname, $sex, $birth_day,
	     $id_card_no, $birth_place, $ethnic, $job, $job_place, $since, $household_id)
	{
		$action_type = "Tam tru";
		$last_update = time();
	    $actionLogData = array('name' => $name,
	    			  'action_type' => $action_type,
	    			  'household_id' => $household_id,
	    			  'description' => "tam tru",
	    				'since' => $since,
	    				'last_update' => $last_update);
	    $peopleData = array('name' => $name,
							'nickname' => $nickname,
							'sex' => $sex,
							'birth_day'=> $birth_day,
							'id_card_no'=>$id_card_no,
							'native_place'=>$birth_place,
							'ethnic'=> $ethnic,
							'job' => $job,
							'job_place'=>$job_place,
							'since'=>$since,
							'household_id'=>$household_id,
							'last_update'=>$last_update);

	    if ($this->db->insert('actionlogs', $actionLogData))
	    {
	    	$this->db->select('household');
	    	$this->db->where('household_id', $household_id);
	    	$this->db->insert('people', $peopleData);

	    }
	    else{
	    	echo "Them that bai";
	    }

	}
	public function addToActionLog2($id_card_no, $description, $since)
	{
		echo "Dang phat trien";
	    // $this->db->select('*');
	    // $this->db->where('id_card_no', $id_card_no);
	    // $data = $this->db->get('people');
	    // $data = $data->result_array();
	    // $data = array('datanhanduoc' =>$data );
	    
	    // $actionLogData = array('name' => $name,
	    // 			  'action_type' => "Tam vang",
	    // 			  'household_id' => $household_id,
	    // 			  'description' => $description,
	    // 				'since' => $since,
	    // 				'last_update' => $last_update);

	}
	   public function getData()
	   {
	       $data = $this->db->get('actionlogs');
	       $data = $data->result_array();
	       return $data;
	   }
	   public function getActionLogData($id)
	   {
	       $this->db->select('*');
	       $this->db->where('id', $id);
	       $data = $this->db->get('actionlogs');
	       $data = $data->result_array();
	       return $data;
	   }
	   public function update($name, $id, $action_type, $people_id, $household_id, $description, $since, $last_update)
	   {
	       $data = array('name' => $name,
	       				 'id' => $id,
	       				 'action_type'=> $action_type,
	       				 'people_id'=>$people_id,
	       				 'household_id'=>$household_id,
	       				 'description'=>$description,
	       				 'since'=>$since,
	       				 'last_update'=>$last_update);
	   $this->db->select('*');
	$this->db->where('id', $id);
	   $this->db->update('actionlogs', $data);
}
		public function delete($id)
		{
		    $this->db->select('*');
		    $this->db->where('id', $id);
		    $this->db->delete('actionlogs');
		}
}


/* End of file action_model.php */
/* Location: ./application/models/action_model.php */