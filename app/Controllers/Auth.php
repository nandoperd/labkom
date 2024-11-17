<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    // mendeklarasikan form pada v_login agar bisa berjalan
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        return view('home');
    }

        // cek login 
        public function cek_login()
        {
    
            if ($this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi'
                    ]
                ],
                'level' => [
                    'label' => 'Level',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi!'
                    ]
                ]
            ])) {
                //jika valid
                $level = $this->request->getPost('level');
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
    
                if ($level == 1) {
                    $cek_user = $this->ModelAuth->login_user($username, $password);
                    if ($cek_user) {
                        session()->set('username', $cek_user['username']);
                        session()->set('level', $level);
                        return redirect()->to(base_url('admin'));
                    }
                } elseif ($level == 2) {
                    $cek_keprog = $this->ModelAuth->login_keprog($username, $password);
                    if ($cek_keprog) {
                        session()->set('username', $cek_keprog['username']);
                        session()->set('level', $level);
                        return redirect()->to(base_url('keprog'));
                    } else {
                        session()->setFlashdata('pesan', 'Login gagal, Username atau Password tidak sesuai');
                        return redirect()->to(base_url('auth'));
                    }
                } elseif ($level == 3) {
                    $cek_kepsek = $this->ModelAuth->login_kepsek($username, $password);
                    if ($cek_kepsek) {
                        session()->set('username', $cek_kepsek['username']);
                        session()->set('level', $level);
                        return redirect()->to(base_url('kepsek'));
                    } else {
                        session()->setFlashdata('pesan', 'Login gagal, Username atau Password tidak sesuai');
                        return redirect()->to(base_url('auth'));
                    }
                } else {
                    session()->setFlashdata('pesan', 'Login gagal, Username atau Password tidak sesuai');
                    return redirect()->to(base_url('auth'));
                }
                
    
            } else {
                //errors notification
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('auth/index'));
            }
        }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('level');
        session()->setFlashdata('sukses', 'Logout berhasil');
        return redirect()->to(base_url('auth'));
    }
}
