<div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
    <div class="card mt-5 mb-5">
        <div class="card-body">
           
           <div class="mt-2 mb-2">
               <h3 class="text-center">Data Kendaraan</h3>
           </div>
           
            <table border="0" class="table">
                <tr>
                    <td>ID Kendaraan</td>
                    <td><input type="text" class="form-control" value="<?php echo $id_kendaraan;?>"></td>
                </tr>
                   
                   <tr>
                    <td>No Plat</td>
                    <td><input type="text" class="form-control" value="<?php echo $no_plat;?>"></td>
                </tr>
                   <tr>
                    <td>Nama Kendaraan</td>
                    <td><input type="text" class="form-control" value="<?php echo $nama_kendaraan;?>"></td>
                </tr>
            </table>
            
            <div class="text-center">
                <a href="<?php echo base_url('m_kendaraan') ?>" class="btn btn-primary"><i class="fa fa-angle-left"></i> Kembali</a>
            </div>
            
        </div>
    </div>
</div>