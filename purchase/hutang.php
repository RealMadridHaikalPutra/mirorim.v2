<div class="container-fluid">
                        <h1 class="mt-4">Packing List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="approved.php">Approved</a></li>
                            <li class="breadcrumb-item active">Packing List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Hutang Id</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama</th>
                                                <th>Quantity Hutang</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                $ambildata = mysqli_query($conn, "SELECT * FROM product_id, hutang_id, list_komponen WHERE product_id.id_product=list_komponen.id_komponen AND list_komponen.id_komponen=hutang_id.id_komponen_hutang");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambildata)){
                                                    $idp = $data['id_product'];
                                                    $idh = $data['id_hutang'];
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td>Gambar</td>
                                                <th><?=$data['nama'];?></th>
                                                <td><?=$data['quantity_hutang'];?></td>
                                                <td><?=$data['status_hutang'];?></td>
                                               
                                                <td>
                                                    <?php
                                                        if($data['status_hutang']=='Belum'){
                                                            echo " <form method='post'><button type='submit' name='orderhutang' class='btn btn-warning'>Order</button>
                                                                <input type='hidden' value='$idh' name='idh'>
                                                                <input type='hidden' value='Order' name='status'>
                                                                </form>";
                                                        } elseif($data['status_hutang']=='Order') {
                                                            echo "<button data-bs-toggle='modal' data-bs-target='#largeModal$idh' class='btn btn-danger'>Bayar</button>";
                                                        } else {
                                                            echo "Sudah Lunas";
                                                        }
                                                    ?>
                                                </td>
                                                   
                                            </tr>
                                            <!--Modal-->
                                            <div class="modal fade" id="largeModal<?=$idh;?>" tabindex="-1">
                                                <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">List Item Invoice : <?=$data['nama'];?></h5>
                                                   
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!--Card-->
                                                    <form class="row g-3" method="post" enctype="multipart/form-data">
                                                        <br>
                                                        <div class="col-sm-12 m-0">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control" id="floatingName" name="hutang" max="<?=$data['quantity_hutang'];?>" min="0" required="">
                                                            <label for="floatingName">Quantity Bayar</label>
                                                            <input type='hidden' value='<?=$idh;?>' name='idh'>
                                                            <input type='hidden' value='Lunas' name='status'>
                                                        </div>
                                                        </div>
                                                        <br>
                                                        <div class="text-center m-4">
                                                            <button class="btn btn-primary" name="buttonhutang">Submit</button>
                                                        </div>
                                                    </form>
                                                    <!--End Card--->
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                           
                                            </tbody>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                    </div>