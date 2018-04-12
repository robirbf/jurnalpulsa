<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pulsaku extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->lang->load('jurnal');
		$this->load->model('transaksi_model','table_transaksi');

    }
            
    public function index()
    {
        $this->load->view('pulsaku/dashboard/admin');
        
    }
}