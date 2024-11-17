<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{    // mendeklarasikan form pada v_login agar bisa berjalan
    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Labkom',
            'jmlLabkom' => $this->ModelAdmin->jmlLabkom(),
            'jmlKategori' => $this->ModelAdmin->jmlKategori(),
        ];
        return view('admin/v_index', $data);
    }
}