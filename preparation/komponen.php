<div class="container-fluid">
                        <h1 class="mt-4">List Component Item</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=reqpre">Request Prepare</a></li>
                            <li class="breadcrumb-item active">List Component</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Name Item</th>
                                                <th>SKU Preparation</th>
                                                <th type="hidden" style="border: 0px solid transparent;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ambildata = mysqli_query($konek, "SELECT * FROM preparation");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambildata)){
                                                    $nama = $data['nama'];
                                                    $sku = $data['sku'];
                                                    $idt = $data['id_item'];

                                                    $gambar = $data['image'];
                                                    if($gambar==null){
                                                        // jika tidak ada gambar
                                                        $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                                    } else {
                                                        //jika ada gambar
                                                        $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                    }
                                                
                                            ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal<?=$idt;?>">
                                                <td><?=$i++;?></td>
                                                <td><?=$img;?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$sku;?></td>
                                                <td type="hidden" style="border: 0px solid transparent;">
                                                <div class="modal fade" id="largeModal<?=$idt;?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title"> Component list item : <?=$nama;?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <table class="table table-bordered" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Name</th>
                                                                <th>SKU</th>
                                                                <th>Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $ambildatalist = mysqli_query($konek, "SELECT * FROM listpre WHERE sku='$sku'");
                                                                $k = 1;
                                                                while($ambil = mysqli_fetch_array($ambildatalist)){
                                                                    $namaitem = $ambil['nama'];
                                                                    $skulist = $ambil['skukomponen'];
                                                                    $komponen = $ambil['komponen'];
                                                                    $qtylist = $ambil['quantity'];
                                                                
                                                            ?>
                                                            <tr>
                                                                <td><?=$k++;?></td>
                                                                <td><?=$komponen;?></td>
                                                                <td><?=$skulist;?></td>
                                                                <td><?=$qtylist;?></td>
                                                            </tr>

                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                                            </div>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                            
                                </div>
                            </div>
                        </div>
                    </div>