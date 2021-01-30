<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(
			'breadcrumb' => 'Dashboard',
			'dropdown_master' => 'collapse'
		);
		$data['page'] = $this->load->view('page_dashboard',array(),true);

		$this->parser->parse('layout_admin',$data);
	}
	
	public function tampilkan_session(){
		$username = $this->session->userdata('username');
		$email = $this->session->userdata('email');
		$logged_in = $this->session->userdata('logged_in');

		echo $username. ' | '. $email . ' | ' . $logged_in;
	}

	public function logout(){
		$this->session->sess_destroy();

		redirect('login');
	}

}
