<div class="container">
    <div class="box box-primary mt-5">
        <div class="box-header">
            <h3>Daftar Voucher Jurnal</h3>
        </div>
        <div class="box-body"> 
             <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>Id Voucher</th>
            <th>Waktu</th>
            <th>Status</th>
            <th width="200px">Action</th>
                </tr>
            </thead>
        
        </table>
        </div>
    </div>

</div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px"></h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
 	    </div>
        </div>
       
       
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTable.ext.classes.sPageButton = 'btn btn-primary mx-1'; // Change Pagination Button Class
                $.fn.dataTableExt.classes.sWrapper = "dataTables_wrapper col mt-2 dt-bootstrap";
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
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
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: false,
                    ajax: {"url": "laporan_piutang/jsondaftarjurnal", "type": "POST"},
                    columns: [
                        {
                            "data": "uniqid",
                            "orderable": false
                        },{"data": "id_voucherjurnal"},{"data": "waktu"},{"data": "status"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        var status='<label class="label label-success">Sudah Bayar</label>'
                        var aksi='<a class="btn btn-primary btn-sm" href="laporan_piutang/detail_voucher/'+data.uniqid+'"><i class="fa fa-angle-right"></i> Detail</a> &nbsp;'
                        var aksi=aksi+'<a class="btn btn-success btn-sm" href="laporan_piutang/print_voucher/'+data.uniqid+'"><i class="fa fa-print"></i> PRINT</a>'
                     

                        if (data.status==0) {
                            status='<label class="label label-warning">Pending</label>'
                            var aksi=aksi+'<a class="btn btn-success btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')" href="akuntansi/ubahstatus/'+data.uniqid+'/1"><i class="fa fa-check"></i> Posting</a> &nbsp;'
                            var aksi=aksi+'<a class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')" href="akuntansi/ubahstatus/'+data.uniqid+'/2"><i class="fa fa-circle"></i> Void</a>'
                     
                     
                        }
                        else if(data.status==1){
                            status='<label class="label label-primary" style="padding: 5px 10px;">Terposting</label>'

                        }
                        else{
                            status='<label class="label label-danger" style="padding: 5px 10px;">Void</label>'
                        }

                        $('td:eq(0)', row).html(index);
                        $('td:eq(3)', row).html(status);
                        $('td:eq(4)', row).html(aksi);
                    }
                });
            });
        </script>