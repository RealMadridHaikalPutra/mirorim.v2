<?php

$conn  = mysqli_connect("localhost","root","","mirorim.v2");

//insert req
if(isset($_POST['tokoinput'])){
    $jum = $_POST['jum'];
    $sku = $_POST['sku'];
    $status = $_POST['status'];
    $stat = $_POST['stat'];
    $quantity = $_POST['quantity'];
    $requester = $_POST['requester'];

    for($i = 0; $i < $jum; $i++){
        $select = mysqli_query($conn, "SELECT * FROM toko_id WHERE sku_toko='$sku[$i]'");
        $data = mysqli_fetch_array($select);
        $idt = $data['id_toko'];
        if($select){
            $insert = mysqli_query($conn, "INSERT INTO request_id(id_toko, quantity_req, type_req, status_req, requester) VALUES('$idt','$quantity[$i]','$status[$i]','$stat','$requester')");
            header('location:?url=approve');
        } else {

        }
    } {

    }
    
}

//Approve Refill
if(isset($_POST['approverefill'])){
    $quantity = $_POST['quantity'];
    $stat = $_POST['stat'];
    $idt = $_POST['idt'];
    $idk = $_POST['idk'];

    $jum = count($idt);
    for($i = 0; $i < $jum; $i++){
        $select = mysqli_query($conn, "SELECT * FROM request_id WHERE id_request='$idt[$i]'");
        $data = mysqli_fetch_array($select);
        $qtyorder = $data['quantity_req'];

        if($qtyorder==$quantity[$i]){
            $update = mysqli_query($conn, "UPDATE request_id SET quantity_count='$quantity[$i]', status_req='$stat[$i]' WHERE id_request='$idt[$i]'");
            if($update){
                $selecttotal = mysqli_query($conn, "SELECT id_total, id_gudang, quantity_tambah FROM request_total WHERE id_request='$idt[$i]'");
                while($opsi = mysqli_fetch_array($selecttotal)){
                $id = $opsi['id_gudang'];
                $qty = $opsi['quantity_tambah'];
                $idtol = $opsi['id_total'];

                if($selecttotal){
                    $selectgudang = mysqli_query($conn, "SELECT quantity FROM gudang_id WHERE id_gudang='$id'");
                    $opsi2 = mysqli_fetch_array($selectgudang);
                    $qtyg = $opsi2['quantity'];

                    $kurang = $qtyg-$qty;
                    if($selectgudang){
                        $updateg = mysqli_query($conn, "UPDATE gudang_id SET quantity='$kurang' WHERE id_gudang='$id'");
                        if($updateg){
                            $updatetol = mysqli_query($conn, "UPDATE request_total SET status_total='$stat[$i]' WHERE id_total='$idtol'");
                            header('location:?url=approve');
                        }
                    } else {

                    }
                } else {

                }}

            } else {

            }
        } else {
            $update = mysqli_query($conn, "UPDATE request_id SET quantity_count='$quantity[$i]' WHERE id_request='$idt[$i]'");
            header('location:?url=approve');
        }
    } {

    }
}

if(isset($_POST['approvereadmin'])){
    $quantityr = $_POST['quantityr'];
    $quantityc = $_POST['quantityc'];
    $stat = $_POST['stat'];
    $idt = $_POST['idt'];
    $idk = $_POST['idk'];
    $idg = $_POST['idg'];

    $jum = count($idt);
    for($i = 0; $i < $jum; $i++){
        $update = mysqlI_query($conn, "UPDATE request_id SET quantity_req='$quantityr[$i]', quantity_count='$quantityc[$i]' WHERE id_request='$idt[$i]'");
        if($quantityc[$i]==$quantityr[$i]){
            $update = mysqli_query($conn, "UPDATE request_id SET quantity_count='$quantity[$i]', status_req='$stat[$i]' WHERE id_request='$idt[$i]'");
            if($update){
                $selecttotal = mysqli_query($conn, "SELECT id_total, id_gudang, quantity_tambah FROM request_total WHERE id_request='$idt[$i]'");
                while($opsi = mysqli_fetch_array($selecttotal)){
                $id = $opsi['id_gudang'];
                $qty = $opsi['quantity_tambah'];
                $idtol = $opsi['id_total'];

                if($selecttotal){
                    $selectgudang = mysqli_query($conn, "SELECT quantity FROM gudang_id WHERE id_gudang='$id'");
                    $opsi2 = mysqli_fetch_array($selectgudang);
                    $qtyg = $opsi2['quantity'];

                    $kurang = $qtyg-$qty;
                    if($selectgudang){
                        $updateg = mysqli_query($conn, "UPDATE gudang_id SET quantity='$kurang' WHERE id_gudang='$id'");
                        if($updateg){
                            $updatetol = mysqli_query($conn, "UPDATE request_total SET status_total='$stat[$i]' WHERE id_total='$idtol'");
                            header('location:?url=approve');
                        }
                    } else {

                    }
                } else {

                }}

            } else {

            }
        } else {
            
        }
        header('location:?url=approveadmin');
    } {

    }
}

//Edit SKU
if(isset($_POST['addsku'])){
    $idp = $_POST['idp'];
    $sku = $_POST['sku'];

    $jum = count($idp);
    for($i = 0; $i < $jum; $i++){
        $update = mysqli_query($conn, "UPDATE toko_id SET sku_toko='$sku[$i]' WHERE id_product='$idp[$i]'");
        if($update){
            header('location:?url=product');
        } else {

        }
    }{

    }

}
