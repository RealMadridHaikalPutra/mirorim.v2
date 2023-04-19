            <div class="container-fluid">
                        <h1 class="mt-4">All Stock</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active">All Stock</li>
                        </ol>
                        <?php
                            $ambildatarequest = mysqli_query($conn, "SELECT * FROM request_id, toko_id, product_id WHERE request_id.id_toko=toko_id.id_toko AND toko_id.id_product=product_id.id_product AND status_req='unprocessed' ");
                            while($ambil = mysqli_fetch_array($ambildatarequest)){
                            $stats = $ambil['type_req'];
                            $request = $ambil['requester'];
                            $sku = $ambil['sku_toko'];

                            if($stats=='refill'){
                                echo"<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Pemberitahuan SKU $sku Di minta Refill oleh $request </strong>
                            </div>";
                            }else{
                                echo"<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Pemberitahuan SKU $sku Di Request oleh $request </strong>
                            </div>";

                            }
                        }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" class="btn btn-outline-primary" href="index.php?url=boxlist">Box List</a>
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
                                           $select = mysqli_query($conn, "SELECT * FROM product_id, toko_id, gudang_id WHERE product_id.id_product=toko_id.id_product AND product_id.id_product=gudang_id.id_product AND jenis<>'Mateng' ");
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