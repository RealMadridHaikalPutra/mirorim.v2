        <div class="row">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Form Input List Item</h5>
                        <!--Submit-->
                        <!-- Begin Page Content -->
                    <div class="container-fluid">
                            <hr>
                            <form method="post" action="">
                            
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Quantity list Variant</label>
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
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Item</label>
                                    <input class="form-control" name="nama" value="<?=$data['nama'];?>" id="nama" type="text" require>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">SKU Item</label>
                                    <input class="form-control" name="sku" value="<?=$data['sku'];?>" id="nama" type="text" require>
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
                                         if(isset($_POST['qtyvariant'])){
                                                $jum = $_POST['jum'];
                                                $s = 1;
                                                $jumlah = $jum+$s;

                                                for($i=1; $i < $jumlah; $i++){
                                            ?>
                                            <tr>
                                                <th><?=$s++;?></th>
                                                <td><input type="text" class="form-control" name="namakomponen[]" require></td>
                                                <td><input type="text" class="form-control" name="skukomponen[]" require></td>
                                                <td><input type="text" class="form-control" name="quantity[]" require="">
                                                    <input type="hidden" name="jum" value="<?=$jum;?>">
                                                    <input type="hidden" name="nama" value="<?=$data['nama'];?>">
                                                    <input type="hidden" name="sku" value="<?=$data['sku'];?>">
                                                </td>
                                            </tr>
                                            <?php
                                                }}

                                            ?>
                                            </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="inputcomponent">Submit</button>
                                    </div>
                                </div>
                            </form>
            
                        </div>
                    </div>
                    </div>
                </div>