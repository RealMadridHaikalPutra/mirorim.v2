
                <div class="row">
        
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Input Box</h5>
            
                        <!-- Floating Labels Form -->
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nobox" id="floatingName" placeholder="NoBox">
                                <label for="floatingName">Nobox</label>
                            </div>
                            </div>
                            <div class="text-right">
                            <button type="submit" name="inputnobox" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->
                        </div>
                    </div>
                    </div>
                </section>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Items Box</h1>
                            <?php
                            ?>
                            <div class="card-header">
                                <i class="fas fa-box"></i>
                            </div>
                            <?php
                                
                            ?>
                            <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#smallModalQty" class="btn btn-primary">Insert All</button>
                            </div>
                            <div class="modal fade" id="smallModalQty" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Insert All</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="">
                                        <?php
                                            

                                        ?>
                                        <input type="hidden" name="count" value="">
                                        <?php
                                            
                                        ?>
                                            <div class="text-right m-2">
                                                <button type="submit" name="submitquantity" class="btn btn-primary">Submit</button>
                                            </div>
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Invoice</th>
                                                    <th>Nobox</th>
                                                    <th>Nama</th>
                                                    <th>SKU</th>
                                                    <th>Counting</th>
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
                                                    <td><input type="number" class="form-control" name="countinggudang[]" required="">
                                                    <input type="hidden" name="idbarang[]" value=""></td>
                                                    <td><input type="text" class="form-control" name="notegudang[]"></td>

                                                </tr>
                                            <?php
                                               
                                            ?>
                                            </tbody>
                                        </table>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <form method="post">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>invoice</th>
                                                <th>Nobox</th>
                                                <th>Item Name</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </form>
                                            </tr>
                                            <?php
                                               
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>