            <div class="container-fluid">
                        <h1 class="mt-4">History Exit Item</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
                            <li class="breadcrumb-item active">All Warehouse</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#smallModalUp">Exit</a>
                            </div>

                            <div class="modal fade" id="smallModalUp" tabindex="-1">
                                                <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">Input Qty SKU</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <br>
                                                    <form class="row g-3" method="post" action="index.php?url=exitlist" enctype="multipart/form-data">
                                                        <br>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control" id="floatingName" name="qtysku" placeholder="Box Number" required="">
                                                            <label for="floatingName">Qty SKU</label>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <select type="text" class="form-control" id="floatingName" name="stat" placeholder="Box Number" required="">
                                                                <option selected>-:-</option>
                                                                <option value="Refill">Refill</option>
                                                                <option value="Request">Request</option>
                                                                <option value="Preparation">Preparation</option>
                                                            </select>
                                                            <label for="floatingName">Status</label>
                                                        </div>
                                                        </div>
                                                        <div class="text-center">
                                                        <button type="submit" name="listexit" value="proses" class="btn btn-primary">Submit</button>
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
                                                <th>Name Item</th>
                                                <th>SKU Store</th>
                                                <th>Picker</th>
                                                <th>Quantity</th>
                                                <th>Checker</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Approval</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               /* $ambil = mysqli_query($konek, "SELECT * FROM exititem WHERE status<>'Preparation'");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambil)){
                                                    $nama = $data['nama'];
                                                    $sku = $data['sku'];
                                                    $picker = $data['picker'];
                                                    $quantity = $data['quantityrep'];
                                                    $status = $data['status'];
                                                    $tracking = $data['stat'];
                                                    $time = $data['timeout'];
                                                    $ceker = $data['ceker'];
                                            ?>
                                            <tr>
                                                <th><?=$i++;?></th>
                                                <td><?=$nama;?></td>
                                                <td class="text-uppercase"><?=$sku;?></td>
                                                <td><?=$picker;?></td>
                                                <td><?=$quantity;?></td>
                                                <td><?=$ceker;?></td>
                                                <td><?=$time;?></td>
                                                <td><?=$status;?></td>

                                            <?php
                                                 if($tracking=='Approved'){
                                                    echo "<td style='color: green;'>$tracking</td>";
                                                } else {
                                                    echo "<td style='color: red;'>$tracking</td>";
                                                }
                                            ?>
                                                
                                            </tr>
                                            <?php
                                                }*/
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>