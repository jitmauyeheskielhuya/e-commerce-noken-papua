<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
  protected $table      = 'tbl_kriteria';
  protected $primaryKey = 'id_kriteria';
  protected $allowedFields = ['nama_kriteria', 'bobot_kriteria'];
  protected $useTimestamps = true;

  public function get_kriteria()
  {
    return $this->db->table('tbl_kriteria')->get()->getResultArray();
  }

  public function tambah_kriteria($data)
  {
    return $this->db->table('tbl_kriteria')->insert($data);
  }

  public function edit_kriteria($id_kriteria)
  {
    return $this->db->table('tbl_kriteria')->where('id_kriteria', $id_kriteria)->get()->getRowArray();
  }

  public function update_kriteria($data, $id_kriteria)
  {
    return $this->db->table('tbl_kriteria')->update($data, array('id_kriteria' => $id_kriteria));
  }

  public function delete_kriteria($id_kriteria)
  {
    return $this->db->table('tbl_kriteria')->delete(array('id_kriteria' => $id_kriteria));
  }
}
