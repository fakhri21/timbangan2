<div class="modal fade" id="modal-m_supplier" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Angka Timbangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="body-meja">
        <div class="card">
          <div class="card-body">

            <h3 class="text-center mb-3">Kelola Data Supplier</h3>

            <form id="form_m_supplier" action="<?php echo $action; ?>" method="post">
              <div class="form-group">
                <label for="varchar">Nama
                  <?php echo form_error('nama') ?>
                </label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
              </div>
              <div class="form-group">
                <label for="varchar">Alamat
                  <?php echo form_error('alamat') ?>
                </label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
              </div>
              <div class="form-group">
                <label for="varchar">No Handphone
                  <?php echo form_error('no_handphone') ?>
                </label>
                <input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="No Handphone" value="<?php echo $no_handphone; ?>"
                />
              </div>
              <div class="form-group">
                <label for="varchar">Email
                  <?php echo form_error('email') ?>
                </label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
              </div>
              <input type="hidden" name="uniqid" value="<?php echo $uniqid; ?>" />
              <div class="mt-3"></div>
            </form>
              <button onclick="simpan_supplier()" class="btn btn-success">
                Simpan
              </button>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  
  function simpan_supplier() {
    var data = $("#form_m_supplier").serialize()
    $.post("<?php echo base_url('m_supplier/create_action')?>",data,function () {
      data_supplier()
      alertify.success("Berhasil Menambahkan")
    })
  }
</script>