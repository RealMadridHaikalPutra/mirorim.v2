
<div class="row">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Cari Data SKU Gudang</h5>
                        <!--Submit-->
                        <!-- Begin Page Content -->
                <div class="container-fluid">
                            <hr style="background-color: black; border: 2px solid black;">
                            <form method="post" action="">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">SKU Gudang</label>
                                <input class="form-control" name="skug" id="skug" type="text" require>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">///////</label>
                                    <br>
                                    <button class="btn btn-outline-primary" type="submit" action="" name="ambildata">Ambil Data</button>
                                </div>
                                </div>
                            </div>
                            </form>
                            <hr style="background-color: black; border: 2px solid black;">
                            <form id="contact-form" action="" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama - Varian</th>
                                                <th>SKU Lama</th>
                                                <th>Quantity</th>
                                                <th>=></th>
                                                <th>SKU Baru</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         if(isset($_POST['ambildata'])){
                                            $nama = $_POST['skug'];

                                            $select  = mysqli_query($conn, "SELECT * FROM product_id, gudang_id WHERE gudang_id.id_product=product_id.id_product AND sku_gudang LIKE '%$nama%'");
                                            $s = 1;
                                            while($data = mysqli_fetch_array($select)){
                                                $name = $data['nama'];
                                                $idg = $data['id_gudang'];
                                                $skug = $data['sku_gudang'];
                                            ?>

                                            <tr>
                                                <td><?=$s++;?></td>
                                                <td><?=$name;?></td>
                                                <td><input type="text" name="skug1[]" class="form-control" value="<?=$skug;?>" readonly></td>
                                                <td><input type="number" name="quantity1[]" class="form-control" value="<?=$data['quantity'];?>"  readonly></td>
                                                <th><input type="text" name="idg[]" value="<?=$idg;?>"></th>
                                                <td><input type="text" name="skug[]" class="form-control" required></td>
                                                <td><input type="number" name="quantity[]" class="form-control" value="<?=$data['quantity'];?>" max="<?=$data['quantity'];?>" required></td>
                                            </tr>
                                            <?php
                                                }}

                                            ?>
                                            </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="mutasi">Submit</button>
                                    </div>
                                </div>
                            </form>
            
                        </div>
                    </div>
                    </div>