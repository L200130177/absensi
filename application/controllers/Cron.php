<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends MY_Controller {

    public function reset_absen()
	{
		$query = $this->db->empty_table('absen');
		return $query;
	}

	public function set_token()
	{
		$query = $this->db->query("
		SELECT user_id, activity
		FROM user
		WHERE NOW() >= activity + INTERVAL 2 HOUR");
		foreach($query->result() as $r){
			$this->db->set('remember_token', null);
			$this->db->where('user_id', $r->user_id);
			$this->db->update('user');
		}
	}

}
