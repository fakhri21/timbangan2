<div class="mt-3">


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="mt-2 mb-4">

        </div>



        <div class="col-md-6 offset-md-3 mt-2 mb-2">
            <a style="padding: 9px 15px; background: #81c784; color: #fff; cursor: pointer; border-radius:3px;" onclick="goBack()"><i class="fa fa-angle-left"></i> Kembali</a>

            <script>
                function goBack() {
                    window.history.back();
                }

            </script>
            <div class="card mt-4">
                <div class="card-header">Piutang Timbangan</div>
                <div class="card-body">


                    <div class="row">


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Customer</label>
                                <select id="id_coa_customer" placeholder="Pilih Customer"></select>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="radio-inline"><input checked="1" onclick="$('#form-faktur-timbang').show()" id="type" type="radio" name="status" value="piutang">Piutang</label>
                                <label class="radio-inline"><input onclick="$('#form-faktur-timbang').hide()" id="type" type="radio" name="status" value="bayar_hutang">Bayar Hutang</label>
                            </div>
                        </div>

                        <div id="form-faktur-timbang" class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">

                                <label>Untuk Pembayaran</label>
                                <div class="input-group">
                                    <select id="id_timbang" style="width: 60%" placeholder="Pembayaran"> </select>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><button type="" onclick="isi_jumlah()">Pilih</button></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input id="nilai" oninput="" placeholder="IDR" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea id="keterangan" placeholder="Keterangan" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button class="btn btn-success" onclick="tambah_jurnal()"><i class="fa fa-check"></i> Ok</button>
                            <button class="btn btn-danger" onclick="location.reload()"><i class="fa fa-remove"></i> Cancel</button>
                        </div>

                    </div><!-- row -->


                </div>
            </div>
        </div>


    </div><!-- col -->

</div>




<script>
    var cleaveNumeral = new Cleave('#nilai', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

</script>

<script>
    $.getJSON("<?php echo base_url('piutang/list_customer_coa_piutang'); ?>", function(data) {
        data
        $("#id_coa_customer").selectize({
            valueField: 'uniqid_coa_piutang',
            labelField: 'nama',
            searchField: 'nama',
            options: data,
            create: false
        });
    })

    $.getJSON("<?php echo base_url('piutang/list_jumlah_timbang'); ?>", function(data) {
        $("#id_timbang").selectize({
            valueField: 'jumlah',
            labelField: 'id_timbang',
            searchField: 'id_timbang',
            options: data,
            create: false
        });

    })

</script>

<script>
    var uniqid = null;
    var id_voucher_terpilih = null;

    function isi_jumlah() {
        $("#nilai").val($("#id_timbang").val())
    }

    function tambah_jurnal() {
        var type = $("#type:checked").val()
        var data = {
            'id_coa_customer': $('#id_coa_customer').val(),
            'nilai': numeral($('#nilai').val()).value(),
            'keterangan': $('#keterangan').val()
        }

        alertify.confirm("Apakah anda yakin ?", function(e) {
            if (e) {
                $.post('<?php echo base_url("piutang/piutang_timbangan/"); ?>' + type + '', data, function(response) {
                    alertify.success("Berhasil Menambahkan");
                    refresh_table("mytable");
                })
            } else {

            }
        })


    }

</script>
