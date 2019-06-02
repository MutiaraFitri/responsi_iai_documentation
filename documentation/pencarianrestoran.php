<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Mahdojan API JSON</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="documentation.css">
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
    <li><a href="#">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>

  <div id="index-banner" class="parallax-container" style="background: rgba(0,0,0,0.4)">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center red-text" style="font-weight:900">Mahdojan API JSON</h1>
        <div class="row center">
          <h5 class="header col s12 light">Temukan restoran, kafe, dan bar terbaik di Jogja</h5>
        </div>
        <br><br>
      </div>
    </div>
    <div class="parallax" ><img src="../imgWeb/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">
    <h2 class="ui header" style="font-size: 1.714rem">
                <div class="segment_heading" style="font-weight: 600; line-height: 1.1em;text-transform: none;color: #33373D; ">Data Restoran</div>
                <div class="sub header">
                    <span class="segment_sub_heading">
                        Temukan restoran di Yogyakarta</span>
                </div>
    </h2>
  <div class="row">
      <h5 class="ui header" style="font-size: 18px">
          <div class="segment_heading" style="width:100px;font-weight: 600; line-height: 1.1em;text-transform: none;color: #33373D; display: inline-block;">
            URL</div>
          <div class="sub header" style="display: inline-block;">
              <span class="segment_sub_heading">
                  https://mahdojan.000webhostapp.com/searchByName.php</span>
          </div>
      </h5>
  </div>
  <div class="row">
      <h5 class="ui header" style="font-size: 18px">
          <table class="striped" border="1">
              <thead>
                <tr>
                    <th>Method</th>
                    <th>Parameter</th>
                    <th>Wajib</th>
                    <th>Tipe</th>
                    <th>Keterangan</th>
                </tr>
              </thead>
      
              <tbody>
                <tr>
                  <td>GET/HEAD</td>
                  <td>key</td>
                  <td>Yes</td>
                  <td>String</td>
                  <td>API Key</td>
                </tr>
                <tr>
                  <td>POST</td>
                  <td>query</td>
                  <td>Yes</td>
                  <td>String</td>
                  <td>query untuk dicari</td>
                </tr>
              </tbody>
            </table>
      </h5>
  </div>
  <div class="row">
      <h5 class="ui header" style="font-size: 18px">
          <div class="segment_heading" style="font-weight: 600; line-height: 1.1em;text-transform: none;color: #33373D; ">Contoh Request</div>
      </h5>
      <!--   Icon Section   -->
      <div class="row" style="font-weight:700">
        <div class="">
          <div class="kotak-koding">
            <div class="judul-koding">
              <div class="bulet-tutup"></div>
              <div class="bulet-kecil" id="kecil"></div>
              <div class="bulet-minim" id="besar"></div>
              <p>Get Data Restoran - Mahdojan API</p>
            </div>
            <div class="row row-isi">
                <div class="numbering">
                  1 <br>
                  2 <br>
                  3 <br>
                  4 <br>
                  5 <br>
                  6 <br>
                  7 <br>
                  8 <br>
                  9 <br>
                  10 <br>
                  11 <br>
                  12 <br>
                  13 <br>
                  14 <br>
                  15 <br>
                  16 <br>
                  17 <br>
                  18 <br>
                  19 <br>
                  20 <br>
                  21 <br>
                  22 <br>
                  23 <br>
                  24 <br>
                  25 <br>
                  26 <br>
                  27 <br>
                  28 <br>
                  29 <br>
                </div>
                <div class="isi">
<pre><span class="variabel">
$cari = $_GET['query'];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://mahdojan.000webhostapp.com/searchByName.php?key=YOURKEY",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_POST => 1,
  CURLOPT_POSTFIELDS => [
    'query' => $cari
  ]
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

                    </pre>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <h5 class="ui header" style="font-size: 18px">
            <div class="segment_heading" style="font-weight: 600; line-height: 1.1em;text-transform: none;color: #33373D; ">Contoh Response</div>
        </h5>
        <div class="row" style="font-weight:700">
            <div class="">
              <div class="kotak-koding">
                <div class="judul-koding">
                  <div class="bulet-tutup"></div>
                  <div class="bulet-kecil" id="kecil"></div>
                  <div class="bulet-minim" id="besar"></div>
                  <p>Get Data Restoran - Mahdojan API</p>
                </div>
                <div class="row row-isi">
                    <div class="numbering">
                      1 <br>
                      2 <br>
                      3 <br>
                      4 <br>
                      5 <br>
                      6 <br>
                      7 <br>
                    </div>
                    <div class="isi">
    <pre>{
    name: <span class="comment">"Mahdojan Restoran API"</span>,
    code: <span class="nomor">402</span>,
    message: <span class="comment">"Invalid key."</span>,
    results: [ ],
}
                        </pre>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <footer class="page-footer red">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Mahdojan API</h5>
          <p class="grey-text text-lighten-4">Mahdojan API Restoran yang ada di kota Daerah Istimewa Yogyakarta dalam format JSON dan XML yang mudah digunakan dan Open Source</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Us</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  <script>
    $(function() {
    $("#kecil").click(function() {
          $('.kotak-koding').css('height', '30px');
          });
    });
    $(function() {
    $("#besar").click(function() {
          $('.kotak-koding').css('height', 'auto');
          });
    });
  </script>
  </body>
</html>