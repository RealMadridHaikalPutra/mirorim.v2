<div class="container-fluid">
                        <h1 class="mt-4">Packing List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="approved.php">Approved</a></li>
                            <li class="breadcrumb-item active">Packing List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h2>Product List Existing</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                $ambil = mysqli_query($conn, "SELECT * FROM product_id WHERE jenis='Mentah'");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambil)){
                                                    //cek data gambar ada apa kagak
                                            $gambar = $data['image'];
                                            if($gambar==null){
                                                // jika tidak ada gambar
                                                $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                            } else {
                                                //jika ada gambar
                                                $img ='<img src="../assets/img/'.$gambar.'" class="zoomable">';
                                            }   
                                            ?>
                                            <tr>        
                                                <td><?=$i++;?></td>
                                                <td><?=$img;?></td>
                                                <td><?=$data['nama'];?></td>
                                                <td><?=$data['jenis'];?></td>
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