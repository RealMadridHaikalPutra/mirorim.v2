<?php

$conn = mysqli_connect("localhost","root","","mirorim.v2");

// Add Item Multi
if(isset($_POST['addkomponen'])){
    $nama = $_POST['nama'];
    $jumlah = $_POST['jum'];
    $jenis = $_POST['jenis'];
    $reject = "reject";

    
    $jum = count($jumlah);
    for($i = 0; $i < $jum; $i++){

    //gambar
    $allowed_extension = array('png','jpg','jpeg','svg','webp');
    $namaimage = $_FILES['file']['name']; //ambil gambar
    $dot = explode('.',$namaimage[$i]);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['file']['size']; //ambil size
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi

    //nama acak
    $image = md5(uniqid($namaimage[$i],true) . time()).'.'.$ekstensi; //compile

        //proses upload
        if(in_array($ekstensi, $allowed_extension) === true){
            //validasi ukuran
            if($ukuran[$i] < 5000000){
                move_uploaded_file($file_tmp[$i], '../assets/img/'.$image);

                $addnew = mysqli_query($conn, "INSERT INTO product_id(image, nama, jenis) VALUES('$image','$nama[$i]','$jenis')");
                if($addnew){
                    $select = mysqli_query($conn, "SELECT * FROM product_id WHERE nama='$nama[$i]'");
                    $data = mysqli_fetch_array($select);
                    $idp = $data['id_product'];

                    if($select){
                        $insert = mysqli_query($conn, "INSERT INTO toko_id(id_product) VALUES('$idp')");
                        header('location:?url=komponen');
                    } else {

                    }
                    
                    
                } else {
                    echo '
                    <script>
                        alert("Gagal Memuat Item Box");
                        window.location.href="?url=additem";
                    </script>';
                }
            } else {
                //kalau file lebih dari 5mb
                echo '
                    <script>
                        alert("Kelebihan muatan woiii ga muat database");
                        window.location.href="?url=additem";
                    </script>'; 
            }
        } else { 

            }
    }
}


//Acc Request Receiver
if(isset($_POST['accrequest'])){
    $idp = $_POST['idp'];
    $cek = $_POST['cek'];
    $stat = $_POST['stat'];
    //receive = $_POST['receiver'];
    $date = date('Y-m-d H:i:s');

    $jum = count($cek);
    for ($i = 0; $i < $jum; $i++){
        $update = mysqli_query($conn, "UPDATE request_prepare SET status_prepare='$stat', date_receiver='$date' WHERE id_prepare='$cek[$i]'");
        header('location:?url=reqpre');
    }{

    }
}

//Acc Request Process
if(isset($_POST['accrequestprocess'])){
    $idp = $_POST['idp'];
    $cek = $_POST['cek'];
    $stat = $_POST['stat'];
    //receive = $_POST['receiver'];
    $date = date('Y-m-d H:i:s');

    $jum = count($cek);
    for ($i = 0; $i < $jum; $i++){
        $update = mysqli_query($conn, "UPDATE request_prepare SET status_prepare='$stat', date_start='$date' WHERE id_prepare='$cek[$i]'");
        header('location:?url=workerprepare');
    }{

    }
}
//Acc Request Done
if(isset($_POST['accrequestdone'])){
    $idp = $_POST['idp'];
    $cek = $_POST['cek'];
    $stat = $_POST['stat'];
    $reject = $_POST['reject'];
    //receive = $_POST['receiver'];
    $date = date('Y-m-d H:i:s');

    $jum = count($cek);
    for ($i = 0; $i < $jum; $i++){
        $select = mysqli_query($conn, "SELECT quantity_req FROM request_prepare WHERE id_prepare='$cek[$i]'");
        $data = mysqli_fetch_array($select);
        $quantity = $data['quantity_req'];

        $kurang = $quantity-$reject[$i];
        if($select){
            $update = mysqli_query($conn, "UPDATE request_prepare SET quantity_matang='$kurang', quantity_reject='$reject[$i]', status_prepare='$stat', date_finish='$date' WHERE id_prepare='$cek[$i]'");
            header('location:?url=workerprepare');
        } else {

        }
       
    }{

    }
}

?>