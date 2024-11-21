<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeprog  extends Model
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

    public function jmlPengelolaan()
    {
        return $this->db->table('data_barang')
            ->countAll();
    }

    public function jmlPengajuan()
    {
        return $this->db->table('data_pengajuan_barang')
            ->countAll();
    }

    public function getAllLabkom()
    {
        return $this->db->table('data_labkom')->get()->getResultArray();
    }

    public function getAllPengelolaan()
    {
        return $this->db->table('data_barang')->get()->getResultArray();
    }

    public function getAllPengajuan()
    {
        return $this->db->table('data_pengajuan_barang')->get()->getResultArray();
    }

    public function allData()
    {
        return $this->db->table('data_pengajuan_barang')
            ->select('data_pengajuan_barang.*, data_kategori_barang.nama_kategori_barang, data_labkom.nama as labkom_nama')
            ->join('data_kategori_barang', 'data_pengajuan_barang.id_kategori_barang = data_kategori_barang.id', 'left')
            ->join('data_labkom', 'data_pengajuan_barang.id_labkom = data_labkom.id', 'left')
            ->orderBy('data_pengajuan_barang.id', 'ASC')
            ->get()->getResultArray();
    }

    public function verifPengajuan($data)
    {
        $this->db->table('data_pengajuan_barang')
            ->where('id', $data['id'])
            ->update($data);
    }
}
