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
            $roles = "customer";
            $data=array(
                "name"=>$this->input->post('name'),
                "password"=>$password,
                "email"=>$this->input->post('email'),
                "roles"=>$roles,
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
        $res=$query->num_rows();
        
        if($res>=1){
            $row = $query->row();
            $user_roles=$row->roles;
            $user_status = $row->status;
            if($user_status == 1){
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
    }

    public function get_users(){
        $query=$this->db->get('users');
        if($query){
            return $query->result_array();
        }
        else{
            echo "Error: " .this->db->error();
        }
    }

    public function get_user_id($id){
        return $this->db->get_where('users',['id'=>$id])->row_array();
    }

    public function update_status($id, $status){
        $this->db->where('id',$id);
        $this->db->update('users',['status'=>$status]);
    }

    public function search_user($search= null){
        if(!empty($search)){
            $this->db->like('name',$search);    
        }
        return $this->db->get('users')->result_array();   
    }
}

?>