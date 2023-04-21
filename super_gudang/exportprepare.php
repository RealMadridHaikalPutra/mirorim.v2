<?php
require 'php/function.php';
?>
<html>
<head>
  <title>Laporan Transaksional Prepare Mirorim</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Laporan Transaksional Prepare Mirorim</h2>
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                <thead>
                <tr>
                            <th>No</th>
                            <th>Name Item</th>
                            <th>SKU Store</th>
                            <th>Requester</th>
                            <th>Recive</th>
                            <th>Worker</th>
                            <th>Quantity</th>
                            <th>Reject</th>
                            <th>Time Receive</th>
                            <th>Time On Process</th>
                            <th>Time Done</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = mysqli_query($conn, "SELECT nama, sku_toko, worker, quantity_req, quantity_matang, quantity_reject, date_start, date_finish, date_receiver, status_prepare, requester, receiver FROM toko_id, product_id, request_prepare WHERE toko_id.id_product=product_id.id_product AND product_id.id_product=request_prepare.id_product_finish");
                        $i = 1;
                        while ($data = mysqli_fetch_array($select)) {
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['sku_toko']; ?></td>
                                <td><?= $data['requester']; ?></td>
                                <td><?= $data['receiver']; ?></td>
                                <td><?= $data['worker']; ?></td>
                                <td><?= $data['quantity_matang']; ?></td>
                                <td><?= $data['quantity_reject']; ?></td>
                                <td><?= $data['date_receiver']; ?></td>
                                <td><?= $data['date_start']; ?></td>
                                <td><?= $data['date_finish']; ?></td>
                                <td><?= $data['status_prepare']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                                        </tbody>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>