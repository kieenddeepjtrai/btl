<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class action extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('actiontype_view');
	}
	
	public function handle()
	{
	    $action_selected = $this->input->post('type');
	    switch ($action_selected){
	    	case 'Move':{
	    				// echo "chuyen ho khau";
	    				// $this->load->view('move_view'); 
	    				// break;
	    		echo "Move se lam trong giao dien khi xem ";
	    		break;
	    			   	}
	    	case 'Stay':{
	    			echo "Dang ky tam tru";
	    			  $this->load->view('stay_view'); 
	    			  break;
	    			   	}
	    	case 'Add':{
	    			echo "Co them nhan khau";
	    			break;
	    			  // $this->load->view('add_view'); 
	    			   	}
	    	case 'Absent':{
	    			   $this->load->view('absent_view'); 
	    		break;
	    			   	}

	    }
	}
	public function stay()
	{
	    $name = $this->input->post('name');
	    $nickname = $this->input->post('nickname');
	    $sex = $this->input->post('sex');
	    $birth_day = $this->input->post('birth_day');
	    $id_card_no = $this->input->post('id_card_no');
	    $birth_place = $this->input->post('birth_place');
	    $ethnic = $this->input->post('ethnic');
	    $job = $this->input->post('job');
	    $job_place = $this->input->post('job_place');
	    $since = $this->input->post('since');
	    $household_id = $this->input->post('household_id');

	    $this->load->model('action_model');
	    if (!$this->action_model->addToActionLog($name, $nickname, $sex, $birth_day,
	     $id_card_no, $birth_place, $ethnic, $job, $job_place, $since, $household_id)){
	    	$this->load->view('staySuccess_view');
	    }
	}
	public function absent()
	{
	    $id_card_no = $this->input->post('id_card_no');
	    $description = $this->input->post('description');
	    $since = $this->input->post('since');
	    $this->load->model('action_model');
	    $this->action_model->addToActionLog2($id_card_no, $description, $since);
	}
	public function showActionLog(){
		$this->load->model('action_model');
		$data = $this->action_model->getData();
		$data = array('datareceive' => $data);
		$this->load->view('showActionLog_view', $data);
	}
	public function editActionLog($id)
	{
	    $this->load->model('action_model');
	    $dulieu = $this->action_model->getActionLogData($id);
	    $dulieu = array('dulieulayra' => $dulieu);
	    $this->load->view('editActionLog_view', $dulieu, FALSE);	
	}
	public function updateActionLog()
	{
	    $name = $this->input->post('name');
	    $id = $this->input->post('id');
	    $action_type = $this->input->post('action_type');
	    $people_id = $this->input->post('people_id');
	    $household_id = $this->input->post('household_id');
	    $description = $this->input->post('description');
	    $since = $this->input->post('since');
	    $last_update = $this->input->post('last_update');

	    $this->load->model('action_model');
	    if (!$this->action_model->update($name, $id, $action_type, $people_id, $household_id, $description, $since, $last_update)){
	    	$this->load->view('editSuccess_view');
	    }
	    else{
	    	echo "Update thất bại";
	    }
	}
	public function deleteActionLog($id)
	{
	    $this->load->model('action_model');
	    if(!$this->action_model->delete($id))
	    {
	    	$this->load->view('deleteSuccess_view');
	    }
	    else {
	    	echo "Xóa thất bại";
	    }
	}
}

/* End of file join.php */
/* Location: ./application/controllers/join.php */