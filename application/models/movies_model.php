<?php

class Movies_model extends CI_Model {

   function __construct() {
      parent::__construct();
      $this->load->helper('directory');

      $this->path = $this->config->item('movie_dir');
   }

   function get_list() {
      $map = directory_map($this->path, 1);
      $ignore = array(
         'Temporary Items',
         'Network Trash Folder'
      );
      $list = array_diff($map, $ignore);
      sort($list);
      return $list;
   }

}
