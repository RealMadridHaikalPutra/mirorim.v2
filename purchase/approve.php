        <div class="container-fluid">
                        <h1 class="mt-4">Approved</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=packinglist">Box List</a></li>
                            <li class="breadcrumb-item active">Approved</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#smallModalAdd" class="btn btn-primary">Compare Quantity</button>
                            </div>
                            <div class="modal fade" id="smallModalAdd" tabindex="-1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Compare?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post">
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>SKU</th>
                                                    <th>Quantity</th>
                                                    <th>Counting</th>
                                                    <th>Ceklist</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $select = mysqli_query($conn, "SELECT * FROM item_id, product_id, toko_id WHERE item_id.id_product = product_id.id_product AND toko_id.id_product = product_id.id_product AND status_item='Not Approved' ORDER BY nama DESC");
                                                    $i = 1;
                                                    while($data=mysqli_fetch_array($select)){
                                                        $order = $data['quantity_order'];
                                                        $count = $data['quantity_count'];
                                                ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$data['nama'];?></td>
                                                    <td><?=$data['sku_toko'];?></td>
                                                    <td><?=$data['quantity_order'];?></td>
                                                    <td><?=$data['quantity_count'];?>
                                                        <input type="hidden" name="ido[]" value="<?=$data['id_item'];?>">
                                                        <input type="hidden" name="idp[]" value="<?=$data['id_product'];?>">
                                                        <input type="hidden" name="status" value="Approved">
                                                    </td>
                                                    <?php
                                                        if($order==$count){
                                                            echo "<td><i class='far fa-check-circle text-right' style='color: green;'></i></td>";
                                                        } else {
                                                            echo "<td><i class='fas fa-minus-circle text-right' style='color: red;'></i></td>";
                                                        }
                                                    ?>
                                                    
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        
                                            <div class="text-right m-2">
                                                
                                                <button type="submit" name="approveitem" class="btn btn-primary">Approve</button>
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
                                                <th>Invoice</th>
                                                <th>Item Name</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                                <th>Counting</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $select = mysqli_query($conn, "SELECT * FROM product_id, item_id, boxorder_id, toko_id WHERE toko_id.id_product = product_id.id_product AND product_id.id_product=item_id.id_product AND item_id.id_box=boxorder_id.id_box ORDER BY nama DESC");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($select)){
                                                    $status = $data['status_item'];
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
                                                <td><?=$data['invoice'];?></td>
                                                <td><?=$data['nama'];?></td>
                                                <td><?=$data['sku_toko'];?></td>
                                                <td><?=$data['quantity_order'];?></td>
                                                <td><?=$data['quantity_count'];?></td>
                                                <?php
                                                    if($status=='Not Approved'){
                                                        echo "<td style='color: red;'>$status</td>";
                                                    } else {
                                                        echo "<td style='color: green;'>$status</td>";
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