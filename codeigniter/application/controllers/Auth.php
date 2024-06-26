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
	
	public function show_regis(){
		$this->load->view('Auth/register');
	}

	public function registration_form(){
		$name=$this->input->post('name');
		$password=$this->input->post('password');
        $conPassword=$this->input->post('conPass');
		$email=$this->input->post('email');

		$this->session->set_flashdata('name', $name);
		$this->session->set_flashdata('email', $email);

		if ($this->Auth_model->is_name_taken($name)) {
            $this->session->set_flashdata('msg_regis_failed', 'Name is taken');
            redirect('Auth/register');
            return;
        }

        if($password == $conPassword){
            $roles = "customer";
            $data=array(
                "name"=>$name,
                "password"=>$password,
                "email"=>$email,
                "roles"=>$roles,
				"status"=>1,
            ); 
			$this->Auth_model->register_user($data);    
			$this->session->set_flashdata('msg_regis_succ', 'Register success');
            redirect('/Auth/register');
        }
        else{
            $this->session->set_flashdata('msg_regis_failed', 'Passwords not match');
            redirect('Auth/register');
            return;
        }
		
	}

	public function login_form(){
		//Login try 5 times, failed-> lock 5mins
		$name = $this->input->post('name');
        $password = $this->input->post('password');

		$this->session->set_flashdata('name', $name);
		$this->session->set_flashdata('password', $password);
	
        $attempts_data = $this->Auth_model->get_users($name);
		$total_try = $attempts_data->row();
		if ($total_try && $total_try->attempts >= 5) {
            $last_attempt_time = strtotime($total_try->last_attempt);
            $current_time = strtotime('+7 hours');;
            if (($current_time - $last_attempt_time) < 300) { 
                $this->session->set_flashdata('msg',"Try again after 5 minutes");
				redirect('Auth');
            } else {
                $this->Auth_model->reset_login_attempts($name);
            }
        }
		//validate
		$user = $this->Auth_model->check_user_exits($name, $password);
        $user_num = $user->num_rows();
		if ($user_num>=1) {
            // reset try to 0 when success
            $this->Auth_model->reset_login_attempts($name);
            // $this->session->set_userdata('user_id', $user->id);
			
			//check if user exits
			$this->Auth_model->check_user_exits($name,$password);    
			$row = $user->row();
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
		else {
            //login attemp +=1 when failed
            $this->Auth_model->increase_login_attempts($name);
            $this->session->set_flashdata('msg',"Invalid name or password");
			redirect('Auth');
		}
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
				$status =0;
			}
			$this->Auth_model->update_status($id, $status);
		}
		redirect('Auth/admin_home');
	}
}
