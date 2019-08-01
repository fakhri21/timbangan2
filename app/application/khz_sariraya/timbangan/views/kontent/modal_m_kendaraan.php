<div class="modal fade" id="modal-m_kendaraan" tabindex="-1" role="dialog">
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

            <div class="mt-2 mb-2">
              <h3 class="text-center">Formulir Kendaraan</h3>
            </div>

            <form id="form_m_kendaraan" method="post">
              <div class="form-group">
                <label for="varchar">Id Kendaraan
                  <?php echo form_error('id_kendaraan') ?>
                </label>
                <input type="text" class="form-control" name="id_kendaraan" id="id_kendaraan" placeholder="Id Kendaraan" value="<?php echo $id_kendaraan; ?>"
                />
              </div>
              <div class="form-group">
                <label for="varchar">No Plat
                  <?php echo form_error('no_plat') ?>
                </label>
                <input type="text" class="form-control" name="no_plat" id="no_plat" placeholder="No Plat" value="<?php echo $no_plat; ?>"
                />
              </div>
              <div class="form-group">
                <label for="varchar">Nama Kendaraan
                  <?php echo form_error('nama_kendaraan') ?>
                </label>
                <input type="text" class="form-control" name="nama_kendaraan" id="nama_kendaraan" placeholder="Nama Kendaraan" value="<?php echo $nama_kendaraan; ?>"
                />
              </div>
              <input type="hidden" name="uniqid" value="<?php echo $uniqid; ?>" />
            </form>
            <button onclick="simpan_kendaraan()" class="btn btn-primary">
              <i class="fa fa-save"></i> Simpan</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  
  function simpan_kendaraan() {
    var data = $("#form_m_kendaraan").serialize()
    $.post("<?php echo base_url('m_kendaraan/create_action')?>",data,function () {
      data_kendaraan()
      alertify.success("Berhasil Menambahkan")
      
    })
  }
</script>