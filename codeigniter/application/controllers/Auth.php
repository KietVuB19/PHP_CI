<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('Auth/login');
	}
	
	public function register()
	{
		$this->load->view('Auth/register');
	}

	public function registration_form(){
		$this->auth_model->register_user();
	}

	public function login_form(){
		$this->auth_model->login_user();
	}	

	public function cus_home()
	{
		$this->load->view('Auth/cus_home');
	}

	public function admin_home(){
        $this->load->model('Auth_model');
        $data['users']=$this->Auth_model->get_users();
        $this->load->view('Auth/admin_home',$data);
    } 

	public function change_status($id){
		$user=$this->auth_model->get_user_id($id);
		if($user){
			$status = $user['status'];
			if($status == 0){
				$status = 1;
			}
			else{
				$status = 0;
			}
			$this->auth_model->update_status($id, $status);
		}
		redirect('Auth/admin_home');
	}

}
