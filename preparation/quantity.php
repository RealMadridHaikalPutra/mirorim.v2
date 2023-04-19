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
                <form method="post" action="?url=quantity">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>SKU</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $cek = $_POST['cek'];

                                    $jum = count($cek);
                                    for($i = 0; $i < $jum; $i++){
                                        $select = mysqli_query($conn, "SELECT * FROM toko_id, product_id WHERE toko_id.id_product=product_id.id_product AND product_id.id_product='$cek[$i]'");
                                        $opsi = mysqli_fetch_array($select);
                                
                                ?>
                                    <tr>
                                        <th><?= $jum; ?></th>
                                        <td><?= $opsi['nama']; ?></td>
                                        <td><?=$opsi['sku_toko'];?></td>

                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="quantity[]" require="">
                                            <input type="hidden" name="jum[]" value="<?= $jum; ?>">
                                            <input type="hidden" name="nama[]" value="<?= $opsi['nama']; ?>">
                                            <input type="hidden" name="idp" value="<?=$idp;?>">
                                        </td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                        <div class="text-right m-3">
                            <button type="submit" class="btn btn-primary" name="komponeninput">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>