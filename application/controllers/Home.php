<?php

class Home extends CI_Controller {
	public function index($name='')
	{	
		$data['title'] = 'Homepage';
		$data['name'] = $name;

		$this->load->view('templates/header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}
}