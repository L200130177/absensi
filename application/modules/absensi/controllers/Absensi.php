<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
        $this->load->view('absensi');
	}

    public function validate_absen()
    {
        $nim = htmlentities($this->input->post('nim'));
        $check = $this->db->get_where('mahasiswa', array('nim' => $nim))->row_array();
        if($check){
            $config['upload_path']          = FCPATH.'/upload/ttd_digital/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = $nim;
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB

            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('ttd_digital')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('absensi', $error);
            } else {
                $uploaded_data = $this->upload->data();
                $data = [
                    'mahasiswa_id'  => $check['id'],
                    'ttd'           => $uploaded_data['file_name'],
                ];
                $this->load->model('dashboard/Dashboard_m');
                $data_mhs = $this->Dashboard_m->get()->result();
                $check_absen = $this->db->get_where('absen', array('mahasiswa_id' => $check['id']))->row_array();
                if($check_absen == NULL){
                    $insert = $this->db->insert('absen',$data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"></i>Terimakasih sudah melakukan absensi</div>');
                    redirect('landing');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"></i>Anda sudah melakukan absensi sebelumnya</div>');
                    redirect('absensi');
                }
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"></i>NIM tidak terdaftar</div>');
            redirect('absensi');
        }
    }

}
