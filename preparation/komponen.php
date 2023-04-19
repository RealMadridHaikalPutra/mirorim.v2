<div class="container-fluid">
    <h1 class="mt-4">List Component Item</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php?url=reqpre">Request Prepare</a></li>
        <li class="breadcrumb-item active">List Component</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a href="?url=additem" class="btn btn-primary" type="button">Add New</a>
            <a href="?url=product" class="btn btn-warning" type="button">List Product</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name Item</th>
                            <th>SKU Toko</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ambildata = mysqli_query($conn, "SELECT * FROM toko_id, product_id WHERE toko_id.id_product=product_id.id_product AND jenis='Mateng'");
                        $i = 1;
                        while ($data = mysqli_fetch_array($ambildata)) {
                            $idpf = $data['id_product'];
                            $gambar = $data['image'];

                            if($gambar==null){
                                // jika tidak ada gambar
                                $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                            } else {
                                //jika ada gambar
                                $img ='<img src="../assets/img/'.$gambar.'" class="zoomable">';
                            }

                        ?>
                            <tr data-bs-toggle="modal" data-bs-target="#largeModal<?= $data['id_product']; ?>">
                                <td><?= $i++; ?></td>
                                <td><?=$img;?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['sku_toko']; ?></td>
                                <td>
                                    <div class="modal fade" id="largeModal<?= $data['id_product']; ?>" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> Component list item : <?= $data['nama']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-header">
                                                    <a class="btn btn-primary" href="?url=addkomp&idp=<?=$data['id_product'];?>" type="button">Add Component</a>
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
                                                            $ambildatalist = mysqli_query($conn, "SELECT * FROM product_id, list_komponen WHERE product_id.id_product=list_komponen.id_komponen AND id_product_finish='$idpf'");
                                                            $k = 1;
                                                            while ($ambil = mysqli_fetch_array($ambildatalist)) {

                                                            ?>
                                                                <tr>
                                                                    <td><?= $k++; ?></td>
                                                                    <td><?= $ambil['nama']; ?></td>
                                                                    <td>SKU</td>
                                                                    <td><?= $ambil['quantity_komponen']; ?></td>
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