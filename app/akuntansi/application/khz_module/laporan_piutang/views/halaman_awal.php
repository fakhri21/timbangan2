<?php
if (!empty($this->session->flashdata('message_success'))) {
    echo '
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Selamat.!</h4>
        '.$this->session->flashdata('message_success').'
    </div>
    ';
}

if (!empty($this->session->flashdata('message_failed'))) {
    echo '
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Perhatian.!</h4>
        '.$this->session->flashdata('message_failed').'
    </div>
    ';
}

?>

<div class="col-md-4 offset-md-4 mt-5 mb-5">
    <div class="card">
            <div class="card-body">
                <h4 class="card-title">Laporan Piutang</h4>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>laporan_piutang/tampil_piutang">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label for="hari" class="input-group-text"><i class="fa fa-calendar"></i></label>
                            </div>
                            <input type="text" name="hari" id="hari" class="hari form-control" placeholder="Masukkan Tanggal Awal" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label for="hari" class="input-group-text"><i class="fa fa-calendar"></i></label>
                            </div>
                            <input type="text" name="hari_akhir" id="hari_akhir" class="hari form-control" placeholder="Masukkan Tanggal Akhir" value="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-2">
                            <label class="align-bottom pt-3">COA</label>
                        </div>
                        <div class="col">
                            <select name="coa" id="coa" value="" class="form-control"></select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Cetak ke</label>
                        </div>
                        <div class="col mx-auto">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input checked type="radio" id="customRadioInline3" name="status" value="0" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline3">Xls</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline4" name="status" value="pdf" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">PDF</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="submit" name="" value="Cetak Sekarang" class="btn-block btn btn-primary">
                        </div>

                    </div>
                </form>
            </div>
        </div>
</div>


<script>

    $(".hari").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    });


</script>
<script>
    $.getJSON("laporan_piutang/list_coa_piutang/",function (data) {
        $("#coa").selectize({
            valueField: 'id_coa',
            labelField: 'nama_coa',
            searchField: 'nama_coa',
            options: data,
            create: false
        });
    })   
</script>