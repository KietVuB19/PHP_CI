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
        $query = $this->get_users($name);
        return $query->num_rows() > 0;
    }

    public function check_user_exits($name, $password){
        $this->db->where('name',$name);
        $this->db->where('password',$password);
        return $query=$this->db->get('users');
    }

    public function logout_user(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('log_in_name');
        $this->session->unset_userdata('role');
        $this->session->sess_destroy();
        redirect('Auth/');
    }

    public function get_users($name){
        $this->db->where('name', $name);
        return $query=$this->db->get('users');
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

    public function time_update(){
        $current_time=new DateTime();
        $current_time->modify('+7 hours');
        return $formatted_time = $current_time->format('Y-m-d H:i:s');
    }

    public function increase_login_attempts($name) {
        $attempts_data = $this->get_users($name)->row();
        $current_time=$this->time_update(); 
        if ($attempts_data) {
            $this->db->where('name', $name);
            $this->db->update('users', array(
                'attempts' => $attempts_data->attempts + 1,
                'last_attempt' => $current_time
            ));
        }
        else{
            return;
        }
    }

    public function reset_login_attempts($name) {
        $current_time=$this->time_update(); 
            $data = array('attempts'=>0,
            'last_attempt' => $current_time
        );
        $this->db->where('name', $name);
        $this->db->update('users',$data);
    }
}

?>