                                        <div class="container-fluid">
                                            <h1 class="mt-4">Stok Prepare</h1>
                                            <ol class="breadcrumb mb-4">
                                                <li class="breadcrumb-item"><a href="index.php?url=komponen">List komponen</a></li>
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
                                                                    <th>SKU</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            
                                                          /*  $ambildata = mysqli_query($konek, "SELECT * FROM preparation");
                                                            $i = 1;
                                                            while($data=mysqli_fetch_array($ambildata)){
                                                                $nama = $data['nama'];
                                                                $sku = $data['sku'];
                                                                $quantity = $data['quantity'];
                                                                $idt = $data['id_item'];
                                                                $k = $i++;
            
                                                                $gambar = $data['image'];
                                                                if($gambar==null){
                                                                    // jika tidak ada gambar
                                                                    $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                                                } else {
                                                                    //jika ada gambar
                                                                    $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                                }
                                                            
                                                            ?>
                                                            <?php
                                                            if($quantity<10){
                                                                echo "<tr style='color: red; font-weight: bold;'>
                                                                <td>$k</td>
                                                                <td>$img</td>
                                                                <td>$nama</td>
                                                                <td>$sku</td>
                                                                <td>$quantity</td>
                                                                
                                                            </tr>
                                                            ";
        
                                                            } else {
                                                                echo "<tr style='font-weight: bold;''>
                                                                <td>$k</td>
                                                                <td>$img</td>
                                                                <td>$nama</td>
                                                                <td>$sku</td>
                                                                <td>$quantity</td>
                                                            </tr>
                                                            ";
                                                            }
                                                            ?>

                                                            <?php
                                                                }*/
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>