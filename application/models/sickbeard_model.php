<?php

class Sickbeard_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('curl');
		$this->url = $this->config->item('sickbeard_api_url');
	}

	function get_shows() {
		$res = $this->curl->simple_get($this->url . '?cmd=shows');
		$res = json_decode($res, true);
		$res = $res['data'];

		function sort_by_name($a, $b) {
			return strcasecmp($a['show_name'], $b['show_name']);
		}
		usort($res, "sort_by_name");

		foreach ($res as &$series) {
			$series['readable_next_ep_airdate'] = '';
			if (empty($series['next_ep_airdate'])) continue;

			$time = strtotime($series['next_ep_airdate']);
			$series['readable_next_ep_airdate'] = date("D n/j", $time);
		}

		return $res;
	}

	function get_history() {
		$res = $this->curl->simple_get($this->url . "?cmd=history&type=downloaded");
		$res = json_decode($res, true);
		$res = $res['data'];

		foreach ($res as &$episode) {
			$episode['number'] = 'S' . str_pad($episode['season'], 2, 0, STR_PAD_LEFT);
			$episode['number'] .= 'E' . str_pad($episode['episode'], 2, 0, STR_PAD_LEFT);

			$time = strtotime($episode['date']);
			$episode['readable_date'] = date("D n/j g:i a", $time);
		}

		return $res;
	}

}