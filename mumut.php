 <?php
 $curl = curl_init();
 curl_setopt_array($curl, array(
   CURLOPT_URL => "https://mahdojan.000webhostapp.com/json/read_all.php?key=073771bda12df049418601bc5c35f5f0",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
 ));
 
 $response = curl_exec($curl);
 $err = curl_error($curl);
 
 curl_close($curl);
 
 if ($err) {
   echo "CURL Error #:" . $err;
 } else {
   echo $response;
 }
 ?>