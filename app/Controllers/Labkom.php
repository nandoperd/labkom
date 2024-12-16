<?php

namespace App\Controllers;

use App\Models\ModelLabkom;

use App\Controllers\BaseController;

class Labkom extends BaseController
{
    protected $ModelLabkom;

    public function __construct()
    {
        helper('form');
        $this->ModelLabkom = new ModelLabkom();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Labkom',
            'd' => $this->ModelLabkom->allData(),
        ];
        return view('labkom/v_index', $data);
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
            $this->ModelLabkom->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('labkom'));
        } else {
            //if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('labkom'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Labkom',
            'data' => $this->ModelLabkom->allData(),
            'd' => $this->ModelLabkom->detailData($id)
        ];
        return view('labkom/v_edit', $data);
    }

    public function update($id)
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama Labkom',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'kepala_lab' => [
                'label' => 'Kepala Lab',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
        ])) {
            $data = array(
                'id' => $id,
                'nama' => $this->request->getPost('nama'),
                'kepala_lab' => $this->request->getPost('kepala_lab'),
            );
            $this->ModelLabkom->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('labkom'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('labkom/edit/' . $id));
        }
    }

    public function delete($id)
    {
        $data = [
            'id' => $id,
        ];
        $this->ModelLabkom->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('labkom'));
    }

    public function detail($id)
    {
        $data_labkom = $this->ModelLabkom->detailData($id); // Ambil data spesifik dari data_labkom
        $data_pengelolaan = $this->ModelLabkom->getDataPengelolaan($id); // Ambil data dari data_pengelolaan_barang

        $data = [
            'title' => 'Detail Data',
            'd' => $data_labkom, // Data dari data_labkom
            'pengelolaan' => $data_pengelolaan // Data dari data_pengelolaan_barang
        ];

        return view('labkom/v_detail', $data);
    }

}
