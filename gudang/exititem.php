<script
 src="https://code.jquery.com/jquery-3.4.1.min.js"
 integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
 crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/id.js" type="text/javascript"></script>

 <script type="text/javascript">
  $(document).ready(function() {
      $('#hobi').select2({
       placeholder: "Pilih Hobi",
    allowClear: true,
    language: "id"
      });
  });
 </script>
<div class="container-fluid">
    <h1 class="mt-4">History Refill & Request</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
        <li class="breadcrumb-item active">All Warehouse</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalceklist" class="btn btn-outline-primary">Check List</a>
        </div>
        <div class="modal fade" id="smallModalceklist" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">List Req Refill & Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="">
                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">

                            <thead style="font-size: 15px;">
                                <tr>
                                    <th>No</th>
                                    <th>Name Item</th>
                                    <th>SKU</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <th>Checklist</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = mysqli_query($conn, "SELECT * FROM request_id, toko_id, product_id WHERE request_id.id_toko=toko_id.id_toko AND toko_id.id_product=product_id.id_product AND status_req='unprocessed' ");
                                $i = 1;
                                while ($data = mysqli_fetch_array($select)) {
                                    $quantity = $data['quantity_req'];
                                    $idp = $data['id_product'];
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['sku_toko']; ?></td>
                                        <td><?= $data['type_req']; ?></td>
                                        <?php
                                        if ($quantity == 0) {
                                            echo "<td><input type='number' class='form-control' name='quantity[]'></td>";
                                        } else {
                                            echo "<td>$quantity</td>";
                                        }
                                        ?>
                                        
                                        <td valign="top">

                                            <select class="form-control" name="idg[]">
                                                <?php
                                            $selectopsi = mysqli_query($conn, "SELECT * FROM gudang_id WHERE id_product='$idp'");
                                            $i = 1;
                                            while($opsi = mysqli_fetch_array($selectopsi)){
                                                
                                                ?>
                                            <option value="<?=$opsi['id_gudang'];?>"><?=$opsi['sku_gudang'];?></option>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                        </select>
                                        <td><input type="checkbox" name="cek[]" value="<?= $data['id_request']; ?>" class="form-check">
                                            <input type="hidden" value="On Process" name="stat">
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-right m-2">
                            <button type="submit" name="cektoko" class="btn btn-primary">Submit</button>
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
                            <th>Name Item</th>
                            <th>SKU Store</th>
                            <th>Req User</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Approval</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = mysqli_query($conn, "SELECT * FROM request_id, toko_id, product_id WHERE request_id.id_toko=toko_id.id_toko AND toko_id.id_product=product_id.id_product");
                        $i = 1;
                        while ($data = mysqli_fetch_array($select)) {
                            $stat = $data['status_req'];
                        ?>
                            <tr>
                                <th><?= $i++; ?></th>
                                <td><?= $data['nama']; ?></td>
                                <td class="text-uppercase"><?= $data['sku_toko']; ?></td>
                                <td>loh</td>
                                <td><?= $data['quantity_req']; ?></td>
                                <td><?= $data['type_req']; ?></td>

                                <?php
                                if ($stat == 'Approved') {
                                    echo "<td style='color: green;'>$stat</td>";
                                } elseif ($stat == 'unprocessed') {
                                    echo "<td style='color: red;'>$stat</td>";
                                } else {
                                    echo "<td style='color: orange;'>$stat</td>";
                                }
                                ?>

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
