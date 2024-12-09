<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLabkom  extends Model
{
    public function allData()
    {
        return $this->db->table('data_labkom')
            ->orderBy('id', 'ASC')
            ->get()->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('data_labkom')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('data_labkom')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('data_labkom')
            ->where('id', $data['id'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('data_labkom')
            ->where('id', $data['id'])->delete($data);
    }

    public function getDataPengelolaan($id_labkom)
{
    return $this->db->table('data_pengelolaan_barang')
    ->select('data_pengelolaan_barang.*, data_barang.nama_barang, data_kategori_barang.nama_kategori_barang, data_labkom.nama as labkom_nama')
            ->join('data_barang', 'data_pengelolaan_barang.id_barang = data_barang.id', 'left')
            ->join('data_kategori_barang', 'data_pengelolaan_barang.id_kategori_barang = data_kategori_barang.id', 'left')
            ->join('data_labkom', 'data_pengelolaan_barang.id_labkom = data_labkom.id', 'left')
        ->where('id_labkom', $id_labkom)
        ->get()->getResultArray();
}
}
