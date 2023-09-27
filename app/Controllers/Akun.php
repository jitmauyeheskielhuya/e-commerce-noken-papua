<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Akun extends BaseController
{
  private $_user_model;
  public function __construct()
  {
    $this->_user_model = new UsersModel();
  }

  public function akun_baru()
  {
    $data_user = $this->_user_model->getUser();
    // dd($data_user);
    $data = [
      "result" => $data_user
    ];

    return view('admin/akun_baru/index', $data);
  }
}
