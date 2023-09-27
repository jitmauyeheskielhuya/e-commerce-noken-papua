<?php

namespace App\Models;

use CodeIgniter\Model;

$db      = \Config\Database::connect();

class ProdukKriteriaModel extends Model
{
  protected $table      = 'tbl_kriteria_produk';
  protected $primaryKey = 'id_kriteria_produk';
  protected $allowedFields = ['range_depan_kp', 'range_belakang_kp','satuan_kp','id_produk','id_kriteria','id_kriteria_produk'];
  protected $useTimestamps = true;

  public function get_kriteria_produk($id_produk)
  {
    return $this->db->table('tbl_kriteria_produk')->select('*')->join('tbl_kriteria', 'tbl_kriteria.id_kriteria = tbl_kriteria_produk.id_kriteria')->where('tbl_kriteria_produk.id_produk', $id_produk)->get()->getResultArray();
  }

  public function tambah_kriteria_produk($data)
  {
    return $this->db->table('tbl_kriteria_produk')->insert($data);
  }

  public function edit_kriteria_produk($id_kriteria_produk)
  {
     return $this->db->table('tbl_kriteria_produk')->select('*')->join('tbl_kriteria', 'tbl_kriteria.id_kriteria = tbl_kriteria_produk.id_kriteria')->where('tbl_kriteria_produk.id_kriteria_produk', $id_kriteria_produk)->get()->getRowArray();
  }

  public function update_produk_kriteria($data, $id_kriteria_produk)
  {
    return $this->db->table('tbl_kriteria_produk')->update($data, array('id_kriteria_produk' => $id_kriteria_produk));
  }

  public function delete_kriteria_produk($id_kriteria_produk)
  {
    return $this->db->table('tbl_kriteria_produk')->delete(array('id_kriteria_produk' => $id_kriteria_produk));
  }
}
