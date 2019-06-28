<div class="container">
<div class="mt-4">
<a style="padding: 9px 15px; background: #81c784; color: #fff; cursor: pointer; border-radius:3px;"onclick="goBack()"><i class="fa fa-angle-left"></i> Kembali</a>

<script>
function goBack() {
  window.history.back();
}
</script> 
</div>

    <div class="row mb-2">
        <div class="col">
            <div class="box box-primary" style="margin-top: 40px;">
                <div class="box-header">
                     <h3>Daftar struk</h3>
                     <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="20px">No</th>
                                        <th class="text-center">Id Bill</th>
                                        <th class="text-center" width="100px">Waktu Timbang</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" width="200px">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $.fn.dataTable.ext.classes.sPageButton = 'btn btn-primary mx-1'; // Change Pagination Button Class
    $.fn.dataTableExt.classes.sWrapper = "dataTables_wrapper col mt-2 dt-bootstrap";
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
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
        ajax: {"url": "daftar_struk/json", "type": "POST"},
        columns: [        {
            "data": "uniqid",
            "orderable": false
        },

        {"data": "id_timbang"},{"data": "waktu_timbang"},{"data": "status"},
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
            var aksi='<a href="daftar_struk/read/'+data.uniqid+'"><button class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</button></a>'
                        

        if (data.status==0) {
                            status='<div class="text-center"><label style="padding: 5px 15px; border-radius: 5px;" class="label label-warning">Pending</label></div>'
                            var aksi=aksi+'<a onclick="javasciprt: return confirm(\'Are You Sure ?\')" href="daftar_struk/ubahstatus/'+data.uniqid+'/1">&nbsp;<button class="btn btn-success btn-sm"><i class="fa fa-chevron-right"></i> Posting</button>'
                            var aksi=aksi+'<a onclick="javasciprt: return confirm(\'Are You Sure ?\')" href="daftar_struk/ubahstatus/'+data.uniqid+'/2">&nbsp;<button class="btn btn-danger btn-sm"><i class="fa fa-circle"></i> Void</button>'
                     
                     
                        }
                        else if(data.status==1){
                            status='<div class="text-center"><label style="padding: 5px 15px; border-radius: 5px;" class="label label-success">Terposting</label></div>'

                        }
                        else{
                            status='<div class="text-center"><label style="padding: 5px 15px; border-radius: 5px;" class="label label-danger">Void</label></div>'
                        }

                        $('td:eq(0)', row).html(index);
                        $('td:eq(3)', row).html(status);
                        $('td:eq(4)', row).html(aksi);
    }
});
});
</script>
</body>
</html>