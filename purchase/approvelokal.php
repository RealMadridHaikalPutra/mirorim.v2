    <div class="container-fluid">
                        <h1 class="mt-4">Approved Item Lokal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=packinglist">Box List</a></li>
                            <li class="breadcrumb-item active">Approved</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#smallModalAdd" class="btn btn-primary">Compare Quantity</button>
                            </div>
                            <div class="modal fade" id="smallModalAdd" tabindex="-1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Compare?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>SKU</th>
                                                    <th>Quantity</th>
                                                    <th>Counting</th>
                                                    <th>Ceklist</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form method="post">
                                            <div class="text-right m-2">
                                                <button type="submit" name="submitinsert" class="btn btn-primary">Approve</button>
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
                                                <th>Image</th>
                                                <th>Invoice</th>
                                                <th>Item Name</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                                <th>Counting</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <div class="modal fade" id="largeModal" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                                <!-- Floating Labels Form -->
                                            <form method="post" class="row g-3" enctype="multipart/form-data">   
                                            <div class="modal-body">
                                                <br>
                                                <div class="col-sm-12 text-center">
                                                
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <label>Image</label>
                                                        <div class="form-floating">
                                                        <input type="file" name="file" class="form-control" value=''>
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <label>Item Name</label>
                                                        <div class="form-floating">
                                                        <input type="text" name="nama" class="form-control" value="">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                        <input type="hidden" value="" name="idbarang">
                                                        <input type="hidden" value="" name="box">
                                                        <input type="hidden" value="" name="invoice">
                                                    <br>
                                                    <div class="col-sm-12">
                                                    <label>SKU Store</label>
                                                    <div class="form-floating">
                                                    <input type="text" class="form-control text-uppercase" id="floatingName" name="sku" value="" placeholder="SKU Warehouse">
                                                    <label for="floatingName"></label>
                                                    </div>
                                                    </div>
                                                    <br>
                                                        <div class="col-sm-12">
                                                        <label>Quantity</label>
                                                        <div class="form-floating">
                                                        <input type="number" class="form-control text-uppercase" id="floatingName" value="" name="quantity" placeholder="Warehouse">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                        </div>
                                                    <br>
                                                    <div class="text-center">
                                                        <button type="submit" name="editapprove" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                                    </div> 
                                            </div>
                                            </form>

                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>