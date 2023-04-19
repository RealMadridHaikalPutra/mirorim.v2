<div class="container-fluid">
                        <h1 class="mt-4">History Mutasi Warehouse</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
                            <li class="breadcrumb-item active">Mutasi Warehouse</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            <a type="button" class="btn btn-outline-success" href="index.php?url=mutasilist">Mutasi</a>
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
                                                
                                                $select = mysqli_query($conn, "SELECT * FROM product_id, gudang_id, mutasi_id WHERE product_id.id_product=gudang_id.id_gudang AND gudang_id.id_gudang=mutasi_id.id_gudang");
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