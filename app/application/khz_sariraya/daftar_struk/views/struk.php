<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <title>Faktur</title>
	
	<style>
	*{margin: 3px; padding: 0;}
	body{font-family: 'calibri'; font-size: 13px; }
	.page{width: 595px; height: 420px; padding-left: 25px;  box-sizing: border-box;}
	
	.head{padding: 10px 0px; width: 70%; float: left;}
  .ket h2{text-align: center; color: rgb(100,200,90); }
	.head h4{}
	
	.info-faktur{margin: 10px 0px;}
	
	.faktur{ margin: 10px 0px;}
	.faktur table{width: 100%; }
	.thead{border-bottom:1px solid #333;}
	</style>
  </head>
  
  
  <body>
  
  <div class="page">
  
  <div class="head">
  <h2><?php echo  get_option( 'nama_perusahaan' ) ?></h4>
  <h4><?php echo  get_option( 'slogan_perusahaan' ) ?></h4>
  <p><?php echo  get_option( 'alamat_perusahaan' ) ?></p>
  </div><!-- /head -->
  
  <?php if ($print['status_timbang']==1) {
	echo "<h2 style='color: rgb(0,255,0);'>DISETUJUI</h2>";
} elseif ($print['status_timbang']==2) {
	echo "<h2 style='color: rgb(255,0,0)'>DIBATALKAN</h2>";
}
?>
  
  
  <div class="info-faktur">
  <table border="0">
  
  <tr>
	<td>Tanggal</td>
	<td>:</td>
	<td><?php echo date_format(date_create($print['eod']),"d/m/Y"); ?></td>
  </tr>
  
  <tr>
	<td>No. Kendaraan</td>
	<td>:</td>
	<td><?php echo $print['no_plat']; ?></td>
  </tr>
  
  <tr>
	<td>Kepada</td>
	<td>:</td>
	<?php if ($print['nama_supplier']) { ?>
		<td><?php echo $print['nama_supplier']; ?></td>	
	<?php } ?>
	<td><?php echo $print['nama_customer']; ?></td>
  </tr>
  
  <tr>
	<td>Nama Supir</td>
	<td>:</td>
	<td><?php echo $print['supir']; ?></td>
  </tr>
  
  <tr>
	<td>Nama Produk</td>
	<td>:</td>
	<td><?php echo $print['nama_product']; ?></td>
  </tr>
  
  </table>
  
  </div><!-- /info faktur -->
  
  <div class="faktur">
	<table>
		<thead>
			<tr>
				<th class="thead">Jam Masuk</th>
				<th class="thead">Jam Keluar</th>
				<th class="thead">No DO</th>
				<th colspan="4" class="thead">Timbangan</th>
			</tr>
			
			<tr>
				<td><?php echo date_format(date_create($print['waktu_masuk']),"H:i"); ?></td>
				<td><?php echo date_format(date_create($print['waktu_keluar']),"H:i"); ?></td>
				<td><?php echo $print['id_timbang']; ?></td>
				<td>
					<p>Berat Bruto</p>
					<p>Berat Tarra</p>
					<p>Berat Netto</p>
					<p>Potongan</p>
					<p>Total Bersih</p>
					<div></div>
					<p>Harga / Kg : </p>
					<p>Jumlah </p>
					<p>Ongkos mobil :</p>
					<p>Ongkos panen :</p>
					<p>Cicilan </p>
					<p>Grand Total </p>
				
				</td>
				<td>
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<div></div>

					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</td>
				<td>
					<p><?php echo $print['bruto']; ?></p>
					<p><?php echo $print['tarra']; ?></p>
					<p><?php echo $print['netto']; ?></p>
					<p><?php echo $print['nilai_potongan']?></p>
					<p><?php echo $print['total_bersih']; ?></p>
					<div></div>
					
					<p>Rp <?php echo number_format($print['nilai_persatuan']); ?> </p>
					<p>Rp <?php echo number_format($print['jumlah']); ?> </p>
					<p>Rp <?php echo number_format($print['o_mobil']); ?> </p>
					<p>Rp <?php echo number_format($print['o_panen']); ?> </p>
					<p>Rp <?php echo number_format($print['cicilan_piutang']); ?> </p>
					<p>Rp <?php echo number_format($print['grand_total']); ?> </p>
				</td>
				<td>
				<p>Kg</p>
				<p>Kg</p>
				<p>Kg</p>
				<p>Kg</p>
				<p>Kg</p>
				</td>
			</tr>

		</thead>
	</table>
  </div><!-- faktur -->

  

<table border="0">
<tr>
<td>Ditimbang </td>
<td style="width: 60px;">&nbsp;</td>
<td>Diketahui</td>
</tr>

<tr>
<td style="padding-top: 20px;">( <?php echo $print['nama_penimbang']?> )</td>
<td style="width: 100px;">&nbsp;</td>
<td style="padding-top: 20px;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
</tr>

</table> <span align="right"> Cetakan ke : <?php echo $print['status_print'] ?></span>
</div>

</div><!-- page -->


 

</body>
</html>
		