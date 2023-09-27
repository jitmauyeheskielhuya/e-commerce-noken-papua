<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
  protected $table          = 'tbl_pembelian';
  protected $primaryKey     = 'id_pembelian';
  protected $allowedFields  = ['total_harga', 'id_user'];
  protected $useTimestamps  = true;
  protected $useSoftDeletes = false;

  public function getAll()
  {
    $builder = $this->table('tbl_pembelian');
    $builder->select('*');
    $builder->join('users', 'users.id = tbl_pembelian.id_user');
    $query = $builder->get();
    return $query->getResult();
  }
}
