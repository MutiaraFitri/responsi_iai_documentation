<?php
  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://mahdojan.000webhostapp.com/server.php'
  ]);
  $result = curl_exec($curl);
  curl_close($curl);
  
  $result = json_decode($result);
//   print_r ($result);

$curls = curl_init();
curl_setopt_array($curls, [
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_URL => 'https://mahdojan.000webhostapp.com/count.php'
]);
$results = curl_exec($curls);
curl_close($curls);

$results = json_decode($results);
//   print_r ($results);

if(isset($_GET['query'])){
    $nama_restoran = $_GET['query'];
    $curl_search = curl_init();
    curl_setopt_array($curl_search, [
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => 'https://mahdojan.000webhostapp.com/searchByName.php?key=073771bda12df049418601bc5c35f5f0',
      CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => [
          'query' => $nama_restoran
        ]
    ]);
    $result_search = curl_exec($curl_search);
    curl_close($curl_search);
    
    $result_search = json_decode($result_search);
      // print_r ($result_search);
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
<!------------------------------------------ Navbar ------------------------------------------------------>
<nav class="white" role="navigation">
      <div class="nav-wrapper container">
          <a href=".." class="brand-logo mahdojan-font">Mahdo<span style="color:red">j</span>an</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
              <li><a href="../restoran">Restoran</a></li>                
              <li><a class="waves-effect waves-light btn red" href="./key/"><i class="material-icons right">vpn_key</i>Get Key</a></li>
          </ul>
      </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="../restoran">Restoran</a></li>
    <li><a href="../key/">Get Key</a></li>  
  </ul>
<!------------------------------------------ Navbar ------------------------------------------------------>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center red-text" style="font-weight:900">Mahdojan API JSON</h1>
          <nav class="teal lighten-2">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input type="hidden" name="key" value="073771bda12df049418601bc5c35f5f0">
                  <input class="red" id="search" type="search" name="query" <?php if(isset($_GET['query'])) { echo "value=".$_GET['query']; } ?>>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>
        <div class="row center">
          <h5 class="header col s12 light">API restoran format JSON di kota Jogja</h5>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="../imgWeb/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">
      <h4>Restoran di Jogja</h4>

    <?php if(!isset($_GET['query'])){ ?>
      <div class="row">
        <div class="col m6">
            <p>Terdapat <?php echo count($result->restoran)?> List Restoran di Jogja, didapat dari API MAHDOJAN</p>
        </div>
      </div>
      <div class="row">
        <div class="col m12">Total Data :</div>
        <!--   Icon Section   -->
      <div class="row">
        <?php foreach ($result->restoran as $i) :?>
                <div class="col m4 s12">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light center-align">
                      <?php if($i->photo_profile=='not yet'){ ?>
                        <img class="activator" src="https://mahdojan.000webhostapp.com/img/not-found.png" style="overflow:hidden;height:150px">
                      <?php } else {?>
                        <img class="activator" src="https://mahdojan.000webhostapp.com/img/<?=$i->photo_profile?>" style="overflow:hidden;height:150px">
                      <?php } ?>
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4" style="font-size:20px;"><div style="display:inline-block;max-width:80%;text-overflow: ellipsis;white-space: nowrap;overflow:hidden;"><?=$i->nama_restoran?></div><i class="material-icons right">more_vert</i></span>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><div style="display:inline-block;max-width:80%;text-overflow: ellipsis;white-space: nowrap;overflow:hidden;"><?=$i->nama_restoran?></div><i class="material-icons right">close</i></span>
                      <p><?=$i->alamat?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach?>
      </div>
      <!-- KETIKA USER MALAKUKAN SEARCHING -->
    <?php }else { ?>
        <div class="row">
          <p>Hasil pencarian dari "<?php echo $_GET['query']?>" terdapat <?php echo count($result_search->restoran)?></p>
        </div>
        <div class="row">
            <?php foreach ($result_search->restoran as $i) :?>
                <div class="col m4 s12">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light center-align">
                    <!-- KETIKA PHOTO PROFILE BELUM DI SET AKAN MENAMPILKAN NOTFOUND -->
                      <?php if($i->photo_profile=='not yet'){ ?>
                        <img class="activator" src="https://mahdojan.000webhostapp.com/img/not-found.png" style="overflow:hidden;height:150px">
                        <!-- KETIKA PHOTO PROFILE SUDAH DI SET -->
                      <?php } else {?>
                        <img class="activator" src="https://mahdojan.000webhostapp.com/img/<?=$i->photo_profile?>" style="overflow:hidden;height:150px">
                      <?php } ?>
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4" style="font-size:20px;"><div style="display:inline-block;max-width:80%;text-overflow: ellipsis;white-space: nowrap;overflow:hidden;"><?=$i->nama_restoran?></div><i class="material-icons right">more_vert</i></span>
                      <div class="row">
                        <a href="../restoran/edit.php?id=<?=$i->id_restoran?>" class="btn tooltipped" data-position="bottom" data-tooltip="Edit"><i class="material-icons" style="font-size:20px;">create</i></a>
                        <a href="#" class="btn blue tooltipped" data-position="top" data-tooltip="Information"><i class="material-icons" style="font-size:20px;">info_outline</i></a>
                        <a href="#" class="btn red tooltipped" data-position="bottom" data-tooltip="Delete"><i class="material-icons" style="font-size:20px;">delete</i></a>
                      </div>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><div style="display:inline-block;max-width:80%;text-overflow: ellipsis;white-space: nowrap;overflow:hidden;"><?=$i->nama_restoran?></div><i class="material-icons right">close</i></span>
                      <p><?=$i->alamat?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach?>
        </div>
    <?php }?>

    </div>
  </div>
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