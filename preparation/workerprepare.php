<div class="container-fluid">
    <h1 class="mt-4">History Exit Item Prepare</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
        <li class="breadcrumb-item active">All Warehouse</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalceklist" class="btn btn-outline-primary">Check List</a>
            <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalFinish" class="btn btn-outline-success">Finish</a>
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
                                    <th>Quantity</th>
                                    <th>Checklist</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $select = mysqli_query($conn, "SELECT id_product_finish AS idp, nama, sku_toko, quantity_req FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish AND status_prepare='receive'");
                                $i = 1;
                                while ($data = mysqli_fetch_array($select)) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['sku_toko']; ?></td>
                                        <td><?= $data['quantity_req']; ?></td>
                                        <td><input type="checkbox" name="cek[]" class="form-input"></td>
                                            <input type="hidden" name="idp[]" value="<?=$data['idp'];?>">
                                            <input type="hidden" name="stat" value="On Process">
                                        
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-right m-2">
                            <button type="submit" name="accrequestprocess" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Modal 2 --->
        <div class="modal fade" id="smallModalFinish" tabindex="-1">
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
                                    <th>Quantity</th>
                                    <th>Checklist</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $select = mysqli_query($conn, "SELECT id_product_finish AS idp, nama, sku_toko, quantity_req FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish AND status_prepare='On Process'");
                                $i = 1;
                                while ($data = mysqli_fetch_array($select)) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['sku_toko']; ?></td>
                                        <td><?= $data['quantity_req']; ?></td>
                                        <td><input type="checkbox" name="cek[]" class="form-input"></td>
                                            <input type="hidden" name="idp[]" value="<?=$data['idp'];?>">
                                            <input type="hidden" name="stat" value="Done">
                                        
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-right m-2">
                            <button type="submit" name="accrequestdone" class="btn btn-primary">Submit</button>
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
                            <th>Name Item</th>
                            <th>SKU Store</th>
                            <th>Worker</th>
                            <th>Quantity</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = mysqli_query($conn, "SELECT nama, sku_toko, worker, quantity_req, date_start, status_prepare FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish AND status_prepare<>'unprocessed'");
                        $i = 1;
                        while ($data = mysqli_fetch_array($select)) {
                            $status = $data['status_prepare'];
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['sku_toko']; ?></td>
                                <td><?= $data['worker']; ?></td>
                                <td><?= $data['quantity_req']; ?></td>
                                <td><?=$data['date_start'];?></td>
                                <td><?=$status;?></td>
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