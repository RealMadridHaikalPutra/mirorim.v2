<?php

$idp = $_GET['idp'];
$select = mysqli_query($conn, "SELECT * FROM product_id WHERE id_product='$idp'");
$data = mysqli_fetch_array($select);

?>

<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Check Packing List</h5>
            <!--Submit-->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Item Name</label>
                            <input class="form-control" readonly name="nama" id="nama" value="<?= $data['nama']; ?>" type="text" require>
                        </div>
                    </div>
                </div>
                <hr>
                <form method="post" action="?url=quantity&idp=<?=$idp;?>">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>SKU</th>
                                    <th>Checklist</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = mysqli_query($conn, "SELECT * FROM product_id, toko_id WHERE product_id.id_product=toko_id.id_product AND jenis='Mentah'");
                                $s = 1;
                                while ($opsi = mysqli_fetch_array($select)) {
                                ?>
                                    <tr>
                                        <th><?= $s++; ?></th>
                                        <td><?= $opsi['nama']; ?></td>
                                        <td><?=$opsi['sku_toko'];?></td>

                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-label" value="<?=$opsi['id_product'];?>" name="cek[]" require="">
                                        </td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                        <div class="text-right m-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>