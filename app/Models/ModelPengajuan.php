<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengajuan  extends Model
{
    public function allData()
    {
        return $this->db->table('data_pengajuan_barang')
            ->select('data_pengajuan_barang.*, data_kategori_barang.nama_kategori_barang, data_labkom.nama as labkom_nama')
            ->join('data_kategori_barang', 'data_pengajuan_barang.id_kategori_barang = data_kategori_barang.id', 'left')
            ->join('data_labkom', 'data_pengajuan_barang.id_labkom = data_labkom.id', 'left')
            ->orderBy('data_pengajuan_barang.id', 'ASC')
            ->get()->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('data_pengajuan_barang')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('data_pengajuan_barang')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('data_pengajuan_barang')
            ->where('id', $data['id'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('data_pengajuan_barang')
            ->where('id', $data['id'])->delete($data);
    }

    public function dataLabkom()
    {
        return $this->db->table('data_labkom')
            ->select('data_labkom.id, data_labkom.nama, data_pengajuan_barang.id_labkom')
            ->join('data_pengajuan_barang', 'data_pengajuan_barang.id_labkom = data_labkom.id', 'left')
            ->orderBy('data_labkom.nama', 'ASC')
            ->get()->getResultArray();
    }

    public function dataKategori()
    {
        return $this->db->table('data_kategori_barang')
            ->select('data_kategori_barang.id, data_kategori_barang.nama_kategori_barang, data_pengajuan_barang.id_kategori_barang')
            ->join('data_pengajuan_barang', 'data_pengajuan_barang.id_kategori_barang = data_kategori_barang.id', 'left')
            ->orderBy('data_kategori_barang.nama_kategori_barang', 'ASC')
            ->get()->getResultArray();
    }
}
