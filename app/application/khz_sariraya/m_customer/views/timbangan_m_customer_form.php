<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-6 col-12 mt-5">
  <div class="card">
      <div class="card-body">
          
          <h3 class="text-center mb-3">Data Pelanggan</h3>
          
          <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Handphone <?php echo form_error('no_handphone') ?></label>
            <input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="Masukkan No Handphone" value="<?php echo $no_handphone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Coa <?php echo form_error('coa_piutang') ?></label>
            <select id="coa_piutang" class="form-control" name="coa_piutang"></select>
        </div>
	    <input type="hidden" name="uniqid" value="<?php echo $uniqid; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo base_url('m_customer') ?>" class="btn btn-warning"><i class="fa fa-times"></i> Kembali</a>
	</form>
          
          
          
      </div>
  </div>
</div>
   

<script>
    $.getJSON("<?php echo base_url('akuntansi/laporan_piutang/list_coa_piutang') ?>",function (data) {
        $("#coa_piutang").selectize({
            valueField: 'id_coa',
            labelField: 'nama_coa',
            searchField: 'nama_coa',
            options: data,
            create: false
        });
    })   
</script>