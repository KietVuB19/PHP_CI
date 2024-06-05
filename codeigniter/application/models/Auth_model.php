<?php

class Auth_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function register_user(){
        $password=$this->input->post('password');
        $conPassword=$this->input->post('conPass');
        
        if($password == $conPassword){
            $data=array(
                "name"=>$this->input->post('name'),
                "password"=>$password,
                "email"=>$this->input->post('email'),
            );
            $this->db->insert('users',$data);    
            redirect('/Auth');
        }
        else{
            redirect('Auth/register');
        }
    }

    public function login_user(){
        $password=$this->input->post('password');                
        $name=$this->input->post('name');

        $this->db->where('name',$name);
        $this->db->where('password',$password);
        
        $query=$this->db->get('users');
        $res=$query->num_rows($query);
        
        if($res>=1){
            $row = $query->row();
            $user_roles=$row->roles;
            if($user_roles == 'customer'){
                redirect('Auth/cus_home');
            }
            else{
                redirect('Auth/admin_home');
            }
        }
        else{
            redirect('/Auth');
        }
    }
}

?>