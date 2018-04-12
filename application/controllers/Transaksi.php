<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->lang->load('jurnal');
		$this->load->model('transaksi_model','transaksi');

    }
            
    public function load_transaksi()
        {

            if (!$this->ion_auth->logged_in())
            {
                // redirect them to the login page
                redirect('auth/login', 'refresh');
            }
            else
            {
                
                $this->load->view('backend/pages/transaksi_view');
                
            }  
        }
            
        public function daftartransaksi()
	{
		$list = $this->transaksi->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $transaksi) {
			$no++;
			$row = array();
			$row[] = $transaksi->tanggal;
			$row[] = $transaksi->trxid;
			$row[] = $transaksi->kode;
			$row[] = $transaksi->tujuan;
            $row[] = $transaksi->status;
            $row[] = $transaksi->harga;
            $row[] = $transaksi->sn;
            $row[] = $transaksi->pengirim;
            $row[] = $transaksi->via;
            
            $data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->transaksi->count_all(),
						"recordsFiltered" => $this->transaksi->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

        
        



}