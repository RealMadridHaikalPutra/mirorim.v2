<div class="row">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Add New</h5>
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
                                
                            </div>
                            </form>
                            <hr>
                            <form id="contact-form" action="" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input class="form-control" name="file" id="image" type="file" required="">
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Name Item</label>
                                <input class="form-control" name="nama" id="nama" type="text" required="">
                            </div>
                            </div>
                            </div>
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Varian</th>
                                                <th>Jenis</th>
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
                                                <td><input type="text" class="form-control" name="variant[]" require=""></td>
                                                    <input type="hidden" name="jum[]" value="<?=$jum;?>">
                                                    
                                                </td>
                                                <td><input type="text" class="form-control" name="jenis" value="Mateng" readonly></td>
                                            </tr>
                                            <?php
                                                }}

                                            ?>
                                            </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="newmultiitem">Submit</button>
                                    </div>
                                </div>
                            </form>
            
                        </div>
                    </div>
                    </div>