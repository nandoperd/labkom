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

    public function jmlBarang()
    {
        return $this->db->table('data_barang')
            ->countAll();
    }

    public function jmlPengelolaan()
    {
        return $this->db->table('data_pengelolaan_barang')
            ->countAll();
    }

    public function jmlPengajuan()
    {
        return $this->db->table('data_pengajuan_barang')
            ->countAll();
    }
}
