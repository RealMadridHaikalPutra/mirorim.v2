<?php

$conn = mysqli_connect("localhost","root","","mirorim.v2");

// Add Item Multi
if(isset($_POST['multi'])){
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $sku = $_POST['sku'];
    $skug = $_POST['skug'];
    $gudang = $_POST['gudang'];
    $quantity = $_POST['quantity'];


    $jumlah = $_POST['jum'];
    
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

                $addnew = mysqli_query($conn, "INSERT INTO product_id(image, nama, jenis) VALUES('$image','$nama[$i]','$jenis[$i]')");
                if($addnew){
                    $select = mysqli_query($conn, "SELECT * FROM product_id WHERE nama='$nama[$i]'");
                    $data = mysqli_fetch_array($select);
                    $idp = $data['id_product'];

                    if($select){
                        $insert = mysqli_query($conn, "INSERT INTO toko_id(id_product, sku_toko) VALUES('$idp','$sku[$i]')");
                        if($insert){
                            $insert2 = mysqli_query($conn, "INSERT INTO gudang_id(id_product, sku_gudang, quantity, lokasi_gudang) VALUES('$idp','$skug[$i]','$quantity[$i]','$gudang[$i]')");
                            header('location:index.php');
                        } else {
                            echo "Gagal1";
                        }

                    } else {
                        echo "Gagal2";
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
            echo "Gagal3";
            }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mirorim</title>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link href="../css/styles.css" rel="stylesheet" />
    <style>
        .zoomable {
            width: 100px;
        }

        .zoomable:hover {
            transform: scale(2.8);
            transition: 0.3s ease;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Toko Mirorim</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-6">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#"> </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>

<div class="container-fluid">
                        <div class="card-body">
                        <h5 class="card-title">Check Packing List</h5>
                        <!--Submit-->
                        <!-- Begin Page Content -->
                            <hr>
                            <form method="post" action="">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Quantity Exit</label>
                                    <input class="form-control" name="jum" id="nama" type="number" require>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">///////</label>
                                    <br>
                                    <button class="btn btn-outline-primary" type="submit" action="" name="qtyvariant">Submit</button>
                                </div>
                                </div>
                            </div>
                            </form>
                            <hr>
                            <form id="contact-form" action="index.php" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                            <div class="table-responsive">
                            <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>SKU TOKO</th>
                                            <th>SKU Gudang</th>
                                            <th>Gudang</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(isset($_POST['qtyvariant'])){
                                            $jum = $_POST['jum'];
                                            $s = 1;
                                            $jumlah = $jum+$s;

                                            for($i=1; $i < $jumlah; $i++){
                                        ?>
                                        <tr>
                                            <th><?=$s++;?></th>
                                            <td ><input type="file" name="file[]" class="form-control" placeholder="Image"></td>
                                            <td><input type="text" name="nama[]" class="form-control" placeholder="nama"></td>
                                            <td>
                                                <select id="selectReq" name="jenis[]" class="form-control">
                                                    <option>---</option>
                                                    <option value="Mentah">Mentah</option>
                                                    <option value="Mateng">Mateng</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="sku[]" class="form-control" placeholder="SKU Toko"></td>
                                            <td><input type="text" name="skug[]" class="form-control" placeholder="SKUG"></td>
                                            <td><input type="number" name="gudang[]" class="form-control" placeholder="Gudang"></td>
                                            <td><input type="number" name="quantity[]" class="form-control" placeholder="Quantity"></td>
                                            <input type="hidden" value="<?=$jum;?>" name="jum[]">
                                        </tr>
                                        <?php
                                            }}

                                        ?>
                                        </tbody>
                                </table>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="multi">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div> 
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
    
</body>

</html>