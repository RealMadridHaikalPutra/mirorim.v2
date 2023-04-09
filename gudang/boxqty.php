                <form method="post">
                    <div class="container-fluid">
                        <h1 class="mt-4">Form Input QTY Box and Kubikasi</h1>
                        <div class="card-header">
                                <button type="submit" name="inputquantitybox" class="btn btn-outline-success">Submit</button>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Resi</th>
                                                <th>Invoice</th>
                                                <th>Nobox</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php
                                                $resi = $_POST['cekboxcount'];
                                                $hitung = count($resi);
                                                $k = 1;

                                                for($i=0; $i < $hitung; $i++){
                                                
                                                $ambil = mysqli_query($conn, "SELECT * FROM boxorder_id WHERE id_box='$resi[$i]'");
                                                $data = mysqli_fetch_array($ambil);
                                            ?>
                                            <tr>
                                                <td><?=$k++;?></td>
                                                <td><?=$data['resi'];?></td>
                                                <th><?=$data['invoice'];?></th>
                                                <th><?=$data['box'];?></th>
                                                <input type="hidden" name="idb[]" value="<?=$data['id_box'];?>;?>">
                                            
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                                <th>Pengiriman</th>
                                                <td></td>
                                                <td></td>
                                                <td><input type="text" class="form-control" pattern="[0-100 0-100.0-100]{1-5}" name="pengiriman" require></td>
                                                
                                            </tr>
                                        </tfoot>
                                        <tfoot>
                                                <th>Quantity</th>
                                                <td></td>
                                                <td></td>
                                                <td><input type="number" class="form-control" pattern="[0-100 0-100.0-100]{1-5}" name="totalbox" require></td>
                                                
                                            </tr>
                                        </tfoot>
                                        <tfoot>
                                                <th>Kubikasi</th>
                                                <td></td>
                                                <td></td>
                                                <td><input type="float" class="form-control" pattern="[0-100 0-100.0-100]{1-5}" name="totalkubik" require></td>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>