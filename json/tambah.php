<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$str=rand(); 
$ekstensi_diperbolehkan	= array('png','jpg');
$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
$photo_profile = md5($str).'.'.$ekstensi;
$wifi = 0;
$parkir = 0;
$delivery = 0;
$gojek = 0;
$grab = 0;
$powersocket =0;

if(isset($_POST['powersocket'])){
  $powersocket = $_POST['powersocket'];
  if($powersocket=='on'){
      $powersocket=1;
  }
}

if(isset($_POST['grab'])){
  $grab = $_POST['grab'];
  if($grab=='on'){
      $grab=1;
  }
}

if(isset($_POST['gojek'])){
  $gojek = $_POST['gojek'];
  if($gojek=='on'){
      $gojek=1;
  }
}

if(isset($_POST['delivery'])){
  $delivery = $_POST['delivery'];
  if($delivery=='on'){
      $delivery=1;
  }
}

if(isset($_POST['parkir'])){
  $parkir = $_POST['parkir'];
  if($parkir=='on'){
      $parkir=1;
  }
}

if(isset($_POST['wifi'])){
    $wifi = $_POST['wifi'];
    if($wifi=='on'){
        $wifi=1;
    }
}

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
  if($ukuran < 1044070){			
    move_uploaded_file($file_tmp, '../img/'.$photo_profile);
  }else{
    echo 'UKURAN FILE TERLALU BESAR';
    $photo_profile = "not yet";
  }
}else{
  $photo_profile = "not yet";
  echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';die;
}

// Fetch all users data from database
$nama = $_POST['name'];
$category = $_POST['kategori'];
$address = $_POST['alamat'];
$daerah=$_POST['daerah'];
$kota = $_POST['kota'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$postal = $_POST['postal'];
$keterangan = $_POST['keterangan'];
$kode_admin = $_POST['kode_admin'];
$ip = $_POST['ip'];

    $sql = "INSERT INTO restoran(
      id_restoran,
      nama_restoran,
      kategori,
      alamat,
      daerah,
      kota,
      longitude,
      latitude,
      kode_pos,
      kode_admin,
      keterangan,
      photo_profile,
      wifi,
      parkir,
      delivery,
      gojek,
      grab,
      powersocket,
      ip
    ) VALUES (
      null,
      '$nama',
      '$category',
      '$address',
      '$daerah',
      '$kota',
      '$lng',
      '$lat',
      '$postal',
      '$kode_admin',
      '$keterangan',
      '$photo_profile',
      '$wifi',
      '$parkir',
      '$delivery',
      '$gojek',
      '$grab',
      '$powersocket',
      '$ip'
    )";
    $result = $conn->query($sql);
// echo "databerhasil";
// print_r($rows->id_restoran); 
// echo $sql;

// echo "databerhasil";
// print_r($rows->id_restoran); 

// After delete redirect to Home, so that latest user list will be displayed.
// header("Location:read_all.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Mahdojan API</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a href="." class="brand-logo mahdojan-font">Mahdo<span style="color:red">j</span>an</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../json">JSON</a></li>
                <li><a href="#">XML</a></li>
                <li><a href="../restoran">Restoran</a></li>                
            </ul>
        </div>
    </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="../json">JSON</a></li>
    <li><a href="#">XML</a></li>
    <li><a href="../restoran">Restoran</a></li>  
  </ul>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Data Berhasil disimpan</h1>
        <div class="row center">
          <h5 class="header col s12 light">Terimakasih sudah berpartisipasi dalam pengembangan API ini</h5>
        </div>
        <div class="row center">
          <a href="tambah_data.php" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Tambah Lagi</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="../background1.jpg" alt="Unsplashed background img 1"></div>
  </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>