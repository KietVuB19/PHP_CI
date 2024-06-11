<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library('session');
		$this->load->model('Auth_model');
		$this->load->helper('url');
		
    }

	public function index()
	{
		$this->load->view('Auth/login');
	}
	
	public function registration_form(){
		$password=$this->input->post('password');
        $conPassword=$this->input->post('conPass');
        
		if ($this->User_model->is_name_taken($name)) {
            $this->session->set_flashdata('message', 'Name is taken.');
            redirect('auth/register');
            return;
        }

        if($password == $conPassword){
            $roles = "customer";
            $data=array(
                "name"=>$this->input->post('name'),
                "password"=>$password,
                "email"=>$this->input->post('email'),
                "roles"=>$roles,
            );
            // $this->db->insert('users',$data);    
			$this->Auth_model->register_user($data);    
            redirect('/Auth');
        }
        else{
            $this->session->set_flashdata('message', 'Passwords not match.');
            redirect('auth/register');
            return;
        }
		$this->load->view('Auth/register');
	}

	public function login_form(){
		//Login try 5 times, failed-> lock 5mins
		$name = $this->input->post('name');
        $password = $this->input->post('password');

        $attempts_data = $this->User_model->get_login_attempts($name);
        if ($attempts_data && $attempts_data->attempts >= 5) {
            $last_attempt_time = strtotime($attempts_data->last_attempt);
            $current_time = time();
            if (($current_time - $last_attempt_time) < 300) { 
                echo "Try again after 5 minutes.";
                redirect('/');
            } else {
                $this->User_model->reset_login_attempts($name);
            }
        }
		//validate
		$user = $this->User_model->login_user($name, $password);
        if ($user) {
            // reset attem to 0 when success
            $this->User_model->reset_login_attempts($name);
            $this->session->set_userdata('user_id', $user->id);
			//check if user exits
			$query=$this->db->get('users');
			$res=$query->num_rows();
			if($res>=1){
				$row = $query->row();
				$user_roles=$row->roles;
				$user_status = $row->status;
				//check status (disable/active)
				if($user_status == 1){
					$this->session->set_userdata('logged_in',true);
					$this->session->set_userdata('log_in_name',$name);
					$this->session->set_userdata('role',$user_roles);
					
					if($user_roles == 'customer'){
						redirect('Auth/cus_home');
					}
					else{
						redirect('Auth/admin_home');
					}
				}
				else{
					redirect('Auth');
				}
			}
			else{
				redirect('Auth');
			}
        } else {
            //login attem +=1 when failed
            $this->User_model->increment_login_attempts($name);
            echo "Invalid name or password.";
        }

		// $this->Auth_model->login_user();
	}	

	public function logout(){
		$this->session->unset_userdata('log_in_name');
        $this->session->unset_userdata('role');
        $this->session->sess_destroy();
        redirect('Auth/');
	}

	public function cus_home()
	{
		if(!$this->session->userdata('logged_in')) {
			redirect('Auth');	
		}

		if($this->session->userdata('role') != 'customer'){
			redirect('Auth/admin_home');		
		}
		$this->load->view('Auth/cus_home');
	}

	public function admin_home(){
		if(!$this->session->userdata('logged_in')) {
			redirect('Auth');	
		}

		if($this->session->userdata('role') != 'admin'){
			redirect('Auth/cus_home');		
		}

		$search = $this->input->post('search');
		if(!$search){
			$data['users']=[];		
		    $this->load->view('Auth/admin_home',$data);
		}
		else{
			$this->session->set_userdata('search',$search);
			$data['users']=$this->Auth_model->search_user($search);	
			$data['search']=$search;
			$this->load->view('Auth/admin_home',$data);
		}
    } 

	public function change_status($id){
		$user=$this->Auth_model->get_user_id($id);
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
