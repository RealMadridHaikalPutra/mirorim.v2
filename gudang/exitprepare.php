<div class="container-fluid">
                        <h1 class="mt-4">History Exit Item Prepare</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
                            <li class="breadcrumb-item active">All Warehouse</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalceklist" class="btn btn-outline-primary">Check List</a>
                            </div>
                            <div class="modal fade" id="smallModalceklist" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Approve Refill</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="">
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead style="font-size: 15px;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name Item</th>
                                                    <th>SKU</th>
                                                    <th>Quantity</th>
                                                    <th>Checklist</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                               /* $ambilperhitungan = mysqli_query($konek, "SELECT * FROM exititem WHERE status='Preparation' AND stat='Not Approved'");
                                                $jum = 1;
                                                while($tampil=mysqli_fetch_array($ambilperhitungan)){
                                                    $idb = ($tampil)['idbarang'];
                                                    $nama = ($tampil)['nama'];
                                                    $sku = ($tampil)['sku'];
                                                    $picker = ($tampil)['picker'];
                                                    $quantity = ($tampil)['quantityrep'];
                                            ?>
                                                <tr>
                                                    <th><?=$jum++;?></th>
                                                    <th><?=$nama;?></th>
                                                    <th class="text-uppercase"><?=$sku;?></th>
                                                    <th><?=$quantity;?></th>
                                                    <th><input type="checkbox" class="form-check-label" value="<?=$sku;?>" name="cekskuitem[]">
                                                    
                                                    </th>
                                                    <td>
                                                        <?php
                                                           /* $select = mysqli_query($konek, "SELECT * FROM exitcomponent WHERE tempstat=0 AND nama='$nama'");
                                                            while($data = mysqli_fetch_array($select)){
                                                        ?>
                                                            <tr style="border: 0px solid;">
                                                                <td style="border: 0px solid;">#</td>
                                                                <td style="border: 0px solid;"><?=$data['komponen'];?></td>
                                                                <td style="border: 0px solid;"><?=$data['skukomponen'];?></td>
                                                                <td style="border: 0px solid;"><?=$data['quantity'];?></td>
                                                                <td style="border: 0px solid;"><input type="checkbox" class="form-check-label" value="<?=$data['skukomponen'];?>" name="cekkomponen[]">
                                                                <input type="hidden" value="<?=$data['komponen'];?>" name="komponen[]">
                                                                <input type="hidden" value="<?=$data['quantity'];?>" name="quantity[]">
                                                                <input type="hidden" value="Approved" name="status[]">
                                                                <input type="hidden" value="<?=$data['skukomponen'];?>" name="skukomponen[]">
                                                                <input type="hidden" value="1" name="temp[]">
                                                            </td>
                                                            </tr>
                                                        <?php
                                                            }*/
                                                        ?></td>

                                                </tr>
                                            <?php
                                               // }
                                            ?>
                                            </tbody>
                                        </table>
                                            <div class="text-right m-2">
                                                <button type="submit" name="komponeninput" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        
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
                                                <th>Worker</th>
                                                <th>Quantity</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Approval</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               /* $ambil = mysqli_query($konek, "SELECT * FROM exititem WHERE status='Preparation'");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambil)){
                                                    $nama = $data['nama'];
                                                    $sku = $data['sku'];
                                                    $picker = $data['picker'];
                                                    $quantity = $data['quantityrep'];
                                                    $status = $data['status'];
                                                    $tracking = $data['stat'];
                                                    $time = $data['timeout'];
                                                    $worker = $data['worker'];
                                            ?>
                                            <tr data>
                                                <th><?=$i++;?></th>
                                                <td><?=$nama;?></td>
                                                <td class="text-uppercase"><?=$sku;?></td>
                                                <td><?=$worker;?></td>
                                                <td><?=$quantity;?></td>
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