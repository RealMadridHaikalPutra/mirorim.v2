    <div class="container-fluid">
                        <h1 class="mt-4">History Mutasi Warehouse</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
                            <li class="breadcrumb-item active">Mutasi Warehouse</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            <a type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#smallModalUp">Mutasi</a>
                            </div>

                            <div class="modal fade" id="smallModalUp" tabindex="-1">
                                                <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">Input Qty SKU Warehouse</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <br>
                                                    <form class="row g-3" method="post" action="index.php?url=mutasilist" enctype="multipart/form-data">
                                                        <br>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control" id="floatingName" name="qtyskugudang" placeholder="Box Number" required="">
                                                            <label for="floatingName">Qty SKU Warehouse</label>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <select type="text" class="form-control" id="floatingName" name="stats" placeholder="Box Number" required="">
                                                                <option selected value="On process">On process</option>
                                                            </select>
                                                            <label for="floatingName">Status</label>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input readonly type="text" class="form-control" id="floatingName" value="<?= $_SESSION['nama_user'];?>" name="sender" placeholder="Box Number" required="">
                                                            <label for="floatingName">Sender</label>
                                                        </div>
                                                        </div>
                                                        <div class="text-center">
                                                        <button type="submit" name="listmutasi" value="proses" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form><!-- End floating Labels Form -->
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Name Item</th>
                                                <th>SKU Store</th>
                                                <th>SKU Warehouse</th>
                                                <th>Quantity Out</th>
                                                <th>Sender</th>
                                                <th>Recipient</th>
                                                <th>Status</th>
                                                <th>Time Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              /*  $ambildatamutasi = mysqli_query($konek, "SELECT * FROM mutasi");
                                                $k = 1;
                                                while($data=mysqli_fetch_array($ambildatamutasi)){
                                                $sku = $data['sku'];
                                                $nama = $data['nama'];
                                                $skug = $data['skug'];
                                                $quantity = $data['quantitymut'];
                                                $status = $data['status'];
                                                $time = $data['jamkeluar'];
                                                $pengirim = $data['sender'];
                                                $penerima = $data['penerima'];


                                                //cek data gambar ada apa kagak
                                                $gambar = $data['image'];
                                                if($gambar==null){
                                                // jika tidak ada gambar
                                                    $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                                } else {
                                                //jika ada gambar
                                                    $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                 } */

                                            ?>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td class="text-uppercase"></td>
                                                <td class="text-uppercase"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <?php
                                                ///if($status=='Done'){
                                                  //  echo "<td style='color: green;'>$status</td>";
                                               // } else {
                                                   // echo "<td style='color: red;'>$status</td>";
                                               // }
                                                ?>
                                                <td></td>

                                            </tr>
                                            <?php
                                                //}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>