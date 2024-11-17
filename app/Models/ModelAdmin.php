<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin  extends Model
{
    public function jmlLabkom()
    {
        return $this->db->table('data_labkom')
            ->countAll();
    }

    public function jmlKategori()
    {
        return $this->db->table('data_kategori_barang')
            ->countAll();
    }
}
