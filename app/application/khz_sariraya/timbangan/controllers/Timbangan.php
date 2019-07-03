<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Timbangan extends CI_Controller {

public $nama_template='template_admin';
public $id_penimbang='';
public $id_group='kasir';
public $priode='';

public $data_product=[];
public $uniqid=NULL;
public $coa_kas=0;
public $kelipatan_point=0;
public $persen_pajak=0;
public $status_kasir='';

public function __construct() {
    parent::__construct();
    $user = wp_get_current_user();
    $this->status_timbangan=get_option('buka_timbangan');
    $this->load->model('Model_Timbangan');
    $this->load->library('datatables');
    $this->load->helper('nuris_helper');
    $this->load->helper('timbangan_helper');

    if ($this->status_timbangan=='') {  
            $this->session->set_flashdata('message_failed', 'Buka Timbangan terlebih dahulu');
            redirect(base_url('tutup_buku'));
        }
    if ( !in_array( 'penimbang', (array) $user->roles ) ) {
                 redirect(base_url('denied'));
             }
    $this->id_penimbang=get_current_user_id();
    $this->priode=get_option('buka_timbangan');
    
}

    
    public function index()
    {
        $user = wp_get_current_user();
        $data['nama_penimbang'] = $user->display_name;
        
        $this->template->load($this->nama_template,'timbangan_utama',$data);
        $this->load->view('kontent/modal_angka_timbangan');
    }

    
/* Kontent */
    public function json_list_timbang()
    {
        header('Content-Type: application/json');
        echo $this->Model_Timbangan->json();
    }
    
    public function nilai_timbangan()
    {
        $option = array( 'portName'  => get_option('comp_port'),
                            'baudRate'  =>get_option('baud_rate'),
                            'bits'      =>get_option('data_bits'),
                            'spotBit'   =>1
                             );
        /* $data= get_nilai_timbangan($option);
        $result=doubleval(substr($data,7,7)); */
        
        $data= get_nilai_timbangan($option);
        $result=doubleval(substr($data,7,7));
        echo $result;


    }
    

/* Aksi */
    
    function hitung_timbangan()
    {
        
        $data['kendaraan']=$this->input->post('kendaraan');
        $data['customer']=$this->input->post('customer');
        $data['bruto']=$this->input->post('bruto');
        $data['tarra']=$this->input->post('tarra');
        $data['persen_potongan']=$this->input->post('persen_potongan');
        $data['nilai']=$this->input->post('nilai');

        $hasil['netto']          =$data['bruto']-$data['tarra'] ;
        $hasil['nilai_potongan'] =$hasil['netto']*$data['persen_potongan']/100 ;
        $hasil['total_bersih']   =$hasil['netto']-$hasil['nilai_potongan'];
        $hasil['jumlah']         =$hasil['total_bersih']*$data['nilai'];
        
        echo "
             <p>Bruto = ".$data['bruto']." </p>
             <p>Tarra = ".$data['tarra']." </p>
             <p>Netto = ".$hasil['netto']." </p>
             <p>Potongan (%) = ".$data['persen_potongan']."% </p>
             <p>Nilai Potongan = ".$hasil['nilai_potongan']." </p>
             <p>Total = ".$hasil['total_bersih']." </p>
             <p>Harga = ".$data['nilai']." </p>
             <p>Jumlah = ".$hasil['jumlah']." </p>

        
             ";
    }
    

    function masuktimbangan()
    {
        $uniqid=$this->input->post('uniqid',TRUE);
        $data['status_timbang']=$this->input->post('status_timbang');
        $data['massa']=$this->input->post('massa');    
        

        if (!$uniqid) {
            $uniqid=uniqid("",TRUE);
        
            $pencatatan= array(
            'id_pencatat'=>$this->id_penimbang,
            'eod'=>$this->priode,
            );

            $data['kendaraan']=$this->input->post('kendaraan');
            $data['customer']=$this->input->post('customer');
            $data['supplier']=$this->input->post('supplier');
            $data['product']=$this->input->post('product');
            $data['persen_potongan']=$this->input->post('persen_potongan');
            $data['o_mobil']=$this->input->post('o_mobil');
            $data['o_panen']=$this->input->post('o_panen');
            $data['cicilan_piutang']=$this->input->post('cicilan_piutang');
            $data['nilai']=$this->input->post('nilai');
            $data['supir']=$this->input->post('supir');
        
            //Header
            $this->Model_Timbangan->penimbangan('timbangan_h_penimbangan',$pencatatan,$uniqid);
            

            //Detail penimbangan
                       $insert = array(    'id_product' =>$data['product'],
                                    'id_kendaraan' =>$data['kendaraan'],
                                    'id_customer' =>$data['customer'],
                                    'id_supplier' =>$data['supplier'],
                                    'persen_potongan' =>$data['persen_potongan'],
                                    'o_mobil' =>$data['o_mobil'],
                                    'o_panen' =>$data['o_panen'],
                                    'cicilan_piutang' =>$data['cicilan_piutang'],
                                    'nilai_persatuan'=>$data['nilai'],
                                    'supir'=>$data['supir']
                                    );

                $this->Model_Timbangan->detailpenimbangan('timbangan_detail_penimbangan',$insert,$uniqid); 

 
        }
            $pilihan=$data['status_timbang'];
            $pesan=$this->isi_timbangan($uniqid,$pilihan,$data['massa']);    

            echo "<pre>";
            print_r($data);
            print_r($pencatatan);
            echo "</pre>";
    }
    

    function isi_timbangan($uniqid,$pilihan='bruto',$massa=NULL)
    {
        $cek_data=$this->Model_Timbangan->cek_nilai_timbang($uniqid);
        $data = array($pilihan =>$massa );
        
        $data['netto']          =$cek_data['bruto']-$massa ;
        $data['nilai_potongan'] =$data['netto']*$cek_data['persen_potongan']/100 ;
        $data['total_bersih']   =$data['netto']-$data['nilai_potongan'];
        $data['jumlah']         =$data['total_bersih']*$cek_data['nilai_persatuan'];
        $data['grand_total']    =$data['jumlah']-$cek_data['o_mobil']-$cek_data['o_panen']-$cek_data['cicilan_piutang'];
        
        $this->Model_Timbangan->isi_timbangan('timbangan_detail_penimbangan',$data,$pilihan,$uniqid);
        return "Berhasil menimbang ".$pilihan;
    }

}

/* End of file Controllername.php */

