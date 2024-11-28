<?php

namespace App\Controllers;

use App\Models\ModelPengelolaan;

use App\Controllers\BaseController;

class Pengelolaan extends BaseController
{
    protected $ModelPengelolaan;

    public function __construct()
    {
        helper('form');
        $this->ModelPengelolaan = new ModelPengelolaan();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengelolaan Barang',
            'd' => $this->ModelPengelolaan->allData(),
            'labkom' => $this->ModelPengelolaan->dataLabkom(),
            'kategori' => $this->ModelPengelolaan->dataKategori()
        ];
        return view('pengelolaan/v_index', $data);
    }

    public function add()
    {
        if ($this->validate([
            'id_labkom' => [
                'label' => 'Labkom',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'id_kategori_barang' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'id_barang' => [
                'label' => 'Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'tgl_barang_masuk' => [
                'label' => 'Tanggal barang masuk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'kd_perolehan_brg' => [
                'label' => 'Sumber pengadaan barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'catatan' => [
                'label' => 'Catatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
        ])) {
            //if valid
            $data = [
                'id_labkom' => $this->request->getPost('id_labkom'),
                'id_kategori_barang' => $this->request->getPost('id_kategori_barang'),
                'id_barang' => $this->request->getPost('id_barang'),
                'tgl_barang_masuk' => $this->request->getPost('tgl_barang_masuk'),
                'kd_perolehan_brg' => $this->request->getPost('kd_perolehan_brg'),
                'kondisi' => $this->request->getPost('kondisi'),
                'catatan' => $this->request->getPost('catatan'),
                'status' => $this->request->getPost('status'),
            ];
            $this->ModelPengelolaan->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('pengelolaan'));
        } else {
            //if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengelolaan'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Labkom',
            'data' => $this->ModelPengelolaan->allData(),
            'd' => $this->ModelPengelolaan->detailData($id)
        ];
        return view('pengelolaan/v_edit', $data);
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
            $this->ModelPengelolaan->edit($data);
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
        $this->ModelPengelolaan->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('pengelolaan'));
    }

    public function getBarangByKategori($id_kategori_barang)
    {
        $data_barang = $this->ModelPengelolaan->getBarangByKategori($id_kategori_barang);
        return $this->response->setJSON($data_barang);
    }

}
