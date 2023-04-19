<?php

$conn = mysqli_connect("localhost","root","","mirorim.v2");

//input item
if(isset($_POST['inputquantityitem'])){
    $quantity = $_POST['quantity'];
    $list = $_POST['list'];

    $jum = count($list);
    for($i = 0; $i < $jum; $i++){
        $update = mysqli_query($conn, "UPDATE item_id SET quantity_count='$quantity[$i]' WHERE id_item='$list[$i]'");
        header('location:?url=addnew');
    }{

    }
}

//input box
if(isset($_POST['inputquantitybox'])){
    $quantity = $_POST['totalbox'];
    $kubik = $_POST['totalkubik'];
    $pengiriman = $_POST['pengiriman'];
    $idb = $_POST['idb'];

    $jum = count($idb);
    $insert = mysqli_query($conn, "INSERT INTO delivery_id(box_total, kubik_total, pengiriman) VALUES('$quantity','$kubik','$pengiriman')");
    for($i = 0; $i < $jum; $i++){
            $select = mysqli_query($conn, "SELECT id_delivery FROM delivery_id WHERE date = (SELECT MAX(date) FROM delivery_id)");
            $data = mysqli_fetch_array($select);
            $idd = $data['id_delivery'];
            if($select){
                $update = mysqli_query($conn, "UPDATE boxorder_id SET id_delivery='$idd' WHERE id_box='$idb[$i]'");
                header('location:?url=boxlist');
            } else {

            }
    }{

    }

    
}

//Edit No Sku
if(isset($_POST['editnonsku'])){
    $idp = $_POST['idp'];
    $skug = $_POST['skug'];
    $quantity = $_POST['quantity'];
    $gudang = $_POST['gudang'];

    $selectskug = mysqli_query($conn, "SELECT * FROM gudang_id WHERE sku_gudang='$skug'");
    $sku = mysqli_num_rows($selectskug);

    if($sku=='0'){
        $insert = mysqli_query($conn, "INSERT INTO gudang_id(id_product, sku_gudang, lokasi_gudang, quantity) VALUES('$idp','$skug','$gudang','$quantity')");
        if($insert){
            $select = mysqli_query($conn, "SELECT * FROM item_id WHERE id_product='$idp'");
            $data = mysqli_fetch_array($select);
            $quantityitem = $data['quantity_count'];

            $kurang = $quantityitem-$quantity;
            if($select){
                $update = mysqli_query($conn, "UPDATE item_id SET quantity_count='$kurang' WHERE id_product='$idp'");
                header('location:?url=gudang');
            } else {

            }
        } else {

        }
    } else {
        $ambilqty = mysqli_query($conn, "SELECT * FROM gudang_id WHERE sku_gudang='$skug'");
        $data = mysqli_fetch_array($ambilqty);
        $qty = $data['quantity'];

        $tambah  = $qty+$quantity;
        if($ambilqty){
            $update = mysqli_query($conn, "UPDATE gudang_id SET quantity='$tambah' WHERE sku_gudang='$skug'");
            if($update){
                $select = mysqli_query($conn, "SELECT * FROM item_id WHERE id_product='$idp'");
                $data = mysqli_fetch_array($select);
                $quantityitem = $data['quantity_count'];
    
                $kurang = $quantityitem-$quantity;
                if($select){
                    $update = mysqli_query($conn, "UPDATE item_id SET quantity_count='$kurang' WHERE id_product='$idp'");
                    header('location:?url=gudang');
                } else {
    
                }
            } else {
    
            }
        } else {

        }
    }
}

//Edit Sku
if(isset($_POST['editsku'])){
    $idp = $_POST['idp'];
    $gudang = $_POST['gudang'];

        $updateskug = mysqli_query($conn, "UPDATE gudang_id SET gudang='$gudang' WHERE id_product='$idp'");
        if($updateskug){
            header('location:?url=gudang');
        } else {

        }
}

//Ceklist Toko
if(isset($_POST['cektoko'])){
    $idt = $_POST['cek'];
    $quantity = $_POST['quantity'];
    $stat = $_POST['stat'];
    $idg = $_POST['idg'];
    $picker = $_POST['picker'];
    

    $jum = count($idt);
    for($i = 0; $i < $jum; $i++){
            $select = mysqli_query($conn, "SELECT * FROM request_id WHERE id_request='$idt[$i]'");
            $data = mysqli_fetch_array($select);
            $qty = $data['quantity_req'];
            if($qty==0){
                $update = mysqli_query($conn, "UPDATE request_id SET quantity_req='$quantity[$i]', status_req='$stat', id_gudang='$idg[$i]', picker='$picker' WHERE id_request='$idt[$i]'");
                header('location:?url=exititem');
            } else {
                $update = mysqli_query($conn, "UPDATE request_id SET status_req='$stat', id_gudang='$idg[$i]', picker='$picker' WHERE id_request='$idt[$i]'");
                header('location:?url=exititem');
            }
        
    } {

    }
}

//Request Prepare
if(isset($_POST['preparereq'])){
    $idp = $_POST['idp'];
    $idg = $_POST['idg'];
    $idk = $_POST['idk'];
    $stat = $_POST['stat'];
    $quantity = $_POST['quantity'];
    $quantity2 = $_POST['quantity2'];
    $requester = $_POST['requester'];
    $typereq = $_POST['typereq'];
    $jum = $_POST['jum'];

    for($i = 0; $i < $jum; $i++){
        $select1 = mysqli_query($conn, "SELECT * FROM list_komponen WHERE id_product_finish='$idp[$i]'");
        $data1 = mysqli_fetch_array($select1);
        $idkomp = $data1['id_komponen'];


        if($select1){
            $insert = mysqli_query($conn, "INSERT INTO request_prepare(id_product_finish, quantity_req, status_prepare, gudang_out, type_req, requester) VALUES('$idp[$i]','$quantity[$i]','$stat','$idg[$i]','$typereq[$i]','$requester')");
            if($insert){
                $select2 = mysqli_query($conn, "SELECT * FROM gudang_id WHERE id_gudang='$idk[$i]'");
                $data2 = mysqli_fetch_array($select2);
                $quantityril = $data2['quantity'];

                $kurang = $quantityril-$quantity2[$i];
                if($select2){
                    $update = mysqli_query($conn, "UPDATE gudang_id SET quantity='$kurang' WHERE id_gudang='$idk[$i]'");
                    header('location:?url=exitprepare');
                } else {
                    echo "Lohh";
                }   
            } else {

            }
        } else {
            echo "Gagal";
        }
    }{

    }
}

//Acc Broo
if(isset($_POST['komponenacc'])){
    $idp = $_POST['idp'];
    $cek = $_POST['cek'];
    $stat = $_POST['stat'];
    $idg = $_POST['idg'];
    $quantity = $_POST['quantity'];
    //receive = $_POST['receiver'];
    $date = date('Y-m-d H:i:s');

    $jum = count($cek);
    for ($i = 0; $i < $jum; $i++){
        $select = mysqli_query($conn, "SELECT quantity FROM gudang_id WHERE id_gudang='$idg[$i]'");
        $data = mysqli_fetch_array($select);
        $quantity1 = $data['quantity'];

        $tambah = $quantity1+$quantity[$i];
        if($select){
            $update = mysqli_query($conn, "UPDATE request_prepare SET gudang_in='$idg[$i]', status_prepare='$stat' WHERE id_prepare='$cek[$i]'");
            if($update){
                $update1 = mysqli_query($conn, "UPDATE gudang_id SET quantity='$tambah' WHERE id_gudang='$idg[$i]'");
                header('location:?url=exitprepare'); 
            } else {

            }
        } else {

        }
       
    }{

    }
}

//mutasi
if(isset($_POST['mutasi'])){
    $skug = $_POST['skug'];
    $idg = $_POST['idg'];
    $quantity = $_POST['quantity'];
    $quantity1 = $_POST['quantity1'];
    $skug1 = $_POST['skug1'];

    $jum = count($skug);
    for($i = 0; $i < $jum; $i++){
        $select = mysqli_query($conn, "SELECT quantity, sku_gudang, id_product, lokasi_gudang FROM gudang_id WHERE id_gudang='$idg[$i]'");
        $data = mysqli_fetch_array($select);
        $idp = $data['id_product'];
        $lok = $data['lokasi_gudang'];

        if($quantity==$quantity1){
                if($skug==$skug1){
                    
                } else {
                    $insert = mysqli_query($conn, "INSERT INTO mutasi_id(id_gudang, skug_lama, skug_baru, quantity_out) VALUES('$idg[$i]','$skug1[$i]','$skug[$i]','$quantity[$i]')");
                    header('location:?url=mutasi');
                }
        } else {
            $selectnum = mysqli_query($conn, "SELECT sku_gudang FROM gudang_id WHERE sku_gudang='$skug[$i]'");
            $hitung = mysqli_num_rows($selectnum);
            if($hitung>0){
                $insert2 = mysqli_query($conn, "INSERT INTO mutasi_id(id_gudang, skug_lama, skug_baru, quantity_out) VALUES('$idg[$i]','$skug1[$i]','$skug[$i]','$quantity[$i]')");
                    header('location:?url=mutasi');
            } else {
                if($skug==$skug1){
                    echo '
                    <script>
                        alert("Data Tidak Bisa Di Proses");
                        window.location.href="?url=mutasi";
                    </script>';
                } else {
                    $insert3 = mysqli_query($conn, "INSERT INTO mutasi_id(id_gudang, skug_lama, skug_baru, quantity_out) VALUES('$idg[$i]','$skug1[$i]','$skug[$i]','$quantity[$i]')");
                    header('location:?url=index');
                }
            }
        }
    }{

    }
}

//mutasi acc
if(isset($_POST['mutasiacc'])){
    $cek = $_POST['cek'];
    $stat = $_POST['stat'];
    $idg = $_POST['idg'];
    $idm = $_POST['idm'];

    $jum = count($cek);
    for ($i = 0; $i < $jum; $i++){
        $select = mysqli_query($conn, "SELECT * FROM mutasi_id WHERE id_mutasi='$idm[$i]'");
        $data = mysqli_fetch_array($select);
        $skug = $data['skug_baru'];

        if($select){
            $update = mysqli_query($conn, "UPDATE gudang_id SET sku_gudang='$skug' WHERE id_gudang='$idg[$i]'");
            if($update){
                $update1 = mysqli_query($conn, "UPDATE mutasi_id SET status_mutasi='$stat' WHERE id_mutasi='$idm[$i]'");
                header('location:?url=approvemutasi'); 
            } else {

            }
        } else {

        }
       
    }{

    }
}
?>