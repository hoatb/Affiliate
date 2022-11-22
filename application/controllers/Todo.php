<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

use App\User;
class Todo extends MY_Controller {


	function __construct() {

		parent::__construct();

		$this->load->model('user_model', 'user');

		$this->load->model('Product_model');
		
		$this->load->model('Common_model');

		$this->front_assets = APPPATH . 'views/auth/user/assets/';

		$this->front_assets_url = base_url('application/views/auth/user/assets/');

		___construct(1);

		$this->Product_model->ping($this->session->administrator['id']);

		$site_setting_timeout = $this->Product_model->getSettings('site', 'session_timeout');

		$timeout = (isset($site_setting_timeout['session_timeout']) && is_numeric($site_setting_timeout['session_timeout']) && $site_setting_timeout['session_timeout'] > 60) ? $site_setting_timeout['session_timeout'] : 1800;

		if(isset($_SESSION['timestamp']) && (time() - $_SESSION['timestamp']) > $timeout) { 

			$this->session->sess_destroy();

			redirect($this->admin_domain_url);

		} else if($this->uri->segment(2) != "ajax_dashboard"){ 

			$_SESSION['timestamp'] = time(); 

		}
	}

	public function userdetails(){
		return $this->session->administrator;
	}



	public function getSiteSetting(){

		return $this->Product_model->getSettings('site');

	}

	public function getodolist() {
		$this->hasAccess();
		
		$user_id 	= $this->userdetails()['id'];
		$isCalView 	= $this->input->get('isCalView');
		$start 		= $this->input->get('start');
		$end 		= $this->input->get('end');

		if($isCalView){
			$this->db->select('id,LEFT(notes,10) as title, todo_date as start, notes,is_done');
			$this->db->from('todo_list');
			if(!empty($start) && !empty($end)){
				$this->db->where('todo_date >=',$start);
				$this->db->where('todo_date <=',$end);
			}
			$this->db->where('user_id',$user_id);
			$query = $this->db->get();
			$res = $query->result_array();
		} else {
			$res = $this->Common_model->get_data_all_asc('todo_list',['user_id'=>$user_id],'*','id');
		}

		if (sizeof($res) > 0) {
			$response = $res;
		}else{
			$response = 'null';
		}
		
		// echo $response;
		echo json_encode($response);
		exit;

	}
	public function addtodolist() {
		$this->hasAccess();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$this->form_validation->set_rules('note', 'notes', 'trim|required');
			$this->form_validation->set_rules('todo_date', 'todo_date', 'trim|required');

			if ($this->form_validation->run()) {
				$note = $this->input->post('note');
				$id = $this->input->post('id');
				$todo_date = $this->input->post('todo_date');

				$user_id = $this->userdetails()['id'];
				if($id!=0) {
					$update_data =['notes'=>$note,'todo_date'=>$todo_date,'updated_at'=>date('Y-m-d H:i:s')]; 
					$res = $this->Common_model->update('todo_list',['user_id'=>$user_id,'id'=>$id],$update_data);
					if($res) {
						echo json_encode(['status'=>true]);
					} else {
						echo json_encode(['status'=>false]);
					}
				}else {
					$this->Common_model->insert('todo_list',[
						'user_id'=>$user_id,
						'notes'=>$note,
						'todo_date'=>$todo_date,
						'is_done'=>'0',
						'created_at'=>date('Y-m-d H:i:s'),
					]);
					echo json_encode(['status'=>true]);
				}
			} else {	
				echo json_encode(array('status' => false, 'message' => str_replace('</p>', '', str_replace('<p>', '', validation_errors()))));
			}
		} else {
			echo json_encode(['status'=>405,'message'=>'methos not allowed']);
			exit;
		}
	}
	public function actiontodolist() {
		$this->hasAccess();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$this->form_validation->set_rules('id', 'id', 'trim|required');

			if ($this->form_validation->run()) {

				$id 	= $this->input->post('id');
				$action = $this->input->post('action');
				$is_done = $this->input->post('is_completed');
				$user_id = $this->userdetails()['id'];
				$where = ['user_id'=>$user_id,'id'=>$id];

				if($action==1) {
					$res = $this->Common_model->deletedata('todo_list',$where);
					if($res) {
						echo json_encode(['status'=>true]);
					} else {
						echo json_encode(['status'=>false]);
					}
					exit;
				} else {
					$update_data =['is_done'=>"$is_done",'updated_at'=>date('Y-m-d H:i:s')]; 
					$res = $this->Common_model->update('todo_list',$where,$update_data);
					if($res) {
						echo json_encode(['status'=>true]);
					} else {
						echo json_encode(['status'=>false]);
					}
				}
				

			} else {	
				echo json_encode(array('status' => false, 'message' => str_replace('</p>', '', str_replace('<p>', '', validation_errors()))));
			}
		} else {
			echo json_encode(['status'=>405,'message'=>'methos not allowed']);
			exit;
		}
	}

	// public function todolist() {
	// 	$this->hasAccess();
	// 	$this->view($data,'todolist/todo-list');
	// }

	public function hasAccess() {
		if(!$this->userdetails()){ 
			redirect($this->admin_domain_url, 'refresh');
		}
	}
}