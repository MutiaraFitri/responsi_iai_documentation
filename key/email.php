<?php
// Create database connection using config file
include_once("koneksi.php");

$cari = "SELECT * FROM users WHERE email='".$_GET['email']."'";
$isAda = $conn->query($cari);
$rows = array();
$api = "";

while($r = mysqli_fetch_assoc($isAda)){
    $rows[] = $r;
}
$rows = json_encode($rows);
$rows = json_decode($rows);
// print_r($isAda);die;
if(mysqli_num_rows($isAda)==1){
    $api = $rows[0]->key_api;
    // echo "wow";die;
}

else {
    // Fetch all users data from database
    $str=rand(); 
    $api = md5($str);

    // Fetch all users data from database
    $email = $_GET['email'];

        $sql = "INSERT INTO users(
        id_user,
        email,
        key_api
        ) VALUES (
        null,
        '$email',
        '$api'
        )";
        $result = $conn->query($sql);
}
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
  <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a href="." class="brand-logo mahdojan-font">Mahdo<span style="color:red">j</span>an</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../restoran">Restoran</a></li>                
                <li><a class="waves-effect waves-light btn red" href="./getKey.php"><i class="material-icons right">vpn_key</i>Get Key</a></li>
            </ul>
        </div>
    </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="../restoran">Restoran</a></li>
    <li><a href="../getKey">Get Key</a></li>  
  </ul>
<?php if(isset($_GET['email'])){
    
    ?>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center red-text" style="font-weight:900">YOUR KEY</h1>
        <h5 class="header center red-text" style="font-weight:100">Dibawah ini adalah Key API anda, harap digunakan dengan bijak!</h5>
          <nav class="teal lighten-2">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input class="red" id="KEY" style="color:white" type="search" name="email" <?php if(isset($api)) { echo "value=".$api; } ?> value="KEY" disabled>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>
      </div>
    </div>
  </div>
<?php } else {?>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center red-text" style="font-weight:900">GET KEY</h1>
        <h5 class="header center red-text" style="font-weight:100">Masukkan Email anda!</h5>
          <nav class="teal lighten-2">
            <div class="nav-wrapper">
              <form action="email.php">
                <div class="input-field">
                  <input  style="color:white" class="red" id="search" type="search" name="email" <?php if(isset($_GET['email'])) { echo "value=".$_GET['email']; } ?>>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>
        <div class="row center">
        </div>
        <div class="row center">
          <a id="download-button" class="btn-large waves-effect waves-light red">Get your key</a>
        </div>
      </div>
    </div>
  </div>

<?php }?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script>
    $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
  </script>

  </body>
</html>