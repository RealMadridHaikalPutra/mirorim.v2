<div class="container-fluid">
                        <h1 class="mt-4">Task Pending</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active">Task Pending</li>
                        </ol>
                        <?php
                             $ambildatarequest = mysqli_query($conn, "SELECT * FROM request_id, toko_id, product_id WHERE request_id.id_toko=toko_id.id_toko AND toko_id.id_product=product_id.id_product AND status_req='On Process' ");
                             while($ambil = mysqli_fetch_array($ambildatarequest)){
                             $nama = $ambil['nama'];
                             $sku = $ambil['sku_toko'];
                             $stats = $ambil['type_req'];
                             $picker = $ambil['picker'];
                        ?>
                        <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Pemberitahuan <?=$nama;?> SKU <?=$sku;?> Sedang Diproses oleh <?=$picker;?> Silahkan Menunggu dan Hitung Qty yang telah Diproses</strong>
                        </div>
                        <?php
                        }
                        ?>
                        