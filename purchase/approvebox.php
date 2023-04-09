<div class="container-fluid">
                        <h1 class="mt-4">Approved Box</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Box List</a></li>
                            <li class="breadcrumb-item active">Approved</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#smallModalAdd" class="btn btn-primary">Compare Kubikasi</button>
                            </div>
                            <div class="modal fade" id="smallModalAdd" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Compare Kubikasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <table class="table" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead class="table-bordered">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Resi</th>
                                                    <th>Invoice</th>
                                                    <th>Box Order</th>
                                                    <th>Box Total</th>
                                                    <th>Kubik</th>
                                                    <th>Kubik Total</th>
                                                    <th>Selisih</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-borderless">
                                            <?php
                                                $select = mysqli_query($conn, "SELECT resi, invoice, box_order FROM boxorder_id, delivery_id WHERE boxorder_id.id_delivery = delivery_id.id_delivery AND status_box='Not Approved' AND status_delivery='Not Approved'");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($select)){
                                            ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$data['resi'];?></td>
                                                    <td><?=$data['invoice'];?></td>
                                                    <td><?=$data['box_order'];?></td>
                                            <?php
                                                }
                                            ?>
                                                    
                                            <?php

                                                $select = mysqli_query($conn, "SELECT SUM(kubik_order) AS kubik_order, kubik_total, box_total FROM boxorder_id, delivery_id WHERE boxorder_id.id_delivery = delivery_id.id_delivery AND status_box='Not Approved' AND status_delivery='Not Approved'");
                                                $data = mysqli_fetch_array($select);
                                                $total = $data['kubik_total'];
                                                $order = $data['kubik_order'];

                                                $kurang = $order-$total;
                                                $persen = 100;
                                                $kali = $kurang*$persen;
                                                   
                                            ?>
                                                    <td><?=$data['box_total'];?></td>
                                                    <td><?=number_format($data['kubik_order']);?> m³</td>
                                                    <th><?=$data['kubik_total'];?>m³</th>
                                                    <th><?=number_format($kurang);?></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form method="post">
                                                <?php
                                                   $select = mysqli_query($conn, "SELECT * FROM boxorder_id, delivery_id WHERE boxorder_id.id_delivery = delivery_id.id_delivery AND status_box='Not Approved' AND status_delivery='Not Approved'");
                                                   while($data=mysqli_fetch_array($select)){
                                                ?>
                                                    <input type="hidden" name="idb[]" value="<?=$data['id_box'];?>">
                                                    <input type="hidden" name="idd" value="<?=$data['id_delivery'];?>">
                                                    <input type="hidden" name="status" value="Approved">
                                                <?php
                                                   }
                                                ?>
                                                    
                                            <div class="text-right m-2">
                                                <button type="submit" name="approvebox" class="btn btn-primary">Approve</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Resi</th>
                                                <th>Invoice</th>
                                                <th>Nobox</th>
                                                <th>Qty Box</th>
                                                <th>Kubikasi</th>
                                                <th>Status</th>
                                                <th>Form</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $select = mysqli_query($conn, "SELECT * FROM boxorder_id, delivery_id WHERE boxorder_id.id_delivery = delivery_id.id_delivery");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($select)){
                                                                                    
                                            ?>
                                            <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$data['resi'];?></td>
                                            <td><?=$data['invoice'];?></td>
                                            <td><?=$data['box'];?></td>
                                            <td><?=$data['box_order'];?></td>
                                            <td><?=$data['kubik_order'];?> m³</td>
                                            <td><?=$data['status_box'];?></td>
                                            <td><?=$data['pengiriman'];?></td>

                                                
                                              
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