<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akuntansi_m_coa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akuntansi_m_coa_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template_admin','akuntansi_m_coa/akuntansi_m_coa_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Akuntansi_m_coa_model->json();
    }

    public function read($id) 
    {
        $row = $this->Akuntansi_m_coa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'uniqid' => $row->uniqid,
		'id_coa' => $row->id_coa,
		'id_kelompok_coa' => $row->id_kelompok_coa,
		'id_kategori' => $row->id_kategori,
		'nama_coa' => $row->nama_coa,
		'uniqid_sub' => $row->uniqid_sub,
		'saldo_awal' => $row->saldo_awal,
		'saldo_normal_special' => $row->saldo_normal_special,
		'quantity' => $row->quantity,
	    );
            $this->template->load('template_admin','akuntansi_m_coa/akuntansi_m_coa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('akuntansi_m_coa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => base_url('akuntansi_m_coa/create_action'),
	    'uniqid' => set_value('uniqid'),
	    'id_coa' => set_value('id_coa'),
	    'id_kelompok_coa' => set_value('id_kelompok_coa'),
	    'id_kategori' => set_value('id_kategori'),
	    'nama_coa' => set_value('nama_coa'),
	    'uniqid_sub' => set_value('uniqid_sub'),
	    'saldo_awal' => set_value('saldo_awal'),
	    'saldo_normal_special' => set_value('saldo_normal_special'),
	    'quantity' => set_value('quantity'),
	);
        $this->template->load('template_admin','akuntansi_m_coa/akuntansi_m_coa_form', $data);
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
		'uniqid_sub' => $this->input->post('uniqid_sub',TRUE),
		'saldo_awal' => $this->input->post('saldo_awal',TRUE),
		'saldo_normal_special' => $this->input->post('saldo_normal_special',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
	    );

            $this->Akuntansi_m_coa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('akuntansi_m_coa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Akuntansi_m_coa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('akuntansi_m_coa/update_action'),
		'uniqid' => set_value('uniqid', $row->uniqid),
		'id_coa' => set_value('id_coa', $row->id_coa),
		'id_kelompok_coa' => set_value('id_kelompok_coa', $row->id_kelompok_coa),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'nama_coa' => set_value('nama_coa', $row->nama_coa),
		'uniqid_sub' => set_value('uniqid_sub', $row->uniqid_sub),
		'saldo_awal' => set_value('saldo_awal', $row->saldo_awal),
		'saldo_normal_special' => set_value('saldo_normal_special', $row->saldo_normal_special),
		'quantity' => set_value('quantity', $row->quantity),
	    );
            $this->template->load('template_admin','akuntansi_m_coa/akuntansi_m_coa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('akuntansi_m_coa'));
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
		'uniqid_sub' => $this->input->post('uniqid_sub',TRUE),
		'saldo_awal' => $this->input->post('saldo_awal',TRUE),
		'saldo_normal_special' => $this->input->post('saldo_normal_special',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
	    );

            $this->Akuntansi_m_coa_model->update($this->input->post('uniqid', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('akuntansi_m_coa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Akuntansi_m_coa_model->get_by_id($id);

        if ($row) {
            $this->Akuntansi_m_coa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('akuntansi_m_coa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('akuntansi_m_coa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_coa', 'id coa', 'trim|required');
	$this->form_validation->set_rules('id_kelompok_coa', 'id kelompok coa', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('nama_coa', 'nama coa', 'trim|required');
	$this->form_validation->set_rules('uniqid_sub', 'uniqid sub', 'trim|required');
	$this->form_validation->set_rules('saldo_awal', 'saldo awal', 'trim|required|numeric');
	$this->form_validation->set_rules('saldo_normal_special', 'saldo normal special', 'trim|required');
	$this->form_validation->set_rules('quantity', 'quantity', 'trim|required|numeric');

	$this->form_validation->set_rules('uniqid', 'uniqid', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Akuntansi_m_coa.php */
/* Location: ./application/controllers/Akuntansi_m_coa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-25 13:59:40 */
/* http://harviacode.com */