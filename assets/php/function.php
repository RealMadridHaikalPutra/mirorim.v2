<?php

$konek = mysqli_connect("localhost","root","","mirorim");


//Add New Box
if(isset($_POST['submitqtybox'])){
    $resi = $_POST['resi'];
    $invoice = $_POST['invoice'];
    $box = $_POST['box'];
    $qtybox = $_POST['qtybox'];
    $kubikasi = $_POST['kubikasi'];

    $insert = mysqli_query($konek, "INSERT INTO box(invoice, resi ,box ,qtybox ,kubikasi) VALUES ('$invoice','$resi','$box','$qtybox','$kubikasi')");
    if($insert){
        header('location:index.php');
    } else {
        header('location:index.php');
    }
}

if(isset($_POST['editapprove'])){
    $idb = $_POST['idbarang'];
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];
    $invoice = $_POST['invoice'];
    $box = $_POST['box'];

    //gambar
    $allowed_extension = array('png','jpg','jpeg','svg','webp');
    $img = $_FILES['file']['name']; //ambil gambar
    $dot = explode('.',$img);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['file']['size']; //ambil size
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi

    //nama acak
    $gambar = md5(uniqid($img,true) . time()).'.'.$ekstensi; //compile

    if($ukuran==0){
        $update = mysqli_query($konek, "UPDATE itembox SET nama ='$nama',  quantity = '$quantity', sku='$sku', invoice='$invoice', box='$box' WHERE idbarang='$idb'");
        if($update){
            header('location:approved.php');
        } else {
            echo '
            <script>
                alert("Barang Tidak bisa di update");
                window.location.href="approved.php";
            </script>'; 
            }
        } else {
        move_uploaded_file($file_tmp, '../images/'.$gambar);
        $update = mysqli_query($konek, "UPDATE itembox SET nama = '$nama',  quantity = '$quantity', sku='$sku', invoice='$invoice', box='$box', image='$gambar' WHERE idbarang='$idb'");
        if($update){
            header('location:approved.php');
        } else {
            echo '
            <script>
                alert("Barang dan Gambar Tidak bisa di update");
                window.location.href="Approved.php";
            </script>'; 
            }
        }
}
//coba
// if(isset($_POST['ceklistbutton'])){
//     $tempstat = $_POST['tempstat'];
//     $idb = $_POST['idbarang'];
//     $cek = $_POST['qtyboxcount'];

//     $insert = mysqli_query($konek, "UPDATE box SET boxcount='$cek' WHERE iddus='$idb'");
//     if($insert){
//         $update = mysqli_query($konek, "UPDATE box SET tempstat='$tempstat' WHERE iddus='$idb'");
//         header('location:boxlist.php');
//     } else {

//     }
// }                                                

// if(isset($_POST['ceklistbutton'])){
//     $nobox = $_POST['nobox'];
//     $cek = $_POST['ceklist'];

//     $ambil = mysqli_query($konek, "UPDATE box SET status='$cek' WHERE nobox='$nobox'");
//     if($ambil){

//     } else {
//         echo 'Gagal';
//     }
// }
//add new item to box
if(isset($_POST['additembox'])){
    $invoice = $_POST['invoice'];
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];
    $box = $_POST['box'];

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
                move_uploaded_file($file_tmp, '../images/'.$image);
                 
                $addnew = mysqli_query($konek, "INSERT INTO itembox(invoice, image, nama, sku, quantity, box) VALUES('$invoice','$image','$nama','$sku','$quantity','$box')");
                if($addnew){
                    header('location:index.php');
                } else {
                    echo '
                    <script>
                        alert("Gagal Memuat Item Box");
                        window.location.href="index.php";
                    </script>';
                }
            } else {
                //kalau file lebih dari 5mb
                echo '
                    <script>
                        alert("Kelebihan muatan woiii ga muat database");
                        window.location.href="index.php";
                    </script>'; 
            }
        } else {
            //kalau gambar selain filter
            $addnew = mysqli_query($konek, "INSERT INTO itembox(invoice, nama, sku, quantity, box) VALUES('$invoice','$nama','$sku','$quantity','$box')");
            if($addnew){
                if($addnew){
                    header('location:index.php');
                } else {
                    echo '
                    <script>
                        alert("Gagal Memuat Item Box");
                        window.location.href="index.php";
                    </script>';
                }
        }
    }
}

//Approve Button
if(isset($_POST['aprbutton'])){
    $status = $_POST['approve'];
    $idbox = $_POST['idb'];
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $qtygudang = $_POST['qtygudang'];

    $updateapprove = mysqli_query($konek, "UPDATE itembox SET status='$status' WHERE idbarang='$idbox'");
    if($updateapprove){
        $ceksku  = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$sku'");
        $ambilsku = mysqli_num_rows($ceksku);
        if($ambilsku==1){
            $tambahquantity = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$sku'");
            $ambilqty = mysqli_fetch_array($tambahquantity);
            $ambil = ($ambilqty)['quantity'];
            
            $tambah = $ambil+$qtygudang;
            $update = mysqli_query($konek, "UPDATE stok SET quantity='$tambah' WHERE sku='$sku'");
            if($update){
                echo '
                <script>
                    alert("Berhasil Update Quantity Dengan SKU yang ada");
                    window.location.href="approved.php";
                </script>';
            } else {
                echo '
                <script>
                    alert("Gagal Update Quantity");
                    window.location.href="approved.php";
                </script>';
            }
        } else {
            $ambildata = mysqli_query($konek, "SELECT * FROM itembox WHERE idbarang='$idbox'");
            $ambil = mysqli_fetch_array($ambildata);
            $ambilimg = ($ambil)['image'];

            $insert = mysqli_query($konek, "INSERT INTO stok(image, nama, sku, quantity) VALUES('$ambilimg','$nama','$sku','$qtygudang')");

        }

    } else {
        echo '
            <script>
                alert("Gagal Approved Item");
                window.location.href="approved.php";
            </script>';
    }
}

//approve yes or no box
if(isset($_POST['inputbox'])){
    $box = $_POST['box'];
    $yes = $_POST['yes'];

    $updatestatus = mysqli_query($konek, "UPDATE box SET status='$yes' WHERE nodus='$box'");
    if($updatestatus){
        
    } else {
        echo '
            <script>
                alert("Gagal Approved Item");
                window.location.href="approved.php";
            </script>';
    }
}

//input qty gudang
if(isset($_POST['inputqty'])){
    $idbox = $_POST['idbarang'];
    $quantitygudang = $_POST['quantitygudang'];

    $ambil = mysqli_query($konek, "SELECT * FROM itembox WHERE idbarang='$idbox'");
    $ambildata = mysqli_fetch_array($ambil);
    $ambilnama= ($ambildata)['nama'];
    $ambilsku = ($ambildata)['sku'];
    $ambilqty = ($ambildata)['quantity'];
    $ambilimg = ($ambildata)['image'];

    if($ambilqty==$quantitygudang){
        $updateqty = mysqli_query($konek, "UPDATE itembox SET qtygudang='$quantitygudang' WHERE idbarang='$idbox'");
        header("location:addnew.php");
    } else {
        $update = mysqli_query($konek, "UPDATE itembox SET qtygudang='$quantitygudang' WHERE idbarang='$idbox'");
        header("location:addnew.php");
    }
    
}

//gudang
if(isset($_POST['editnosku'])){
    $idb = $_POST['idb'];
    $nama = $_POST['nama'];
    $skugudang = $_POST['skugudang'];
    $gudang = $_POST['gudang'];
    $skutoko = $_POST['skutoko'];
    $quantity = $_POST['quantity'];

    //gambar
    $allowed_extension = array('png','jpg','jpeg','svg','webp');
    $img = $_FILES['file']['name']; //ambil gambar
    $dot = explode('.',$img);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['file']['size']; //ambil size
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi

    //nama acak
    $gambar = md5(uniqid($img,true) . time()).'.'.$ekstensi; //compile

    if($ukuran==0){
        $ambildata = mysqli_query($konek, "SELECT * FROM stok WHERE idbarang='$idb'");
        $ambil = mysqli_fetch_array($ambildata);
        $ambilimg = ($ambil)['image'];

        $updatenosku = mysqli_query($konek, "UPDATE stok SET nama='$nama', sku='$skutoko', skug='$skugudang', gudang='$gudang', quantity='$quantity', image='$ambilimg' WHERE idbarang='$idb'");
            if($updatenosku){
                header('location:index.php');
            } else {
                echo '
                <script>
                    alert("Data tidak berhasil di update");
                    window.location.href="addnew.php";
                </script>';
            }
        } else {
        move_uploaded_file($file_tmp, '../images/'.$gambar);
        $update = mysqli_query($konek, "UPDATE stok SET nama='$nama', sku='$skutoko', skug='$skugudang', gudang='$gudang', quantity='$quantity', image='$gambar' WHERE idbarang='$idb'");
        if($update){
            header('location:index.php');
        } else {
            echo '
            <script>
                alert("Barang dan Gambar Tidak bisa di update");
                window.location.href="Approved.php";
            </script>'; 
            }
        }
}


//gudang2
if(isset($_POST['editnosku2'])){
    $idb = $_POST['idb'];
    $nama = $_POST['nama'];
    $skugudang = $_POST['skugudang'];
    $gudang = $_POST['gudang'];
    $skutoko = $_POST['skutoko'];
    $quantity = $_POST['quantity'];

    $ambildata = mysqli_query($konek, "SELECT * FROM stok2 WHERE idbarang='$idb'");
    $ambil = mysqli_fetch_array($ambildata);
    $ambilimg = ($ambil)['image'];

    $updatenosku = mysqli_query($konek, "UPDATE stok2 SET nama='$nama', sku='$skutoko', skug='$skugudang', gudang='$gudang', quantity='$quantity', image='$ambilimg' WHERE idbarang='$idb'");
    if($updatenosku){
        echo '
        <script>
            alert("Data berhasil di update");
            window.location.href="index.php";
        </script>';
    } else {
        echo '
        <script>
            alert("Data tidak berhasil di update");
            window.location.href="addnew.php";
        </script>';
    }
}

//Insert to temp
// if(isset($_POST['addpuan'])){
//     $puantity = $_POST['puan'];
//     $idb = $_POST['idbarang'];
//     $status = $_POST['statusulang'];

//     $select = mysqli_query($konek, "SELECT * FROM itembox WHERE idbarang='$idb'");
//     $selectfilter = mysqli_fetch_array($select);
//     $selectname = ($selectfilter)['nama'];
//     $selectimg = ($selectfilter)['image'];
//     $selectsku = ($selectfilter)['sku'];
//     $selectinv = ($selectfilter)['invoice'];

//     $selectulang = mysqli_query($konek, "SELECT * FROM temp_item WHERE nama='$selectname'");
//     $cekdata = mysqli_num_rows($selectulang);
//     if($cekdata>0){
//         $ambilstatus = mysqli_query($konek, "SELECT * FROM temp_item WHERE status='ulang'");
//         if($ambilstatus){
//             $update = mysqli_query($konek, "UPDATE temp_item SET quantity='$puantity', status='$status' WHERE nama='$selectname'");
//         } else {
//             echo '
//             <script>
//                 alert("Data ini berhasil");
//                 window.location.href="addnew.php";
//             </script>';
//         }
    
//     } else {
//         $insert = mysqli_query($konek, "INSERT INTO temp_item(nama, image, sku, invoice, quantity, status) VALUES('$selectname','$selectimg','$selectsku','$selectinv','$puantity','$status')");
//     }
// }


//submit insert
if(isset($_POST['submitinsert'])){
    $status = $_POST['status'];
    $nama = $_POST['namaitem'];
    $sku = $_POST['skuitem'];
    $quantity = $_POST['quantityitem'];
    $img = $_POST['file'];

    $jumlah = $_POST['count'];

    for($i=0; $i < $jumlah; $i++){
        $select = mysqli_query($konek, "SELECT * FROM itembox WHERE nama='$nama[$i]'");
        $ambilqty = mysqli_fetch_array($select);
        $ambil = ($ambilqty)['qtygudang'];
        $ambilimg = ($ambilqty)['image'];

        if($ambil=='0'){
            echo'Gagal';
        } else {
            $selectsku = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$sku[$i]'");
            $dataqty = mysqli_fetch_array($selectsku);
            $qtyqty = $dataqty['quantity'];

            $data = mysqli_num_rows($selectsku);

            $tambah = $qtyqty+$quantity[$i];
            if($data==0){
                $insert = mysqli_query($konek, "INSERT INTO stok(image, nama, sku, quantity) VALUES('$img[$i]','$nama[$i]','$sku[$i]','$quantity[$i]')") or die (mysqli_erorr());
                if($insert){
                    $update = mysqli_query($konek, "UPDATE itembox SET status='$status[$i]' WHERE nama='$nama[$i]'");
                    header('location:approved.php');
                } else {
                    header('location:approved.php');
                }
            } else{
                $ambilnamasku = mysqli_query($konek, "SELECT * FROM stok WHERE nama='$nama[$i]'");
                $hitung = mysqli_num_rows($ambilnamasku);
                if($hitung==0){
                    $tambahnama = mysqli_query($konek, "INSERT INTO stok(image, nama, sku, quantity) VALUES('$img[$i]','$nama[$i]','$sku[$i]','$quantity[$i]')") or die (mysqli_erorr());
                    header('location:approved.php');
                } else {
                    $updateqty = mysqli_query($konek, "UPDATE stok SET quantity='$tambah' WHERE sku='$sku[$i]'");
                    if($updateqty){
                        $updatex = mysqli_query($konek, "UPDATE itembox SET status='$status[$i]' WHERE nama='$nama[$i]'");
                        header('location:approved.php');
                    } else {
                        header('location:approved.php');
                    }
                }
                
            }
            
        }
    }
}

//insert quantity
if(isset($_POST['submitquantity'])){
    $idb = $_POST['idbarang'];
    $jumlah = $_POST['count'];
    $quantity = $_POST['countinggudang'];
    $notegudang = $_POST['notegudang'];

    for($i=0; $i < $jumlah; $i++){
        $update = mysqli_query($konek, "UPDATE itembox SET qtygudang='$quantity[$i]', note='$notegudang[$i]' WHERE idbarang='$idb[$i]' ");
        header('location:addnew.php');
    } {

    }

}

//insert refill
if(isset($_POST['checkrefill'])){
    $cek = $_POST['skureff'];
    $temp = $_POST['status'];
    $qtyrefill = $_POST['qtyrefill'];
    $approve = $_POST['approve'];
    $checker = $_POST['checker'];


    $jumdi = count($cek);
    for($i=0; $i<$jumdi; $i++){
        $selectexit = mysqli_query($konek, "SELECT * FROM exititem WHERE sku='$cek[$i]' AND tempstat='0'");
        $data = mysqli_fetch_array($selectexit);
        $gudang = $data['tempwh'];

        if($gudang == '0'){

            $select5 = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$cek[$i]'");
            $data5 = mysqli_fetch_array($select5);
            $qtystok5 = $data5['quantity'];

            if($select5){
                $ambil5 = mysqli_query($konek, "SELECT * FROM exititem WHERE sku='$cek[$i]' AND tempstat='0' AND tempwh='0'");
                $data5 = mysqli_fetch_array($ambil5);
                $qtyrep5 = $data5['quantityrep'];

                    if($qtyrep5==$qtyrefill[$i]){
                        $kurang5 = $qtystok5-$qtyrefill[$i];
                        $updatestok5 = mysqli_query($konek, "UPDATE stok SET quantity='$kurang5' WHERE sku='$cek[$i]'");
                        header('location:index.php');
                            if($updatestok5){
                                $update5 = mysqli_query($konek, "UPDATE exititem SET tempstat='$temp[$i]', stat='$approve[$i]', ceker='$checker[$i]' WHERE sku='$cek[$i]' AND tempstat='0' AND tempwh='0'");

                            }else {

                            }
                    } else {
                        $insert5 = mysqli_query($konek, "UPDATE exititem SET quantitycek='$qtyrefill[$i]' WHERE sku='$cek[$i]' AND tempstat='0' AND tempwh='0'");
                        header("location:belumapprove.php");
                    }

            } else {
            }
            
        } else {
            $select5 = mysqli_query($konek, "SELECT * FROM stok5 WHERE sku='$cek[$i]'");
            $data5 = mysqli_fetch_array($select5);
            $qtystok5 = $data5['quantity'];

            if($select5){
                $ambil5 = mysqli_query($konek, "SELECT * FROM exititem WHERE sku='$cek[$i]' AND tempstat='0' AND tempwh='5'");
                $data5 = mysqli_fetch_array($ambil5);
                $qtyrep5 = $data5['quantityrep'];

                    if($qtyrep5==$qtyrefill[$i]){
                        $kurang5 = $qtystok5-$qtyrefill[$i];
                        $updatestok5 = mysqli_query($konek, "UPDATE stok5 SET quantity='$kurang5' WHERE sku='$cek[$i]'");
                        header('location:index.php');
                            if($updatestok5){
                                $update5 = mysqli_query($konek, "UPDATE exititem SET tempstat='$temp[$i]', stat='$approve[$i]', ceker='$checker[$i]' WHERE sku='$cek[$i]' AND tempstat='0' AND tempwh='5'");

                            }else {

                            }
                    } else {
                        $insert5 = mysqli_query($konek, "UPDATE exititem SET quantitycek='$qtyrefill[$i]' WHERE sku='$cek[$i]' AND tempstat='0' AND tempwh='5'");
                        header("location:belumapprove.php");
                    }

            } else {
            }
        }
       
    }{

    }

}

//image toko
if(isset($_POST['editimg'])){

    $idb = $_POST['idb'];

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
                move_uploaded_file($file_tmp, '../images/'.$image);
                 
                $update = mysqli_query($konek, "UPDATE exititem SET image='$image' WHERE idbarang='$idb'");
                if($update){
                    header('location:belumapprove.php');
                } else {
                    echo '
                    <script>
                        alert("Gagal Memuat Item Box");
                        window.location.href="index.php";
                    </script>';
                }
            } else {
                //kalau file lebih dari 5mb
                echo '
                    <script>
                        alert("Kelebihan muatan woiii ga muat database");
                        window.location.href="index.php";
                    </script>'; 
            }
        } else {
            
    }

}

//insert gudang to refill or something
if(isset($_POST['submitgudang'])){
    $jum = $_POST['jum'];
    $sku = $_POST['sku'];
    $picker = $_POST['picker'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    for ($i = 0; $i < $jum; $i++){
        $select = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$sku[$i]'");
        $ambil = mysqli_fetch_array($select);
        $nama = $ambil['nama'];

        if($select){
            $insert = mysqli_query($konek, "INSERT INTO exititem(nama, sku, picker, quantityrep, status) VALUES('$nama','$sku[$i]','$picker[$i]','$quantity[$i]','$status[$i]')");
            header('location:exititem.php');
        }
    }
}

//insert gudang5 to refill 
if(isset($_POST['refiil5'])){
    $jum = $_POST['jum'];
    $sku = $_POST['sku'];
    $picker = $_POST['picker'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    for ($i = 0; $i < $jum; $i++){
        $select = mysqli_query($konek, "SELECT * FROM stok5 WHERE sku='$sku[$i]'");
        $ambil = mysqli_fetch_array($select);
        $nama = $ambil['nama'];

        if($select){
            $insert = mysqli_query($konek, "INSERT INTO exititem(nama, sku, picker, quantityrep, status) VALUES('$nama','$sku[$i]','$picker[$i]','$quantity[$i]','$status[$i]')");
            header('location:exititem5.php');
        }
    }
}

//insert via multiple
if(isset($_POST['inputvariant'])){
    $jum = $_POST['jum'];
    $invoice = $_POST['invoice'];
    $box = $_POST['box'];
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $variant = $_POST['variant'];
    $quantity = $_POST['quantity'];

    //gambar
    $allowed_extension = array('png','jpg','jpeg','svg','webp');
    $namaimage = $_FILES['file']['name']; //ambil gambar
    $dot = explode('.',$namaimage);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['file']['size']; //ambil size
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi

    //nama acak
    $image = md5(uniqid($namaimage,true) . time()).'.'.$ekstensi; //compile

    for ($i = 0; $i < $jum; $i++){
            //proses upload
            if(in_array($ekstensi, $allowed_extension) === true){
                //validasi ukuran
                if($ukuran < 5000000){
                    move_uploaded_file($file_tmp, '../images/'.$image);
                    
                    $addnew = mysqli_query($konek, "INSERT INTO itembox(invoice, box, image, nama, sku, quantity) VALUES('$invoice','$box','$image','$nama - $variant[$i]','$sku[$i]','$quantity[$i]')");
                    if($addnew){
                        header('location:index.php');
                    } else {
                        echo '
                        <script>
                            alert("Gagal Memuat Item Box");
                            window.location.href="index.php";
                        </script>';
                    }
                } else {
                    //kalau file lebih dari 5mb
                    echo '
                        <script>
                            alert("Kelebihan muatan woiii ga muat database");
                            window.location.href="index.php";
                        </script>'; 
                }
            } else {
                //kalau gambar selain filter
                $addnew = mysqli_query($konek, "INSERT INTO itembox(invoice, box, nama, sku, quantity) VALUES('$invoice','$box','$nama - $variant[$i]','$sku[$i]','$quantity[$i]')");
                if($addnew){
                    if($addnew){
                        header('location:index.php');
                    } else {
                        echo '
                        <script>
                            alert("Gagal Memuat Item Box");
                            window.location.href="index.php";
                        </script>';
                    }
            }
        }
    }
}

        

    


//submit qty & kubikasi
if(isset($_POST['submitboxsemua'])){
    $resibox = $_POST['resi'];
    $quantity = $_POST['qtybox'];
    $kubik = $_POST['countkubik'];
    $temp = $_POST['temp'];
    $notecok = $_POST['notecok'];

    $jum = count($resibox);
    for($i=0; $i<$jum; $i++){
        $update = mysqli_query($konek, "UPDATE box SET tempstat='$temp[$i]', boxcount='$quantity[$i]', note='$notecok[$i]', ctkubik='$kubik[$i]' WHERE resi='$resibox[$i]'");
        header('location:boxlist.php');
    } {

    }
}

//approve multiple
if(isset($_POST['submitinserttai'])){
    $resi = $_POST['resiberak'];
    $temp = $_POST['tempstatus'];
    $status = $_POST['stat'];
    $iddus = $_POST['iddus'];

    // $jum = count($resi);

    for($i=0; $i < $resi; $i++){
        $update = mysqli_query($konek, "UPDATE box SET tempstat='$temp[$i]', status='$status[$i]' WHERE iddus='$iddus[$i]'");
        echo '
        <script>
            alert("Data berhasil");
            window.location.href="approvebox.php";
        </script>';
        
    } {

    }

}

//mutasi gudang
if(isset($_POST['mutasigudang'])){
    $jum = $_POST['jum'];
    $sku = $_POST['skutoko'];
    $quantitymut = $_POST['qtymutasi'];
    $status = $_POST['status'];
    $pengirirm = $_POST['sender'];

    for ($i = 0; $i < $jum; $i++){
        $select = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$sku[$i]'");
        $ambil = mysqli_fetch_array($select);
        $nama = $ambil['nama'];
        $image = $ambil['image'];
        $skug = $ambil['skug'];

        if($select){
            $insert = mysqli_query($konek, "INSERT INTO mutasi(nama, sku, skug, quantitymut, status, image, sender) VALUES('$nama','$sku[$i]','$skug','$quantitymut[$i]','$status[$i]','$image','$pengirirm[$i]')");
            header('location:mutasigudang.php');
        }
    }
}

//approve mutasi
if(isset($_POST['approvemutasi'])){
    $cek = $_POST['cekmutasi'];
    $stat = $_POST['status'];
    $track = $_POST['tracking'];
    $penerima = $_POST['penerima'];

    $jum = count($cek);
    for($i=0; $i < $jum; $i++){
        $select = mysqli_query($konek, "SELECT * FROM mutasi WHERE skug='$cek[$i]' AND tempstat='0'");
        $ambildata = mysqli_fetch_array($select);
            $nama = $ambildata['nama'];
            $gambar = $ambildata['image'];
            $sku = $ambildata['sku'];
            $quantity = $ambildata['quantitymut'];

        if($select){
            $ambil = mysqli_query($konek, "SELECT * FROM stok2 WHERE sku='$sku'");
            $cekdata = mysqli_num_rows($ambil);

            if($cekdata==1){
                $selectqty = mysqli_query($konek, "SELECT * FROM stok2 WHERE sku='$sku'");
                $data = mysqli_fetch_array($selectqty);
                $quantity2 = $data['quantity'];
                
                $tambah = $quantity+$quantity2;
                if($selectqty){
                    $update = mysqli_query($konek, "UPDATE stok2 SET quantity='$tambah' WHERE sku='$sku'");
                    header('location:index.php');

                    if($update){
                        $updatestatus = mysqli_query($konek, "UPDATE mutasi SET status='$track[$i]', tempstat='$stat[$i]', penerima='$penerima[$i]' WHERE sku='$sku' AND tempstat=0");
                    }else{
                        
                    }

                } else {

                }
                
            } else {
                $insert = mysqli_query($konek, "INSERT INTO stok2(nama, image, sku, quantity) VALUES('$nama','$gambar','$sku','$quantity')");
                $updatetrack = mysqli_query($konek, "UPDATE mutasi SET status='$track[$i]', tempstat='$stat[$i]', penerima='$penerima[$i]' WHERE sku='$sku' AND tempstat=0");
                header('location:index.php');
                
            }
            
        } else {

        }
    } {

    }

}

//SUbmit gudang5
if(isset($_POST['submitgudang5'])){
    $nama = $_POST['namaitem'];
    $sku = $_POST['skupreparation'];

    //gambar
    $allowed_extension = array('png','jpg','jpeg','svg','webp');
    $img = $_FILES['file']['name']; //ambil gambar
    $dot = explode('.',$img);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['file']['size']; //ambil size
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi

    //nama acak
    $gambar = md5(uniqid($img,true) . time()).'.'.$ekstensi; //compile

    if($ukuran==0){
        $update = mysqli_query($konek, "INSERT INTO preparation(nama, sku) VALUES('$nama','$sku')");
        if($update){
            header('location:gudang5.php');
        } else {
            echo '
            <script>
                alert("Barang Tidak bisa di update");
                window.location.href="gudang5.php";
            </script>'; 
            }
        } else {
        move_uploaded_file($file_tmp, '../images/'.$gambar);
        $update = mysqli_query($konek, "INSERT INTO preparation(nama, sku, image) VALUES('$nama','$sku','$gambar')");
        if($update){
            header('location:gudang5.php');
        } else {
            echo '
            <script>
                alert("Barang dan Gambar Tidak bisa di update");
                window.location.href="gudang5.php";
            </script>'; 
            }
        }
}

//input component
if(isset($_POST['inputcomponent'])){
    $cek = $_POST['jum'];
    $nama = $_POST['namakomponen'];
    $sku = $_POST['skukomponen'];
    $quantity = $_POST['quantity'];
    $namaitem = $_POST['nama'];
    $skuitem = $_POST['sku'];


    for($i=0; $i < $cek; $i++){
        $insert = mysqli_query($konek, "INSERT INTO listpre(nama, sku, komponen, skukomponen, quantity) VALUES('$namaitem','$skuitem','$nama[$i]','$sku[$i]','$quantity[$i]')");
        header('location:komponen.php');
    } {

    }
}

//input component
if(isset($_POST['reqitem'])){
    $cek = $_POST['jum'];
    $nama = $_POST['namakomponen'];
    $sku = $_POST['skukomponen'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $worker = $_POST['worker'];


    for($i=0; $i < $cek; $i++){
        $ambilimg = mysqli_query($konek, "SELECT * FROM preparation WHERE sku='$sku[$i]'");
        $data = mysqli_fetch_array($ambilimg);
        $img = $data['image'];

        if($ambilimg){
            $insert = mysqli_query($konek, "INSERT INTO exititem(nama, sku, quantityrep, status, image, worker) VALUES('$nama[$i]','$sku[$i]','$quantity[$i]','$status', '$img','$worker[$i]')");
            header('location:reqpre.php');
            if($insert){
                $comp = mysqli_query($konek, "SELECT * FROM listpre WHERE nama='$nama[$i]' AND sku='$sku[$i]'");
                while($data = mysqli_fetch_array($comp)){
                    $komp = $data['komponen'];
                    $skukomp = $data['skukomponen'];
                    $qtykomp = $data['quantity'];

                    $kali = $qtykomp*$quantity[$i];

                    if($comp){
                        $masuk = mysqli_query($konek, "INSERT INTO exitcomponent(nama, sku, komponen, skukomponen, quantity) VALUES('$nama[$i]','$sku[$i]','$komp','$skukomp','$kali')");
                        header('location:reqpre.php');
                    } else {
    
                    }
                }
                
            } else {

            }
        } else {

        }
        
    } {

    }
}

//Approve gudang5
if(isset($_POST['komponeninput'])){
    $skuitem = $_POST['cekskuitem'];//Nama Ampli && Checkbox Ampli
    $status = $_POST['status']; //Status Ampli
    $komponen = $_POST['komponen']; //Nama Kompone
    $temp = $_POST['temp']; //Temp Status gudang5
    $ceklist = $_POST['cekkomponen']; //Checkbox gudang5
    $skukomponen = $_POST['skukomponen']; //SKu gudang5
    $qtyexit = $_POST['quantity'];

    for ($i = 0; $i < $ceklist; $i++){
        $select = mysqli_query($konek,"SELECT * FROM exitcomponent WHERE skukomponen='$ceklist[$i]' AND tempstat=0");
        $data = mysqli_fetch_array($select);

        if($select){
            $selectstok = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$ceklist[$i]' ");
            $datastok = mysqli_fetch_array($selectstok);
            $quantity = $datastok['quantity'];

            $kurang = $quantity-$qtyexit[$i];

            if($selectstok){
                $updateqtystok = mysqli_query($konek, "UPDATE stok SET quantity='$kurang' WHERE sku='$ceklist[$i]'");
                if($updateqtystok){
                    $updatelagi = mysqli_query($konek, "UPDATE exititem SET stat='$status[$i]', tempstat='$temp[$i]' WHERE sku='$skuitem[$i]' AND tempstat='0'");
                    if($updatelagi){
                        $updatetemp = mysqli_query($konek, "UPDATE exitcomponent SET tempstat='$temp[$i]' WHERE skukomponen='$skukomponen[$i]' AND tempstat='0'");
                        header('location:exitpre.php');
                    }else{

                    }
                
                } else {
                    echo 'gagal';
                }
                
            } else {

            }
        } else {

        }
        
    }
}

// Gudang 5
if(isset($_POST['submitg5'])){
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];
    $jum = $_POST['jum'];

    for($i = 0; $i < $jum; $i++){
        $select = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$sku[$i]'");
        $data = mysqli_fetch_array($select);
        $img = $data['image'];

        if($select){
            $ambildata = mysqli_query($konek, "SELECT * FROM stok5 WHERE sku='$sku[$i]'");
            $qty = mysqli_fetch_array($ambildata);
            $qtyqty = $qty['quantity'];
            $hitung = mysqli_num_rows($ambildata);
            if($hitung == 0){
                $insert = mysqli_query($konek, "INSERT INTO stok5(nama, image, sku, quantity) VALUES('$nama[$i]','$img','$sku[$i]','$quantity[$i]')");
                header('location:gudang5.php');
            } else {
                $tambah = $qtyqty+$quantity[$i];
                $update = mysqli_query($konek, "UPDATE stok5 SET quantity='$tambah' WHERE sku='$sku[$i]'");
                header('location:gudang5.php');
            }
        } else {
            echo "gagal";
        }
    }
}

if(isset($_POST['edit5'])){
    $idb = $_POST['idb'];
    $nama = $_POST['nama'];
    $skutoko = $_POST['skutoko'];

    //gambar
    $allowed_extension = array('png','jpg','jpeg','svg','webp');
    $img = $_FILES['file']['name']; //ambil gambar
    $dot = explode('.',$img);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['file']['size']; //ambil size
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi

    //nama acak
    $gambar = md5(uniqid($img,true) . time()).'.'.$ekstensi; //compile

    if($ukuran==0){
        $update = mysqli_query($konek, "UPDATE stok5 SET nama='$nama' WHERE idbarang='$idb'");
        if($update){
            header('location:gudang5.php');
        } else {
            echo '
            <script>
                alert("Barang Tidak bisa di update");
                window.location.href="gudang5.php";
            </script>'; 
            }
        } else {
        move_uploaded_file($file_tmp, '../images/'.$gambar);
        $update = mysqli_query($konek, "UPDATE stok5 SET nama='$nama', image='$gambar' WHERE idbarang='$idb'");
        if($update){
            header('location:gudang5.php');
        } else {
            echo '
            <script>
                alert("Barang dan Gambar Tidak bisa di update");
                window.location.href="gudang5.php";
            </script>'; 
            }
        }
}

//exit
if(isset($_POST['exit5'])){
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];
    $jum = $_POST['jum'];
    $temp = $_POST['temp'];
    $status = $_POST['status'];

    for ($i = 0; $i < $jum; $i++){
    $exit = mysqli_query($konek, "INSERT INTO exititem(nama, sku, quantityrep, status, tempwh) VALUES('$nama[$i]','$sku[$i]','$quantity[$i]','$status','$temp')");
    header('location:gudang5.php');
    }
}

//submit komponen
if(isset($_POST['submitkomponen'])){
    $nama = $_POST['namaitem'];
    $sku = $_POST['skupreparation'];

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
                move_uploaded_file($file_tmp, '../images/'.$image);
                 
                $insert = mysqli_query($konek, "INSERT INTO preparation(image, nama, sku) VALUES('$image', '$nama','$sku')");
                if($insert){
                    header('location:belumapprove.php');
                } else {
                    echo '
                    <script>
                        alert("Gagal Memuat Item Box");
                        window.location.href="index.php";
                    </script>';
                }
            } else {
                //kalau file lebih dari 5mb
                echo '
                    <script>
                        alert("Kelebihan muatan woiii ga muat database");
                        window.location.href="index.php";
                    </script>'; 
            }
        } else {
            
    }

}

?>