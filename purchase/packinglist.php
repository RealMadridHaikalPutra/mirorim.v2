        <div class="container-fluid">
                        <h1 class="mt-4">Packing List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="approved.php">Approved</a></li>
                            <li class="breadcrumb-item active">Packing List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalUp" class="btn btn-primary">Add Box</a>

                            </div>
                            <div class="modal fade" id="smallModalUp" tabindex="-1">
                                                <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">Input Packing List</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <br>
                                                    <form class="row g-3" method="post" enctype="multipart/form-data">
                                                        <br>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingName" name="invoice" placeholder="Box Number" required="">
                                                            <label for="floatingName">Invoice</label>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingName" name="resi" placeholder="Box Number" required="">
                                                            <label for="floatingName">Resi</label>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingName" name="box" placeholder="Box Number" required="">
                                                            <label for="floatingName">Box</label>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control" id="floatingName" name="qtybox" placeholder="Box Number" required="">
                                                            <label for="floatingName">Quantity Box</label>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-9 ml-5">
                                                        <div class="form-floating">
                                                        <input type="text" id="floatingName" name="kubikasi" pattern="[0-100 0-100.0-100]{1-5}" placeholder="Box Number" class="form-control" required="">
                                                            <label for="floatingName">Kubikasi</label>
                                                        </div>
                                                        </div>
                                                        <div class="text-center">
                                                        <button type="submit" name="submitqtybox" value="proses" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form><!-- End floating Labels Form -->
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Invoice</th>
                                                <th>No Resi</th>
                                                <th>Box Number</th>
                                                <th>kubikasi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <th data-bs-toggle="modal" data-bs-target="#largeModal"></th>
                                                <td></td>
                                                <td class="text-uppercase"></td>
                                                <td> m³</td>
                                                <td></td>
                                            </tr>
                                            <!--Modal-->
                                            <div class="modal fade" id="largeModal" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">List Item Invoice : </h5>
                                                    <button class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#smallModal">Add New Item</button>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!--Card-->
                                                    <div class="row row-cols-1 row-cols-md-2 g-4">
                                                        <div class="col">
                                                            <div class="card border-dark m-auto" style="max-width: 18rem;">
                                                                <div class="card-header">Items </div>
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Nama Barang : </h5>
                                                                    <h5 class="card-title text-uppercase">SKU :</h5>
                                                                    <h5 class="card-title">Quantity :</h5>
                                                                    <h5 class="card-title">Status : </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--End Card--->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="smallModal" tabindex="-1">
                                                <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title"></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="card-header">
                                                    <form method="post" action="inputmulti.php">
                                                        <input type="hidden" name="inv" value="">
                                                        <input type="hidden" name="boxid" value="">
                                                        <button type="submit" name="btnmulti" class="btn btn-outline-primary" href="inputmulti.php">Multi</button>
                                                    </form>
                                                    </div>
                                                    <form method="post" class="row g-3" enctype="multipart/form-data">   
                                                        <div class="modal-body">
                                                        <input type="hidden" class="form-control text-uppercase" id="floatingName" name="box" value="" placeholder="SKU Warehouse">
                                                        <input type="hidden" class="form-control text-uppercase" id="floatingName" name="invoice" value="" placeholder="SKU Warehouse">
                                                        <div class="col-12">
                                                                <div class="col-sm-12">
                                                                    <label>Image</label>
                                                                    <div class="form-floating">
                                                                    <input type="file" name="file" class="form-control" id="floatingName" placeholder="Image" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label>Item Name</label>
                                                                    <div class="form-floating">
                                                                    <input type="text" name="nama" class="form-control" id="floatingName" placeholder="Item Name" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label>SKU</label>
                                                                    <div class="form-floating">
                                                                    <input type="text" name="sku" class="form-control text-uppercase" id="floatingName" placeholder="SKU Store">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label>Quantity</label>
                                                                    <div class="form-floating">
                                                                    <input type="number" name="quantity" class="form-control" id="floatingName" placeholder="Quantity" required="">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="text-center">
                                                                    <button type="submit" name="additembox" class="btn btn-primary">Submit</button>
                                                                </div> 
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>