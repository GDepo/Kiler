<?php include 'baglan.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kiler Uygulaması</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
<style type="text/css">
  td{
    text-align:center; 
  }
</style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Kiler Uygulaması</a>
      <a class="navbar-brand" href="urunekle.php">Ürünler</a>
      
    </div>

  </nav>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------->
<br>
<h2><center><font face="tahoma">Ürün Ekle</font></center></h2>

<div class="container">
<form action="" method="post">

<div class="form-row container">
    <div class="col">
      
<select class="form-control form-control-sm" name="urunekle">
  <?php 
/* selecet box ın içine listelettik */ 

$query = $db->query("SELECT * FROM urunler", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
          print "<option value=' ".$row['id']."'>".$row['urun_adi']."</option>";
     }
}
 ?>
  </select>


    </div>
    <div class="col">
      <input type="number" class="form-control-sm" placeholder="Adet" name="adet" required>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="submit" class="btn btn-sm btn-outline-success" value="Ürün Ekle" name="gonder">
    </div>
  </div>

<?php 
if (isset($_POST['gonder'])) {
 
 $urunid=$_POST['urunekle'];
 $adet=$_POST['adet'];

/* post edilen ürünün adetini çektirdik. */  
$query = $db->query("SELECT * FROM urunler WHERE id='$urunid'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        $adett=$row['adet'];
     }

$topla = $adett + $adet;
/*  Güncelleme İşlemi  */
$query = $db->prepare("UPDATE urunler SET
adet = :yeni_adet
WHERE id = :id");
$update = $query->execute(array(
     "yeni_adet" => $topla,
     "id" => $urunid
));
if ( $update ){
     print $urunid." id numaralı ürünün toplam adeti = ".$topla." oldu ";
}

}


}


 ?>
</form>
<br><br><br>

<h2><center><font face="tahoma">Kiler</font></center></h2>
<center>
<table class="table-bordered table-striped" style="background-color:lightgray; width: 600px;">

            <tr>
              <td><b>Ürün ID</b></td>
              <td><b>Ürün Adı</b></td>
             <td><b>Adet</b></td>

             </tr>
             
              
               
                  <?php 
                  /* Tablonun içerisine veri tabanında ki verileri listelettik */ 
                $query = $db->query("SELECT * FROM urunler", PDO::FETCH_ASSOC);
               if ( $query->rowCount() ){
               foreach( $query as $row ){
               print "<tr><td>".$row['id']."</td><td>".$row['urun_adi']."</td><td>".$row['adet']."</td><tr>";
     }
}

                   ?>
               
                 
            
            </table>  
              </center>

</div><!---Bitiş Div'i ---->











<!------------------------------------------------------------------------------------------------------------------------------------------------------------->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
