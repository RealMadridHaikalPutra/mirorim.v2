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
                            <hr>
                            <form method="post" action="">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Quantity Variant</label>
                                    <input class="form-control" name="jum" id="nama" type="number" require>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">///////</label>
                                    <br>
                                    <button class="btn btn-outline-primary" type="submit" action="" name="qtyvariant">Submit</button>
                                </div>
                                </div>
                            </form>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Item Name</label>
                                    <input class="form-control" readonly name="nama" id="nama" value="<?=$data['nama'];?>" type="text" require>
                                </div>
                                </div>
                            </div>
                            <hr>
                            <form method="post">
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         if(isset($_POST['qtyvariant'])){
                                                $s = 1;
                                                $jum = $_POST['jum'];

                                                for($i=0; $i < $jum; $i++){
                                            ?>
                                            <tr>
                                                <th><?=$s++;?></th>
                                                <td><input type="text" class="form-control" name="nama[]" require=""></td>
                                                    
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="quantity[]" require="">
                                                    <input type="hidden" name="jum[]" value="<?=$jum;?>">
                                                    <input type="hidden" name="idp" value="<?=$idp;?>">
                                                </td>
                                            </tr>
                                            <?php
                                                }}

                                            ?>
                                            </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="komponeninput">Submit</button>
                                    </div>
                                </div>
                            </form>
            
                        </div>
                    </div>
                    </div>