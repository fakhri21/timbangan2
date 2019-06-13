<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_coa_piutang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('nuris_helper');
        $this->load->model('Model_coa');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $user = wp_get_current_user();
        if ( !in_array( 'admin', (array) $user->roles ) ) {
                
                redirect(base_url('denied'));
            }
        
    }

    public function index()
    {
        $tabel = $this->Model_coa->get_all();
        $data['kategori'] = $tabel;
        $this->template->load('template_admin','m_coa_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo json_encode($this->Model_coa->get_all());
    }

    public function get_coa($id){
        header('Content-Type: application/json');
        echo json_encode($this->Model_coa->get_coa($id));
    }

    public function get_coa_id($id){
        header('Content-Type: application/json');
        echo json_encode($this->Model_coa->get_coa_id($id));
    }

    public function update_coa(){
        header('Content-Type: application/json');
        echo json_encode($this->Model_coa->update_coa($uniqid));
    }

    public function add_coa(){
        header('Content-Type: application/json');
        echo json_encode($this->Model_coa->add_coa());
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => base_url('create_action'),
	    'uniqid' => uniqid("COA",TRUE),
	    'id_coa' => set_value('id_coa'),
	    'id_kelompok_coa' => set_value('id_kelompok_coa'),
	    'nama_coa' => set_value('nama_coa'),
	    'saldo_awal' => set_value('saldo_awal'),
	    'quantity' => set_value('quantity'),
	);
        $this->template->load('template_admin','m_coa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_coa' => $this->input->post('id_coa',TRUE),
		'id_kelompok_coa' => $this->input->post('id_kelompok_coa',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'nama_coa' => $this->input->post('nama_coa',TRUE),
		'saldo_awal' => $this->input->post('saldo_awal',TRUE),
		'saldo_normal_special' => $this->input->post('saldo_normal_special',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
	    );

            $this->Model_coa->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('m_coa'));
        }
    }
    
    
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('uniqid', TRUE));
        } else {
            $data = array(
		'id_coa' => $this->input->post('id_coa',TRUE),
		'id_kelompok_coa' => $this->input->post('id_kelompok_coa',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'nama_coa' => $this->input->post('nama_coa',TRUE),
		'saldo_awal' => $this->input->post('saldo_awal',TRUE),
		'saldo_normal_special' => $this->input->post('saldo_normal_special',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
	    );

            $this->Model_coa->update($this->input->post('uniqid', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('m_coa'));
        }
    }
    
    

    public function _rules() 
    {
	$this->form_validation->set_rules('id_coa', 'id coa', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	//$this->form_validation->set_rules('id_kelompok_coa', 'id kelompok coa', 'trim|required');
	$this->form_validation->set_rules('nama_coa', 'nama coa', 'trim|required');
	$this->form_validation->set_rules('saldo_awal', 'saldo awal', 'trim|required|numeric');

	$this->form_validation->set_rules('uniqid', 'uniqid', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_coa.php */
/* Location: ./application/controllers/M_coa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-10 04:22:50 */
/* http://harviacode.com */