<?php

class Couchpotato_model extends CI_Model {

   function __construct() {
      parent::__construct();
      $this->load->library('curl');

      $this->url = $this->config->item('couchpotato_api_url');
   }

   function get_watch_list() {
      $req = $this->curl->simple_get($this->url . '/movie.list?status=active');
      return json_decode($req, true);
   }

   function search($query) {
      $req = $this->curl->simple_get($this->url . '/movie.search?q=' . urlencode($query));
      $req = json_decode($req, true);

      $suggestions = array();
      foreach ($req['movies'] as $movie) {
         if (empty($movie['imdb']) || empty($movie['year'])) {
            continue;
         }

         $suggestions[] = array(
            'title' => $movie['original_title'] . ' (' . $movie['year'] . ')',
            'id' => $movie['imdb']
         );
      }
      return $suggestions;
   }

   function add_movie($id) {
      $req = $this->curl->simple_get($this->url . '/movie.add?identifier=' . $id);
      return json_decode($req);
   }


}
