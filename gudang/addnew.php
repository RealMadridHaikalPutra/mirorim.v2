                <div class="row">
        
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Input Box</h5>
            
                        <!-- Floating Labels Form -->
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nobox" id="floatingName" placeholder="NoBox">
                                <label for="floatingName">Nobox</label>
                            </div>
                            </div>
                            <div class="text-right">
                            <button type="submit" name="inputnobox" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->
                        </div>
                    </div>
                    </div>
                    <div class="container-fluid">
                        <h1 class="mt-4">Items Box</h1>
                            <?php
                                if(isset($_POST['inputnobox'])){
                                    $box = $_POST['nobox'];
                                                
                                    $ambildata = mysqli_query($conn, "SELECT * FROM item_id, boxorder_id WHERE item_id.id_box = boxorder_id.id_box AND box='$box'");
                            ?>
                            <div class="card-header">
                                <i class="fas fa-box"></i>
                                Box Items : <?=$box;?>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#smallModalQty" class="btn btn-primary">Insert All</button>
                            </div>
                            <div class="modal fade" id="smallModalQty" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Insert All</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post">
                                            <table class="table table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Invoice</th>
                                                    <th>Box</th>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $select = mysqli_query($conn, "SELECT invoice, box, nama, quantity_count, id_item FROM item_id, boxorder_id, product_id WHERE item_id.id_box=boxorder_id.id_box AND item_id.id_product=product_id.id_product AND box='$box'");
                                                    $i = 1;
                                                    while($data=mysqli_fetch_array($select)){
                                                ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$data['invoice'];?></td>
                                                    <td><?=$data['box'];?></td>
                                                    <td><?=$data['nama'];?></td>
                                                    <td><input type="quantity" name="quantity[]" value="<?=$data['quantity_count'];?>" class="form-control" require>
                                                    <input type="hidden" value="<?=$data['id_item'];?>" name="list[]">
                                                    <input type="hidden" value="<?=$data['id_item'];?>" name="ido">
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="text-right m-4">
                                            <button type="submit" class="btn btn-outline-primary" name="inputquantityitem">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <form method="post">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>invoice</th>
                                                <th>Nobox</th>
                                                <th>Item Name</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php
                                            if(isset($_POST['inputnobox'])){
                                                $box = $_POST['nobox'];
                                                
                                                $ambildata = mysqli_query($conn, "SELECT image, quantity_count, status_item, invoice, box, nama, sku_toko FROM item_id, boxorder_id, product_id, toko_id WHERE toko_id.id_product = product_id.id_product AND item_id.id_box=boxorder_id.id_box AND item_id.id_product=product_id.id_product AND box='$box'");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambildata)){
                                                    $quantity = $data['quantity_count'];

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
                                                <td><?=$data['status_item'];?></td>
                                                <th><?=$data['invoice'];?></th>
                                                <th><?=$data['box'];?></th>
                                                <td><?=$data['nama'];?></td>
                                                <td><?=$data['sku_toko'];?></td>
                                                <?php
                                                    if($quantity==0){
                                                        echo "<td style='color: red;'>$quantity</td>";
                                                    } else {
                                                        echo "<td style='color: green;'>$quantity</td>";
                                                    }
                                                ?>
                                                
                                            </form>
                                            </tr>
                                            <?php
                                                }}
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>