                <form method="post">
                    <div class="container-fluid">
                        <h1 class="mt-4">Form Input QTY Box and Kubikasi</h1>
                        <div class="card-header">
                                <button type="submit" name="submitboxsemua" class="btn btn-outline-success">Submit</button>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Resi</th>
                                                <th>Invoice</th>
                                                <th>Nobox</th>
                                                <th>Quantity</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php
                                                
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <th></th>
                                                <td><input class="form-control" type="number" name="qtybox[]">
                                                <input type="hidden" name="resi[]" value="">
                                                <input type="hidden" name="temp[]" value="2">
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="notecok[]">
                                                </td>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                                <th>Kubikasi</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><input type="float" class="form-control" pattern="[0-100 0-100.0-100]{1-5}" name="countkubik[]"></td>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>