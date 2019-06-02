<?PHP 
$cari = $_GET['query'];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://mahdojan.000webhostapp.com/searchByName.php?key=1dba9509d8ea6898afe22bf3c3426c84",
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
?>