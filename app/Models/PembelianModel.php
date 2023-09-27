<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
  protected $table            = 'tbl_pembelian';
  protected $primaryKey       = 'id_pembelian';
  protected $useAutoIncrement = false;
  protected $returnType       = 'object';
  protected $useSoftDeletes   = true;
  protected $protectFields    = false;
  protected $allowedFields    = [];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  public function get_pembelian()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('tbl_pembelian');
    $builder->select('*');
    $builder->join('users', 'tbl_pembelian.id_user = users.id');
    $builder->where('users.id', user()->id);
    return $builder->orderBy('id_pembelian', 'DESC')->get();
  }

  // public function save1($id_pembelian)
  // {
  //   return $this->db->table('tbl_pembelian')->where('id_pembelian', $id_pembelian)->get()->getRowArray();
  // }

  public function savetotal($data, $id_pembelian)
  {
    return $this->db->table('tbl_pembelian')->update($data, array('id_pembelian' => $id_pembelian));
  }
}
