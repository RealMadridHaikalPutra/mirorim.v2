<?php

$box = $_GET['box'];
$inv = $_GET['invoice'];

?>

<div class="row">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Check Packing List</h5>
                        <!--Submit-->
                        <!-- Begin Page Content -->
                <div class="container-fluid">
                            <hr style="background-color: black; border: 2px solid black;">
                            <form method="post" action="">
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="Invoice">Invoice</label>
                                <input type="text" class="form-control text-uppercase" style="font-weight: bold;" id="floatingName" name="invoice" value="<?=$inv;?>" readonly>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="Box">Box</label>
                                <input type="text" class="form-control text-uppercase" style="font-weight: bold;" id="floatingName" name="box" value="<?=$box;?>" readonly>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Name Item</label>
                                <input class="form-control" name="nama" id="nama" type="text" require>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">///////</label>
                                    <br>
                                    <button class="btn btn-outline-primary" type="submit" action="" name="ambildata">Ambil Data</button>
                                </div>
                                </div>
                            </div>
                            </form>
                            <hr style="background-color: black; border: 2px solid black;">
                            <form id="contact-form" action="" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama - Varian</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         if(isset($_POST['ambildata'])){
                                            $nama = $_POST['nama'];

                                            $select  = mysqli_query($conn, "SELECT * FROM product_id, toko_id WHERE product_id.id_product=toko_id.id_product AND nama LIKE '%$nama%'");
                                            $s = 1;
                                            while($data = mysqli_fetch_array($select)){
                                                $name = $data['nama'];
                                            ?>

                                            <tr>
                                                <td><?=$s++;?></td>
                                                <td><?=$name;?></td>
                                                <td><?=$data['sku'];?></td>
                                                <td><input type="number" name="quantity[]" class="form-control">
                                                <?php
                                                    $box = mysqli_query($conn, "SELECT * FROM boxorder_id WHERE invoice='$inv'");
                                                    $idbc = mysqli_fetch_array($box);
                                                    $idb = $idbc['id_box'];
                                                ?>
                                                <input type="hidden" value="<?=$idb;?>" name="idb">
                                                <input type="hidden" value="<?=$name;?>" name="nama[]">
                                            </tr>
                                            <?php
                                                }}

                                            ?>
                                            </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="inputorder">Submit</button>
                                    </div>
                                </div>
                            </form>
            
                        </div>
                    </div>
                    </div>