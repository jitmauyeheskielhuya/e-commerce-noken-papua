<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ongkir extends BaseController
{

  protected $BarangModel;

  public $api_key = "bfe7d1ce6c12d2dde8e8a2df42dbcb2f";



  public function index()
  {

    // menampilkan kota dari API RajaOngkir
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: " . $this->api_key,
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      // echo "cURL Error #:" . $err;
      $data['kota'] = array('error' => true);
    } else {
      // echo $response;
      $data['kota'] = json_decode($response);
    }
    // print_r($data['kota']);


    return view('pelanggan/view_cart/ongkir', $data);
  }

  public function cekongkir()
  {
    $asal_kota = $this->request->getPost('asal');
    $tujuan_kota = $this->request->getPost('tujuan');
    $berat = $this->request->getPost('berat');
    $kurir = $this->request->getPost('kurir');

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=" . $asal_kota . "&destination=" . $tujuan_kota . "&weight=" . $berat . "&courier=" . $kurir,
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: " . $this->api_key,
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      // echo "cURL Error #:" . $err;
      $data['hasil'] = array('error' => true);
    } else {
      // echo $response;
      $data['hasil'] = json_decode($response);
    }
    // print_r($data['hasil']);

    return view('pelanggan/view_cart/hasil', $data);
  }
}
