<div class="container-fluid">
                        <h1 class="mt-4">Input data refill</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
                            <li class="breadcrumb-item active">All Warehouse</li>
                        </ol>
                        <form method="post">
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="submit" class="btn btn-outline-success" name="submitgudang">Submit</button>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>SKU Store</th>
                                                <th>Picker</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                /*$jum = $_POST['qtysku'];
                                                $status = $_POST['stat'];
                                                $s = 1;
                                                $jumlah = $jum+$s;

                                                for($i=1; $i < $jumlah; $i++){
                                            ?>
                                            <tr>
                                                <th><?=$s++;?></th>
                                                <td><input type="text" class="form-control text-uppercase" name="sku[]"></td>
                                                <td><input readonly type="text" class="form-control" value="<?= $_SESSION['nama_user'];?>" name="picker[]"></td>
                                                <td><input type="text" class="form-control" name="quantity[]"></td>
                                                <td><input readonly type="text" class="form-control" name="status[]" value="<?=$status;?>">
                                                    <input type="hidden" name="jum" value="<?=$jum;?>">
                                                </td>
                                            </tr>
                                            <?php
                                                }*/

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>