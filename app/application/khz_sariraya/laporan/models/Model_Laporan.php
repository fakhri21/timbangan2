<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Laporan extends CI_Model
{

    public $table = 'h_transaksi';
    public $id = 'uniqid';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('*');
        $this->datatables->from('timbangan_laporan_struk');
        //add this line for join
        //$this->datatables->join('table2', 'Daftar_struk.field = table2.field');
        $this->datatables->add_column('action', anchor(base_url('daftar_struk/read/$1'),'Print Ulang'), 'uniqid');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // laporan_penjualan
    function laporan_penjualan($w_awal,$w_akhir,$kondisi,$status)
    {
        $this->db->select('*');
		$this->db->from('timbangan_laporan_penimbangan');
		if (!empty($w_awal)) {
			$this->db->where('date(eod) >= '.$w_awal.' and date(eod)<=	'.$w_akhir.'');
		}
        else {
            $this->db->where('eod',0);
        }
        /* if ($kondisi==0) {
            $this->db->where('nama_customer IS NOT NULL');
        }
        else {
            $this->db->where('nama_supplier IS NOT NULL');
        } */
		$this->db->where('status_timbang',$status);
        $this->db->order_by('id_timbang', 'asc');
        
        return $this->db->get()->result_array();
		
    }
    
    // laporan_penjualan
    function laporan_serah_terima($w_awal,$w_akhir,$status)
    {
        $this->db->select('MIN(waktu_timbang) as waktu_masuk ,MAX(waktu_timbang) as waktu_keluar,nama_penimbang,sum(total_bersih) as pendapatan,');
		$this->db->from('timbangan_laporan_penimbangan');
		if (!empty($w_awal)) {
			$this->db->where('date(eod) >= '.$w_awal.' and date(eod)<=	'.$w_akhir.'');
		}
        else {
            $this->db->where('eod',0);
        }
        
		$this->db->where('status_timbang',$status);
        $this->db->group_by('nama_penimbang');
        
		
        return $this->db->get()->result_array();
		
    }
    
    //urut jenis
    function urut_jenis()
    {
        
        $this->db->select('id_jenis,nama_jenis');
        $this->db->from('m_jenis');
        $this->db->order_by('id_jenis', 'ASC');
        
        $header=$this->db->get()->result_array();
             $index=0;
        foreach ($header as $data) {
            $this->db->select('
							concat(prefix_bill,DATE_FORMAT(b.waktu_order,"%y%m"),b.id_metode,right(concat(prefix_number,id_transaksi),4))as id_bill,
							DATE_FORMAT(b.waktu_order,"%a") as hari,
							DATE_FORMAT(b.waktu_order,"%d-%m-%y") as tanggal,
							DATE_FORMAT(b.waktu_order,"%H:%i") as waktu,
							b.total_kotor,
							b.potongan,
							b.nilai_pajak,
							b.total,
							d.harga_jual,
							d.quantity,
							d.diskon_persen,
							d.pajak as pajak_persen,
							f.nama_jenis,
							e.id_product,
                            e.nama_product,');
            $this->db->from('h_transaksi b');
            $this->db->where('f.id_jenis',$data['id_jenis']);
            //$this->db->where('b.status',$status_bill);		
            $this->db->join('detail_transaksi d','d.uniqid_transaksi=b.uniqid','inner');
            $this->db->join('m_product e','d.id_product=e.id_product','left');
            $this->db->join('m_jenis f','e.id_jenis=f.id_jenis','left');
            $detail=$this->db->get()->result_array();

            $header[$index]['detail']=$detail;
            $index++;
  
        } 
        return $header;
    }

public function get_jenis()
{
    $this->db->select('id_jenis,nama_jenis');
    $this->db->from('m_jenis');
    $this->db->order_by('id_jenis', 'ASC');
    $this->db->get()->result_array();
        
}    

}

/* End of file Model_kategori.php */
/* Location: ./application/models/Model_kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-02-02 07:57:08 */
/* http://harviacode.com */