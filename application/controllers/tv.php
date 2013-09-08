<?php

class Tv extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('sickbeard_model');
	}

	function index() {
		$this->load->view('include/header');
		$this->load->view('tv', array(
			'shows' => $this->sickbeard_model->get_shows(),
			'history' => $this->sickbeard_model->get_history()
		));
		$this->load->view('include/footer');
	}
}