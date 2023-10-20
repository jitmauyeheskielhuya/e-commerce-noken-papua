<?php

namespace App\Models;

use CodeIgniter\Model;

$db      = \Config\Database::connect();

class ProdukModel extends Model
{
  protected $table      = 'tbl_produk';
  protected $primaryKey = 'id_produk';
  protected $retrnType  = 'object';
  protected $allowedFields = ['nama_kriteria', 'bobot_kriteria', 'gambar_noken', 'ukuran_noken', 'motif_noken', 'jenis_noken', 'id_pengrajin', 'tgl_daftar'];
  protected $useTimestamps = true;

  public function getAll()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('tbl_produk');
    $builder->join('users', 'users.id = tbl_produk.id_pengrajin');
    $query = $builder->get();
    return $query->getResult();
  }

  public function get_produk()
  {
    $db      = \Config\Database::connect();
    // return $this->db->table('tbl_produk')->get()->getResultArray();
    $builder = $db->table('tbl_produk');
    $builder->select('*');
    $builder->join('users', 'users.id = tbl_produk.id_pengrajin');
    $builder->where('users.id', user()->id);
    return $query = $builder->get()->getResultArray();
  }

  public function tambah_produk($data)
  {
    return $this->db->table('tbl_produk')->insert($data);
  }

  public function edit_produk($id_produk)
  {
    return $this->db->table('tbl_produk')->where('id_produk', $id_produk)->get()->getRowArray();
  }

  public function update_produk($data, $id_produk)
  {
    return $this->db->table('tbl_produk')->update($data, array('id_produk' => $id_produk));
  }

  public function delete_produk($id_produk)
  {
    return $this->db->table('tbl_produk')->delete(array('id_produk' => $id_produk));
  }



}
