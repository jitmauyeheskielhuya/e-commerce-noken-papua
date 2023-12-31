<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: bfe7d1ce6c12d2dde8e8a2df42dbcb2f"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // dapat dalam bentuk json
  // echo $response;
  // kita konversi ke array dulu
  $array = json_decode($response, true);
  $dataprov = $array["rajaongkir"]["results"];

  // echo "<pre>";
  // print_r($dataprov);
  // echo "</pre>";

  echo "<option value=''>--Pilih Provinsi</option>";

  foreach ($dataprov as $key => $tiap_prov) {
    echo "<option value='" . $tiap_prov["province_id"] . "' id_provinsi='" . $tiap_prov["province_id"] . "' >";
    echo $tiap_prov["province"];
    echo "</option>";
  }
}
