<div class="container-fluid">
                        <h1 class="mt-4">All Stock G5</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">All Warehouse</a></li>
                            <li class="breadcrumb-item active">Warehouse 5</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" class="btn btn-outline-primary" href="index.php?url=insertitem5">Insert Item</a>
                                <a type="button" class="btn btn-outline-danger" href="index.php?url=exitlist5">Exit Item</a>
                                <a type="button" class="btn btn-outline-danger" href="#">History</a>
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
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             //$ambildata = mysqli_query($konek,"SELECT * FROM stok5");
                                            // $i = 1;
                                             //while($data=mysqli_fetch_array($ambildata)){
                                                //$idb = $data['idbarang'];
                                                //$nama = $data['nama'];
                                                //$skutoko = $data['sku'];
                                                //$quantity = $data['quantity'];

                                                ////cek data gambar ada apa kagak
                                                //$gambar = $data['image'];
                                                //if($gambar==null){
                                                    // jika tidak ada gambar
                                                    //$img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                                //} else {
                                                    //jika ada gambar
                                                    //$img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                               // }

                                               // $gambar = $data['image'];
                                                        //if($gambar==null){
                                                           // $imgx = '<img src="../assets/img/noimageavailable.png"';
                                                        //} else {
                                                            //jika ada gambar
                                                          //  $imgx ='<img src="../images/'.$gambar.'" style="width: 30%; border: 2px solid black; border-radius: 15px;">';
                                                       // }



                                            ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal">
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td class="text-uppercase"></td>
                                                <td></td>
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
                                                    <div class="col-sm-12 text-center">
                                                        
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <label>Image</label>
                                                        <div class="form-floating">
                                                        <input type="file" name="file" class="form-control" value=''>
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <label>Item Name</label>
                                                        <div class="form-floating">
                                                        <input type="text" name="nama" class="form-control"  value="">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                        <input type="hidden" value="<?=$idb;?>" name="idb">

                                                    <input type="hidden" class="form-control text-uppercase" id="floatingName" name="skutoko" value="" placeholder="SKU Warehouse">
                                                    <br>
                                                        <input type="hidden" class="form-control text-uppercase" value="" id="floatingName" name="quantity" placeholder="Quantity">
                                                   
                                                       
                                                    <br>
                                                    <div class="text-center">
                                                        <button type="submit" name="edit5" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                                    </div> 
                                            </div>
                                            </form>
                                            <?php
                                            // }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>