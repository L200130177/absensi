<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select("absen.*,mahasiswa.nim as nim,mahasiswa.nama as nama");
		$this->db->from('absen');
		$this->db->join('mahasiswa','mahasiswa.id = absen.mahasiswa_id');
		if($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

}