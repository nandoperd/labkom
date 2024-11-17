<?php

namespace App\Controllers;

use App\Models\ModelPengajuan;

use App\Controllers\BaseController;

class Pengajuan extends BaseController
{
    protected $ModelPengajuan;

    public function __construct()
    {
        helper('form');
        $this->ModelPengajuan = new ModelPengajuan();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengelolaan Barang',
            'd' => $this->ModelPengajuan->allData(),
        ];
        return view('pengajuan/v_index', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama Labkom',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'kepala_lab' => [
                'label' => 'Kepala Lab',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
        ])) {
            //if valid
            $data = [
                'nama' => $this->request->getPost('nama'),
                'kepala_lab' => $this->request->getPost('kepala_lab'),
            ];
            $this->ModelPengajuan->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('pengajuan'));
        } else {
            //if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengajuan'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Labkom',
            'data' => $this->ModelPengajuan->allData(),
            'd' => $this->ModelPengajuan->detailData($id)
        ];
        return view('pengajuan/v_edit', $data);
    }

    public function update($id)
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
        ])) {
            $data = array(
                'id' => $id,
                'nama' => $this->request->getPost('nama'),
            );
            $this->ModelPengajuan->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('data'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('data/edit/' . $id));
        }
    }

    public function delete($id)
    {
        $data = [
            'id' => $id,
        ];
        $this->ModelPengajuan->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('pengajuan'));
    }

}
