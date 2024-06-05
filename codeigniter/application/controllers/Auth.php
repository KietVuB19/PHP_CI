<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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

	public function admin_home()
	{
		$this->load->view('Auth/admin_home');
	}
}
