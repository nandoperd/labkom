<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengelolaan  extends Model
{
    public function allData()
    {
        return $this->db->table('data_pengelolaan_barang')
            ->select('data_pengelolaan_barang.*, data_barang.nama_barang, data_kategori_barang.nama_kategori_barang, data_labkom.nama as labkom_nama')
            ->join('data_barang', 'data_pengelolaan_barang.id_barang = data_barang.id', 'left')
            ->join('data_kategori_barang', 'data_pengelolaan_barang.id_kategori_barang = data_kategori_barang.id', 'left')
            ->join('data_labkom', 'data_pengelolaan_barang.id_labkom = data_labkom.id', 'left')
            ->orderBy('data_pengelolaan_barang.id', 'ASC')
            ->get()->getResultArray();
    }

    // public function detailData($id)
    // {
    //     return $this->db->table('data_pengelolaan_barang')
    //         ->where('id', $id)
    //         ->get()->getRowArray();
    // }
    public function detailData($id)
    {
        return $this->db->table('data_pengelolaan_barang')->where('id', $id)->get()->getRowArray();
    }
    
    public function add($data)
    {
        $this->db->table('data_pengelolaan_barang')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('data_pengelolaan_barang')
            ->where('id', $data['id'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('data_pengelolaan_barang')
            ->where('id', $data['id'])->delete($data);
    }

    // public function dataLabkom()
    // {
    //     return $this->db->table('data_labkom')
    //         ->select('data_labkom.id, data_labkom.nama, data_pengelolaan_barang.id_labkom')
    //         ->join('data_pengelolaan_barang', 'data_pengelolaan_barang.id_labkom = data_labkom.id', 'left')
    //         ->orderBy('data_labkom.nama', 'ASC')
    //         ->get()->getResultArray();
    // }

    public function dataLabkom()
    {
        return $this->db->table('data_labkom')
            ->select('id, nama')
            ->orderBy('nama', 'ASC')
            ->get()->getResultArray();
    }

    public function dataKategori()
    {
        return $this->db->table('data_kategori_barang')
            ->select('data_kategori_barang.id, data_kategori_barang.nama_kategori_barang, data_pengelolaan_barang.id_kategori_barang')
            ->join('data_pengelolaan_barang', 'data_pengelolaan_barang.id_kategori_barang = data_kategori_barang.id', 'left')
            ->orderBy('data_kategori_barang.nama_kategori_barang', 'ASC')
            ->get()->getResultArray();
    }

    public function getBarangByKategori($id_kategori_barang)
    {
        return $this->db->table('data_barang')
            ->where('id_kategori_barang', $id_kategori_barang)
            ->orderBy('nama_barang', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function dataPilihKategori()
    {
        return $this->db->table('data_kategori_barang')
            ->select('id, nama_kategori_barang')
            ->orderBy('nama_kategori_barang', 'ASC')
            ->get()->getResultArray();
    }
}
