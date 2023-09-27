<?php

namespace App\Controllers;

class Disperindagkop extends BaseController
{
  public function index()
  {
    return view('disperindagkop/home_disperidagkop');
  }

  public function laporan_produk()
  {
    return view('disperindagkop/laporan_d_produk/index');
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
