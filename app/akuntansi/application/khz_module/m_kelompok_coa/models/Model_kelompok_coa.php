<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_kelompok_coa extends CI_Model
{

    public $table = 'm_kelompok_coa';
    public $id = 'uniqid';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('m_kelompok_coa.uniqid,id_kelompok_coa,nama_kelompok_coa');
        $this->datatables->from('m_kelompok_coa');
        //add this line for join
        $this->datatables->add_column('action', anchor(base_url('m_kelompok_coa/read/$1'),'Read')." | ".anchor(base_url('m_kelompok_coa/update/$1'),'Update')." | ".anchor(base_url('m_kelompok_coa/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'uniqid');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('uniqid', $q);
	$this->db->or_like('id_kelompok_coa', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('nama_kelompok_coa', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('uniqid', $q);
	$this->db->or_like('id_kelompok_coa', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('nama_kelompok_coa', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->set('uniqid','UUID()',FALSE);
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Model_kelompok_coa.php */
/* Location: ./application/models/Model_kelompok_coa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-10 04:31:31 */
/* http://harviacode.com */