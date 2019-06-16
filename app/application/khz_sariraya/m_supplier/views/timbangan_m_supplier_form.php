<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-6 col-12 mt-5">
  <div class="card">
      <div class="card-body">
          
          <h3 class="text-center mb-3">Kelola Data Supplier</h3>
          
          <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Handphone <?php echo form_error('no_handphone') ?></label>
            <input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="No Handphone" value="<?php echo $no_handphone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <input type="hidden" name="uniqid" value="<?php echo $uniqid; ?>" />
	    <div class="mt-3"></div>
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo base_url('m_supplier') ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Kembali</a>
	</form>
          
          
          
      </div>
  </div>
</div>
   