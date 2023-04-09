<div class="container-fluid">
                        <h1 class="mt-4">List Component</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="approved.php">Index</a></li>
                            <li class="breadcrumb-item active">List Component</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalUp" class="btn btn-primary">Add Item Preparation</a>

                            </div>
                            <div class="modal fade" id="smallModalUp" tabindex="-1">
                                                <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">Input Item</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <br>
                                                    <form class="row g-3" method="post" enctype="multipart/form-data">
                                                        <br>
                                                        
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="file" class="form-control" id="floatingName" name="file" placeholder="Box Number" required="">
                                                            <label for="floatingName">Image</label>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingName" name="nama" placeholder="Box Number" required="">
                                                            <label for="floatingName">Name Item</label>
                                                        </div>
                                                        </div>
                                                        <input type="hidden" value="1" name="temp">
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingName" name="sku" placeholder="Box Number" required="">
                                                            <label for="floatingName">SKU</label>
                                                        </div>
                                                        </div>
                                                        <div class="text-center">
                                                        <button type="submit" name="additem" value="proses" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form><!-- End floating Labels Form -->
                                                        <br>
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
                                                <th>SKU Store</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                           $select = mysqli_query($conn, "SELECT * FROM product_id, toko_id WHERE product_id.id_product=toko_id.id_product AND temp=1");
                                           $i = 1;
                                           while($data=mysqli_fetch_array($select)){

                                                $gambar = 
                                        ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal">
                                                <th><?=$i++;?></th>
                                                <td>Gambar</td>
                                                <td><?=$data['nama'];?></td>
                                                <td class="text-uppercase"><?=$data['sku'];?></td>
                                            </tr>
                                        
                                            <div class="modal fade" id="largeModal" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Item : <?=$data['nama'];?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                                <!-- Floating Labels Form -->
                                            <form method="post" class="row g-3" enctype="multipart/form-data">   
                                            <div class="modal-body">
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <label>SKU</label>
                                                        <div class="form-floating">
                                                        <input type="text" name="sku" class="form-control"  value="<?=$data['sku'];?>">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <label>SKU Gudang</label>
                                                        <div class="form-floating">
                                                        <input type="ntext" class="form-control text-uppercase" id="floatingName" value="<?=$data['skug'];?>" name="skug" placeholder="Warehouse">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Warehouse</label>
                                                        <div class="form-floating">
                                                        <input type="number" class="form-control text-uppercase" id="floatingName" value="<?=$data['gudang'];?>" name="gudang" placeholder="Warehouse">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="1" name="temp">
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