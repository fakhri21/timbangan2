<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
    <div class="alert alert-default">
        <p class="text-center"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></p>
    </div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="card" style="margin-top: 30px;">
        <div class="card-header">Konfigurasi Timbangan</div>

        <div class="card-body">
            <div class="form-group">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/comp_port">
                    <label>Comp Port</label>
                    <div class="input-group">
                        <select name="value" class="form-control">
                            <option value="COM1">COM1</option>
                            <option value="COM2">COM2</option>
                            <option value="COM9">COM9</option>
                        </select>
                        <div class="input-group-prepend">
                            <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah data</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="form-group">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/baud_rate">
                    <label>Baud Rate</label>
                    <div class="input-group">
                        <select name="value" class="form-control">
                            <option value="2400">2400</option>
                            <option value="9600">9600</option>
                        </select>
                        <div class="input-group-prepend">
                            <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah data</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="form-group">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/data_bits">
                    <label>Data Bits</label>
                    <div class="input-group">
                        <select name="value" class="form-control">
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                        <div class="input-group-prepend">
                            <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah data</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="form-group">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/id_display">
                    <label>Id Display</label>
                    <div class="input-group">
                       <input type="text" class="form-control" name="value" value="<?php echo get_option( 'id_display' ); ?>">
                       <div class="input-group-prepend">
                           <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card" style="margin-top: 30px;">
        <div class="card-header">Konfigurasi Lainnya</div>

        <div class="card-body">
            <div class="form-group">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/coa_kas">
                    <label>Coa Kas</label>
                    <div class="input-group">
                        <div style="width: 60%;"><?php echo cmb_dinamis('value','akuntansi_m_coa','nama_coa','uniqid','uniqid') ?></div>
                        <div class="input-group-prepend">
                            <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah data</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="form-group">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/coa_pendapatan">
                    <label>Coa Pendapatan</label>
                    <div class="input-group">
                        <div style="width: 60%;"><?php echo cmb_dinamis('value','akuntansi_m_coa','nama_coa','uniqid','uniqid') ?></div>
                        <div class="input-group-prepend">
                            <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<div class="col-md-8 col-sm-8 col-xs-12">


    <div class="card" style="margin-top: 30px;">
        <div class="card-header">Profile Perusahaan</div>

        <div class="card-body">
            <label>Nama Perusahaan</label>
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/nama_perusahaan">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="value" value="<?php echo get_option( 'nama_perusahaan' ); ?>">
                    <div class="input-group-prepend">
                        <button class="btn btn-success" type="button"><i class="fa fa-edit"></i> Ubah data</button>
                    </div>
                </div>
            </form>

            <label>Alamat Perusahaan</label>
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/alamat_perusahaan">
                <div class="input-group mb-3">
                    <textarea name="value" class="form-control"><?php echo get_option( 'alamat_perusahaan' ); ?></textarea>
                    <div class="input-group-prepend">
                        <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah data</button>
                    </div>
                </div>
            </form>

            <label>Slogan Perusahaan</label>
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>konfigurasi/aksi/slogan_perusahaan">
                <div class="input-group mb-3">
                    <textarea class="form-control" name="value" value="<?php echo get_option( 'slogan_perusahaan' ); ?>"></textarea>
                    <div class="input-group-prepend">
                        <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah data</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>





<script>
    $(document).ready(function() {

        $("#value").selectize();
        $("#value").selectize();

    })

</script>
