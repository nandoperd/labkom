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
            'jmlBarang' => $this->ModelAdmin->jmlBarang(),
            'jmlPengelolaan' => $this->ModelAdmin->jmlPengelolaan(),
            'jmlPerbaikan' => $this->ModelAdmin->jmlPerbaikan(),
            'jmlPengajuan' => $this->ModelAdmin->jmlPengajuan(),
        ];
        return view('admin/v_index', $data);
    }
}