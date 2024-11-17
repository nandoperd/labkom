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
}
