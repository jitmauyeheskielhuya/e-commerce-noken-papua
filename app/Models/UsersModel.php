<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\FuncCall;

class UsersModel extends Model
{
  // nama tabel
  protected $table            = 'users';
  // protected $primaryKey       = 'id';
  protected $userTimestamps   = true;
  protected $useSoftDeletes   = true;
  protected $allowedField     = ['email', 'username', 'password_hash', 'active'];

  public function getUser()
  {
    return $this->select('email,username, gs.group_id, g.name group_name')
      ->join('auth_groups_users gs', 'users.id=gs.user_id')
      ->join('auth_groups g', 'g.id = gs.group_id')
      ->findAll();
  }
}
