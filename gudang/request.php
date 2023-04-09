<div class="container-fluid">
                        <div class="card-body">
                        <h5 class="card-title">Request Item To Prepare</h5>
                        <!--Submit-->
                        <!-- Begin Page Content -->
                            <hr>
                            <form method="post" action="">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Quantity Request</label>
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
                            <form id="contact-form" action="?url=approvereq" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Picker</th>
                                                <th>Nama Item</th>
                                                <th>Req User</th>
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
                                                <td>Picker</td>
                                                <td><input type="text" name="nama[]" class="form-control"></td>
                                                <td>Irham</td>
                                                <td>
                                                    <input type="number" name="quantity[]" class="form-control">
                                                    <input type="hidden" value="unprocessed" name="stat">
                                                    <input type="hidden" name="jum" value="<?=$jum;?>">
                                                </td>
                                            </tr>
                                            <?php
                                                }}

                                            ?>
                                            </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>