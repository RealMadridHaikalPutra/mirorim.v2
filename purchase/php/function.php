<?php

$conn = mysqli_connect("localhost","root","","mirorim.v2");

//Add Box
if(isset($_POST['addbox'])){
    $invoice = $_POST['invoice'];
    $resi = $_POST['resi'];
    $quantity = $_POST['quantity'];
    $box = $_POST['box'];
    $kubikasi = $_POST['kubikasi'];

    $insert = mysqli_query($conn, "INSERT INTO boxorder_id(invoice, box, resi, qty_order, kubik_order) VALUES('$invoice','$box','$resi','$quantity','$kubikasi')");
    if($insert){
        header('location:?url=packinglist');
    } else {
        echo "Gagal Bro";
    }
}

//Add Box lokal
if(isset($_POST['addboxlokal'])){
    $invoice = $_POST['invoice'];
    $quantity = $_POST['quantity'];
    $box = $_POST['box'];
    $lokal  = $_POST['lokal'];

    $insert = mysqli_query($conn, "INSERT INTO boxorder_id(invoice, box, qty_order, datang) VALUES('$invoice','$box','$quantity','$lokal')");
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
    $jum = $_POST['jum'];

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
                move_uploaded_file($file_tmp, '../../assets/img/'.$image);
                 
                $addnew = mysqli_query($conn, "INSERT INTO product_id(image, nama) VALUES('$image','$nama - $variant[$i]')");
                if($addnew){
                    header('location:?url=packinglist');
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
            $insert = mysqli_query($conn, "INSERT INTO order_id(id_box, id_product, quantity_order) VALUES('$idb','$idp','$quantity[$i]')");
            header('location:?url=packinglist');
        } else {

        }
    } {

    }
}


?>