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
            'labkom' => $this->ModelPengajuan->dataLabkom(),
            'kategori' => $this->ModelPengajuan->dataKategori()
        ];
        return view('pengajuan/v_index', $data);
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
                'label' => 'Kategori barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'kd_invetaris' => [
                'label' => 'Kode barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'nama_barang' => [
                'label' => 'Nama barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'tgl_barang_masuk' => [
                'label' => 'Tanggal pengajuan',
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
                'id_barang' => $this->request->getPost('id_barang'),
                'id_labkom' => $this->request->getPost('id_labkom'),
                'id_kategori_barang' => $this->request->getPost('id_kategori_barang'),
                'kd_invetaris' => $this->request->getPost('kd_invetaris'),
                'nama_barang' => $this->request->getPost('nama_barang'),
                'tgl_barang_masuk' => $this->request->getPost('tgl_barang_masuk'),
                'kd_perolehan_brg' => $this->request->getPost('kd_perolehan_brg'),
                'kondisi' => $this->request->getPost('kondisi'),
                'catatan' => $this->request->getPost('catatan'),
                'status' => $this->request->getPost('status')
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
