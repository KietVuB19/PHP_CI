<?php

class Auth_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function register_user($data){
            $this->db->insert('users',$data);    
    }

    public function is_name_taken($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }

    public function check_user_exits($name, $password){
        $this->db->where('name',$name);
        $this->db->where('password',$password);
        return $query=$this->db->get('users');
        // return $query->num_rows();
    }

    public function logout_user(){
        $this->session->unset_userdata('log_in_name');
        $this->session->unset_userdata('role');
        $this->session->sess_destroy();
        redirect('Auth/');
    }

    public function get_users(){
        $query=$this->db->get('users');
        if($query){
            return $query->result_array();
        }
        else{
            echo "Error: " .$this->db->error();
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
        $query = $this->db->get('users');
        return $query->result_array();   
    }

    public function get_login_attempts($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function increment_login_attempts($name) {
        $attempts_data = $this->get_login_attempts($name);
        if ($attempts_data) {
            $this->db->where('name', $name);
            $this->db->update('users', array(
                'attempts' => $attempts_data->attempts + 1,
                'last_attempt' => date('Y-m-d H:i:s')
            ));
        } else {
            $this->db->insert('login_attempts', array(
                'name' => $name,
                'attempts' => 1,
                'last_attempt' => date('Y-m-d H:i:s')
            ));
        }
    }

    public function reset_login_attempts($name) {
        $data = array('attempts'=>0);
        $this->db->where('name', $name);
        $this->db->update('users',$data);
    }
}

?>