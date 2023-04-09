<form method="post">
                    <div class="container-fluid">
                        <h1 class="mt-4">Form Input QTY Box and Kubikasi</h1>
                        <div class="card-header">
                                <button type="submit" name="inputquantitybox" class="btn btn-outline-success">Submit</button>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                        <thead style="font-size: 15px;">
                                            <tr>
                                                <th>No</th>
                                                <th>Name Item</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                                <th>Gudang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $nama = $_POST['nama'];
                                            $quantity = $_POST['quantity'];
                                            $hitung = count($nama);
                                            $k = 1;

                                            for($i=0; $i < $hitung; $i++){
                                                $ambilperhitungan = mysqli_query($conn, "SELECT * FROM product_id, list_komponen WHERE product_id.id_product=list_komponen.id_product_finish AND nama='$nama[$i]'");;
                                                $jum = 1;
                                                while($data=mysqli_fetch_array($ambilperhitungan)){
                                            
                                        ?>
                                            <tr>
                                                <th><?=$jum++;?></th>
                                                <th><?=$data['nama'];?></th>
                                                <th>SKU</th>
                                                <th><?=$quantity[$i];?></th>
                                                <th>Gudang</th>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><?=$data['nama'];?></td>
                                                        <td>SKU</td>
                                                        <td><?=$data['quantity_komponen'];?></td>
                                                        <td>Gudang</td>
                                                    </tr>
                                            </tr>
                                        <?php
                                                }
                                            }{

                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>