<style>
    .place{
        padding:15px 10px;
        background: #fff;
        border-radius: 5px;
    }
    .status-timbangan{
        margin:0!important;
        font-weight: bold;
        color: #444;
    }
    .tampil-status{
        padding: 5px 20px;
        background: #9575cd;
        color: #fff;
        border-radius: 5px
    }
    
        .elementor-button {
      background-color: #fff;
        color: #9575cd;
        font-size: 12px !important;
        border: none;
        border-radius: 4px !important;
        margin-top: 10px;
    }
    
    .elementor-button:hover{
        background: #b39ddb;
    }
</style>

<div class="place">
<p class="status-timbangan">
    Status timbangan saat ini : &nbsp;
    <?php if ($hari) {
        echo '<a class="tampil-status">Terbuka</a> &nbsp; <span style="float: right; padding: 0px 15px; border-left:1px solid #888;">'.$hari.'</span>';
    } else {
        echo '<a class="tampil-status danger">Tetutup</a> &nbsp;';
    }
     ?>
    
    </p>
</div>

<div style="text-align: center;">
<button class="elementor-button" onclick="buka_timbangan()">Buka</button>
<button class="elementor-button" onclick="eod()">Tutup</button>
</div>
<script>
    function eod() {
        var x=confirm("Anda Yakin ?")
        if (x) {
            jQuery.post("<?php echo base_url('tutup_buku/eod') ?>",function () {
                status_timbangan()
                alert("Berhasil Merubah")
            })    
        }
    }
    
    function buka_timbangan() {
        var x=confirm("Anda Yakin ?")
        if (x) {
            jQuery.post("<?php echo base_url('tutup_buku/buka_timbangan') ?>",function () {
                status_timbangan()
                alert("Berhasil Merubah")
            })    
        }
        
    }
</script>