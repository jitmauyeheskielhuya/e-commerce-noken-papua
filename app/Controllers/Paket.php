<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Paket extends BaseController
{
  public function index()
  {
    return view('pelanggan/view_cart/checkout');
  }

  public function dataprov()
  {
    return view('pelanggan/view_cart/dataprov');
  }

  public function distrik()
  {
    return view('pelanggan/view_cart/datadistrik');
  }

  public function ekspedisi()
  {
    return view('pelanggan/view_cart/dataekspedisi');
  }

  public function datapaket()
  {
    return view('pelanggan/view_cart/datapaket');
  }
}
