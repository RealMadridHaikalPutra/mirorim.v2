<div class="container-fluid">
                        <h1 class="mt-4">Pending Item</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
                            <li class="breadcrumb-item active">All Warehouse</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Name Item</th>
                                                <th>SKU</th>
                                                <th>Quantity Item</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                           $select = mysqli_query($conn, "SELECT * FROM product_id, toko_id WHERE toko_id.id_product = product_id.id_product AND jenis<>'Mentah'");
                                           $i = 1;
                                           while($data=mysqli_fetch_array($select)){
                                                $nama = $data['nama'];
                                                $idp = $data['id_product'];
                                        ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal">
                                                <th><?=$i++;?></th>
                                                <td>Gambar</td>
                                                <td><?=$data['nama'];?></td>
                                                <td><?=$data['sku_toko'];?></td>
                                            </tr>
                                        
                                            <div class="modal fade" id="largeModal" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ambil Item : <?=$data['nama'];?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                                <!-- Floating Labels Form -->
                                            <form method="post" class="row g-3" enctype="multipart/form-data">   
                                            <div class="modal-body">
                                                    <br>
                                                    <input type="hidden" value="<?=$data['id_product'];?>" name="idp">
                                                    <div class="col-sm-12">
                                                        <label>SKU Gudang</label>
                                                        <div class="form-floating">
                                                        <input type="ntext" class="form-control text-uppercase" id="floatingName" name="skug" placeholder="Warehouse" require>
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Quantity</label>
                                                        <div class="form-floating">
                                                        <input type="ntext" class="form-control text-uppercase" id="floatingName" name="quantity" placeholder="Warehouse" require>
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Warehouse</label>
                                                        <div class="form-floating">
                                                        <input type="number" class="form-control text-uppercase" id="floatingName" name="gudang" placeholder="Warehouse" require>
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="text-center">
                                                        <button type="submit" name="editnonsku" class="btn btn-primary">Submit</button>
                                                    </div> 
                                            </div>
                                            </form>
                                            <?php
                                           }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>