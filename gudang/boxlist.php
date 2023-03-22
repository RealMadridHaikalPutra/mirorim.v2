<div class="container-fluid">
                        <h1 class="mt-4">Box List</h1>
                        <div class="card-header">
                                <a type="button" class="btn btn-outline-primary" href="index.php?url=addnew">Add New</a>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalBox" class="btn btn-outline-warning">CheckBox</a>
                                        <div class="modal fade" id="smallModalBox" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <form method="post" action="index.php?url=boxqty">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">CheckBox</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Resi</th>
                                                            <th>Invoice</th>
                                                            <th>Nobox</th>
                                                            <th>Ceklist</th>
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
                                                            <td><input type="checkbox" class="form-check-label" value="" name="cekboxcount[]">
                                                            </td>
                                                    
                                                    </tbody>
                                                </table>
                                                <div class="text-right m-2">
                                                    <button class="btn btn-primary text-right">Submit</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
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
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                           
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <th></th>
                                                <td></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>