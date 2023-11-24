<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Maintenance_m', 'Dashboard_m']);
        $name = $this->session->userdata('name');
        $this->db->set('activity', date("Y-m-d H:i:s"));
        $this->db->where('name', $name);
        $this->db->update('user');
    }

	public function index()
	{
        $data_mhs = $this->Dashboard_m->get()->result();
        // var_dump(date("d-m-Y", strtotime($data_mhs[0]->created_at)));
        // die();
        $maintenance = $this->Maintenance_m->maintenance();
        if($maintenance != true){
            $data = [
                'title'         => 'Dashboard',
                'description'   => '',
                'content'       => 'dashboard/dashboard',
                'row'           => $data_mhs
            ];
            $this->load->module('template');
            $this->template->index($data);
        }else{
            $this->load->view('maintenance');
        }
	}

}
