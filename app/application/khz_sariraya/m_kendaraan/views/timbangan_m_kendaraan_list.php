<div class="col-md-12">
    <div class="mt-4">
        <a style="padding: 9px 15px; background: #81c784; color: #fff; cursor: pointer; border-radius:3px;" onclick="goBack()"><i class="fa fa-angle-left"></i> Kembali</a>

        <script>
            function goBack() {
                window.history.back();
            }

        </script>
    </div>

    <div class="card" style="margin-top: 30px;">
        <div class="card-header">
            <h3>Daftar Kendaraan</h3>
        </div>

        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 4px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <?php echo anchor(base_url('m_kendaraan/create'), '<i class="fa fa-plus"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                    <?php echo anchor(base_url('m_kendaraan/excel'), '<i class="fa fa-file-excel-o"></i> Cetak ke Excel', 'class="btn btn-primary"'); ?>
                </div>
            </div>

            <table style="width:100%!important;" class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Kendaraan</th>
                        <th>No Plat</th>
                        <th>Nama Kendaraan</th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>


        </div>
    </div>
</div><!-- col -->


<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                    "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing":   "Sedang memproses...",
                    "sLengthMenu":   "Tampilkan &nbsp; _MENU_ &nbsp; data",
                    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 data",
                    "sInfoFiltered": "(disaring dari _MAX_ data keseluruhan)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Cari:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext":     "Selanjutnya",
                        "sLast":     "Terakhir"

                }
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "m_kendaraan/json",
                "type": "POST"
            },
            columns: [{
                    "data": "uniqid",
                    "orderable": false
                }, {
                    "data": "id_kendaraan"
                }, {
                    "data": "no_plat"
                }, {
                    "data": "nama_kendaraan"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });

</script>
