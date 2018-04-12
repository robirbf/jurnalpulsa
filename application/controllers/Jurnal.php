<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->lang->load('jurnal');
		//$this->load->model('m_pelanggan','pelanggan'); //ajax
		$this->load->model('pelanggan_model','person');

	}

	public function index(){
	
	if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
	else
		{
			
			$this->load->view('backend/template/dashboard');
			
		}
	}

	public function daftar_transaksi(){
	
		if (!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
		else
			{
				//$data['menu_sts_trx'] = 'active treeview';
				$this->load->view('backend/template/menu',$data);
				$this->load->view('backend/pages/daftartransaksi');
				$this->load->model('m_transaksi');

				
			}
		}

	public function datapelanggan(){

		if (!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
		else
			{
				$this->load->model('pelanggan_model');
				$data ['daftarpelanggan']= $this->pelanggan_model->datapelanggan()->result();	
						// print_r ($datapelanggan);						
				$this->load->view('backend/pages/datapelanggan',$data);
				
				
			}
		}

	public function add_datapelanggan() {
		$data = array(
				'kd_pel' 	=> $this->input->post('kd_pel'),
				'nama' 		=> $this->input->post('nama'),
				'no_hp' 	=> $this->input->post('no_hp'),

		);
		$insert = $this->pelanggan_model->add_datapelanggan($data);
		echo json_encode(array("status"=> true));
				
					
		}

	public function load_datapelanggan()
	{
	$this->load->view('backend/pages/pelanggan_view');
    }


	public function pelanggan_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->id_pel;
            $row[] = $person->kd_pel;
            $row[] = $person->nama;
            $row[] = $person->no_hp;
           

            //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->person->count_all(),
                        "recordsFiltered" => $this->person->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'dob' => $this->input->post('dob'),
            );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'dob' => $this->input->post('dob'),
            );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

        public function list_by_id($id){

    $data['output'] = $this->person->get_by_id_view($id);
    $this->load->view('view_Detail', $data);
}
	
}
