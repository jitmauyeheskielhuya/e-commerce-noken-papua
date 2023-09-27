<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkriteriaModel extends Model
{
  protected $table      = 'tbl_subkriteria';
  protected $primaryKey = 'id_subkriteria';
  protected $allowedFields = ['nama_sukriteria', 'nilai_subkriteria'];
  protected $useTimestamps = true;

  public function get_subkriteria()
  {
    return $this->db->table('tbl_subkriteria')->select('*')->join('tbl_kriteria', 'tbl_kriteria.id_kriteria = tbl_subkriteria.id_kriteria')->get()->getResultArray();

  }

  public function get_subkriteria_saja()
  {
    return $this->db->table('tbl_subkriteria')->get()->getResultArray();

  }


  public function tambah_subkriteria($data)
  {
    return $this->db->table('tbl_subkriteria')->insert($data);
  }

  public function edit_subkriteria($id_subkriteria)
  {
    return $this->db->table('tbl_subkriteria')->select('*')->join('tbl_kriteria', 'tbl_kriteria.id_kriteria = tbl_subkriteria.id_kriteria')->where('id_subkriteria', $id_subkriteria)->get()->getRowArray();
  }

  public function update_subkriteria($data, $id_subkriteria)
  {
    return $this->db->table('tbl_subkriteria')->update($data, array('id_subkriteria' => $id_subkriteria));
  }

  public function delete_subkriteria($id_subkriteria)
  {
    return $this->db->table('tbl_subkriteria')->delete(array('id_subkriteria' => $id_subkriteria));
  }
}
