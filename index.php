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
<h2><center><font face="tahoma">Siparişler</font></center></h2>

<div class="container">
  
  <form action="" method="post">
    <select class="form-control form-control-sm" name="yemek">
  
    <?php 
      $query = $db->query("SELECT * FROM yemekler", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
          print "<option value='".$row['id']."'>".$row['urunadi']."</option>";
     }
}

     ?>
  
  </select>

<br><br>
   <center> <input type="submit" class="btn btn-outline-success" value="Sipariş Ver" name="siparis"></center>

  </form><center>
<?php 

if (isset($_POST['siparis'])) {
    $sipid= $_POST['yemek'];
 
$query = $db->query("SELECT malz1,malz2,malz3,malz4 FROM yemekler WHERE id = '{$sipid}'")->fetch(PDO::FETCH_ASSOC);
$urun1=$query['malz1'];
$urun2=$query['malz2'];
$urun3=$query['malz3'];
$urun4=$query['malz4'];

$query2 = $db->query("SELECT adet FROM urunler WHERE urun_adi = '{$urun1}'")->fetch(PDO::FETCH_ASSOC);
$urun1adet=$query2['adet'];
echo "Sipariş Alındı";


$query3 = $db->query("SELECT adet FROM urunler WHERE urun_adi = '{$urun2}'")->fetch(PDO::FETCH_ASSOC);
$urun2adet=$query3['adet'];


$query4 = $db->query("SELECT adet FROM urunler WHERE urun_adi = '{$urun3}'")->fetch(PDO::FETCH_ASSOC);
$urun3adet=$query4['adet'];



$query5 = $db->query("SELECT adet FROM urunler WHERE urun_adi = '{$urun4}'")->fetch(PDO::FETCH_ASSOC);
$urun4adet=$query5['adet'];


if ($urun1adet==0 || $urun2adet==0 || $urun3adet==0 || $urun4adet==0 ) {
echo "Ürün Stoğu Azaldı <br>";

if ($urun1adet==0 ) {
  echo $urun1." Ürünü Tükendi <br>";
}
if ($urun2adet==0 ) {
  echo $urun2." Ürünü Tükendi <br>";
}
if ($urun3adet==0 ) {
  echo $urun3." Ürünü Tükendi <br>";
}
if ($urun4adet==0 ) {
  echo $urun4." Ürünü Tükendi <br>";
}


}else{
$urun1adet=$urun1adet-1;
$urun2adet=$urun2adet-1;
$urun3adet=$urun3adet-1;
$urun4adet=$urun4adet-1;
/*  Güncelleme İşlemi  */
$queryson = $db->prepare("UPDATE urunler SET
adet = :yeni_adet
WHERE urun_adi = :ad");
$update = $queryson->execute(array(
     "yeni_adet" =>$urun1adet,
     "ad" => $urun1
));


/*  Güncelleme İşlemi  */
$queryson2 = $db->prepare("UPDATE urunler SET
adet = :yeni_adet
WHERE urun_adi = :ad");
$update = $queryson2->execute(array(
     "yeni_adet" =>$urun2adet,
     "ad" => $urun2
));

/*  Güncelleme İşlemi  */
$queryson3 = $db->prepare("UPDATE urunler SET
adet = :yeni_adet
WHERE urun_adi = :ad");
$update = $queryson3->execute(array(
     "yeni_adet" =>$urun3adet,
     "ad" => $urun3
));


/*  Güncelleme İşlemi  */
$queryson4 = $db->prepare("UPDATE urunler SET
adet = :yeni_adet
WHERE urun_adi = :ad");
$update = $queryson4->execute(array(
     "yeni_adet" =>$urun4adet,
     "ad" => $urun4
));


}
}


 ?>
 </center>
</div>



















<!------------------------------------------------------------------------------------------------------------------------------------------------------------->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
