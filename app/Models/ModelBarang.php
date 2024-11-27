<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang  extends Model
{
    public function allData()
    {
        return $this->db->table('data_barang')
            ->select('data_barang.*, data_kategori_barang.nama_kategori_barang as kategori_nama')
            ->join('data_kategori_barang', 'data_barang.id_kategori_barang = data_kategori_barang.id', 'left')
            ->orderBy('id', 'ASC')
            ->get()->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('data_barang')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('data_barang')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('data_barang')
            ->where('id', $data['id'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('data_barang')
            ->where('id', $data['id'])->delete($data);
    }

    public function dataKategori()
    {
        return $this->db->table('data_kategori_barang')
            ->select('data_kategori_barang.id, data_kategori_barang.nama_kategori_barang, data_barang.id_kategori_barang')
            ->join('data_barang', 'data_barang.id_kategori_barang = data_kategori_barang.id', 'left')
            ->orderBy('data_kategori_barang.nama_kategori_barang', 'ASC')
            ->get()->getResultArray();
    }
}
