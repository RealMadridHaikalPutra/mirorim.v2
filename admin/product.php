<div class="container-fluid">
                        <h1 class="mt-4">Packing List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="approved.php">Approved</a></li>
                            <li class="breadcrumb-item active">Packing List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#largeModal" class="btn btn-outline-success">Pending</a>
                                <div class="modal fade" id="largeModal" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Input SKU</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post">
                                        <table class="table" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead class="table-bordered">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Image</th>
                                                    <th>Nama</th>
                                                    <th>SKU</th>
                                                    <th>Jenis</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-borderless">
                                                <?php
                                                    $select = mysqli_query($conn, "SELECT * FROM toko_id, product_id WHERE toko_id.id_product=product_id.id_product AND sku_toko='-'");
                                                    $i = 1;
                                                    while($data=mysqli_fetch_array($select)){
                                                        $sku = $data['sku_toko'];

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
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$img;?></td>
                                                    <td><?=$data['nama'];?></td>
                                                    <td><input type="text" name="sku[]" value="<?=$sku;?>" class="form-control">
                                                        <input type="hidden" name="idp[]" value="<?=$data['id_product'];?>">
                                                    </td>
                                                    <td><?=$data['jenis'];?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="text-right m-4">
                                            <button type="submit" class="btn btn-primary" name="addsku">Submit</button>
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
                                                <th>Nama</th>
                                                <th>SKU</th>
                                                <th>Jenis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ambil = mysqli_query($conn, "SELECT * FROM product_id, toko_id WHERE product_id.id_product = toko_id.id_product AND sku_toko<>'-'");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambil)){
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
                                            <tr>        
                                                <td><?=$i++;?></td>
                                                <td><?=$img;?></td>
                                                <td><?=$data['nama'];?></td>
                                                <td><?=$data['sku_toko'];?></td>
                                                <td><?=$data['jenis'];?></td>
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