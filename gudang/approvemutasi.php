<div class="container-fluid">
                        <h1 class="mt-4">History Mutasi Warehouse</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
                            <li class="breadcrumb-item active">Mutasi Warehouse</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#smallModalceklist" class="btn btn-outline-success" data-bs>Mutasi</button>
                                <div class="modal fade" id="smallModalceklist" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Approve Refill</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="">
                                                <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">

                                                    <thead style="font-size: 15px;">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name Item</th>
                                                            <th>SKU lama</th>
                                                            <th>SKU Baru</th>
                                                            <th>Quantity</th>
                                                            <th>Checklist</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $select = mysqli_query($conn, "SELECT id_gudang, nama, skug_lama, skug_baru, quantity_out, id_gudang, id_mutasi FROM mutasi_id, gudang_id, product_id WHERE mutasi_id.id_gudang=gudang_id.id_gudang AND gudang_id.id_product=product_id.id_product AND status_mutasi='Not Approved'");
                                                        $i = 1;
                                                        while ($data = mysqli_fetch_array($select)) {
                                                            $idg = $data['id_gudang'];
                                                        ?>
                                                            <tr>
                                                                <td><?= $i++; ?></td>
                                                                <td><?= $data['nama']; ?></td>
                                                                <td><?= $data['skug_lama']; ?></td>
                                                                <td><?= $data['skug_baru']; ?></td>
                                                                <td><?= $data['quantity_out']; ?></td>
                                                                <td><input type="checkbox" value="<?= $data['id_gudang']; ?>" name="cek[]" class="form-input"></td>
                                                                <input type="hidden" name="idg[]" value="<?= $data['id_gudang']; ?>">
                                                                <input type="hidden" name="idm[]" value="<?= $data['id_mutasi']; ?>">
                                                                <input type="hidden" name="stat" value="Approved">

                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="text-right m-2">
                                                    <button type="submit" name="mutasiacc" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Name Item</th>
                                                <th>SKU Warehouse</th>
                                                <th>SKU Warehouse New</th>
                                                <th>Quantity Out</th>
                                                <th>Time Out</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                $select = mysqli_query($conn, "SELECT image, status_mutasi, nama, skug_lama, skug_baru, quantity_out, datetime FROM product_id, gudang_id, mutasi_id WHERE product_id.id_product=gudang_id.id_gudang AND gudang_id.id_gudang=mutasi_id.id_gudang");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($select)){
                                                    $status = $data['status_mutasi'];

                                                //cek data gambar ada apa kagak
                                                $gambar = $data['image'];
                                                if($gambar==null){
                                                 //jika tidak ada gambar
                                                    $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                                } else {
                                                //jika ada gambar
                                                    $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                 }
                                            ?>
                                            <tr>
                                                <th><?=$i++;?></th>
                                                <td>Gambar</td>
                                                <td><?=$data['nama'];?></td>
                                                <td class="text-uppercase"><?=$data['skug_lama'];?></td>
                                                <td class="text-uppercase"><?=$data['skug_baru'];?></td>
                                                <td><?=$data['quantity_out'];?></td>
                                                <td><?=$data['datetime'];?></td>
                                                <?php
                                                if($status=='Approved'){
                                                    echo "<td style='color: green;'>$status</td>";
                                                } else {
                                                    echo "<td style='color: red;'>$status</td>";
                                                }
                                                ?>

                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>