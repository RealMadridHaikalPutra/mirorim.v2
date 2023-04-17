<div class="container-fluid">
                        <h1 class="mt-4">All Stock</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active">All Stock</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" class="btn btn-outline-success" href="index.php?url=pending">New SKU</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Name Item</th>
                                                <th>SKU Store</th>
                                                <th>SKU Warehouse</th>
                                                <th>Warehouse</th>
                                                <th>Jenis</th>
                                                <th>Qty Stok</th>
                                            </tr>
                                        </thead>
                                        
                                        
                                        <tbody>
                                        <?php
                                           $select = mysqli_query($conn, "SELECT * FROM product_id, toko_id, gudang_id WHERE product_id.id_product=toko_id.id_product AND product_id.id_product=gudang_id.id_product AND jenis='Matang' ");
                                           $i = 1;
                                           while($data=mysqli_fetch_array($select)){
                                            //cek data gambar ada apa kagak
                                            $gambar = $data['image'];
                                            if($gambar==null){
                                                // jika tidak ada gambar
                                                $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                            } else {
                                                //jika ada gambar
                                                $img ='<img src="../assets/img/'.$gambar.'" class="zoomable">';
                                            }    
                                        ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal">
                                                <th><?=$i++;?></th>
                                                <td><?=$img;?></td>
                                                <td><?=$data['nama'];?></td>
                                                <td class="text-uppercase"><?=$data['sku_toko'];?></td>
                                                <td class="text-uppercase"><?=$data['sku_gudang'];?></td>
                                                <td><?=$data['lokasi_gudang'];?></td>
                                                <td><?=$data['jenis'];?></td>
                                                <td><?=$data['quantity'];?></td>
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