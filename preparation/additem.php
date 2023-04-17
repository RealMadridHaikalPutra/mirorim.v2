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
                    </div>
                </form>
                <hr>
                <form method="post">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Nama</th>
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
                                    <td><input type="file" name="file[]" multiple class="form-control" require=""></td>
                                    <td><input type="text" class="form-control" name="nama[]" require=""></td>
                                        <input type="hidden" name="jum[]" value="<?=$jum;?>">
                                    </td>
                                    <td>
                                    <input type="text" class="form-control" name="jenis" readonly value="Mateng" require="">
                                    </td>
                                </tr>
                                <?php
                                    }}

                                ?>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="addkomponen">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>