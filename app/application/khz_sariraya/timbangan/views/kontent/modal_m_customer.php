<div class="modal fade" id="modal-m_customer" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Angka Timbangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="body-meja">
        <div class="col-md-12" style="margin-top: 30px;">
          <h3>Kelola Customer</h3>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
          <form id="form_m_customer"  method="post">
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
            <div class="form-group">
              <label for="varchar">Coa
                <?php echo form_error('coa_piutang') ?>
              </label>
              <select id="coa_piutang" name="coa_piutang"></select>
            </div>
            <input type="hidden" name="uniqid" value="<?php echo $uniqid; ?>" />
          </form>
          <button onclick="simpan_customer()" class="btn btn-primary">Simpan</button>
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
      </div>
    </div>
  </div>
</div>

<script>
  
  function simpan_customer() {
    var data = $("#form_m_customer").serialize()
    $.post("<?php echo base_url('m_customer/create_action')?>",data,function () {
      data_customer()
      alertify.success("Berhasil Menambahkan")
    })
  }
</script>