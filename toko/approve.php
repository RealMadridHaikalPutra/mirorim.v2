<div class="container-fluid">
                        <h1 class="mt-4">History Refiil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=approve">Approved</a></li>
                            <li class="breadcrumb-item active">Not Approved</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalceklist" class="btn btn-outline-primary">Check List</a>
                            </div>
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
                                                    <th>SKU</th>
                                                    <th>Status</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $select = mysqli_query($conn, "SELECT * FROM request_id, toko_id, product_id WHERE request_id.id_toko=toko_id.id_toko AND toko_id.id_product=product_id.id_product AND status_req='On Process' ");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($select)){
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$data['nama'];?></td>
                                                <td><?=$data['sku_toko'];?></td>
                                                <td><?=$data['type_req'];?></td>
                                                <td><input type="number" class="form-control" name="quantity[]">
                                                <input type="hidden" value="Approved" name="stat[]">
                                                <input type="hidden" value="<?=$data['id_toko'];?>" name="idk[]">
                                                <input type="hidden" value="<?=$data['id_request'];?>" name="idt[]">
                                            </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                            <div class="text-right m-2">
                                                <button type="submit" name="approverefill" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        
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
                                                <th>Picker</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Approval</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $select = mysqli_query($conn, "SELECT * FROM request_id, toko_id, product_id WHERE request_id.id_toko=toko_id.id_toko AND toko_id.id_product=product_id.id_product ORDER BY nama DESC");
                                            $i = 1;
                                            while($data=mysqli_fetch_array($select)){
                                                $quantity = $data['quantity_count'];
                                                $stat = $data['status_req'];
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td>Gambar</td>
                                            <td><?=$data['nama'];?></td>
                                            <td><?=$data['sku_toko'];?></td>
                                            <td>Dimas</td>
                                            <?php
                                                if($quantity==0){
                                                    echo "<td style='color: red;'>$quantity</td>";
                                                } else {
                                                    echo "<td style='color: green;'>$quantity</td>";
                                                }
                                            ?>
                                            <td><?=$data['type_req'];?></td>
                                            <?php
                                                 if($stat=='Approved'){
                                                    echo "<td style='color: green;'>$stat</td>";
                                                } elseif($stat=='unprocessed') {
                                                    echo "<td style='color: red;'>$stat</td>";
                                                } else {
                                                    echo "<td style='color: orange;'>$stat</td>";
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