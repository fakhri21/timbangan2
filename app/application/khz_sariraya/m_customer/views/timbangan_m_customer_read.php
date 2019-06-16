<div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
    <div class="card mt-5 mb-5">
        <div class="card-body">
           
           <div class="mt-2 mb-2">
               <h3 class="text-center">Data Pelanggan</h3>
           </div>
           
            <table border="0" class="table">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" class="form-control" value="<?php echo $nama;?>"></td>
                </tr>
                   
                   <tr>
                    <td>Alamat</td>
                    <td><input type="text" class="form-control" value="<?php echo $alamat;?>"></td>
                </tr>
                   <tr>
                    <td>No Handphone</td>
                    <td><input type="text" class="form-control" value="<?php echo $no_handphone;?>"></td>
                </tr>
                   <tr>
                    <td>Email</td>
                    <td><input type="text" class="form-control" value="<?php echo $email;?>"></td>
                </tr>
            </table>
            
            <div class="text-center">
                <a href="<?php echo base_url('m_customer') ?>" class="btn btn-primary"><i class="fa fa-angle-left"></i> Kembali</a>
            </div>
            
        </div>
    </div>
</div>
