<div class="container-fluid">
    <h1 class="mt-4">History Exit Item Prepare</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
        <li class="breadcrumb-item active">All Warehouse</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a type="button" href="index.php?url=request" class="btn btn-outline-success">Request</a>
            <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalceklist" class="btn btn-outline-primary">Check List</a>
            <a type="button" href="exportprepare.php" class="btn btn-outline-info">Download Laporan</a>
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
                                    <th>Gudang In</th>
                                    <th>Quantity Reject</th>
                                    <th>Gudang Reject</th>
                                    <th>Checklist</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = mysqli_query($conn, "SELECT id_product_finish AS idp, id_prepare AS idpre, quantity_reject, nama, sku_toko, quantity_req, quantity_matang FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish AND status_prepare='Done'");
                                $i = 1;
                                while ($data = mysqli_fetch_array($select)) {
                                    $idp = $data['idp'];
                                    $nama = $data['nama'];
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['sku_toko']; ?></td>
                                        <td><?= $data['quantity_matang']; ?></td>
                                        <td>
                                            <select class="form-control" name="idg[]"><!-- Ambil Gudang komponen -->
                                                <?php
                                                $selectopsi = mysqli_query($conn, "SELECT * FROM gudang_id WHERE id_product='$idp'");
                                                while ($opsi = mysqli_fetch_array($selectopsi)) {

                                                ?>
                                                    <option value="<?= $opsi['id_gudang']; ?>"><?= $opsi['sku_gudang']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td><?=$data['quantity_reject'];?></td>
                                        <td>
                                        <select class="form-control" name="idgr[]"><!-- Ambil Gudang komponen -->
                                                <?php
                                                $selectopsi2 = mysqli_query($conn, "SELECT * FROM gudang_id, product_id WHERE gudang_id.id_product=product_id.id_product AND nama='$nama' AND jenis='reject'");
                                                while ($opsi2 = mysqli_fetch_array($selectopsi2)) {

                                                ?>
                                                    <option value="<?= $opsi2['id_gudang']; ?>"><?= $opsi2['sku_gudang']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select></td>
                                        <td><input type="checkbox" value="<?= $data['idpre']; ?>" name="cek[]" class="form-input"></td>
                                        <input type="hidden" name="idp[]" value="<?= $data['idp']; ?>">
                                        <input type="hidden" name="stat" value="Diterima">
                                        <input type="hidden" name="quantity[]" value="<?=$data['quantity_matang'];?>">
                                        <input type="hidden" name="quantityr[]" value="<?=$data['quantity_reject'];?>">
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-right m-2">
                            <button type="submit" name="komponenacc" class="btn btn-primary">Submit</button>
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
                            <th>Requester</th>
                            <th>Recive</th>
                            <th>Worker</th>
                            <th>Quantity</th>
                            <th>Reject</th>
                            <th>Time Receive</th>
                            <th>Time On Process</th>
                            <th>Time Done</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = mysqli_query($conn, "SELECT nama, sku_toko, worker, quantity_req, quantity_matang, quantity_reject, date_start, date_finish, date_receiver, status_prepare, requester, receiver FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish");
                        $i = 1;
                        while ($data = mysqli_fetch_array($select)) {
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['sku_toko']; ?></td>
                                <td><?= $data['requester']; ?></td>
                                <td><?= $data['receiver']; ?></td>
                                <td><?= $data['worker']; ?></td>
                                <td><?= $data['quantity_matang']; ?></td>
                                <td><?= $data['quantity_reject']; ?></td>
                                <td><?= $data['date_receiver']; ?></td>
                                <td><?= $data['date_start']; ?></td>
                                <td><?= $data['date_finish']; ?></td>
                                <td><?= $data['status_prepare']; ?></td>
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