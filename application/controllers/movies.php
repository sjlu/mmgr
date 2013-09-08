<?php

class Movies extends CI_Controller {

   function __construct() {
      parent::__construct();

      $this->load->model(array(
         'couchpotato_model',
         'movies_model'
      ));
   }

   public function index() {
      $this->load->view('include/header');
      $this->load->view('movies', array(
         'watching' => $this->couchpotato_model->get_watch_list(),
         'have' => $this->movies_model->get_list(),
         'added' => $this->input->get('added') == 1
      ));
      $this->load->view('include/footer');
   }

   public function search() {
      echo json_encode($this->couchpotato_model->search($this->input->get('q')));
   }

   public function add() {
      $res = $this->couchpotato_model->add_movie($this->input->post('id'));
      redirect('/movies?added=1');
   }

}