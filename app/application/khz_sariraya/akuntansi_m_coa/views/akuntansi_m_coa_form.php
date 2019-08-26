<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Akuntansi_m_coa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Coa <?php echo form_error('id_coa') ?></label>
            <input type="text" class="form-control" name="id_coa" id="id_coa" placeholder="Id Coa" value="<?php echo $id_coa; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Id Kelompok Coa <?php echo form_error('id_kelompok_coa') ?></label>
            <input type="text" class="form-control" name="id_kelompok_coa" id="id_kelompok_coa" placeholder="Id Kelompok Coa" value="<?php echo $id_kelompok_coa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Kategori <?php echo form_error('id_kategori') ?></label>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Coa <?php echo form_error('nama_coa') ?></label>
            <input type="text" class="form-control" name="nama_coa" id="nama_coa" placeholder="Nama Coa" value="<?php echo $nama_coa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Uniqid Sub <?php echo form_error('uniqid_sub') ?></label>
            <input type="text" class="form-control" name="uniqid_sub" id="uniqid_sub" placeholder="Uniqid Sub" value="<?php echo $uniqid_sub; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Saldo Awal <?php echo form_error('saldo_awal') ?></label>
            <input type="text" class="form-control" name="saldo_awal" id="saldo_awal" placeholder="Saldo Awal" value="<?php echo $saldo_awal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Saldo Normal Special <?php echo form_error('saldo_normal_special') ?></label>
            <input type="text" class="form-control" name="saldo_normal_special" id="saldo_normal_special" placeholder="Saldo Normal Special" value="<?php echo $saldo_normal_special; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Quantity <?php echo form_error('quantity') ?></label>
            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" />
        </div>
	    <input type="hidden" name="uniqid" value="<?php echo $uniqid; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('akuntansi_m_coa') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>