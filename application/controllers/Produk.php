<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

        public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model','produk');
    }

	public function load_produk()
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            
            $this->load->view('backend/pages/produk_view');
            
        }  
       
    }

    public function Load_SchoolProfile()
    {
        $this->load->view('chart');
    }

    public function Load_Subjek()
    {
        $this->load->view('subjek');
    }

    public function Load_Activity()
    {
        $this->load->view('activity');
    }

        public function Load_Notes()
    {
        $this->load->view('notes');
    }

        public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'home/index/');
    }

    public function ajax_list()
    {
        $list = $this->produk->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produk) {
            $no++;
            $row = array();
            $row[] = $produk->kd_produk;
            $row[] = $produk->nm_prdk;
            $row[] = $produk->hrg_server;
            $row[] = $produk->hrg_jual;
            

            //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_produk('."'".$produk->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_produk('."'".$produk->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->produk->count_all(),
                        "recordsFiltered" => $this->produk->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->produk->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
                'kd_produk' => $this->input->post('kd_produk'),
                'nm_prdk' => $this->input->post('nm_prdk'),
                'hrg_server' => $this->input->post('hrg_server'),
                'hrg_jual' => $this->input->post('hrg_jual'),                
            );
        $insert = $this->produk->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
                'kd_produk' => $this->input->post('kd_produk'),
                'nm_prdk' => $this->input->post('nm_prdk'),
                'hrg_server' => $this->input->post('hrg_server'),
                'hrg_jual' => $this->input->post('hrg_jual'),
            );
        $this->produk->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->produk->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

        public function list_by_id($id){

    $data['output'] = $this->produk->get_by_id_view($id);
    $this->load->view('view_Detail', $data);
}

}
