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
        $idg = $data['id_gudang'];
        if($qtyorder==$quantity[$i]){
            $update = mysqli_query($conn, "UPDATE request_id SET quantity_count='$quantity[$i]', status_req='$stat[$i]' WHERE id_request='$idt[$i]'");
            if($update){
                $selectopsi = mysqli_query($conn, "SELECT quantity FROM gudang_id WHERE id_gudang='$idg'");
                $opsi = mysqli_fetch_array($selectopsi);
                $qty = $opsi['quantity'];

                $kurang = $qty-$quantity[$i];
                if($selectopsi){
                    $out = mysqli_query($conn, "UPDATE gudang_id SET quantity='$kurang' WHERE id_gudang='$idg'");
                    header('location:?url=approve');
                    // if($out){
                    //     $select = mysqli_query($conn, "SELECT * FROM total_req WHERE id_toko='$idk[$i]'");
                    //     $item = mysqli_fetch_array($select);
                    //     $qtytotal = $item['quantity'];
                    //     $hari = $item['hari'];

                    //     $tambah = $qtytotal+$quantity[$i];
                    //     $haritambah = $hari+$i;
                    //     $i = 1;
                    //     $hitung = mysqli_num_rows($select);

                    //     if($hitung==0){
                    //         $insert = mysqli_query($conn, "INSERT INTO total_req(id_toko, quantity, hari) VALUES('$idk[$i]','$quantity[$i]','$i')");
                    //         header('location:?url=approve');
                    //     } else {
                    //         $insertdata = mysqli_query($conn, "UPDATE total_req SET quantity='$tambah', hari='$haritambah' WHERE id_toko='$idk[$i]'");
                    //         header('location:?url=approve');
                    //     }
                    // }
                } else {

                }
            } else {

            }
        } else {
            $update = mysqli_query($conn, "UPDATE request_id SET quantity_count='$quantity[$i]' WHERE id_request='$idt[$i]'");
            header('location:?url=approve');
        }
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

?>