<?php

namespace App\Controllers;

use \App\Models\ProdukModel;
use App\Controllers\BaseController;
use App\Models\PembelianModel;
use App\Models\PemesananModel;
use App\Models\UsersModel;
use \App\Models\KriteriaModel;
use App\Models\ProdukKriteriaModel;
use Myth\Auth\Models\UserModel;

class Disperindagkop extends BaseController
{
  protected $helpers = ['custom'];
  protected $produk;
  protected $pembelianModel;
  protected $pemesananModel;
  protected $userModel;
  protected $produkKriteriaModel;
  protected $KriteriaModel;

  public function __construct()
  {
    helper('form');
    $this->produk = new ProdukModel();
    $this->pembelianModel = new PembelianModel();
    $this->pemesananModel = new PemesananModel();
    $this->userModel = new UserModel();
    $this->produkKriteriaModel = new ProdukKriteriaModel();
    $this->KriteriaModel = new KriteriaModel();
  }
  
  public function index()
  {
    $data = [
      'data_produk' => $this->produk->countAllResults(),
      'data_pesanan' => $this->pemesananModel->countAllResults(),
    ];

    return view('disperindagkop/home_disperidagkop', $data);
  }

  public function laporan_produk()
  {
    $data['produks'] = $this->produk->getAll();

    return view('disperindagkop/laporan_d_produk/index', $data);
  }

  public function laporan_ikm()
  {
    return view('disperindagkop/laporan_d_ikm/index');
  }

  public function laporan_P_ikm()
  {
    return view('disperindagkop/laporan_p_ikm/index');
  }

  public function laporan_transaksi()
  {
    return view('disperindagkop/laporan_transaksi/index');
  }
}
