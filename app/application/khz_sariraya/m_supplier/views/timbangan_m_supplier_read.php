<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-6 col-12 mt-5">
   <a href="<?php echo base_url('m_supplier') ?>" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Kembali</a>
    <div class="card">
        <div class="card-body">
           
           <h3 class="text-center">Data Supplier</h3><br>
            
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td><?php echo $nama; ?></td>
                </tr>
                
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><?php echo $alamat; ?></td>
                </tr>
                
                <tr>
                    <th>No Handphone</th>
                    <td>:</td>
                    <td><?php echo $no_handphone; ?></td>
                </tr>
                
                <tr>
                    <th>Email</th>
                    <td>:</td>
                    <td><?php echo $email; ?></td>
                </tr>
            </table>
            
        </div>
    </div>
</div>

