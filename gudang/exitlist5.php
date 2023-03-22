                <div class="row">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Form Input List Item G5</h5>
                        <!--Submit-->
                        <!-- Begin Page Content -->
                    <div class="container-fluid">
                            <hr>
                            <form method="post" action="">
                            
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Quantity Exit Item</label>
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
                            </div>
                            </form>
                            <hr>
                            <form id="contact-form" action="" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered"width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name Item</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /* if(isset($_POST['qtyvariant'])){
                                                $jum = $_POST['jum'];
                                                $s = 1;
                                                $jumlah = $jum+$s;

                                                for($i=1; $i < $jumlah; $i++){
                                            ?>
                                            <tr>
                                                <th><?=$s++;?></th>
                                                <td><input type="text" class="form-control" name="nama[]" require></td>
                                                <td><input type="text" class="form-control" name="sku[]" require></td>
                                                <td><input type="text" class="form-control" name="quantity[]" require="">
                                                    <input type="hidden" name="jum" value="<?=$jum;?>">
                                                    <input type="hidden" name="temp" value="5">
                                                    <Input type="hidden" name="status" value="Refill">
                                                </td>
                                            </tr>
                                            <?php
                                                }}*/

                                            ?>
                                            </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="exit5">Submit</button>
                                    </div>
                                </div>
                            </form>
            
                        </div>
                    </div>
                    </div>
                </div>