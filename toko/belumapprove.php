<div class="container-fluid">
                        <h1 class="mt-4">History Refiil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=approve">Approved</a></li>
                            <li class="breadcrumb-item active">Not Approved</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalrefill" class="btn btn-outline-primary">Check List</a>
                            </div>
                            <div class="modal fade" id="smallModalrefill" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Input Quantity Refiil</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="">
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name Item</th>
                                                    <th>SKU</th>
                                                    <th>Picker</th>
                                                    <th>Input Checker</th>
                                                    <th>Quantity Refill</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              /*  $ambilperhitungan = mysqli_query($konek, "SELECT * FROM exititem WHERE tempstat='0' AND status<>'Preparation' AND image<>'0'");
                                                $jum = 1;
                                                while($tampil=mysqli_fetch_array($ambilperhitungan)){
                                                    $idb = ($tampil)['idbarang'];
                                                    $nama = ($tampil)['nama'];
                                                    $sku = ($tampil)['sku'];
                                                    $picker = ($tampil)['picker'];
                                                    $quantity = ($tampil)['quantityrep'];
                                            ?>
                                                <tr>
                                                    <td><?=$jum++;?></td>
                                                    <td><?=$nama;?></td>
                                                    <td class="text-uppercase"><?=$sku;?></td>
                                                    <td class="text-uppercase"><?=$picker;?></td>
                                                    <td>  <input readonly type="text" class="form-control" id="floatingName" value="<?= $_SESSION['nama_user'];?>" name="checker[]" placeholder="Box Number" required=""></td>
                                                    <td><input type="number" class="form-control" name="qtyrefill[]">
                                                    <input type="hidden" name="status[]" value="1">
                                                    <input type="hidden" name="approve[]" value="Approved">
                                                    <input type="hidden" name="skureff[]" value="<?=$sku;?>">
                                                    </td>

                                                </tr>
                                            <?php
                                                }*/
                                            ?>
                                            </tbody>
                                        </table>
                                            <div class="text-right m-2">
                                                <button type="submit" name="checkrefill" class="btn btn-primary">Submit</button>
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
                                                <th>Image</th>
                                                <th>Name Item</th>
                                                <th>SKU Store</th>
                                                <th>Picker</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Approval</th>
                                            </tr>
                                        </thead>
                                        <?php
                                           /* $ambildata = mysqli_query($konek,"SELECT * FROM stok WHERE sku<>0");
                                            while($data=mysqli_fetch_array($ambildata)){
                                                $idb = $data['idbarang'];
                                            }
                                            
                                        ?>
                                        
                                        <tbody>
                                            <?php
                                             $ambildata = mysqli_query($konek,"SELECT * FROM exititem WHERE status<>'Preparation' AND stat='Not Approved'");
                                             $i = 1;
                                             while($data=mysqli_fetch_array($ambildata)){
                                                $idb = $data['idbarang'];
                                                $nama = $data['nama'];
                                                $skutoko = $data['sku'];
                                                $picker = $data['picker'];
                                                $quantity = $data['quantityrep'];
                                                $status = $data['status'];
                                                $time = $data['timeout'];
                                                $approve = $data['stat'];

                                                //cek data gambar ada apa kagak
                                                $gambar = $data['image'];
                                                if($gambar==null){
                                                    // jika tidak ada gambar
                                                    $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                                } else {
                                                    //jika ada gambar
                                                    $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                }
                                                $ceker = $data['ceker'];
                                            ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal<?=$idb;?>">
                                                <th><?=$i++;?></th>
                                                <td><?=$img;?></td>
                                                <td><?=$nama;?></td>
                                                <td class="text-uppercase"><?=$skutoko;?></td>
                                                <td><?=$picker;?></td>
                                                <td><?=$time;?></td>
                                                <td><?=$status;?></td>
                                                
                                            <?php
                                                 if($approve=='Approved'){
                                                    echo "<td style='color: green;'>$approve</td>";
                                                } else {
                                                    echo "<td style='color: red;'>$approve</td>";
                                                }
                                            ?>
                                              
                                            </tr>
                                            <div class="modal fade" id="largeModal<?=$idb;?>" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                                <!-- Floating Labels Form -->
                                            <form method="post" class="row g-3" enctype="multipart/form-data">   
                                            <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <label>Input Image</label>
                                                        <div class="form-floating">
                                                        <input type="file" name="file" class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                        <input type="hidden" value="<?=$idb;?>" name="idb">
                                                    <div class="text-center">
                                                        <button type="submit" name="editimg" class="btn btn-primary">Submit</button>
                                                    </div> 
                                            </div>
                                            </form>
                                            <?php
                                            }*/
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>