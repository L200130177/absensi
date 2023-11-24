<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends MY_Controller {

    public function reset_absen()
	{
		$query = $this->db->empty_table('absen');
		return $query;
	}

}
