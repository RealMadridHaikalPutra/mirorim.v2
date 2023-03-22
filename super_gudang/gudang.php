            <div class="container-fluid">
                        <h1 class="mt-4">All Stock</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?url=nonsku">Non SKU</a></li>
                            <li class="breadcrumb-item active">All Stock</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" class="btn btn-outline-primary" href="index.php?url=boxlist">Box List</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Name Item</th>
                                                <th>SKU Store</th>
                                                <th>SKU Warehouse</th>
                                                <th>Warehouse</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <?php
                                           
                                        ?>
                                        
                                        <tbody>
                                            <?php

                                            ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal">
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td class="text-uppercase"></td>
                                                <td class="text-uppercase"></td>
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
                                                        <input type="text" name="nama" class="form-control"  value="">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                        <input type="hidden" value="" name="idb">

                                                    <input type="hidden" class="form-control text-uppercase" id="floatingName" name="skutoko" value="" placeholder="SKU Warehouse">
                                                    <br>

                                                        <input type="hidden" class="form-control text-uppercase" id="floatingName" value="" name="skugudang" placeholder="SKU Warehouse">

                                                    <div class="col-sm-12">
                                                        <label>Warehouse</label>
                                                        <div class="form-floating">
                                                        <input type="number" class="form-control text-uppercase" id="floatingName" value="" name="gudang" placeholder="Warehouse">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                        <input type="hidden" class="form-control text-uppercase" value="" id="floatingName" name="quantity" placeholder="Quantity">
                                                   
                                                       
                                                    <br>
                                                    <div class="text-center">
                                                        <button type="submit" name="editnosku" class="btn btn-primary">Submit</button>
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