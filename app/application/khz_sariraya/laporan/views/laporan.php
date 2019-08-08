<div class="container">
<div class="mt-4">
<a style="padding: 9px 15px; background: #81c784; color: #fff; cursor: pointer; border-radius:3px;"onclick="goBack()"><i class="fa fa-angle-left"></i> Kembali</a>

<script>
function goBack() {
  window.history.back();
}
</script> 
</div>

    <div class="row">
        <div class="col">
            <div class="box box-primary" style="margin-top: 40px;">
                <div class="box-header">
                    <h3>Laporan Timbang</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form id="laporan_penjualan" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>laporan/pdf_penjualan">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i>
										<span class="font-weight-light">Laporan Timbangan Berdasarkan Tanggal. Kosongkan tanggal apabila ingin melihat Timbangan yang sedang berjalan.</span>
										</div>
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
											<label>Tanggal Awal</label>
											<div class="input-group">
											
											<div class="input-group-prepend">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
                                            <input class="tanggal form-control datepicker" type="text" name="tanggal_awal" id="tanggal_awal" placeholder="Masukkan tanggal awal" value="">
											</div>
										</div>
                                    </div>
                                    <div class="col">
                                        <div class="form-tanggal_akhir">
                                            <label for="tanggal_awal" >Tanggal Akhir</label>
											<div class="input-group">
											
											<div class="input-group-prepend">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>											
                                            <input class="tanggal form-control datepicker" type="text" name="tanggal_akhir" placeholder="Masukkan tanggal Akhir" id="tanggal_akhir" value="">
											</div>
										</div>
                                    </div>
                                </div>
								
								<div class="row mb-4">
								
								<div class="col-md-3 col-sm-3 col">
								
									<div class="card">
										<div class="card-body">
											<div class="form-group">
												<label>Status</label>
												<div class="custom-control custom-radio">
													<input type="radio" id="customRadio1" name="status" class="custom-control-input" value="1" checked>
													<label class="custom-control-label" for="customRadio1">Tidak Void</label>
												</div>
												<div class="custom-control custom-radio">
													<input type="radio" id="customRadio2" name="status" class="custom-control-input" value="2">
													<label class="custom-control-label" for="customRadio2">Void</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								
                                <div class="col-md-3 col-sm-3 col">
								<div class="card">
										<div class="card-body">
                                <div class="form-group">
									<label>Untuk</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="kondisi" id="status" value="0" checked>
										<label class="form-check-label" for="exampleRadios1">Customer</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="kondisi" id="status" value="1">
										<label class="form-check-label" for="exampleRadios1">Supplier</label>
									</div>
                                </div>
								</div></div>
								</div>
								</div>
                       
                                <div class="form-group text-center">
                                    <button class="btn btn-success" onclick="submitform('excel')" ><i class="fa fa-file-excel-o"></i> Cetak ke Excel</button>
                                    <button class="btn btn-primary" onclick="submitform('pdf')" ><i class="fa fa-file-pdf-o"></i> Cetak ke Pdf</button>
                                    <button class="btn btn-primary" onclick="submitform('pdf_serah_terima')" ><i class="fa fa-hand-paper-o fa-rotate-90"></i> Serah Terima</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


</body>
</html>
<script>
    $( document ).ready(function() {
        $('#id_jenis').append($("<option></option>")
            .attr("value","")
            .text('All'))
    });

    $(".tanggal").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    });


    function submitform(pilihan) {
        $("#laporan_penjualan").attr( "action", "<?php echo base_url('laporan/') ?>"+pilihan+"_penjualan" );
        $("#laporan_penjualan").submit()
    }
</script>