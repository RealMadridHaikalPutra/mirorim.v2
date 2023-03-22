<div class="container-fluid">
                        <h1 class="mt-4">Input Data Mutasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=gudang">Warehouse</a></li>
                            <li class="breadcrumb-item active">All Warehouse</li>
                        </ol>
                        <form method="post">
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="submit" class="btn btn-outline-success" name="mutasigudang">Submit</button>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>SKU Store</th>
                                                <th>Quantity</th>
                                                <th>Sender</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            /*    $jum = $_POST['qtyskugudang'];
                                                $sender = $_POST['sender'];
                                                $status = $_POST['stats'];
                                                $s = 1;
                                                $jumlah = $jum+$s;

                                                for($i=1; $i < $jumlah; $i++){
                                            ?>
                                            <tr>
                                                <th><?=$s++;?></th>
                                                <td><input type="text" class="form-control text-uppercase" name="skutoko[]"></td>
                                                <td><input type="number" class="form-control" name="qtymutasi[]"></td>
                                                <td><input readonly type="text" class="form-control" name="sender[]" value="<?=$sender;?>"></td>
                                                <td><input type="text" class="form-control" name="status[]" value="<?=$status;?>">
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