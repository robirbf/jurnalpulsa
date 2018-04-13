<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->lang->load('jurnal');
		$this->load->model('pelanggan_model','pelanggan');

    }
            
    public function load_pelanggan()
        {

            if (!$this->ion_auth->logged_in())
            {
                // redirect them to the login page
                redirect('auth/login', 'refresh');
            }
            else
            {
                
                $this->load->view('backend/pages/pelanggan_view');
                
            }  
        }
            
        public function daftarpelanggan()
	{
		$list = $this->pelanggan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pelanggan) {
			$no++;
			$row = array();
			$row[] = $pelanggan->kd_pel;
			$row[] = $pelanggan->nama;
			$row[] = $pelanggan->no_hp;
			
            
            $data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pelanggan->count_all(),
						"recordsFiltered" => $this->pelanggan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()
	{
		$data = array(
				'kd_pel' => $this->input->post('kd_pel'),
				'nama' => $this->input->post('nama'),
				'no_hp' => $this->input->post('no_hp'),
				
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	
        



}