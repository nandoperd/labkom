<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth  extends Model
{
        public function login_user($username, $password)
        {
                return $this->db->table('admin')->where([
                        'username' => $username,
                        'password' => $password
                ])->get()->getRowArray();
        }

        public function login_keprog($username, $password)
        {
                return $this->db->table('auth_keprog')->where([
                        'username' => $username,
                        'password' => $password
                ])->get()->getRowArray();
        }

        public function login_kepsek($username, $password)
        {
                return $this->db->table('auth_kepsek')->where([
                        'username' => $username,
                        'password' => $password
                ])->get()->getRowArray();
        }
}
