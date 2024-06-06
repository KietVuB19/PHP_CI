<?php

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function viewRecord(){
        $data['users']=$this->auth_model->get_users();
        $this->load->view('Auth/admin_home',$data);
    } 
}

?>