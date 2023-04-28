<div class="container-fluid">
                        <h1 class="mt-4">Task Pending</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active">Task Pending</li>
                        </ol>
                        <?php
                        $select = mysqli_query($conn, "SELECT id_product_finish AS idp, id_prepare AS idpre, nama, sku_toko, quantity_req, requester, worker, status_prepare FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish");
                        while ($data = mysqli_fetch_array($select)){
                            $sku = $data['sku_toko'];
                            $nama = $data['nama'];
                            $request = $data['requester'];
                            $stats = $data['status_prepare'];
                            $worker = $data['worker'];
                            if($stats=='Unprocess'){
                                echo"<div class='alert alert-info alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Pemberitahuan $nama SKU $sku Di Request Oleh $request Silahkan Recive dan Prepare</strong>
                        </div>";
                            }elseif($stats=='Done'){
                                echo"<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Pemberitahuan SKU $sku Sudah Selesai Di Preparation Oleh $worker Silahkan Kembalikan ke Gudang</strong>
                                </div>";

                            }


                        }
                        ?>
                        