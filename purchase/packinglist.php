        <div class="container-fluid">
                        <h1 class="mt-4">Packing List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="approved.php">Approved</a></li>
                            <li class="breadcrumb-item active">Packing List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#smallModalAdd" class="btn btn-primary">Add Box</button>
                                <a type="button" name="newbarang" class="btn btn-success" href="index.php?url=newitem">New Product</a>
                            </div>
                            <div class="modal fade" id="smallModalAdd" tabindex="-1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Input Packing List</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <br>
                                        <form class="row g-3" method="post" enctype="multipart/form-data">
                                        <br>
                                        <div class="col-md-9 ml-5">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="invoice" placeholder="Box Number" required="">
                                            <label for="floatingName">Invoice</label>
                                        </div>
                                        </div>
                                        <div class="col-md-9 ml-5">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="resi" placeholder="Box Number" required="">
                                            <label for="floatingName">Resi</label>
                                        </div>
                                        </div>
                                        <div class="col-md-9 ml-5">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="box" placeholder="Box Number" required="">
                                            <label for="floatingName">Box</label>
                                        </div>
                                        </div>
                                        <div class="col-md-9 ml-5">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="floatingName" name="quantity" placeholder="Box Number" required="">
                                            <label for="floatingName">Quantity Box</label>
                                        </div>
                                        </div>
                                        <div class="col-md-9 ml-5">
                                        <div class="form-floating">
                                            <input type="text" id="floatingName" name="kubikasi" pattern="[0-100 0-100.0-100]{1-5}" placeholder="Box Number" class="form-control" required="">
                                            <label for="floatingName">Kubikasi</label>
                                        </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="addbox" value="proses" class="btn btn-primary">Submit</button>
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
                                                <th>No Invoice</th>
                                                <th>No Resi</th>
                                                <th>Box Number</th>
                                                <th>kubikasi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ambildata = mysqli_query($conn, "SELECT * FROM boxorder_id WHERE datang<>'lokal'");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambildata)){
                                                    $inv = $data['invoice'];
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <th data-bs-toggle="modal" data-bs-target="#largeModal<?=$data['invoice'];?>"><?=$data['invoice'];?></th>
                                                <td><?=$data['resi'];?></td>
                                                <td class="text-uppercase"><?=$data['box'];?></td>
                                                <td><?=$data['kubik_order'];?> m³</td>
                                                <td><?=$data['status'];?></td>
                                            </tr>
                                            <!--Modal-->
                                            <div class="modal fade" id="largeModal<?=$data['invoice'];?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">List Item Invoice : <?=$data['invoice'];?></h5>
                                                    <a type="button" href="index.php?url=inputmulti&box=<?=$data['box'];?>&invoice=<?=$data['invoice'];?>"class="btn btn-primary ml-4">Add Item</a>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!--Card-->
                                                    <div class="row row-cols-1 row-cols-md-2 g-4">
                                                    <?php
                                                        $ambilitem = mysqli_query($conn, "SELECT * FROM order_id,boxorder_id,product_id, toko_id WHERE boxorder_id.id_box=order_id.id_box AND order_id.id_product = product_id.id_product AND toko_id.id_product=product_id.id_product AND invoice='$inv' ORDER BY nama ASC");
                                                        $s = 1;
                                                        while($item=mysqli_fetch_array($ambilitem)){
                                                    ?>
                                                        <div class="col">
                                                            <div class="card border-dark m-auto" style="max-width: 18rem;">
                                                                <div class="card-header">Items <?=$s++;?></div>
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Nama Barang : <?=$item['nama'];?></h5>
                                                                    <h5 class="card-title text-uppercase">SKU : <?=$item['sku'];?></h5>
                                                                    <h5 class="card-title">Quantity : <?=$item['quantity_order'];?></h5>
                                                                    <h5 class="card-title">Status : <?=$item['status'];?></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        </div>
                                                    <!--End Card--->
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                           
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>