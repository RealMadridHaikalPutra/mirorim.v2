<form method="post">
                    <div class="container-fluid">
                        <h1 class="mt-4">Form Input Gudang Komponen</h1>
                        <div class="card-header">
                                <button type="submit" name="preparereq" class="btn btn-outline-success">Submit</button>
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
                                            $requester = $_POST['requester'];
                                            $typereq = $_POST['typereq'];
                                            $hitung = count($nama);
                                            $k = 1;

                                            for($i=0; $i < $hitung; $i++){
                                                $ambilperhitungan = mysqli_query($conn, "SELECT * FROM product_id, toko_id WHERE toko_id.id_product = product_id.id_product AND nama='$nama[$i]' AND jenis='Mateng'");
                                                $jum = 1;
                                                while($data=mysqli_fetch_array($ambilperhitungan)){
                                                    $idp = $data['id_product'];
                                            
                                        ?>
                                            <tr>
                                                <th><?=$jum++;?></th>
                                                <th><?=$data['nama'];?></th>
                                                <th><?=$data['sku_toko'];?></th>
                                                <th><?=$quantity[$i];?></th>
                                                <th><select class="form-control" name="idg[]"><!-- Ambil Gudang Induk -->
                                                <?php
                                                    $selectopsi = mysqli_query($conn, "SELECT * FROM gudang_id WHERE id_product='$idp'");
                                                    $k = 1;
                                                    while($opsi = mysqli_fetch_array($selectopsi)){
                                                        
                                                ?>
                                                    <option value="<?=$opsi['id_gudang'];?>"><?=$opsi['sku_gudang'];?></option>
                                                <?php
                                                    }
                                                ?>
                                                <!-- Form Input -->
                                                <input type="hidden" value="<?=$idp;?>" name="idp[]">
                                                <input type="hidden" value="<?=$hitung;?>" name="jum[]">
                                                <input type="hidden" value="<?=$quantity[$i];?>" name="quantity[]">
                                                <input type="hidden" value="Unprocess" name="stat">
                                                <input type="hidden" value="<?=$requester;?>" name="requester">
                                                <input type="hidden" value="<?=$typereq[$i];?>" name="typereq[]">
                                                </select></th>
                                                    <?php
                                                        $select = mysqli_query($conn, "SELECT * FROM product_id, list_komponen, toko_id WHERE product_id.id_product=list_komponen.id_komponen AND toko_id.id_product=product_id.id_product AND id_product_finish='$idp'");
                                                        while($item=mysqli_fetch_array($select)){
                                                            $idgk = $item['id_komponen'];
                                                            $qtykomp = $item['quantity_komponen'];

                                                            $kali = $qtykomp*$quantity[$i];
                                                    ?>
                                                    <tr>
                                                        <td>#</td>
                                                        <td><?=$item['nama'];?></td>
                                                        <td><?=$item['sku_toko'];?></td>
                                                        <td><?=$kali;?></td>
                                                        <input type="hidden" value="<?=$kali;?>" name="quantity2[]">
                                                        <td><select class="form-control" name="idk[]"><!-- Ambil Gudang komponen -->
                                                            <?php
                                                                $selectopsi = mysqli_query($conn, "SELECT * FROM gudang_id WHERE id_product='$idgk'");
                                                                while($opsi = mysqli_fetch_array($selectopsi)){
                                                                    
                                                            ?>
                                                                <option value="<?=$opsi['id_gudang'];?>"><?=$opsi['sku_gudang'];?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                            </select></td>
                                                            
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
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