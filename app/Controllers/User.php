<?php

namespace App\Controllers;

class User extends BaseController
{
  public function index()
    {
    if (in_groups("admin")) {
      return redirect('admin');
        } elseif ((in_groups("pengrajin"))) {
      return redirect('pengrajin');
    } elseif ((in_groups("disperindagkop"))) {
      return redirect('disperindagkop');
    } elseif ((in_groups("pelanggan"))) {
      return redirect('pelanggan');
    }
    return  'user/index';
  }

  
}
