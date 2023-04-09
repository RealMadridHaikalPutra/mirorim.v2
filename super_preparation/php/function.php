<?php

$conn = mysqli_connect("localhost","root","","mirorim.v2");

//submit
if(isset($_POST['additem'])){
    $nama = $_POST['nama'];
    $temp = $_POST['temp'];
    $sku = $_POST['sku'];

     //gambar
     $allowed_extension = array('png','jpg','jpeg','svg','webp');
     $namaimage = $_FILES['file']['name']; //ambil gambar
     $dot = explode('.',$namaimage);
     $ekstensi = strtolower(end($dot)); //ambil ekstensi
     $ukuran = $_FILES['file']['size']; //ambil size
     $file_tmp = $_FILES['file']['tmp_name']; //lokasi
 
     //nama acak
     $image = md5(uniqid($namaimage,true) . time()).'.'.$ekstensi; //compile
 
         //proses upload
         if(in_array($ekstensi, $allowed_extension) === true){
             //validasi ukuran
             if($ukuran < 5000000){
                 move_uploaded_file($file_tmp, '../../assets/img/'.$image);
                  
                 $addnew = mysqli_query($conn, "INSERT INTO product_id(image, nama, temp) VALUES('$image','$nama','$temp')");
                 if($addnew){
                    $select = mysqli_query($conn, "SELECT * FROM product_id WHERE nama='$nama'");
                    $data = mysqli_fetch_array($select);
                    $idp = $data['id_product'];
                    if($select){
                        $inserttoko = mysqli_query($conn, "INSERT INTO toko_id(id_product, sku) VALUES('$idp','$sku')");
                        header('location:?url=komponen');
                    } else {

                    }
                 }
             } else {

             }
        } else {

        }
}

?>