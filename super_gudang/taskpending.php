<div class="container-fluid">
                        <h1 class="mt-4">Task Pending</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active">Task Pending</li>
                        </ol>
                        <?php
                            $ambildatarequest = mysqli_query($conn, "SELECT * FROM request_id, toko_id, product_id WHERE request_id.id_toko=toko_id.id_toko AND toko_id.id_product=product_id.id_product AND status_req='unprocessed' ");
                            while($ambil = mysqli_fetch_array($ambildatarequest)){
                            $stats = $ambil['type_req'];
                            $request = $ambil['requester'];
                            $sku = $ambil['sku_toko'];

                            if($stats=='refill'){
                                echo"<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Pemberitahuan SKU $sku Di minta Refill oleh $request </strong>
                            </div>";
                            }else{
                                echo"<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Pemberitahuan SKU $sku Di Request oleh $request </strong>
                            </div>";

                            }
                        }
                        ?>
                        <?php
                         $select = mysqli_query($conn, "SELECT * FROM mutasi_id, gudang_id, product_id WHERE mutasi_id.id_gudang=gudang_id.id_gudang AND gudang_id.id_product=product_id.id_product AND status_mutasi='Not Approved'");
                         while ($data = mysqli_fetch_array($select)){
                            $skug = $data['skug_lama'];
                            $skugbaru = $data['skug_baru'];
                            $namaproduk = $data['nama'];
                         
                        ?>
                        <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Pemberitahuan <?=$namaproduk;?> Mutasi/Switching SKU Gudang Dari <?=$skug;?> Ke <?=$skugbaru;?></strong>
                        </div>
                        <?php
                         }
                        ?>
                        <?php
                        $select = mysqli_query($conn, "SELECT id_product_finish AS idp, id_prepare AS idpre, nama, sku_toko, quantity_req, requester FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish AND status_prepare='Unprocess'");
                        while ($data = mysqli_fetch_array($select)){
                            $sku = $data['sku_toko'];
                            $nama = $data['nama'];
                            $request = $data['requester'];
                        ?>
                        <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Pemberitahuan <?=$nama;?> SKU <?=$sku;?> Di Request Oleh <?=$request;?> Silahkan Siapkan Komponen Nya !</strong>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                            $select1 = mysqli_query($conn, "SELECT id_product_finish AS idp, id_prepare AS idpre, nama, sku_toko, quantity_req, worker FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish AND status_prepare='Done'");
                            while ($data2 = mysqli_fetch_array($select1)){
                            $sku = $data2['sku_toko'];
                            $nama1 = $data2['nama'];
                            $Worker = $data2['worker'];
                        ?>
                        <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Pemberitahuan SKU <?=$sku;?> Sudah Selesai Di Preparation Oleh <?=$Worker;?></strong>
                        </div>
                        <?php
                        }
                        ?>
                        