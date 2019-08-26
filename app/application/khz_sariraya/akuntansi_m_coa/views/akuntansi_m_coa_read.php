<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">Akuntansi_m_coa Read</h2>
        <div class="box">
        <div class="box-body">
        <table class="table">
	    <tr><td>Id Coa</td><td><?php echo $id_coa; ?></td></tr>
	    <tr><td>Id Kelompok Coa</td><td><?php echo $id_kelompok_coa; ?></td></tr>
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td>Nama Coa</td><td><?php echo $nama_coa; ?></td></tr>
	    <tr><td>Uniqid Sub</td><td><?php echo $uniqid_sub; ?></td></tr>
	    <tr><td>Saldo Awal</td><td><?php echo $saldo_awal; ?></td></tr>
	    <tr><td>Saldo Normal Special</td><td><?php echo $saldo_normal_special; ?></td></tr>
	    <tr><td>Quantity</td><td><?php echo $quantity; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('akuntansi_m_coa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>