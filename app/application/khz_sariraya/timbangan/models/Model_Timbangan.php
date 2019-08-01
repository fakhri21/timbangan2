<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Timbangan extends CI_Model {

/* Aksi */    

	function penimbangan($table,$data,$uniqid)
    {
        $this->db->set('uniqid',$uniqid);
		$this->db->insert($table,$data);
    }

	function detailpenimbangan($table,$data,$uniqid)
	{
		$this->db->set('uniqid','UUID_SHORT()',FALSE);
		$this->db->set('uniqid_header',$uniqid);
		return $this->db->insert($table,$data);
	}
	
	function isi_timbangan($table,$data,$pilihan,$uniqid)
	{
		
		$this->db->where('uniqid_header', $uniqid);
		if ($pilihan=='bruto') {
            $this->db->set('waktu_masuk','now()',FALSE);
        } else {
            $this->db->set('waktu_keluar','now()',FALSE);
        }
		$this->db->update($table, $data);
		
	}
	

	
/* Kontent */
	 function json() {
        $this->datatables->select('uniqid_header as uniqid,concat(id_timbang,\' - \',no_plat) as id_timbang');
		$this->datatables->where('status', 0);
		$this->datatables->from('timbangan_laporan_penimbangan');
        //add this line for join
        //$this->datatables->join('table2', 'Daftar_struk.field = table2.field');
        return $this->datatables->generate();
    }
	
	function cek_nilai_timbang($uniqid)
	{
		$this->db->select('	bruto,
							netto,
							tarra,
							persen_potongan,
							tambahan_potongan,
							nilai_persatuan,
							o_mobil,
							o_panen,
							cicilan_piutang');
		$this->db->from('timbangan_detail_penimbangan');
		$this->db->where('uniqid_header', $uniqid);
		$this->db->group_by('uniqid_header');
		
		return $this->db->get()->row_array();
		
	}

	function list_customer()
	{
		$this->db->select('*');
		$this->db->from('m_customer');
		return $this->db->get()->result_array();
		
	}

	

}