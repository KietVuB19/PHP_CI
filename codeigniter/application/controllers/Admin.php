<?php

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index(){
        $data['users']=$this->user_model->get_users();
        // print_r($data['users']);
        // var_dump($data['users']);
        $this->load->view('Auth/admin_home',$data);
    } 
}

?>