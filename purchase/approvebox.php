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
                                                    <th>Kubikasi</th>
                                                    <th>Kubik Count</th>
                                                    <th>Selisih</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-borderless">
                                            <?php

                                            ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> m³</td>
                                            <?php
                                                
                                            ?>
                                                    
                                            <?php

                                                    //$ambil = mysqli_query($konek, "SELECT SUM(kubikasi) AS kubik, SUM(ctkubik) AS ctkubik FROM box WHERE status='Tidak Diterima' AND tempstat='2'");
                                                    //$data = mysqli_fetch_array($ambil);
                                                    //$order = ($data['kubik']);
                                                    //$datang = ($data['ctkubik']);
                                                    
                                                    //$kurang =($datang-$order);
                                                    //$persen = (100);
                                                    //$bagi = ($kurang) *$persen;
                                                    
                                                   
                                            ?>
                                                 <td style='font-weight: bold;'>m³</td>
                                                 <td>%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form method="post">
                                                <?php
                                                   
                                                ?>
                                                    
                                                <?php
                                                    
                                                ?>
                                                <?php
                                                    
                                                    
                                                ?>
                                                
                                                
                                                <?php
                                                    
                                                ?>
                                                    
                                            <div class="text-right m-2">
                                                <button type="submit" name="submitinserttai" class="btn btn-primary">Approve</button>
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
                                                <th>Box Count</th>
                                                <th>Kubikasi</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                                                    
                                            ?>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td> m³</td>
                                            <td></td>
                                            <td></td>

                                                
                                              
                                            </tr>

                                           
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>