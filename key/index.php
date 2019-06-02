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

<!------------------------------------------ Navbar ------------------------------------------------------>
  <nav class="white" role="navigation">
      <div class="nav-wrapper container">
          <a href=".." class="brand-logo mahdojan-font">Mahdo<span style="color:red">j</span>an</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
              <li><a href="../restoran">Restoran</a></li>                
              <li><a class="waves-effect waves-light btn red" href="./getKey.php"><i class="material-icons right">vpn_key</i>Get Key</a></li>
          </ul>
      </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="../restoran">Restoran</a></li>
    <li><a href="../key/">Get Key</a></li>  
  </ul>
<!------------------------------------------ Navbar ------------------------------------------------------>

<!-- JIKA USER MENGINPUTKAN EMAIL -->
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
                  <input class="red" id="KEY" style="color:white" type="search" name="email" <?php if(isset($_GET['email'])) { echo "value=".$_GET['email']; } ?> value="KEY" disabled>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>
      </div>
    </div>
  </div>
  <!-- JIKA USER BELUM MENGINPUTKAN EMAIL -->
<?php } else {?>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center red-text" style="font-weight:900">GET KEY</h1>
        <h5 class="header center red-text" style="font-weight:100">Masukkan Email anda!</h5>
          <nav class="teal lighten-2">
            <div class="nav-wrapper">
              <form action="./email.php">
                <div class="input-field">
                  <input  style="color:white" class="red" id="search" type="search" name="email" <?php if(isset($_GET['email'])) { echo "value=".$_GET['email']; } ?>style="text-align:center;">
                  <i class="material-icons">close</i>
                </div>
            </div>
          </nav>
        <div class="row center">
        </div>
        <div class="row center">
        <input type="submit" class="btn-large red" value="Get your key">
        </div>
        </form>
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