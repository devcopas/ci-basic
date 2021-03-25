<?php

class Players_model extends CI_model {
	public function getPlayers()
	{
		return $query = $this->db->get('players')->result_array();
	}
}