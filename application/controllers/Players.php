<?php

class Players extends CI_Controller {

	public function __construct()
	{
		// menjalankan fungsi construct yang ada dikelas parentnya
		parent::__construct();
		$this->load->model('Players_model');
	}


	public function index() 
	{
		$data['title'] = 'Player List';
		$data['players'] = $this->Players_model->getPlayers();

		$this->load->view('templates/header', $data);
		$this->load->view('players/index', $data);
		$this->load->view('templates/footer');
	}
}