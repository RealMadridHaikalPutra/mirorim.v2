<?php

$conn = mysqli_connect("localhost","root","","mirorim.v2");

//Add Box
if(isset($_POST['addbox'])){
    $invoice = $_POST['invoice'];
    $resi = $_POST['resi'];
    $quantity = $_POST['quantity'];
    $box = $_POST['box'];
    $kubikasi = $_POST['kubikasi'];

    $insert = mysqli_query($conn, "INSERT INTO boxorder_id(invoice, box, resi, box_order, kubik_order) VALUES('$invoice','$box','$resi','$quantity','$kubikasi')");
    if($insert){
        header('location:?url=packinglist');
    } else {
        echo "Gagal Bro";
    }
}

// Add Item Multi
if(isset($_POST['newmultiitem'])){
    $nama = $_POST['nama'];
    $variant = $_POST['variant'];
    $jumlah = $_POST['jum'];
    $jenis = $_POST['jenis'];

    $jum = count($jumlah);

    //gambar
    $allowed_extension = array('png','jpg','jpeg','svg','webp');
    $namaimage = $_FILES['file']['name']; //ambil gambar
    $dot = explode('.',$namaimage);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['file']['size']; //ambil size
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi

    //nama acak
    $image = md5(uniqid($namaimage,true) . time()).'.'.$ekstensi; //compile
    
    for($i = 0; $i < $jum; $i++){

        //proses upload
        if(in_array($ekstensi, $allowed_extension) === true){
            //validasi ukuran
            if($ukuran < 5000000){
                move_uploaded_file($file_tmp, '../assets/img/'.$image);

                $addnew = mysqli_query($conn, "INSERT INTO product_id(image, nama, jenis) VALUES('$image','$nama - $variant[$i]','$jenis')");
                if($addnew){
                    $select = mysqli_query($conn, "SELECT * FROM product_id WHERE nama='$nama - $variant[$i]'");
                    $data = mysqli_fetch_array($select);
                    $idp = $data['id_product'];

                    if($select){
                        $insert = mysqli_query($conn, "INSERT INTO toko_id(id_product) VALUES('$idp')");
                        header('location:?url=packinglist');
                    } else {

                    }
                    
                    
                } else {
                    echo '
                    <script>
                        alert("Gagal Memuat Item Box");
                        window.location.href="?url=newitem";
                    </script>';
                }
            } else {
                //kalau file lebih dari 5mb
                echo '
                    <script>
                        alert("Kelebihan muatan woiii ga muat database");
                        window.location.href="?url=newitem";
                    </script>'; 
            }
        } else { 

            }
    }
}

//Input Order
if(isset($_POST['inputorder'])){
    $nama = $_POST['nama'];
    $quantity = $_POST['quantity'];
    $idb = $_POST['idb'];

    $jum = count($nama);
    for($i = 0; $i < $jum; $i++){
        $select = mysqli_query($conn, "SELECT * FROM product_id WHERE nama='$nama[$i]'");
        $data = mysqli_fetch_array($select);
        $idp = $data['id_product'];
        if($select){
            $insert = mysqli_query($conn, "INSERT INTO item_id(id_box, id_product, quantity_order) VALUES('$idb','$idp','$quantity[$i]')");
            header('location:?url=packinglist');
        } else {

        }
    } {

    }
}

//Aprove Box
if(isset($_POST['approvebox'])){
    $idb = $_POST['idb'];
    $idd = $_POST['idd'];
    $temp = $_POST['temp'];
    $status = $_POST['status'];

    $jum = count($idb);
    for ($i = 0; $i < $jum; $i++){
        $update = mysqli_query($conn, "UPDATE boxorder_id SET status_box='$status' WHERE id_box='$idb[$i]'");
        if($update){
            $updatedel = mysqli_query($conn, "UPDATE delivery_id SET status_delivery='$status' WHERE id_delivery='$idd'");
            header('location:?url=approvebox');
        } else {

        }
        
    } {

    }
}

//Approve Item
if(isset($_POST['approveitem'])){
    $status = $_POST['status'];
    $ido = $_POST['ido'];
    $idp = $_POST['idp'];

    $jum = count($ido);
    for ($i = 0;  $i <  $jum; $i++){
        $update = mysqli_query($conn, "UPDATE item_id SET status_item='$status' WHERE status_item='Not Approved'");
        if($update){
            header('location:?url=approve');
        } else {

        }
    }{

    }
}


?>