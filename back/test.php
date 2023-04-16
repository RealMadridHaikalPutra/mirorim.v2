<?php

$conn = mysqli_connect("localhost","root","","mirorim.v2");

?>

<!DOCTYPE html>
<html>
<head>
 <title>Maribelajarcoding.com</title>
 <script
 src="https://code.jquery.com/jquery-3.4.1.min.js"
 integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
 crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/id.js" type="text/javascript"></script>

 <script type="text/javascript">
  $(document).ready(function() {
      $('#hobi').select2({
       placeholder: "Pilih Hobi",
    allowClear: true,
    language: "id"
      });
  });
 </script>
</head>

<body>
 <div align="center">
  <h3>Simpan Data Multiple Select Dropdown dengan Plugin Select2</h3>
  <h4>maribelajarcoding.com</h4>
  <form method="POST">
    <table>
     <tr>
      <td width="60px" valign="top">Hobi</td>
      <td valign="top"> 
      <select id="hobi" name="hobi[]" multiple="multiple" style="width:300px">
                                        <?php
                                            $selectopsi = mysqli_query($conn, "SELECT * FROM gudang_id");
                                            $i = 1;
                                            while($opsi = mysqli_fetch_array($selectopsi)){
                                                
                                        ?>
                                            <option value="<?=$opsi['sku_gudang'];?>"><?=$opsi['sku_gudang'];?></option>
                                        <?php
                                            }
                                        ?>
      </td>
     </tr>
     <tr>
      <td width="60px" valign="top"></td>
      <td valign="top"> 
       <input type="submit" name="simpan" value="Simpan">
      </td>
     </tr>
    </table>
   </form>
 </div>
</body>
</html>