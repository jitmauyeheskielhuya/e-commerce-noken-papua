<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
// use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\IncomingRequest;
use \App\Models\KriteriaModel;
use \App\Models\SubkriteriaModel;

class Pelanggan extends BaseController
{
  protected $BarangModel;
  protected $pembelianModel;
  protected $KriteriaModel;
  protected $SubkriteriaModel;

  public $api_key = "bfe7d1ce6c12d2dde8e8a2df42dbcb2f";

  public function __construct()
  {
    $this->BarangModel = new BarangModel();
    $this->pembelianModel = new PembelianModel();
    $this->KriteriaModel = new KriteriaModel();
    $this->SubkriteriaModel = new SubkriteriaModel();
    helper('number');
    helper('form');
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-yzB1hCmarPWIlsMcXVV3gMjv';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;


    // Add new notification url(s) alongside the settings on Midtrans Dashboard Portal (MAP)
    \Midtrans\Config::$appendNotifUrl = "http://localhost:8080/pelanggan/cekmidtrans";
    // Use new notification url(s) disregarding the settings on Midtrans Dashboard Portal (MAP)
    \Midtrans\Config::$overrideNotifUrl = "http://localhost:8080/pelanggan/cekmidtrans";



  }

  public function layout_pelanggan()
  {
    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
    ];

    return view('pelanggan/home_pelanggan', $data);
  }

  // crud shopping cart
  public function cek()
  {
    $cart = \Config\Services::cart();
    $response = $cart->contents();
    echo '<pre>';
    print_r($response);
    echo '</pre>';
  }

  // Insert shopping cart
  public function add()
  {
    $token = '';
    $cart = \Config\Services::cart();
    $cart->insert(array(
      'id'      => $this->request->getPost('id'),
      'qty'     => 1,
      'price'   => $this->request->getPost('price'),
      'name'    => $this->request->getPost('name'),
      'options' => array(
        'gambar' => $this->request->getPost('gambar'),
        'ukuran' => $this->request->getPost('ukuran'),
        'motif' => $this->request->getPost('motif'),
      )
    ));
    session()->setFlashdata('pesan', 'Barang Berhasil Dimasukan Keranjang !!!');
    return redirect()->to(base_url('pelanggan/cart'));
  }

  // Clear the shopping cart
  public function clear()
  {
    $cart = \Config\Services::cart();
    $cart->destroy();
  }


  public function ongkir()
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
    };


    return view('pelanggan/view_cart/index', [$data]);
  }
  
  public function cart()
  {
    // menampilkan kota dari API RajaOngkir
    $data['token'] = null;
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
      $kota = array('error' => true);
    } else {
      // echo $response;
      $kota = json_decode($response);
    };

    $cek = \Config\Services::cart();
    $cek = (count($cek->contents()));
    if ($cek == 0) {
      session()->setFlashdata('pesan', 'Data Keranjang Masih Kosong !!!');
      return redirect()->to(base_url('pelanggan'));
    }
    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
      'kota' => $kota,
      'token' => null
    ];

    if (isset($_POST['submit'])) {
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
      };
    }

    if (isset($_POST['snap'])) {
      $db      = \Config\Database::connect();
      $Totalharga = $this->request->getPost('Totalharga');
      $id_order = time();
      $builder = $db->table('users');
      $builder->select('*');
      $builder->where('users.id', user()->id);
      $query = $builder->get()->getResultArray();
      $nama_depan = $query[0]['nama_depan'];
      $nama_belakang = $query[0]['nama_belakang'];
      $email = $query[0]['email'];
      $ponsel = $query[0]['no_hp'];
      $enable_payments = array('bri_va', 'bca_va');


      $item1_details = array(
        'id' => $id_order . '77',
        'price' => (int)$Totalharga,
        'quantity' => 1,
        'name' => 'Total Pembayaran',
      );

      $item_details = array($item1_details);
      $params = array(
        'transaction_details' => array(
          'order_id' => $id_order,
          'gross_amount' => (int)$Totalharga,
        ),
        'customer_details' => array(
          'first_name' => $nama_depan,
          'last_name' => $nama_belakang,
          'email' => $email,
          'phone' => $ponsel,
        ),
        // Optional
        'item_details' => $item_details,

        'enabled_payments' => $enable_payments
      );

      $snapToken = \Midtrans\Snap::getSnapToken($params);
      $token = $snapToken;
      $data = [
        // proses bukti pembelian
        'id_pembelian' => $id_order,
        'id_user' => user()->id,
        'total_harga' => $Totalharga,
        'token' => $token
      ];
      $this->pembelianModel->save($data);
      $cart = \Config\Services::cart();
      // $cart->destroy();
      $data = [
        'barang' => $this->BarangModel->get_barang(),
        'cart' => \Config\Services::cart(),
        'kota' => $kota,
        'token' => $token
      ];
      $cart->destroy();
      return redirect()->to('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $token);
    }


    return view('pelanggan/view_cart/index', $data);
    session()->setFlashdata('pesan', 'Brhasil Update');
    return redirect()->to(base_url('pelanggan/cart'));
  }


  public function proses()
  {
    $nama_depan = $this->request->getVar('nama_depan');
    $nama_belakang = $this->request->getVar('nama_belakang');
    $email = $this->request->getVar('email');
    $ponsel = $this->request->getVar('ponsel');
    $nominal = $this->request->getVar('nominal');
    $id_order = time();


    $params = array(
      'transaction_details' => array(
        'order_id' => $id_order,
        'gross_amount' => $nominal,
      ),
      'customer_details' => array(
        'first_name' => $nama_depan,
        'last_name' => $nama_belakang,
        'email' => $email,
        'phone' => $ponsel,
      ),
    );
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    $token = $snapToken;
    $data = [
      // proses bukti pembelian
      'id_pembelian' => $id_order,
      'nama_depan' => $nama_depan,
      'nama_belakang' => $nama_belakang,
      'email' => $email,
      'ponsel' => $ponsel,
      'nominal' => $nominal,
      'token' => $token
    ];
    $this->pembelianModel->save($data);
    return redirect()->to(base_url('pelanggan/pembelian'));

  }

  public function delete($rowid)
  {
    $cart = \Config\Services::cart();
    $cart->remove($rowid);
    session()->setFlashdata('pesan', 'Barang Berhasil Di update !!!');
    return redirect()->to(base_url('pelanggan/cart'));
  }

  public function pembelian()
  {



    $cek = $this->pembelianModel->get_pembelian();
    $hasil = $cek->getResult();

    // foreach ($hasil as $h) {
    //   $notif =  \Midtrans\Transaction::status('9cfcfbad-9df9-4256-8d4c-bea0ffbb2b38');

    // var_dump($notif);
    // $transaction_status = $notif->transaction_status;
    // $fraud = $notif->fraud_status;
    // }


    // $status = \Midtrans\Transaction::status('9cfcfbad-9df9-4256-8d4c-bea0ffbb2b38');
    // var_dump($status);



    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
      'tagihan' => $this->pembelianModel->get_pembelian(),
    ];


    return view('pelanggan/view_cart/pembelian', $data);
  }



  public function transaksi()
  {
    // // Set your Merchant Server Key
    // \Midtrans\Config::$serverKey = 'SB-Mid-server-yzB1hCmarPWIlsMcXVV3gMjv';
    // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    // \Midtrans\Config::$isProduction = false;
    // // Set sanitization on (default)
    // \Midtrans\Config::$isSanitized = true;
    // // Set 3DS transaction for credit card to true
    // \Midtrans\Config::$is3ds = true;

    // $params = [
    //   'transaction_details' => array(
    //     'order_id' => rand(),
    //     'gross_amount' => 500000,
    //   )
    // ];

    // $data = [
    //   'snapToken' => \Midtrans\Snap::getSnapToken($params)
    // ];

    // return view('pelanggan/view_cart/transaksi', $data);
  }

  // public function save2()
  // {
  //   $validation = \Config\Services::validation();

  //   $data = [
  //     'Totalharga' => $this->request->getPost('Totalharga'),

  //   ];
  //   return redirect()->to(base_url('/pelanggan/pembelian'));
  // }

  public function save1($id_pembelian)
  {
    $data = [
      'Totalharga' => $this->request->getPost('Totalharga'),
    ];
    // return view('/pelanggan/cart', $data);
    return redirect()->to(base_url('pelanggan/pembelian'));
  }

  public function savetotal($id_pembelian)
  {
    $validation = \Config\Services::validation();


    $data = [
      'totalharga' => $this->request->getPost('Totalharga'),

    ];

    $this->pembelianModel->update_produk($data, $id_pembelian);
    // session()->setFlashdata('success', 'Data Berhasil Diupdate !!!');
    return redirect()->to(base_url('pelanggan/pembelian'));
  }


  public function smart($sip = null)
  {
    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
      'kriteria' => $this->KriteriaModel->get_kriteria(),
      'subkriteria' => $this->SubkriteriaModel->get_subkriteria_saja(),
      'perhitungan' => $sip
    ];

    return view('pelanggan/smart', $data);
  }

  public function hitung_smart()
  {
      $kriteria_harga = 7;
  $kriteria_ukuran = 2;
  $kriteria_motif = 41;
  $kriteria_jenis = 5;
  $kriteria_total = $kriteria_harga + $kriteria_ukuran + $kriteria_motif + $kriteria_jenis;

  $bobot_harga = number_format($kriteria_harga/55*100,2 );
  $bobot_ukuran = number_format($kriteria_ukuran/55*100,2) ;
  $bobot_motif = number_format($kriteria_motif/55*100,2) ;
  $bobot_jenis = number_format($kriteria_jenis/55*100,2) ;
  $bobot_total = $bobot_harga+$bobot_ukuran+$bobot_motif+$bobot_jenis ;

  $normalisasi_harga = number_format($bobot_harga/100,2 );
  $normalisasi_ukuran = number_format($bobot_ukuran/100,2) ;
  $normalisasi_motif = number_format($bobot_motif/100,2) ;
  $normalisasi_jenis = number_format($bobot_jenis/100,2) ;
  $normalisasi_total = $normalisasi_harga+$normalisasi_ukuran+$normalisasi_motif+$normalisasi_jenis ;



    if($this->request->getPost('1') != null)
    {
      $harga  = $this->request->getPost('1');
    }else{
      $harga = true;
    }

    if($this->request->getPost('2') != null)
    {
      $ukuran = $this->request->getPost('2');
    }else{
      $ukuran = true;
    }


    if($this->request->getPost('3') != null)
    {
      $motif  = $this->request->getPost('3');
    }else{
      $motif = true;
    }

    if($this->request->getPost('4') != null)
    { 
      $jenis  = $this->request->getPost('4');
    }else{
      $jenis = true;
    }
    

    // DATA PRODUK 
    $db      = \Config\Database::connect();
    $builder = $db->table('tbl_produk');
    $produk   = $builder->get()->getResultArray();

   

    foreach($produk as $p)
    {
      
      $id_produk = $p['id_produk'];
      $kriteria_produk = $db->table('tbl_kriteria_produk')->select('*')->join('tbl_kriteria', 'tbl_kriteria.id_kriteria = tbl_kriteria_produk.id_kriteria')->join('tbl_produk', 'tbl_produk.id_produk = tbl_kriteria_produk.id_produk')->where('tbl_produk.id_produk',$id_produk)->get()->getResultArray();

      foreach($kriteria_produk as $kp)
      {
        $produk_baru['id_produk'] = $kp['id_produk'];
        $range_depan_kp = $kp['range_depan_kp'];
        $range_belakang_kp = $kp['range_belakang_kp'];
        $nama_kriteria_produk = $kp['nama_kriteria'];
        $id_kriteria = $kp['id_kriteria'];
        $newString = str_replace(' ', '_', $nama_kriteria_produk);
        $range_depan_kp_c = $newString.'_range_depan_kp';
        $range_belakang_kp_c = $newString.'_range_belakang_kp';
        $id_kriteria_dua = 'id_'.$newString.'_range_belakang_kp';
        $produk_baru[$range_depan_kp_c] =  $range_depan_kp;
        $produk_baru[$range_belakang_kp_c] =  $range_belakang_kp;
        $produk_baru[$id_kriteria_dua] =  $id_kriteria;
      } 

      $sp[] = $produk_baru;
    }



foreach($sp as $semua)
{

//  Harga
$cekHarga = $db->table('tbl_subkriteria')->where('id_kriteria', '1')->get()->getResultArray();
foreach($cekHarga as $ch)
{
$harga = $semua['Harga_range_depan_kp'];

  if($ch['range_depan_subkriteria'] == '>' )
  {
    $harga_belakang =  $ch["range_belakang_subkriteria"];
    if($harga >= $harga_belakang )
    {
      $semua['nilai_harga'] = $ch["nilai_subkriteria"];
    }
  }
  elseif($ch['range_depan_subkriteria'] == '<' )
  {
    $harga_belakang =  $ch["range_belakang_subkriteria"];
    if($harga <= $harga_belakang )
    {
      $semua['nilai_harga'] = $ch["nilai_subkriteria"];

    }

  }else{
    $harga_depan= $ch['range_depan_subkriteria'];
    $harga_belakang= $ch['range_belakang_subkriteria'];
    if($harga >= $harga_depan AND $harga <= $harga_belakang )
    {
      $semua['nilai_harga'] = $ch["nilai_subkriteria"];

    }
    
  }
  $semua['n_harga'] =  number_format($bobot_harga / $bobot_total,2);
  error_reporting(0);
  $harga_array[] = $semua['nilai_harga'];
  $harga_max = max($harga_array);
  $harga_min = min($harga_array);
  $harga_hasil = $harga_hasil =0 ?($max - $semua['nilai_harga'])/$max - $min:0;
  $semua['harga_hasil'] =  $harga_hasil;
  $u_x_n_harga = number_format($bobot_harga / $bobot_total,2) *  $harga_hasil;
  $semua['u_x_n_harga'] =  $u_x_n_harga;

}

$sip2[] = $semua;

}




foreach($sip2 as $semua)
{

  $cekUkuran = $db->table('tbl_subkriteria')->where('id_kriteria', '2')->get()->getResultArray();
  foreach($cekUkuran as $cu)
  {
    $ukuran_depan = $semua['Ukuran_range_depan_kp'];
    $ukuran_belakang = $semua['Ukuran_range_belakang_kp'];
    $u_depan = $cu['range_depan_subkriteria'];
    $u_belakang = $cu['range_belakang_subkriteria'];

    if( $ukuran_depan  === '>' )
    {

      if($ukuran_belakang >= $u_belakang && $ukuran_belakang >= $u_belakang)
      {
        $semua['nilai_ukuran'] = $cu["nilai_subkriteria"];
      }
    }
    elseif( $ukuran_depan === '<' )
    {
      if($ukuran_belakang <= $u_depan && $ukuran_belakang <= $u_belakang)
      {
        $semua['nilai_ukuran'] = $cu["nilai_subkriteria"];
     
      }
    }else{
      // echo $u_depan .'-'. $u_belakang."<br>";
      if($ukuran_depan >= $u_depan && $ukuran_belakang <= $u_belakang )
      {
        $semua['nilai_ukuran'] = $cu["nilai_subkriteria"];

      }
    }
    $semua['n_ukuran'] =  number_format($bobot_ukuran / $bobot_total,2);
    error_reporting(0);
    $ukuran_array[] = $semua['nilai_ukuran'];
    $ukuran_max = max($ukuran_array);
    $ukuran_min = min($ukuran_array);
    error_reporting(0);
    $hitung = ($semua['nilai_ukuran'] - $ukuran_min);
    if($hitung  == 0){
      $ukuran_hasil = 0;
    }else{
     $ukuran_hasil = $hitung / ($ukuran_max - $ukuran_min);
    };
    $semua['ukuran_hasil'] =  number_format($ukuran_hasil,2);
    $u_x_n_ukuran = number_format($bobot_ukuran / $bobot_total,2) *  $ukuran_hasil;
    $semua['u_x_n_ukuran'] =  $u_x_n_ukuran;
  }
 
  $sip3[] = $semua;

}


foreach($sip3 as $semua)
{
      // Cek Motif
    $cekMotif = $db->table('tbl_subkriteria')->where('id_kriteria', '3')->get()->getResultArray();
    foreach($cekMotif as $cm)
    {
      
      $motif = $semua['Motif_range_depan_kp'];
      $motifCek = $cm['range_depan_subkriteria'];

      if($motif === $motifCek)
      {
        $semua['nilai_motif'] = $cu["nilai_subkriteria"];
      }

     
    }
      $semua['n_motif'] =  number_format($bobot_motif / $bobot_total,2);
      error_reporting(0);
      $motif_array = [$semua['nilai_motif']];
      $motif_max = max($motif_array);
      $motif_min = min($motif_array);
      error_reporting(0);
      $hitung = ($semua['nilai_motif'] - $motif_min);
      if($hitung  == 0){
        $motif_hasil = 0;
      }else{
      $motif_hasil = $hitung / ($motif_max - $motif_min);
      };
      $semua['motif_hasil'] =  number_format($motif_hasil,2);
      $u_x_n_motif = number_format($bobot_motif / $bobot_total,2) *  $motif_hasil;
      $semua['u_x_n_motif'] =  $u_x_n_motif;
    $sip4[] = $semua;
  
}
foreach($sip4 as $semua)
{
  // cek Jenis
$cekJenis = $db->table('tbl_subkriteria')->where('id_kriteria', '4')->get()->getResultArray();
foreach($cekJenis as $cj)
{
  $jenis = $semua['Motif_range_depan_kp'];
  $jenis_cek = $cj['range_depan_subkriteria'];

  if($jenis === $jenis_cek)
  {
    $semua['nilai_jenis'] = $cu["nilai_subkriteria"];
  }
}
$semua['n_jenis'] =  number_format($bobot_jenis / $bobot_total,2);
error_reporting(0);
$jenis_array = [$semua['nilai_jenis']];
$jenis_max = max($jenis_array);
$jenis_min = min($jenis_array);
error_reporting(0);
$hitung = ($semua['nilai_jenis'] - $jenis_min);
if($hitung  == 0){
  $jenis_hasil = 0;
}else{
$jenis_hasil = $hitung / ($jenis_max - $jenis_min);
};
$semua['jenis_hasil'] =  number_format($jenis_hasil,2);
$u_x_n_jenis = number_format($bobot_jenis / $bobot_total,2) *  $jenis_hasil;
$semua['u_x_n_jenis'] =  $u_x_n_jenis;
$sip5[] = $semua;
}
foreach($sip5 as $semua)
{
  $semua['hasil'] =   $semua['u_x_n_harga'] + $semua['u_x_n_ukuran']+ $semua['u_x_n_motif'] + $semua['u_x_n_jenis'];
  $sip7[] = $semua;
}

return $this->smart($sip7);
}















  public function cekmidtrans()
  {
  }



}
