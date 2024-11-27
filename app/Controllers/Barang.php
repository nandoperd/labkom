<?php

namespace App\Controllers;

use App\Models\ModelBarang;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    protected $ModelBarang;

    public function __construct()
    {
        helper('form');
        $this->ModelBarang = new ModelBarang();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'd' => $this->ModelBarang->allData(),
            'kategori' => $this->ModelBarang->dataKategori()
        ];
        return view('barang/v_index', $data);
    }

    public function add()
    {
        if ($this->validate([
            'id_kategori_barang' => [
                'label' => 'Kategori Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'nama_barang' => [
                'label' => 'Nama Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'kode_barang' => [
                'label' => 'Kode Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
        ])) {
            //if valid
            $data = [
                'id_kategori_barang' => $this->request->getPost('id_kategori_barang'),
                'nama_barang' => $this->request->getPost('nama_barang'),
                'kode_barang' => $this->request->getPost('kode_barang'),
            ];
            $this->ModelBarang->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('barang'));
        } else {
            //if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('barang'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Labkom',
            'data' => $this->ModelBarang->allData(),
            'd' => $this->ModelBarang->detailData($id)
        ];
        return view('barang/v_edit', $data);
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
            $this->ModelBarang->edit($data);
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
        $this->ModelBarang->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('barang'));
    }

}
